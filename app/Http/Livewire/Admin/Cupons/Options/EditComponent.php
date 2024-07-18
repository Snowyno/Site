<?php

namespace App\Http\Livewire\Admin\Cupons\Options;

use App\Models\Cupon;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Http\Validators\Admin\Cupons\EditValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Str;

class EditComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $title;
    public $cod;
    public $value;
    public $is_percentage = false;



    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get cupon
        $cupon = Cupon::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'title'   => $cupon->title,
            'cod'    => $cupon->cod,
            'value' => $cupon->value,
            'is_percentage' => $cupon->is_percentage ? 1 : 0,
        ]);

        // Set cupon
        $this->cupon = $cupon;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_cupon'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.cupons.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update cupon
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            //EditValidator::validate($this);

            // Get cupon
            $cupon = Cupon::where('id', $this->cupon->id)->firstOrFail();

            // Update cupon
            $cupon->title   = $this->title;
            $cupon->cod    = Str::slug($this->cod);
            $cupon->value = $this->value ? $this->value : null;
            $cupon->is_percentage = $this->is_percentage ? 1 : 0;
            $cupon->save();

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
