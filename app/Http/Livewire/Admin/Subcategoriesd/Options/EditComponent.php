<?php

namespace App\Http\Livewire\Admin\Subcategoriesd\Options;

use Livewire\Component;
use App\Models\Category;
use WireUi\Traits\Actions;
use App\Models\Subcategory;
use App\Models\Subcategoryd;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Subcategoriesd\EditValidator;
use Illuminate\Support\Str;

class EditComponent extends Component
{

    use WithFileUploads, SEOToolsTrait, Actions;

    public $name;
    public $slug;
    public $description;
    public $icon;
    public $image;
    public $parent_id;
    public $subcategoryd;

    /**
     * Initialize component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get subcategory
        $subcategoryd = Subcategoryd::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'name'        => $subcategoryd->name,
            'slug'        => $subcategoryd->slug,
            'description' => $subcategoryd->description,
            'parent_id'   => $subcategoryd->parent_id,
        ]);

        // Set subcategory
        $this->subcategoryd = $subcategoryd;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_subcategory'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.subcategoriesd.options.edit', [
            'categories' => $this->categoriesd
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get all parent categories
     *
     * @return object
     */
    public function getCategoriesdProperty()
    {
        return Subcategory::orderBy('name')->get();
    }


    /**
     * Update subcategoryd
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            //EditValidator::validate($this);

            // Upload categorory icon
            if ($this->icon) {
                $icon_id = ImageUploader::make($this->icon)
                                        ->deleteById($this->subcategoryd->icon_id)
                                        ->resize(100, 100)
                                        ->folder('subcategories')
                                        ->handle();
            } else {
                $icon_id = $this->subcategoryd->icon_id;
            }

            // Upload subcategory image
            if ($this->image) {
                $image_id = ImageUploader::make($this->image)
                                        ->deleteById($this->subcategoryd->image_id)
                                        ->resize(800)
                                        ->folder('subcategories')
                                        ->handle();
            } else {
                $image_id = $this->subcategoryd->image_id;
            }

            // Update subcategory
            $this->subcategoryd->name        = $this->name;
            $this->subcategoryd->slug        = Str::slug($this->slug);
            $this->subcategoryd->description = $this->description ? $this->description : null;
            $this->subcategoryd->icon_id     = $icon_id;
            $this->subcategoryd->image_id    = $image_id;
            $this->subcategoryd->parent_id   = $this->parent_id;
            $this->subcategoryd->save();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
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
