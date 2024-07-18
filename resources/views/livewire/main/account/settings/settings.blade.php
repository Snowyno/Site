<div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-16 pb-24 space-y-8 min-h-screen">
    <main class="w-full">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow overflow-hidden">
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                    {{-- Sidebar --}}
                    <aside class="lg:col-span-3 py-6 hidden lg:block" wire:ignore>
                        <x-main.account.sidebar />
                    </aside>

                    {{-- Section content --}}
                    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">

                        {{-- Form --}}
                        <div class="py-6 px-4 sm:p-6 lg:pb-8 h-[calc(100%-80px)]">

                            {{-- Section header --}}
                            <div class="mb-14">
                                <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_account_settings') }}</h2>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __('messages.t_account_settings_subtitle') }}</p>
                            </div>
                            
                            {{-- Section content --}}
                            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                                {{-- Username --}}
                                <div class="col-span-12 md:col-span-6">
                                    <x-forms.text-input 
                                        label="{{ __('messages.t_username') }}" 
                                        placeholder="{{ __('messages.t_enter_username') }}" 
                                        model="username"
                                        icon="account" />
                                </div>

                                {{-- E-mail address --}}
                                <!--
                                <div class="col-span-12 md:col-span-6">
                                    <x-forms.text-input 
                                        label="{{ __('messages.t_email_address') }}" 
                                        placeholder="{{ __('messages.t_enter_email_address') }}" 
                                        model="email"
                                        type="email"
                                        icon="at" />
                                </div>
                                -->
                                <div class="col-span-12 md:col-span-6">
                                <div>
                                <label for="text-input-component-id-email" class="block text-[0.8125rem] font-medium tracking-wide text-gray-700 dark:text-white">Endereço de email</label>
                                <div class="mt-2 relative">
                                <input type="email" placeholder="Insira o endereço de e-mail" wire:model.defer="email" id="text-input-component-id-email" onfocus="" onblur="validaEmail();"
                                class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal 
                                placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500">
                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-4 rtl:pl-4 flex items-center pointer-events-none">
                                <i class="mdi mdi-at text-gray-400"></i>
                                </div>
                                </div>
                                </div>                                
                                </div>
                                <script>
                                    function validaEmail(){
                                        var email = $("#text-input-component-id-email").val();

                                        if (validateEmail(email)) {
                                           //alert("Hiya Cowboy, this email will work for us 🤠");

                                        } else {
                                            $("#text-input-component-id-email").val('');
                                            //alert("Sorry, this email is not cool enough 😩");
                                            alert("{{ __('messages.t_validator_email') }}");
                                        }
                                    }

                                    function validateEmail(email) {
                                        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                        return re.test(String(email).toLowerCase());
                                    }

                                </script>

                                {{-- Fullname --}}
                                <div class="col-span-12 md:col-span-6">
                                    <x-forms.text-input 
                                        label="{{ __('messages.t_fullname') }}" 
                                        placeholder="{{ __('messages.t_enter_fullname') }}" 
                                        model="fullname"
                                        icon="account" />
                                </div>

                                {{-- Country --}}
                                <div class="col-span-12 md:col-span-6">
                                    <div class="w-full" wire:ignore>
                                        <x-forms.select2
                                            :label="__('messages.t_country')"
                                            :placeholder="__('messages.t_choose_country')"
                                            model="country"
                                            :options="$countries"
                                            :isDefer="true"
                                            :isAssociative="false"
                                            :componentId="$this->id"
                                            value="id"
                                            text="name" />
                                    </div>
                                </div>

                                {{-- Current password --}}
                                @if (auth()->user()->password)
                                    <div class="col-span-12">
                                        <x-forms.text-input 
                                            label="{{ __('messages.t_password') }}" 
                                            placeholder="{{ __('messages.t_enter_your_current_password') }}" 
                                            model="password"
                                            type="password"
                                            icon="key" />
                                    </div>
                                @endif

                            </div>

                        </div>

                        {{-- Actions --}}
                        <div class="py-4 px-4 flex justify-end sm:px-6 bg-gray-50 dark:bg-zinc-700">
                            <x-forms.button action="update" text="{{ __('messages.t_update') }}"  />
                        </div>                    

                    </div>

                </div>
            </div>
        </div>
    </main>
</div>