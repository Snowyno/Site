<?php

namespace App\Http\Livewire\Main\Seller\Gigs\Options\Steps;

use App\Models\Gig;
use Livewire\Component;
use App\Models\GigImage;
use WireUi\Traits\Actions;
use App\Models\GigDocument;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Main\Seller\Gigs\Edit\GalleryValidator;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subcategoryd;

class Gallery extends Component
{ 
    use WithFileUploads, Actions;
    
    public $title;

    public $description;
    public $seo_title;
    public $seo_description;

    public $price;
    public $delivery_time;
    public $currency_symbol;

    public $available_deliveries = [];

    public $images    = [];


    public $thumbnail;

    public $category;
    public $subcategory;
    public $subcategoryd;

    public $gig;

    public $show;


    /**
     * Init component
     *
     * @param integer $id
     * @return void
     */
    public function mount(Gig $gig)
    {
        // Set gig
        $this->gig = $gig;

        // Fill form
        $this->fill([
            'category'     => $gig->category_id,
            'subcategory'  => $gig->subcategory_id,
            'subcategoryd' => $gig->subcategoryd_id
        ]);
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.seller.gigs.options.steps.gallery', [
            'categories'    => $this->categories,
            'subcategories' => $this->subcategories,
            'subcategoriesd' => $this->subcategoriesd,
        ]);

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
     * @return object
     */
    public function getSubcategoriesProperty()
    {
        return Subcategory::where('parent_id', $this->gig->category_id)->orderBy('name')->get();
    }


    /**
     * Get subcategoriesd
     *
     * @return object
     */
    public function getSubcategoriesdProperty()
    {
        return Subcategoryd::where('parent_id', $this->gig->subcategory_id)->orderBy('name')->get();
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
    public function updatedSubcategory($id)
    {
        // Get all subcategoriesd in this parent category
        $this->subcategoriesd = Subcategoryd::where('parent_id', $id)->orderBy('name')->get();
    }



    /**
     * Delete image from gallery
     *
     * @param integer $id
     * @return void
     */
    public function removeImage($id)
    {
        // Get image
        $image = GigImage::where('id', $id)->where('gig_id', $this->gig->id)->firstOrFail();

        // Delete images from local/server sides
        deleteModelFile($image->small);
        deleteModelFile($image->medium);
        deleteModelFile($image->large);

        // Now delete image
        $image->delete();

        // Refresh gig
        $this->gig->refresh();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_file_has_been_successfully_deleted'),
            'icon'        => 'success'
        ]);
    }




    /**
     * Save overview data section
     *
     * @return void
     */
    public function save()
    {
        try {
            
            // Validate form
            OverviewValidator::all($this);

            // Set data
            $data['title']           = $this->title;
            $data['category']        = $this->category;
            $data['subcategory']     = $this->subcategory;
            $data['subcategoryd']     = $this->subcategoryd;
            $data['description']     = $this->description;
            $data['seo_title']       = $this->seo_title ? $this->seo_title : null;
            $data['seo_description'] = $this->seo_description ? $this->seo_description : null;
            $data['tags']            = $this->tags;
            $data['faqs']            = $this->faqs ? $this->faqs : null;

            // Send this data to parent component
            $this->emit('data-saved-overview', $data);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_data_has_been_saved'),
                'icon'        => 'success'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            throw $th;

        }
    }
    
}
