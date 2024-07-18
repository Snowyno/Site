<?php

namespace App\Http\Livewire\Main\Search;

use App\Models\Gig;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Arr;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

use WireUi\Traits\Actions;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subcategoryd;
use Illuminate\Support\Facades\Cache;



class SearchComponent extends Component
{

    use WithPagination, SEOToolsTrait;

    public $cart;

    public $q;
    protected $queryString = ['q', 'min_price', 'max_price', 'delivery_time', 'sort_by', 'category_id', 'subcategory_id', 'subcategoryd_id'];

    public $category;
    public $subcategory;
    public $subcategoryd;
    public $subcategories = [];
    public $subcategoriesd = [];



    public $delivery_times;

    // filters
    public $sort_by;
    public $min_price;
    public $max_price;
    public $delivery_time;

    public $category_id = '';
    public $subcategory_id = '';
    public $subcategoryd_id = '';


    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Set delivery times
        $this->delivery_times = [
            ['value' => 1, 'text' => __('messages.t_1_day')],
            ['value' => 2, 'text' => __('messages.t_2_days')],
            ['value' => 3, 'text' => __('messages.t_3_days')]
        ];

        // Set cart
        $this->cart = session('cart', []);
    }



    /**
     * Remove item from cart
     *
     * @param string $id
     * @return void
     */
    public function clearCart()
    {
        // Get cart
        $cart = $this->cart;

        // Delete item from cart
        unset($cart);

        // Forget old session
        session()->forget('cart');

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_item_removed_from_cart_success'),
            'icon'        => 'success'
        ]);
    }    


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_search_results_for_q', ['q' => $this->q]) . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage     = src( settings('seo')->ogimage );

        $this->seo()->setTitle( $title );
        $this->seo()->setDescription( $description );
        $this->seo()->setCanonical( url()->current() );
        $this->seo()->opengraph()->setTitle( $title );
        $this->seo()->opengraph()->setDescription( $description );
        $this->seo()->opengraph()->setUrl( url()->current() );
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage( $ogimage );
        $this->seo()->twitter()->setImage( $ogimage );
        $this->seo()->twitter()->setUrl( url()->current() );
        $this->seo()->twitter()->setSite( "@" . settings('seo')->twitter_username );
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle( $title );
        $this->seo()->jsonLd()->setDescription( $description );
        $this->seo()->jsonLd()->setUrl( url()->current() );
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.search.search', [
            'gigs' => $this->gigs
        ])->extends('livewire.main.layout.app')->section('content');
    }



     /**
     * Get all parent categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return Category::orderBy('name')->get();
    }


        /**
     * Get subcategories
     *
     * @param integer $id
     * @return void
     */
    public function updatedCategory($id)
    {
        // Get all subcategories in this parent category
        $this->subcategories = Subcategory::where('parent_id', $id)->orderBy('name')->get();
    }


    /**
     * Get subcategoriesd
     *
     * @param integer $id
     * @return void
     */
    public function updatedSubcategoryd($id)
    {
        // Get all subcategories in this parent category
        $this->subcategoriesd = Subcategoryd::where('parent_id', $id)->orderBy('name')->get();
    }



    /**
     * Get gigs
     *
     * @return object
     */
    public function getGigsProperty()
    {
        $keyword = str_replace(['-', ' ', '_', "'", '"', "/", "`", "+"], ' ', $this->q);

        // start a new query
        $query = Gig::query()->active();

        // Check price
        if ($this->min_price) {
            $query->whereBetween('price', [$this->min_price, 999999]);
        }

        // Set max price
        if ($this->max_price) {
            $query->whereBetween('price', [0, $this->max_price]);
        }

        // Check delivery time
        if ($this->delivery_time) {
            $query->where('delivery_time', '<', $this->delivery_time+1);
        }


        // Check sort by
        if ($this->sort_by) {
            switch ($this->sort_by) {


                // Most sales
                case 'sales':
                    $query->orderByDesc('counter_sales');
                    $query->orderByDesc('orders_in_queue');
                    break;

                // Newest
                case 'newest':
                    $query->orderByDesc('id');
                    break;

                // Price low to high
                case 'price_low_high':
                    $query->orderBy('price', 'ASC');
                    break;

                // Price high to low
                case 'price_high_low':
                    $query->orderBy('price', 'DESC');
                    break;
                
                default:
                    $query->orderByRaw('RAND()');
                    break;
            }
        }



        // Check category_id
        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }
        // Check subcategory_id
        if ($this->subcategory_id) {
            $query->where('subcategory_id', $this->subcategory_id);
        }
        // Check category_id
        if ($this->subcategoryd_id) {
            $query->where('subcategoryd_id', $this->subcategoryd_id);
        }
        

        //TRY TO FORCE ALL SOLD OUT TO END OF PAGE
        $query->orderBy('orders_in_queue', 'asc');
        $query->orderBy('counter_sales', 'asc');

        // Set results
        return $query->where(function($builder) use($keyword) {
                        return $builder->where('title', 'LIKE', "%{$keyword}%")
                        ->orWhere('description', 'LIKE', "%{$keyword}%")
                        ->orWhereHas('tagged', function($query) use ($keyword) {
                            return $query->where('tag_name', 'LIKE', "%{$keyword}%");
                        });
                    })
                    ->paginate(42);
    }


    /**
     * Filter data
     *
     * @return mixed
     */
    public function filter()
    {
        // Set empty array
        $queries = [];


        // Check if has category
        if ($this->category_id) {
            $queries['category_id'] = $this->category_id;
        }

        // Check if has subcategory
        if ($this->subcategory_id) {
            $queries['subcategory_id'] = $this->subcategory_id;
        }


        // Check if has subcategoryd
        if ($this->subcategoryd_id) {
            $queries['subcategoryd_id'] = $this->subcategoryd_id;
        }



        // Check if has min price
        if ($this->min_price) {
            $queries['min_price'] = $this->min_price;
        }

        // Check if has max price
        if ($this->max_price) {
            $queries['max_price'] = $this->max_price;
        }

        // Check if has delivery time
        if ($this->delivery_time) {
            $queries['delivery_time'] = $this->delivery_time;
        }

        // Change this to query string
        $string = Arr::query($queries);

        // Generate url
        $url    = url("search?q=" . $this->q . '&' . $string);
        
        return redirect($url);
    }


    /**
     * Reset filter
     *
     * @return void
     */
    public function resetFilter()
    {
        // Reset filter
        return redirect('search?q=' . $this->q);
    }
    
}