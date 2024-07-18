<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_configure_timeouts') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_configure_timeouts_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Timeout Entrega Pedido --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_timeout_venda')"
                        :placeholder="__('messages.t_timeout_info')"
                        model="timeoutVenda"
                        icon="format-title" />
                </div>

                {{-- Timeout de Disputa (Vendedor) --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.text-input
                        :label="__('messages.t_timeout_entrega')"
                        :placeholder="__('messages.t_timeout_info')"
                        model="timeoutEntrega"
                        icon="format-title" />
                    </div>
                </div>

                
                {{-- Timeout de Disputa (Comprador) --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_timeout_resposta')"
                        :placeholder="__('messages.t_timeout_info')"
                        model="timeoutResposta"
                        icon="format-title" />
                </div>
               

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    