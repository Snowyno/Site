
<?php
$sellerdata = $this->seller->toArray();

foreach($sellerdata as $slldt){
    $sllUsername = $slldt->username;
    $sllFullname= $slldt->fullname;
    $sllEmail = $slldt->email;
}
?>

<div class="w-full">
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        {{-- Items --}}
        <div class="col-span-12 xl:col-span-12">
            <div class="bg-white border-gray-200 shadow-sm rounded-lg border">
                <ul role="list" class="divide-y divide-gray-200">

                
                    @foreach ($order->items as $item)

                        <?php
                        
                        $all_blacklistedwords = $this->blacklistwords->toArray();
                        
                       


                        //CONTANDO BLACKLISTED WORDS
                        $blackwordcount =0;

                        foreach ($item->conversation as $message){
                            
                            foreach($all_blacklistedwords as $blws){

                                if (str_contains($message->msg_content, $blws->palvra)) {
                                    $blackwordcount++;
                                }

                            }

                        }

                       
                        ?>

                        <li class="p-4 sm:p-6">
                            <div class="flex items-center sm:items-start">
                                <div
                                    class="flex-shrink-0 w-20 h-20 bg-gray-200 rounded-lg overflow-hidden sm:w-20 sm:h-20">
                                    <img src="{{ placeholder_img() }}" data-src="{{ src($item->gig->thumbnail) }}" alt="{{ $item->gig->title }}"class="lazy w-full h-full object-center object-cover">
                                </div>
                                <div class="flex-1 ltr:ml-6 rtl:mr-6 text-sm">
                                    <div class="font-bold text-gray-900 sm:flex sm:justify-between">
                                        <a href="{{ url('service', $item->gig->slug) }}" target="_blank" class="hover:text-primary-600">{{ $item->gig->title }}</a>
                                    </div>
                                    <div class="text-gray-500 mt-6 sm:mt-2">

                                        {{-- Item quick stats --}}
                                        <div class="grid sm:!flex text-gray-500 text-xs sm:space-x-12 sm:rtl:space-x-reverse space-y-6 sm:space-y-0">

                                            {{-- Item total price --}}
                                            <span class="flex ltr:sm:mr-12 rtl:sm:ml-12">
                                                <div class="ltr:text-left rtl:text-right sm:!text-center">
                                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase">{{ __('messages.t_total') }}</p>
                                                    <p class="mt-2 text-[11px] text-gray-600 font-medium">
                                                        @money($item->total_value, settings('currency')->code, true)
                                                    </p>
                                                </div>
                                            </span>

                                            {{-- Item quantity --}}
                                            <span class="flex">
                                                <div class="ltr:text-left rtl:text-right sm:!text-center">
                                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase">{{ __('messages.t_quantity') }}</p>
                                                    <p class="mt-2 text-[11px] text-gray-600 font-medium">
                                                        {{ $item->quantity }}
                                                    </p>
                                                </div>
                                            </span>

                                            {{-- Expected delivery date --}}
                                            <span class="flex">
                                                <div class="ltr:text-left rtl:text-right sm:!text-center">
                                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase">{{ __('messages.t_expected_delivery_date') }}</p>
                                                    <p class="mt-2 text-[11px] text-gray-600 font-medium">
                                                        <?php
                                                        if($item->expected_delivery_date){
                                                            echo date("d/m/Y", strtotime($item->expected_delivery_date));
                                                        }
                                                        else{
                                                            echo "—";
                                                        }
                                                            
                                                        ?>
                                                    </p>
                                                </div>
                                            </span>

                                            {{-- Status --}}
                                            <span class="flex">
                                                <div class="ltr:text-left rtl:text-right sm:!text-center">
                                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase">{{ __('messages.t_status') }}</p>

                                                    @if ($item->order->invoice->status === 'pending')
                                                        <p class="mt-2 text-[11px] text-amber-500 font-medium">
                                                            {{ __('messages.t_pending_payment') }}
                                                        </p>
                                                    @else
                                                        @switch($item->status)

                                                            {{-- Pending --}}
                                                            @case('pending')
                                                                <p class="mt-2 text-[11px] text-amber-500 font-medium">
                                                                    {{ __('messages.t_pending') }}
                                                                </p>
                                                                @break

                                                            {{-- In progress --}}
                                                            @case('proceeded')
                                                                <p data-tooltip-target="orders-{{ $order->uid }}-item-{{ $item->id }}-status-proceeded" class="mt-2 text-[11px] text-blue-500 font-medium cursor-pointer">
                                                                    {{ __('messages.t_in_the_process') }}
                                                                </p>
                                                                <div id="orders-{{ $order->uid }}-item-{{ $item->id }}-status-proceeded" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                    {{ format_date($item->proceeded_at, config('carbon-formats.F_j,_Y_h_:_i_A')) }}
                                                                </div>
                                                                @break

                                                            {{-- Delivered --}}
                                                            @case('delivered')
                                                                <p data-tooltip-target="orders-{{ $order->uid }}-item-{{ $item->id }}-status-delivered" class="mt-2 text-[11px] text-green-500 font-medium cursor-pointer">
                                                                    {{ __('messages.t_delivered') }}
                                                                </p>
                                                                <div id="orders-{{ $order->uid }}-item-{{ $item->id }}-status-delivered" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                    {{ format_date($item->delivered_at, config('carbon-formats.F_j,_Y_h_:_i_A')) }}
                                                                </div>
                                                                @break

                                                            {{-- Canceled --}}
                                                            @case('canceled')
                                                                <p data-tooltip-target="orders-{{ $order->uid }}-item-{{ $item->id }}-status-canceled" class="mt-2 text-[11px] text-gray-500 font-medium cursor-pointer">
                                                                    {{ __('messages.t_canceled') }}
                                                                </p>
                                                                <div id="orders-{{ $order->uid }}-item-{{ $item->id }}-status-canceled" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                    {{ format_date($item->canceled_at, config('carbon-formats.F_j,_Y_h_:_i_A')) }}
                                                                </div>
                                                                @break
                                                            
                                                            {{-- Refunded --}}
                                                            @case('refunded')
                                                                <p data-tooltip-target="orders-{{ $order->uid }}-item-{{ $item->id }}-status-refunded" class="mt-2 text-[11px] text-red-500 font-medium cursor-pointer">
                                                                    {{ __('messages.t_refunded') }}
                                                                </p>
                                                                <div id="orders-{{ $order->uid }}-item-{{ $item->id }}-status-refunded" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                    {{ format_date($item->refunded_at, config('carbon-formats.F_j,_Y_h_:_i_A')) }}
                                                                </div>
                                                                @break
                                                                
                                                            @default
                                                                
                                                        @endswitch
                                                    @endif
                                                    
                                                </div>
                                            </span>
                                            
                                        </div>

                                        @if ($item->has('upgrades'))
                                            <div class="mt-4">
                                                <fieldset class="space-y-5">

                                                    @foreach ($item->upgrades as $upgrade)
                                                        <div class="relative flex items-start">
                                                            <div class="flex items-center h-5">
                                                                <input type="checkbox" class="h-4 w-4 text-gray-300 border-gray-200 border-2 rounded-sm cursor-not-allowed pointer-events-none" checked disabled>
                                                            </div>
                                                            <div class="ltr:ml-3 rtl:mr-3 text-sm mt-[-3px]">
                                                                <label class="font-medium text-gray-500 text-xs">{{ $upgrade->title }}</label>
                                                                <p class="font-normal text-gray-400">
                                                                    <div class="mt-1 flex text-sm">
                                                                        <p class="text-gray-400 text-xs">+ @money($upgrade->price, settings('currency')->code, true)</p>
                                                    
                                                                        @if ($upgrade->extra_days)
                                                                            <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 text-gray-400 text-xs">
                                                                                {{ __('messages.t_extra_days_delivery_time_short', ['time' => delivery_time_trans($upgrade->extra_days)]) }}
                                                                            </p>
                                                                        @else
                                                                            <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 text-gray-400 text-xs">
                                                                                {{ __('messages.t_no_changes_delivery_time') }}
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    
                                                </fieldset>
                                            </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </li>
                    @endforeach

                </ul>
            </div>
    
            <br>
            {{-- CHAT VIEW --}}
        <div class="col-span-12 xl:col-span-12">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-sm leading-6 font-bold tracking-wide text-gray-900">
                        CHAT
                    </h3>
                    <p class="mt-1 max-w-2xl text-xs text-gray-500">
                        Palavras na blacklist (<?php echo $blackwordcount; ?>)
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    {{-- Chat messages --}}
                    <div class="w-full" style="max-height: 350px !important; overflow-y: scroll;" id="chat-with-seller-scrolled">
                        <ul role="list" class="py-6 px-8" onchange="rolllChatToEnd();">
                           
                            @foreach ($item->conversation as $message)
                                <li wire:key="seller-deliver-order-msg-id-{{ $message->id }}">
                                    <div class="relative pb-8">
                                        @if (!$loop->last)
                                            <span class="absolute top-5 ltr:left-5 rtl:right-5 ltr:-ml-px rtl:-mr-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                            
                                        @endif
                                        <div class="relative flex items-start space-x-3 rtl:space-x-reverse">
                                            <div class="relative">
                                                <img class="h-10 w-10 rounded-md bg-gray-400 flex items-center justify-center ring-8 ring-white dark:ring-zinc-700 object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($message->from->avatar) }}" alt="{{ $message->from->username }}">
                                            </div>
                                            <div class="min-w-0 flex-1">
                                            <div>
                                                <div class="text-sm">
                                                    <a href="{{ url('profile', $message->from->username) }}" target="_blank" class="font-medium text-gray-900 dark:text-gray-100">{{ $message->from->username }}</a>
                                                </div>
                                                <p class="mt-1 text-xs text-gray-500">{{ format_date($message->created_at, 'ago') }}</p>
                                            </div>
                                            <div class="mt-2 text-sm text-gray-700 dark:text-gray-100">
                                                <p>
                                                    <?php

                                                        foreach($all_blacklistedwords as $blws){

                                                            if (str_contains($message->msg_content, $blws->palvra)) {
                                                                $message->msg_content = "<span style='color: red;'>".$message->msg_content."</span>";
                                                            }

                                                        }

                                                  
                                                        echo nl2br($message->msg_content);

                                                    ?>
                                                </p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <script>
                                rolllChatToEnd();
                                </script>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>




        {{-- Invoice --}}
        <div class="col-span-12 xl:col-span-12">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-sm leading-6 font-bold tracking-wide text-gray-900">
                        {{ __('messages.t_invoice') }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-xs text-gray-500">
                        {{ __('messages.t_invoice_details') }}
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>

                        {{-- Payment method --}}
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                {{ __('messages.t_payment_method') }}
                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               @switch($order->invoice->payment_method)
                                   @case('balance')
                                       <span>{{ __('messages.t_user_credit') }}</span>
                                       @break
                                   @case('paypal')
                                       <span class="text-[#3b7bbf]">{{ __('messages.t_paypal') }}</span>
                                       @break
                                    @case('stripe')
                                       <span class="text-[#008cdd]">{{ __('messages.t_stripe') }}</span>
                                       @break
                                    @case('offline')
                                       <span class="text-gray-500">{{ settings('offline_payment')->name }}</span>
                                       @break
                                    @case('paystack')
                                       <span class="text-gray-500">{{ settings('paystack')->name }}</span>
                                       @break
                                    @case('cashfree')
                                       <span class="text-gray-500">{{ settings('cashfree')->name }}</span>
                                       @break
                                    @case('xendit')
                                       <span class="text-gray-500">{{ settings('xendit')->name }}</span>
                                       @break
                                   @default
                                       
                               @endswitch
                            </dd>
                        </div>

                        {{-- Payment id --}}
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                {{ __('messages.t_payment_id') }}
                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               {{ $order->invoice->payment_id }}
                            </dd>
                        </div>
                </div>
            </div>
        </div>

    <!-- DADOS DO COMPRADOR -->
        <div class="col-span-6 xl:col-span-6">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-sm leading-6 font-bold tracking-wide text-gray-900">
                        {{ __('messages.t_buyer') }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-xs text-gray-500">
                        {{ __('messages.t_details') }}
                    </p>
                </div>
                <div class="border-t border-gray-200">
                        {{-- Firstname --}}
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                {{ __('messages.t_firstname') }}
                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               {{ $order->invoice->firstname }}
                            </dd>
                        </div>

                        {{-- Lastname --}}
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                {{ __('messages.t_lastname') }}
                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               {{ $order->invoice->lastname }}
                            </dd>
                        </div>

                        {{-- Email --}}
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                {{ __('messages.t_email_address') }}
                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               {{ $order->invoice->email }}
                            </dd>
                        </div>

                    </div>
                </div>
            </div>

    <!-- DADOS DO VENDEDOR -->
    <div class="col-span-6 xl:col-span-6">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-sm leading-6 font-bold tracking-wide text-gray-900">
                        {{ __('messages.t_seller') }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-xs text-gray-500">
                        {{ __('messages.t_details') }}
                    </p>
                </div>
                <div class="border-t border-gray-200">
                        {{-- Username --}}
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                {{ __('messages.t_username') }}
                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                                {{ $sllUsername }}
                            </dd>
                        </div>

                        {{-- Fullname --}}
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                {{ __('messages.t_fullname') }}
                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               {{ $sllFullname }}
                            </dd>
                        </div>

                        {{-- Email --}}
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                {{ __('messages.t_email_address') }}
                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               {{ $sllEmail }}
                            </dd>
                        </div>

                    </div>
                </div>
            </div>            
           
   

    </div>
</div>

@push('scripts')
{{-- AlpineJs --}}
<script>
    
    //POR ALTASIS EM 08/05/2023
    
    function rolllChatToEnd(){
        
        let scroll_to_bottom = document.getElementById('chat-with-seller-scrolled');
        scroll_to_bottom.scrollTop = scroll_to_bottom.scrollHeight+400;
        $("#chat-with-seller-scrolled").animate({ scrollTop: $('#chat-with-seller-scrolled').prop("scrollHeight")}, 100);
    }
    
    

    rolllChatToEnd();
    
    //FIM DE POR ALTASIS EM 08/05/2023

    
</script> 




@endpush
