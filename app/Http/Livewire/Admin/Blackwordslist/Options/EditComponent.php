<?php

namespace App\Http\Livewire\Admin\Blackwordslist\Options;

use App\Models\Blackwordslist;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Http\Validators\Admin\Blackwordslist\EditValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Str;

class EditComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $word;


    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get Blackwordslist
        $blackwordslist = Blackwordslist::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'word'   => $blackwordslist->palvra
        ]);

        // Set blackwordslist
        $this->blackwordslist = $blackwordslist;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_blackwordslist'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.blackwordslist.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update Blackwordslist
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            //EditValidator::validate($this);

            // Get blackwordslist
            $blackwordslist = Blackwordslist::where('id', $this->blackwordslist->id)->firstOrFail();

            // Update blackwordslist
            $blackwordslist->palvra   = $this->word;
            $blackwordslist->save();

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
