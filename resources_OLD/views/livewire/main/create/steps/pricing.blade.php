<div class="w-full" x-data="window.krLSMcHnnEKMpVx" x-init="initialize" id="component-create-gig-pricing">

    {{-- Pricing --}}
    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

        {{-- Section content --}}
        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 px-8 py-6">

            {{-- Service price --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input 
                    label="{{ __('messages.t_price') }}" 
                    placeholder="{{ __('messages.t_price_placeholder_0_00') }}" 
                    model="price"
                    id="value"
                    type="number"
                    min="0.00"
                    max="500000.00"
                    step="0.01"
                    suffix="{{ $currency_symbol }}" />
            </div>

            {{-- Delivery time --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.select2
                    :label="__('messages.t_delivery_time')"
                    :placeholder="__('messages.t_choose_delivery_time')"
                    model="delivery_time"
                    :options="$available_deliveries"
                    :isDefer="true"
                    :isAssociative="false"
                    :componentId="$this->id"
                    value="value"
                    text="text"
                    class="select2_pricing" />
            </div>
            <div class="col-span-6 md:col-span-6" id="comission">Comissão:</div>
            <div class="col-span-6 md:col-span-6" id="receive">Você recebe:</div>

        </div>

    </div>

    {{-- Actions --}}
    <div class="flex justify-between">
        <x-forms.button action="back" text="{{ __('messages.t_back') }}" active="bg-white dark:bg-zinc-700 dark:hover:zinc-800 shadow-sm hover:bg-gray-300 text-gray-900 dark:text-gray-300"  />
        <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" />
    </div> 

</div>


@push('scripts')
    
    {{-- AlpineJS --}}
    <script>
    
        const value = document.getElementById("text-input-component-id-price");
        const inputHandler = function(e) {
            document.getElementById("comission").innerHTML = "Comissão: " + new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format((e.target.value / 10))
            document.getElementById("receive").innerHTML = "Você recebe: " + new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(e.target.value - (e.target.value / 10))
            
        }
        value.addEventListener('input', inputHandler);

        function krLSMcHnnEKMpVx() {
            return {

                initSelect2DeliveryTime(id, key) {
                    $('#' + id).select2().on('change', function(){
                        @this.set('upgrades.' + key + '.extra_days', $(this).val());
                    });
                },

                initialize() {

                }

            }
        }
        window.krLSMcHnnEKMpVx = krLSMcHnnEKMpVx();
    </script>

@endpush