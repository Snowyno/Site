<?php

namespace App\Http\Livewire\Admin\Cupons\Options;

use App\Models\Cupon;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Http\Validators\Admin\Cupons\CreateValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Str;

class CreateComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $title;
    public $cod;
    public $value;
    public $is_percentage = false;


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_cupon'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.cupons.options.create')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Create new Cupon
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            //CreateValidator::validate($this);

            // Create new cupon
            $cupon          = new Cupon;
            $cupon->uid     = uid();
            $cupon->title   = $this->title;
            $cupon->cod    = Str::slug($this->cod);
            $cupon->value  = $this->value;
            $cupon->is_percentage = $this->is_percentage ? 1 : 0;
            $cupon->save();

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
