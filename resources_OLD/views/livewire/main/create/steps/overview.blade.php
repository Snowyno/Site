<div class="w-full" x-data="window.CQjwMygsGRWknEn" x-init="initialize">

    {{-- Overview --}}
    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">
    
        {{-- Section title --}}
        <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-4">
                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_overview') }}</h3>
                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_create_gig_overview_subtitle') }}</p>
                </div>
                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                    <a href="{{ url('/') }}" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                        <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                            {{ __('messages.t_back_to_homepage') }}
                        </span>
                    </a>
                </div>
            </div>
        </div>
        
        {{-- Section content --}}
        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 px-8 py-6">
        
            {{-- Service title --}}
            <div class="col-span-12">
                <x-forms.text-input 
                    label="{{ __('messages.t_i_will') }}" 
                    placeholder="{{ __('messages.t_do_something_im_really_good_at') }}" 
                    model="title"
                    icon="format-title" />
            </div>
        
            {{-- Category --}}
            <div class="col-span-12 md:col-span-6">
                <label class="mb-3 block text-xs font-medium {{ $errors->first('category') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-200' }}">{{ __('messages.t_choose_parent_category') }}</label>
                <div class="min-w-0">
                    <ul class="max-h-52 flex-auto space-y-1 overflow-y-auto border-2 rounded {{ $errors->first('category') ? 'border-red-500' : 'border-gray-100 dark:border-zinc-700' }}">

                        @foreach ($categories as $cat)
                            <li wire:click="$set('category', {{ $cat->id }})" class="group flex cursor-pointer items-center rounded-0 p-2 hover:bg-gray-50 dark:hover:bg-zinc-700 text-gray-900 dark:text-gray-200 {{ $category === $cat->id ? 'bg-gray-50 dark:bg-zinc-700' : '' }}">
                                <img src="{{ src($cat->icon) }}" alt="{{ $cat->name }}" class="h-6 w-6 flex-none rounded-full">
                                <span class="ltr:ml-3 rtl:mr-3 flex-auto truncate text-xs font-medium">{{ $cat->name }}</span>
                                <div wire:loading.remove wire:target="$set('category', {{ $cat->id }})">
                                    @if ($category === $cat->id)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:ml-3 rtl:mr-3 h-4 w-4 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    @else
                                        <svg class="ltr:ml-3 rtl:mr-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path> </svg>
                                    @endif
                                </div>

                                {{-- Loading --}}
                                <div wire:loading wire:target="$set('category', {{ $cat->id }})">
                                    <svg class="animate-spin ltr:-ml-3 rtl:-mr-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path> </svg>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
                {{-- Error --}}
                @error('category')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('category') }}</p>
                @enderror
            </div>
        
            {{-- Subcategory --}}
            <div class="col-span-12 md:col-span-6">

                <label class="mb-3 block text-xs font-medium {{ $errors->first('subcategory') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-200' }}">{{ __('messages.t_choose_subcategory') }}</label>
                <div class="min-w-0">
                    <ul class="max-h-52 flex-auto space-y-1 overflow-y-auto {{ count($subcategories) ? 'border-2 rounded' : '' }} {{ $errors->first('subcategory') ? 'border-red-500' : 'border-gray-100 dark:border-zinc-700' }}">

                        @foreach ($subcategories as $subcat)
                            <li wire:click="$set('subcategory', {{ $subcat->id }})" class="group flex cursor-pointer items-center rounded-0 p-2 hover:bg-gray-50 dark:hover:bg-zinc-700 text-gray-900 dark:text-gray-200 {{ $subcategory === $subcat->id ? 'bg-gray-50 dark:bg-zinc-700' : '' }}">
                                <img src="{{ src($subcat->icon) }}" alt="{{ $subcat->name }}" class="h-6 w-6 flex-none rounded-full">
                                <span class="ltr:ml-3 rtl:mr-3 flex-auto truncate text-xs font-medium">{{ $subcat->name }}</span>
                                <div wire:loading.remove wire:target="$set('subcategory', {{ $subcat->id }})">
                                    @if ($subcategory === $subcat->id)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:ml-3 rtl:mr-3 h-4 w-4 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    @endif
                                </div>

                                {{-- Loading --}}
                                <div wire:loading wire:target="$set('subcategory', {{ $subcat->id }})">
                                    <svg class="animate-spin ltr:-ml-3 rtl:-mr-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path> </svg>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
                {{-- Error --}}
                @error('subcategory')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('subcategory') }}</p>
                @enderror
            </div>
        
            {{-- Desciption --}}
            <div class="col-span-12">
                <x-forms.ckeditor 
                    :label="__('messages.t_description')"
                    :placeholder="__('messages.t_briefly_describe_ur_gig')"
                    model="description"
                    target="create-gig-action-btn" />
            </div>
        </div>
    
    </div>

    {{-- Actions --}}
    <div class="flex justify-end">
        <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" id="create-gig-action-btn" />
    </div> 
    
</div>

@push('scripts')

    {{-- Slugify Plugin --}}
    <script src="https://cdn.jsdelivr.net/npm/slugify@1.6.5/slugify.min.js"></script>
    
    {{-- AlpineJS --}}
    <script>
        function CQjwMygsGRWknEn() {
            return {
                seo: {
                    is_enabled : false,
                    title      : null,
                    description: null
                },

                // Initialize
                initialize() {

                },

                // Get seo today date
                today() {
                    const date     = new Date();
                    const strArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    const d        = date.getDate();
                    const m        = strArray[date.getMonth()];
                    const y        = date.getFullYear();
                    return '' + m + ' ' + (d <= 9 ? '0' + d : d) + ', ' + y;
                },

                // Set seo url preview
                seoUrlPreview() {
                    if (this.seo.title) {
                        return "{{ url('service') }}/" + slugify(this.seo.title) 
                    }
                }
            }
        }
        window.CQjwMygsGRWknEn = CQjwMygsGRWknEn();
    </script>

@endpush