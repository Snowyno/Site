<div class="w-full" x-data="window.HtBWuUxgpMyrQEM" x-init="initialize">

    {{-- Please wait dialog --}}
    <div class="fixed top-0 left-0 z-50 bg-black w-full h-full opacity-80" wire:loading>
        <div class="w-full h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="mx-auto w-12 h-12 text-gray-500 animate-spin dark:text-gray-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="text-xs font-medium tracking-wider text-white mt-4 block">{{ __('messages.t_please_wait_dots') }}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        {{-- Main section title --}}
        <div class="col-span-12 mb-10">
            <div class="md:flex md:items-center md:justify-between ltr:border-l-8 border-primary-600 ltr:pl-4 rtl:border-r-8 rtl:pr-4">
                <div class="flex-1 min-w-0">
                    <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100 tracking-wider pb-1">{{ __('messages.t_gallery') }}</h2>
                    <p class="text-gray-500 dark:text-gray-400 font-medium text-xs">{{ __('messages.t_update_gig_gallery_documents_and_video') }}</p>
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

        {{-- Images --}}
        <div class="col-span-12 lg:col-span-7" wire:key="section_images">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6 dark:bg-zinc-800 dark:border-zinc-700">

                {{-- Section title --}}
                <div class="mb-14 flex justify-between items-center">
                    <div>
                        <h2 class="text-sm tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100">
                            {{ __('messages.t_images') }}</h2>
                        <p class="text-xs text-gray-500 dark:text-gray-300">{{ __('messages.t_get_noticed_by_right_buyers_images') }}</p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                    </div>
                </div>

                {{-- Section content --}}
                <div class="w-full mb-10">

                    {{-- Images uploader --}}
                    <div wire:ignore>
                        <x-forms.uploader model="images" id="uploader_images" :extensions="['jpg', 'jpeg', 'png']"
                            accept="image/jpg, image/jpeg, image/png" size="{{ settings('publish')->max_image_size }}"
                            max="{{ settings('publish')->max_images }}" />
                    </div>

                </div>

                {{-- Section title --}}
                <div class="mt-14 mb-6">
                    <h2 class="text-sm tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('messages.t_gig_gallery') }}</h2>
                    <p class="text-xs text-gray-500 dark:text-gray-300">{{ __('messages.t_if_u_upload_new_images_below_will_be_deleted') }}
                    </p>
                </div>

                {{-- Old images --}}
                <div class="fileuploader fileuploader-theme-thumbnails">
                    <div class="fileuploader-items">
                        <ul class="!grid !grid-cols-12 sm:!gap-x-6 gap-y-6 !m-auto fileuploader-items-list">

                            @foreach ($gig->images as $img)
                                <li
                                    wire:key="gallery-image-item-{{ $img->id }}"
                                    class="!col-span-12 sm:!col-span-6 md:!col-span-4 lg:!col-span-3 !w-full h-24 !m-auto fileuploader-item file-type-image file-ext-png file-has-popup rounded-[6px]">
                                    <div class="fileuploader-item-inner">
                                        <div class="type-holder">{{ $img->small->file_extension }}</div>
                                        <div class="actions-holder">
                                            <button type="button"
                                                x-on:click="confirm('{{ __('messages.t_are_u_sure_delete_this_image') }}') ? $wire.removeImage('{{ $img->id }}') : ''" 
                                                wire:loading.attr="disabled" 
                                                wire:target="removeImage('{{ $img->id }}')"
                                                class="fileuploader-action fileuploader-action-remove"
                                                title="{{ __('messages.t_delete') }}">
                                                <i class="fileuploader-icon-remove"></i>
                                            </button>
                                        </div>
                                        <div class="thumbnail-holder">
                                            <div class="fileuploader-item-image">
                                                <img class="lazy" src="{{ placeholder_img() }}" data-src="{{ src($img->small) }}" draggable="false">
                                            </div>
                                            <span class="fileuploader-action-popup"></span>
                                        </div>
                                        <div class="content-holder">
                                            <span>{{ human_filesize($img->large->file_size) }}</span>
                                        </div>
                                        <div class="progress-holder"></div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                {{-- Section title --}}
                <div class="mt-14 mb-6">
                    <h2 class="text-sm tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('messages.t_gig_thumbnail') }}</h2>
                    <p class="text-xs text-gray-500 dark:text-gray-300">{{ __('messages.t_catch_buyers_eyes_with_nice_img') }}
                    </p>
                </div>

                {{-- Section content --}}
                <div class="w-full">
                    <x-forms.file-input :label="__('messages.t_upload_thumbnail')" model="thumbnail"  />
                    {{-- Preview image --}}
                    @if ($gig->thumbnail)
                        <div class="mt-3">
                            <img src="{{ src( $gig->thumbnail ) }}" class="lazy h-24 w-24 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

            </div>

            {{-- Actions --}}
            <div class="hidden justify-between items-center lg:flex">
                <x-forms.button action="back" text="{{ __('messages.t_back') }}"
                    active="bg-white dark:bg-zinc-700 dark:hover:zinc-800 shadow-sm hover:bg-gray-300 text-gray-900 dark:text-gray-300" />
                <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" />
            </div>

        </div>

        {{-- Documents && Video --}}
        <div class="col-span-12 lg:col-span-5">
        </div>

        {{-- Actions --}}
        <div class="col-span-12 block lg:hidden">
            <div class="flex justify-between">
                <x-forms.button action="back" text="{{ __('messages.t_back') }}"
                    active="bg-white dark:bg-zinc-700 dark:hover:zinc-800 shadow-sm hover:bg-gray-300 text-gray-900 dark:text-gray-300" />
                <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" />
            </div>
        </div>

    </div>

        {{-- Footer --}}
        <x-slot name="footer">
            <x-forms.button action="addVideo" text="{{ __('messages.t_add') }}" :block="0" />
        </x-slot>

</div>


@push('scripts')
    {{-- AlpineJS --}}
    <script>
        function HtBWuUxgpMyrQEM() {
            return {

                initialize() {}

            }
        }
        window.HtBWuUxgpMyrQEM = HtBWuUxgpMyrQEM();
    </script>
@endpush
