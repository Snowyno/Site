<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_create_cupon') }}</h2>
            </div>
            
            {{-- Section content --}} 
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Cupon title --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_title')"
                        :placeholder="__('messages.t_enter_title')"
                        model="title"
                        icon="format-title" />
                </div>

                {{-- Cupon COD --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_cupon_cod')"
                        :placeholder="__('messages.t_cupon_cod')"
                        model="cod"
                        icon="link-variant" />
                </div>

                <!--
                {{-- Content --}}
                <div class="col-span-12">
                    <x-forms.ckeditor 
                        :label="__('messages.t_content')"
                        :placeholder="__('messages.t_enter_page_content')"
                        model="content"
                        target="create-page-action-btn" />
                </div>
                -->  

                      
                {{-- Cupon off value --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_cupon_value')"
                        :placeholder="__('messages.t_cupon_value')"
                        model="value"
                        icon="link" />
                </div>



                {{-- Is Percentage--}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_cupon_is_percentage')"
                        model="is_percentage" />
                </div>


                <!--
                {{-- Column --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_footer_column')"
                            :placeholder="__('messages.t_choose_footer_column')"
                            model="column"
                            :options="[ 
                                ['text' => __('messages.t_footer_column_1'), 'value' => 1],
                                ['text' => __('messages.t_footer_column_2'), 'value' => 2],
                                ['text' => __('messages.t_footer_column_3'), 'value' => 3],
                                ['text' => __('messages.t_footer_column_4'), 'value' => 4],
                            ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>
                -->

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="create" text="{{ __('messages.t_create') }}" :block="false" id="create-page-action-btn" />
        </div>                    

    </div>

</div>    