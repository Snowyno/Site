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
use App\Http\Validators\Admin\Subcategoriesd\CreateValidator;
use Illuminate\Support\Str;

class CreateComponent extends Component
{

    use WithFileUploads, SEOToolsTrait, Actions;

    public $name;
    public $slug;
    public $description;
    public $icon;
    public $image;
    public $parent_id;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_subcategory'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.subcategoriesd.options.create', [
            'categories' => $this->categoriesd
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get all parent categoriesd
     *
     * @return object
     */
    public function getCategoriesdProperty()
    {
        return Subcategory::orderBy('name')->get();
    }


    /**
     * Create new subcategory
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Upload categorory icon
            if ($this->icon) {
                $icon_id = ImageUploader::make($this->icon)->resize(100, 100)->folder('subcategoriesd')->handle();
            } else {
                //$icon_id = null;
                $icon_id = 0;
            }

            // Upload subcategory image
            if ($this->image) {
                $image_id = ImageUploader::make($this->image)->resize(800)->folder('subcategoriesd')->handle();
            } else {
                $image_id = null;
                $image_id = 0;
            }

            // Save subcategoryd
            $subcategoryd              = new Subcategoryd();
            $subcategoryd->uid         = uid();
            $subcategoryd->name        = $this->name;
            $subcategoryd->slug        = Str::slug($this->slug);
            $subcategoryd->description = $this->description ? $this->description : null;
            $subcategoryd->icon_id     = $icon_id;
            $subcategoryd->image_id    = $image_id;
            $subcategoryd->parent_id  = $this->parent_id;
            $subcategoryd->save();

            // Reset form
            $this->resetExcept('parent_id');

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
