<?php

namespace App\Http\Livewire\Main\Categories;


use App\Models\Gig;
use WireUi\Traits\Actions;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subcategoryd;


use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Arr;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

@session_start();

class CategoryComponent extends Component
{
  
    use WithPagination, SEOToolsTrait, Actions; 

    public $q;
    protected $queryString = ['q', 'min_price', 'max_price', 'delivery_time', 'rating', 'sort_by', 'pricerange', 'category_id', 'subcategory_id', 'subcategoryd_id'];

    public $category;
    public $subcategory;
    public $subcategoryd;
    public $subcategories = [];
    public $subcategoriesd = [];
    public $usersOnline;
    public $onlinefilter = 'off';
    
    public $delivery_times;

    // filters
    public $user;
    public $sort_by;
    public $online;
    public $min_price;
    public $max_price;
    public $pricerange;
    public $delivery_time;
    public $rating;

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
            ['value' => 3, 'text' => __('messages.t_3_days')],
            ['value' => 4, 'text' => __('messages.t_4_days')],
            ['value' => 5, 'text' => __('messages.t_5_days')],
            ['value' => 6, 'text' => __('messages.t_6_days')],
            ['value' => 7, 'text' => __('messages.t_1_week')],
            ['value' => 14, 'text' => __('messages.t_2_weeks')],
            ['value' => 21, 'text' => __('messages.t_3_weeks')],
            ['value' => 30, 'text' => __('messages.t_1_month')]
        ];

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
     * Check if user online
     *
     * @return boolean
     */
    public function isOnline(){
        return Cache::has('user-is-online-'. $this->id);
    }


    //Show only online users
    public function isUseronline(){

        if(isset($_SESSION['onlyShowOnline']) AND $_SESSION['onlyShowOnline'] == true){
            $this->usersOnline ='NENHUM';
            $this->onlinefilter='off';
            $_SESSION['onlyShowOnline'] = false;
            unset($_SESSION['onlyShowOnline']);
            $_SESSION['btnfilteronoff'] = "";
        }
        else if($this->onlinefilter=='off' OR $onlinefilter = null){
            $this->usersOnline ='SO ONLINE';
            $this->onlinefilter='on';
            $_SESSION['onlyShowOnline'] = true;
            $_SESSION['btnfilteronoff'] = "checked";
        } 
        else if($this->onlinefilter=='on'){
            $this->usersOnline ='NENHUM';
            $this->onlinefilter='off';
            $_SESSION['onlyShowOnline'] = false;
            unset($_SESSION['onlyShowOnline']);
            $_SESSION['btnfilteronoff'] = "";
        }

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


        // Check delivery time
        if ($this->delivery_time) {
            $query->where('delivery_time', $this->delivery_time);
        }

        // Check price range
        if ($this->pricerange) {
            switch ($this->pricerange) {

            //teste
            case 0:
                $query->whereBetween('price', [0, 999999999999]);
                break;

                //teste
            case 1:
                $query->whereBetween('price', [0, 10.99]);
                break;
                
                //teste
            case 2:
                $query->whereBetween('price', [11, 20]);
                break;

                //teste
            case 3:
                $query->whereBetween('price', [21, 30]);
                break;

                //teste
            case 4:
                $query->whereBetween('price', [31, 40]);
                break;

                //teste
            case 5:
                $query->whereBetween('price', [41, 60]);
                break;

                //teste
            case 6:
                $query->whereBetween('price', [61, 100]);
                break;
                
                //teste
            case 7:
                $query->whereBetween('price', [101, 999999999999]);
                break;

            default:
                $query->whereBetween('price', [0, 999999999990009]);
                break;
            
            }
        }

        // Check category
        if ($this->category_id) {
            if(isset($_GET['category_id']) AND $_GET['category_id'] != "x" AND $_GET['category_id'] != ""){
                $query->where('category_id', $_GET['category_id']);
            } 
        }

        // Check category
        if ($this->subcategory_id) {
            if(isset($_GET['subcategory_id']) AND $_GET['subcategory_id'] != "x" AND $_GET['subcategory_id'] != ""){
                $query->where('subcategory_id', $_GET['subcategory_id']);
            } 
        }    
        
        // Check category
        if ($this->subcategoryd_id) {
            if(isset($_GET['subcategoryd_id']) AND $_GET['subcategoryd_id'] != "x" AND $_GET['subcategoryd_id'] != ""){
                $query->where('subcategoryd_id', $_GET['subcategoryd_id']);
            } 
        }        
        


        // Check sort by
        if ($this->sort_by) {
            switch ($this->sort_by) {

                // Most popular
                case 'popular':
                    $query->orderByDesc('counter_visits');
                    break;

                // Best rating
                case 'rating':
                    $query->orderByDesc('rating');
                    break;

                // Most sales
                case 'sales':
                    $query->orderByDesc('counter_sales');
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


        // Check if has price range
        if ($this->pricerange) {
            $queries['pricerange'] = $this->pricerange;
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