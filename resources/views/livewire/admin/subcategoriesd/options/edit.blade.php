<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_edit_subcategory_detail') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Subcategory name --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        label="{{ __('messages.t_subcategory_detail_name') }}" 
                        placeholder="{{ __('messages.t_enter_subcategory_detail_name') }}" 
                        model="name"
                        icon="format-title" />
                </div>

                {{-- Subcategory slug --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        label="{{ __('messages.t_subcategory_detail_slug') }}" 
                        placeholder="{{ __('messages.t_enter_subcategory_detail_slug') }}" 
                        model="slug"
                        icon="link-variant" />
                </div>

                {{-- Parent category --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_parent_category')"
                            :placeholder="__('messages.t_choose_parent_category')"
                            model="parent_id"
                            :options="$categories"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="id"
                            text="name" />
                    </div>
                </div>

                {{-- Subcategory description --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        label="{{ __('messages.t_description') }}" 
                        placeholder="{{ __('messages.t_enter_description') }}" 
                        model="description"
                        icon="file-document"
                        rows="7" />
                </div>

                {{-- Subcategory icon --}}
                <div class="col-span-6">
                    <x-forms.file-input :label="__('messages.t_subcategory_detail_icon')" model="icon"  />
                    {{-- Preview image --}}
                    @if ($subcategoryd->icon)
                        <div class="mt-3">
                            <img src="{{ src( $subcategoryd->icon ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                {{-- Subcategory image --}}
                <div class="col-span-6">
                    <x-forms.file-input :label="__('messages.t_subcategory_detail_image')" model="image"  />
                    {{-- Preview image --}}
                    @if ($subcategoryd->image)
                        <div class="mt-3">
                            <img src="{{ src( $subcategoryd->image ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    