<?php

namespace App\Http\Livewire\Main\Create\Steps;

use Livewire\Component;
use WireUi\Traits\Actions;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subcategoryd;

//use App\Http\Validators\Main\Create\OverviewValidator;
use Livewire\WithFileUploads;
//use App\Http\Validators\Main\Create\GalleryValidator;
//use App\Http\Validators\Main\Create\RequirementsValidator;

class Overview extends Component
{
    use WithFileUploads, Actions;
    
    public $title;

    public $category;
    public $subcategory;
    public $subcategoryd;
    public $show;

    public $description;
    public $seo_title;
    public $seo_description;
    public $question;
    public $answer;
    public $images    = [];

    public $subcategories = [];
    public $subcategoriesd = [];
    
    public $price;
    public $delivery_time;
    public $currency_symbol;
    public $upgrades             = [];
    public $add_upgrade          = [];
    public $available_deliveries = [];

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {   
        return view('livewire.main.create.steps.overview', [
            'categories' => $this->categories
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
        // Get all subcategories in this parent category
        $this->subcategoriesd = Subcategoryd::where('parent_id', $id)->orderBy('name')->get();
    }




    /**
     * Add tag to list
     *
     * @param string $tag
     * @return void
     */
    public function addTag(string $tag)
    {
        // Validate form
        try {

            // Validate form
           //@OverviewValidator::tag($tag);

            // Clear tag
            $clean = str_replace(['"', "'", ";", ":", "/", ",", ".", "-", "_", "&", "!"], "", $tag);

            // Add add tag to list
            array_push($this->tags, $clean);

            // Refresh tags list
            array_values($this->tags);

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


    /**
     * Remove tag from list
     *
     * @param string $tag
     * @return void
     */
    public function removeTag($tag)
    {
        // Get tag key
        $key = array_search($tag, $this->tags);

        // Check if tag exists
        if (isset($this->tags[$key])) {
            
            // Delete this tag
            unset($this->tags[$key]);

            // Refresh tags list
            array_values($this->tags);

        }
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
            //OverviewValidator::all($this);
 
            
            // Set data
            $data['title']           = $this->title;
            $data['category']        = $this->category;
            $data['subcategory']     = $this->subcategory;
            $data['subcategoryd']    = $this->subcategoryd;
            $data['price']           = $this->price;
            $data['description']     = $this->description;
            $data['seo_title']       = $this->seo_title ? $this->seo_title : null;
            $data['seo_description'] = $this->seo_description ? $this->seo_description : null;
            //$data['tags']            = $this->tags;
            $data['tags']            = 'product';
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
            die();

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            throw $th;

            die();

        }
    }
    
}

