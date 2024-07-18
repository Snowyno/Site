<?php

namespace App\Http\Livewire\Admin\Blackwordslist\Options;

use App\Models\Blackwordslist;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Http\Validators\Admin\Blackwordslist\CreateValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Str;

class CreateComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $word;
    


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_bwl'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.blackwordslist.options.create')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Create new Blackwordslist
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            //CreateValidator::validate($this);

            // Create new blackwordslist
            $blackwordslist         = new Blackwordslist;
            $blackwordslist->uid     = uid();
            $blackwordslist->palvra   = $this->word;
            $blackwordslist->save();

            // Reset form
            $this->reset();

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
