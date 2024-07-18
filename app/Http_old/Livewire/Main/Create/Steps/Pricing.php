<?php

namespace App\Http\Livewire\Main\Create\Steps;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Http\Validators\Main\Create\PricingValidator;

class Pricing extends Component
{
    use Actions;
    
    public $price;
    public $delivery_time;
    public $currency_symbol;
    public $upgrades             = [];
    public $add_upgrade          = [];
    public $available_deliveries = [];


    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Set available deliveries dates
        $this->available_deliveries = [
            ['value' => 0, 'text' => __('messages.t_none')],
            ['value' => 1, 'text' => __('messages.t_1_day')],
            ['value' => 2, 'text' => __('messages.t_2_days')],
            ['value' => 3, 'text' => __('messages.t_3_days')]
        ];

        // Get default currency
        $currency              = settings('currency');

        // Set currency symbol
        $this->currency_symbol = isset(config('money')[$currency->code]['symbol']) ? config('money')[$currency->code]['symbol'] : $currency->code;

    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.create.steps.pricing');
    }

    /**
     * Go back to preview step
     *
     * @return void
     */
    public function back()
    {
        // Go back to preview step
        $this->emit('back');

        // Reload select2
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'target'    => '.select2_pricing',
            'component' => $this->id
        ]);
    }


    /**
     * Save pricing data section
     *
     * @return void
     */
    public function save()
    {
        try {

            // Validate form
            PricingValidator::all($this);

            // Set data
            $data['price']         = $this->price;
            $data['delivery_time'] = $this->delivery_time;
            $data['upgrades']      = count($this->upgrades) ? $this->upgrades : [];
            $data['component_id']  = $this->id;

            // Send this data to parent component
            $this->emit('data-saved-pricing', $data);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_data_has_been_saved'),
                'icon'        => 'success'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_pricing',
                'component' => $this->id
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_pricing',
                'component' => $this->id
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_pricing',
                'component' => $this->id
            ]);

            throw $th;

        }
    }
}
