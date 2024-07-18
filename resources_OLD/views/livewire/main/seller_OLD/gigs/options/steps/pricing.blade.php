<div class="w-full" x-data="window.krLSMcHnnEKMpVx" x-init="initialize">
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        {{-- Main section title --}}
        <div class="col-span-12 mb-10">
            <div class="md:flex md:items-center md:justify-between ltr:border-l-8 border-primary-600 ltr:pl-4 rtl:border-r-8 rtl:pr-4">
                <div class="flex-1 min-w-0">
                    <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100 tracking-wider pb-1">{{ __('messages.t_pricing') }}</h2>
                    <p class="text-gray-500 dark:text-gray-400 font-medium text-xs">{{ __('messages.t_edit_gig_price_upgrades') }}</p>
                </div>
                <div class="mt-4 flex md:mt-0 ltr:md:ml-4 rtl:md:mr-4">

                    {{-- Back to gigs --}}
                    <a href="{{ url('seller/gigs') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-700 rounded-sm shadow-sm text-xs font-medium text-gray-600 dark:text-zinc-300 bg-white dark:bg-zinc-700 dark:hover:bg-zinc-600 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-5 w-5 text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                        {{ __('messages.t_back_to_gigs') }}
                    </a>

                    {{-- View gig --}}
                    <a href="{{ url('service', $gig->slug) }}" target="_blank" class="ltr:ml-3 rtl:mr-3 inline-flex items-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        {{ __('messages.t_view_gig') }}
                    </a>
                </div>
            </div>
        </div>

        {{-- Success --}}
        @if (session()->has('success'))
            <div class="col-span-12">
                <div class="rounded-md bg-green-50 dark:bg-zinc-700 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400 dark:text-zinc-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <p class="text-sm font-medium text-green-800 dark:text-zinc-400">{{ session()->get('success') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        @endif

        {{-- Main pricing --}}
        <div class="col-span-12 xl:col-span-7">
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-sm border border-gray-100 dark:border-zinc-700 px-8 py-6 mb-6">

                {{-- Section title --}}
                <div class="mb-14 flex justify-between items-center">
                    <div>
                        <h2 class="text-sm tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100">
                            {{ __('messages.t_pricing') }}</h2>
                        <p class="text-xs text-gray-500 dark:text-gray-300">{{ __('messages.t_create_gig_pricing_subtitle') }}</p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                    </div>
                </div>

                {{-- Section content --}}
                <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 pb-6">

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
                        <x-forms.select2 :label="__('messages.t_delivery_time')" :placeholder="__('messages.t_choose_delivery_time')" model="delivery_time" :options="$available_deliveries"
                            :isDefer="true" :isAssociative="false" :componentId="$this->id" value="value" text="text"
                            class="select2_pricing" />
                    </div>
                    <div class="col-span-6 md:col-span-6" id="comission">Comissão:</div>
                    <div class="col-span-6 md:col-span-6" id="receive">Você recebe:</div>
                </div>

            </div>

            {{-- Actions --}}
            <div class="hidden justify-between items-center lg:flex">
                <x-forms.button action="back" text="{{ __('messages.t_back') }}"
                    active="bg-white dark:bg-zinc-700 dark:hover:zinc-800 shadow-sm hover:bg-gray-300 text-gray-900 dark:text-gray-300" />
                <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" />
            </div>

        </div>
            {{-- Footer --}}
            <x-slot name="footer">
                <x-forms.button action="addUpgrade" text="{{ __('messages.t_add') }}" :block="0" />
            </x-slot>

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
                    $('#' + id).select2().on('change', function() {
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
