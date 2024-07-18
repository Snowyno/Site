<?php

namespace App\Http\Livewire\Admin\Subcategoriesd;

use App\Models\Gig;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Subcategory;
use App\Models\Subcategoryd;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SubcategoriesdComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_subcategoriesd'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.subcategoriesd.subcategoriesd', [
            'subcategoriesd' => $this->subcategoriesd
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of subcategories
     *
     * @return object
     */
    public function getSubcategoriesdProperty()
    {
        return Subcategoryd::orderByDesc('id')->paginate(42);
    }


    /**
     * Delete subcategoryd
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get subcategoryd
        $subcategoryd = Subcategoryd::where('id', $id)->firstOrFail();

        // Count gigs in this category
        $gigs     = Gig::where('id', $subcategoryd->id)->count();

        // Check if category has any gig
        if ($gigs) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_this_subcategory_has_some_gigs_please_edit_it'),
                'icon'        => 'error'
            ]);

            return;

        }

        // Check if subcategory has icon
        if ($subcategoryd->icon) {
            deleteModelFile($subcategoryd->icon);
        }

        // Check if subcategory has image
        if ($subcategoryd->image) {
            deleteModelFile($subcategoryd->image);
        }

        // Delete subcategory
        $subcategoryd->delete();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }
    
}
