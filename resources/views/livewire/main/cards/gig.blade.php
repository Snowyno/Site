<?php
if($gig->orders_in_queue > 0 or $gig->counter_sales > 0){
    $link = false;
    $soldout = 'display: inline;';
    $dspPrice = 'display: none;'; 
}
else{
    $link = true;
    $soldout = 'display: none;'; 
    $dspPrice = 'display: inline;'; 
}
?>

<div  class="gig-card" x-data="window._{{ $gig->uid }}" dir="{{ config()->get('direction') }}">

    <div class="bg-white dark:bg-zinc-800 rounded-md shadow-sm ring-1 ring-gray-200 dark:ring-zinc-800">

    <div id="solOut" style="<?php echo $soldout; ?>position: absolute;background-color: red;color: white;margin: 17px 170px 5px;transform: rotate(390deg);padding: 1px 15px 1px 15px;text-transform: uppercase;">{{ __('messages.t_sold_off') }}</div>

        {{-- Preview --}}
        <?php
        if($link ){
        ?>
        <a href="{{ url('service', $gig->slug) }}" wire:click="clearCart()" class="flex items-center justify-center overflow-hidden w-full h-52 bg-gray-100 dark:bg-zinc-700">
            <img class="object-contain max-h-52 lazy h-52 w-auto" width="200" src="{{ placeholder_img() }}" data-src="{{ src($gig->thumbnail) }}" alt="{{ $gig->title }}">
        </a>
        <?php
        }
        else{
        ?>
        <div class="flex items-center justify-center overflow-hidden w-full h-52 bg-gray-100 dark:bg-zinc-700">
        <img class="object-contain max-h-52 lazy h-52 w-auto" width="200" src="{{ placeholder_img() }}" data-src="{{ src($gig->thumbnail) }}" alt="{{ $gig->title }}">
        </div>
        <?php
        }
        ?>


        {{-- Gig content --}}
        <div class="px-4 pb-2 mt-4">

            {{-- User --}}
            @if ($profile_visible)
                <div class="w-full mb-4 flex justify-between items-center">

                
                    <a href="{{ url('profile', $gig->owner->username) }}" target="_blank" class="flex-shrink-0 group block">
                   

                        <div class="flex items-center">
                            <span class="inline-block relative">
                                <?php
                                if($gig->owner->isOnline()){
                                    echo "<div style='background-color: rgb(49 196 141); width: 13px; min-height: 13px; border-radius: 13px;position: absolute;margin: 0px 16px;border: 2px solid white;'></div>";
                                }
                                else{
                                    echo "<div style='background-color: red; width: 13px; min-height: 13px; border-radius: 13px;position: absolute;margin: 0px 16px;border: 2px solid white;'></div>";
                                }
                                ?>
                                <img class="h-6 w-6 rounded-full object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($gig->owner->avatar) }}" alt="{{ $gig->owner->username }}">
                            </span>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <div class="text-gray-500 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300 flex items-center mb-0.5 font-extrabold tracking-wide text-[13px]">
                                {{ $gig->owner->username }}
                                @if ($gig->owner->status === 'verified')
                                    <img data-tooltip-target="tooltip-account-verified-{{ $gig->uid }}" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="{{ url('public/img/auth/verified-badge.svg') }}" alt="{{ __('messages.t_account_verified') }}">
                                    <div id="tooltip-account-verified-{{ $gig->uid }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ __('messages.t_account_verified') }}
                                    </div>
                                @endif
                            </div>
                            
                        </div>
                        </div>

                    </a>



                </div>
            @endif

            {{-- Title --}}
            <?php
            if($link ){
            ?>
            <a href="{{ url('service', $gig->slug) }}" wire:click="clearCart()" class="gig-card-title font-semibold text-gray-800 dark:text-gray-100 hover:text-primary-600 dark:hover:text-white mb-4 !overflow-hidden">
                {{ htmlspecialchars_decode($gig->title) }}
            </a>
            <?php
            }
            else{
            ?>
            <div class="gig-card-title font-semibold text-gray-800 dark:text-gray-100 hover:text-primary-600 dark:hover:text-white mb-4 !overflow-hidden">
                {{ htmlspecialchars_decode($gig->title) }}
            </div>
            <?php
            }
            ?>
            

        </div>

        {{-- Gig footer --}}
        <div class="px-3 py-3 bg-[#fdfdfd] dark:bg-zinc-800 border-t border-gray-50 dark:border-zinc-700 text-right sm:px-4 rounded-b-md flex justify-between">

            <div class="flex items-center">

      
               

            </div>

            {{-- Price --}}
            <div class="gig-card-price" style="<?php echo $dspPrice; ?>">
                <small class="text-body-3 dark:!text-zinc-200">{{ __('messages.t_starting_at') }}</small>
                <span class=" ltr:text-right rtl:text-left dark:!text-white">@money($gig->price, settings('currency')->code, true)</span>
            </div>
            
        </div>

    </div>

</div>

@push('scripts')
    
    {{-- AlpineJs --}}
    <script>
        function _{{ $gig->uid }}() {
            return {

                // Login to add to favorite
                loginToAddToFavorite() {
                    window.$wireui.notify({
                        title      : "{{ __('messages.t_info') }}",
                        description: "{{ __('messages.t_pls_login_or_register_to_add_to_favovorite') }}",
                        icon       : 'info'
                    });
                }

            }
        }
        window._{{ $gig->uid }} = _{{ $gig->uid }}();
    </script>

@endpush