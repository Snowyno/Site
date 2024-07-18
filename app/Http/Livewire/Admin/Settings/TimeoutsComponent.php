<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsTimeouts;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\DB;
//use App\Http\Validators\Admin\Settings\CurrencyValidator;

class TimeoutsComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $timeoutVenda;
    public $timeoutEntrega;
    public $timeoutResposta;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $timeouts = '';
        $timeouts = DB::table('settings_timeouts')->get();

        // Fill default settings
        foreach ($timeouts as $data) {
            $timeoutVenda   = $data->timeoutVenda;
            $timeoutEntrega  = $data->timeoutEntrega;
            $timeoutResposta   = $data->timeoutResposta;
        }


        $this->fill([
            'timeoutVenda'      => $timeoutVenda,
            'timeoutEntrega'    => $timeoutEntrega,
            'timeoutResposta'   => $timeoutResposta ,
        ]);
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_timeouts'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.timeouts', [])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update settings
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            //CurrencyValidator::validate($this);

            // Update settings
            SettingsTimeouts::where('id', 1)->update([
                'timeoutVenda'          => $this->timeoutVenda,
                'timeoutEntrega'        => $this->timeoutEntrega,
                'timeoutResposta'       => $this->timeoutResposta
            ]);

            // Refresh data from cache
            //settings('currency', true);

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
