<?php
if($item->refund && $item->refund->status != 'closed'){

 header("Location: https://p2win.com.br/account/refunds/details/".$item->refund->uid."");
 die();

}
?>
<main class="w-full" x-data>
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-16 pb-24 space-y-8 min-h-screen">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow overflow-hidden">
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">
                    

                    <!-- QUADRO CINZA -->
                    {{-- Section content --}}
                    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-12">

                    <!-- ALTASIS UI -->
                    <div class="container-fluid">
 
                        <!-- ROW SUP -->
                        <div class="row mt-1 mb-1">
                            <div class="col-12">
                                <a href="{{ url('account/orders') }}" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                                    <span class="text-xs font-medium text-primary-600 hover:text-primary-600"> 
                                        {{ __('messages.t_back_to_orders') }}
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- ROW DE DETALHAMENTO -->
                        <div class="row">
                            <!-- COL ESQ-->
                            
                            <div class="col-6">
                                
                                <div class="row mx-1 my-1 px-1 py-1 border border-gray-200 dark:border-zinc-600 rounded-lg ">
                               
                                    <!-- img produto -->
                                    <!--
                                    <div class="col-5">
                                        <img src="{{ placeholder_img() }}" data-src="{{ src($item->gig->thumbnail) }}" alt="{{ $item->gig->title }}" class="lazy w-full h-full object-center object-cover">
                                    </div>
                                    -->

                                    <!-- Detalhes vendedor -->
                                    <div class="col-12 pt-4">
                                    <!--
                                    <h1 class="text-base font-bold text-gray-900 hover:text-primary-600 mb-2 dark:text-white">Produto: {{ $item->gig->title }}</h1>
                                    <br>
                                    <dt class="font-medium text-gray-900 dark:text-gray-200">Vendido por: {{ $gig->owner->username }}</dt>
                                    <br>
                                    -->
                                    
                                    @livewire('main.cards.gig', ['gig' => $gig, 'profile_visible' => true], key("gig-item-" . $gig->uid))

                                    <?php 
                    
                                    /*
                                    echo "<pre>";
                                    print_r($item);
                                    echo "</pre>";
                                    */
                                    ?>
                                    </div>
                                   
                                </div>
                                <div class="row mx-1 my-1 px-1 py-1 border border-gray-200 dark:border-zinc-600 rounded-lg ">
                                    <!-- Detalhes transação -->
                                    <div class="col-12 px-3 py-3">
                                        {{-- Item details --}}
                                        <div>
                                            <h3 class="text-gray-900 dark:text-gray-300 text-sm font-bold tracking-wide">{{ __('messages.t_details') }}</h3>
                                            <dl class="mt-2 divide-y divide-gray-200 border-t border-b border-gray-200 dark:divide-zinc-700 dark:border-zinc-700">

                                                {{-- Status --}}
                                                <div class="flex justify-between py-3 text-sm font-medium">
                                                    <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_order_status') }}</dt>
                                                    <dd class="text-gray-900 dark:text-gray-200">

                                                        {{-- Refund --}}
                                                        @if ($item->refund && $item->refund->status === 'closed')
                                                        <span class="text-red-600 text-sm font-medium">{{ __('messages.t_declined_by_seller') }}</span>
                                                        @else
                                                            @switch($item->status)
                                                            
                                                                {{-- Delivered  --}}
                                                                @case('delivered') 
                                                                    <span class="text-amber-600 text-sm font-medium">{{ __('messages.t_delivered_work') }}</span> 
                                                                    @break

                                                                {{-- Pending --}}
                                                                @case('pending')
                                                                    <span class="text-amber-600 text-sm font-medium">{{ __('messages.t_in_progress') }}</span>
                                                                    @break

                                                                {{-- refund --}}
                                                                @case('refund')
                                                                    <span class="text-amber-600 text-sm font-medium">{{ __('messages.t_seller_has_declined_ur_refund') }}</span>
                                                                    @break

                                                                {{-- Rejected by seller --}}
                                                                @case('rejected_by_seller')
                                                                    <span class="text-red-600 text-sm font-medium">{{ __('messages.t_declined_by_seller') }}</span>
                                                                    @break

                                                                {{-- Rejected by admin --}}
                                                                @case('rejected_by_admin')
                                                                    <span class="text-red-600 text-sm font-medium">{{ __('messages.t_declined_by_admin', ['app_name' => config('app.name')]) }}</span>
                                                                    @break

                                                                {{-- Approved by seller --}}
                                                                @case('accepted_by_seller')
                                                                    <span class="text-green-600 text-sm font-medium">{{ __('messages.t_approved_by_seller') }}</span>
                                                                    @break

                                                                {{-- Approved by admin --}}
                                                                @case('accepted_by_admin')
                                                                    <span class="text-green-600 text-sm font-medium">{{ __('messages.t_approved_by_admin', ['app_name' => config('app.name')]) }}</span>
                                                                    @break
                                                                    
                                                                {{-- Closed --}}
                                                                @case('closed')
                                                                    <span class="text-gray-600 text-sm font-medium">{{ __('messages.t_closed') }}</span>
                                                                    @break
                                                                {{-- Closed --}}
                                                                @case('proceeded')
                                                                    <span class="text-gray-600 text-sm font-medium">{{ __('messages.t_in_the_process') }}</span>
                                                                @break
                                                                {{-- Waiting for Buyer action --}}
                                                                @case('waiting')
                                                                    <span class="text-gray-600 text-sm font-medium">{{ __('messages.t_waiting_buyer_as_buyer') }}</span>
                                                                @break
                                                            @endswitch
                                                        @endif                                                            
                                                    </dd>
                                                </div>
                                                {{-- Quantitiy --}}
                                                <div class="flex justify-between py-3 text-sm font-medium">
                                                    <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_quantity') }}</dt>
                                                    <dd class="text-gray-900 dark:text-gray-200  font-extrabold">{{ __($item->quantity) }}</dd>
                                                </div>
                                                {{-- Amount --}}
                                                <div class="flex justify-between py-3 text-sm font-medium">
                                                    <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_amount') }}</dt>
                                                    <dd class="text-gray-900 dark:text-gray-200  font-extrabold">@money($item->total_value, settings('currency')->code, true)</dd>
                                                </div>

                                                <?php
                                                //echo "<pre>";
                                                //print_r($item);
                                                //echo "</pre>";
                                                
                                                ?>

                                                @if (!$item->is_finished && $item->status === 'refunded')
                                                {{-- Refund date --}}
                                                <!--
                                                <div class="flex justify-between py-3 text-sm font-medium">
                                                    <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_refund_date') }}</dt>
                                                    <dd class="text-gray-900 dark:text-gray-200">{{ format_date($item->created_at, 'ago') }}</dd>
                                                </div>
                                                -->
                                                @endif

                                                {{-- Expected delivery date --}}
                                                <div class="flex justify-between py-3 text-sm font-medium">
                                                    <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_expected_delivery_date') }}</dt>
                                                    <dd class="text-gray-900 dark:text-gray-200">
                                                        <?php 
                                                            
                                                            if ($item->expected_delivery_date){
                                                                echo date("d/m/Y \à\s h:i:s A", strtotime($item->expected_delivery_date)); 
                                                            }
                                                            else{
                                                                echo "—";
                                                            }
                                                        ?>
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </div>
                                </div>

                            </div> <!--/FIM COL ESQ -->
                            

                            <!-- COL DIR -->
                            <div class="col-6">

                                <!-- STATUS PRODUTO -->
                                <div class="row mx-1 my-1 px-1 py-1 border border-gray-200 dark:border-zinc-600 rounded-lg ">
                                    <div class="col-2 py-3">
                                        <center>
                                            {{-- Refund --}}
                                            @if ($item->refund && $item->refund->status === 'closed')
                                            <img src="https://p2win.com.br/public/img/order/order_status_img/pending.png" />
                                            @else
                                                @if (!$item->is_finished && $item->status === 'pending')
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/pending.png" />
                                                @endif
                                                @if (!$item->is_finished && $item->status === 'proceeded')
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/pending.png" />
                                                @endif
                                                @if (!$item->is_finished && $item->status === 'waiting')
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/pending.png" />
                                                @endif
                                                @if ($item->is_finished && $item->status === 'delivered')
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/delivered.png" />
                                                @endif
                                                @if (!$item->is_finished && $item->status === 'canceled')
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/canceled.png" />
                                                @endif
                                                @if (!$item->is_finished && $item->status === 'refunded')
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/refunded.png" />
                                                @endif
                                            @endif
                                        </center>
                                    </div>

                                    <!-- INFORMATIVO -->
                                    {{-- Refund --}}
                                    @if ($item->refund && $item->refund->status === 'closed')
                                    <div class="col-10 px-3 py-3">
                                        <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_subject_seller_refund_closed') }} </h2>
                                        
                                    </div>
                                    @else
                                        @if (!$item->is_finished && $item->status === 'pending')
                                        
                                        @endif

                                        @if (!$item->is_finished && $item->status === 'waiting')
                                        
                                        <div class="col-10 px-3 py-3">
                                           
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __('messages.t_waiting_buyer_as_buyer') }}</p>
                                        </div>
                                        @endif

                                        @if (!$item->is_finished && $item->status === 'proceeded')
                                        
                                        <div class="col-10 px-3 py-3">
                                           
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __('messages.t_waiting_for_seller') }}</p>
                                        </div>
                                        @endif
                                        @if ($item->is_finished && $item->status === 'delivered')
                                        
                                        <div class="col-10 px-3 py-3">
                                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_delivered_work') }}</h2>
                                            
                                        </div>
                                        @endif
                                        @if (!$item->is_finished && $item->status === 'canceled')
                                        
                                        @endif
                                        @if (!$item->is_finished && $item->status === 'refunded')
                                        
                                        @endif
                                    @endif




                                    <div class="col-12 px-3 py-1">
                                        {{-- Notification --}}
                                        @if (!$item->is_finished && !$item->refund)
                                            <div class="flex items-center mb-8 text-blue-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <span class="text-xs font-medium tracking-wide ltr:ml-2 rtl:mr-2">

                                                {{ __('messages.t_order_item_will_mark_done_after_1_week') }} <?php echo date("d/m/Y \à\s h:i:s A", strtotime($item->delivered_at));  ?>
                                                </span>

        
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- AÇÔES -->
                                <div class="row mx-1 my-1 px-1 py-1 border border-gray-200 dark:border-zinc-600 rounded-lg ">
                                    <div class="col-12 py-3">

                                    @if (!$item->is_finished && $item->status === 'proceeded')
                                    <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">...</h2>
                                    @endif

                                    @if (!$item->is_finished && $item->status === 'waiting')
                                        @if(!$item->refund)
                                        <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_review_and_complete_transaction')}}</h2>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">
                                            <!--Deve completar esta ação em: -->
                                            {{ __('messages.t_agir_ate') }}
                                            <span id="TEMPORESTANTE"></span>
                                            <script src="{{url('public/altasis/tempoRestante.js')}}"> </script>
                                            <script>
                                                //Mostra o timer
                                                tempoRestante('','<?php echo $order->placed_at; ?>');

                                                //Atualiza timer a cada 10 segungos
                                                var intervalId = window.setInterval(function(){
                                                    //console. clear() 
                                                    tempoRestante('','<?php echo $order->placed_at; ?>');
                                                    //console.log('10 seg');
                                                    
                                                }, 10000);

                                     
                                            </script>

                                   

                                        </p>
                                        @endif
                                                

                                        <?php 
                                        if($item->refund){
                                        ?>

                                        <a href="{{ url('account/refunds/details/'.$item->refund->uid) }}" class="gig-card-title font-semibold text-gray-800 dark:text-gray-100 hover:text-primary-600 dark:hover:text-white mb-4 !overflow-hidden">
                                        Ver detalhes do Reembolso/Disputa </a>

                                        <?php
                                        }
                                        ?>
                                         
                                    </div>
                                    <!-- DIVISAO DOS BOTOES-->
                                    <div class="col-12">
                                        {{-- Section header --}}
                                        <div class="mb-2 lg:flex lg:items-center lg:justify-between">
    
                                            @if (!$item->is_finished && $item->status === 'waiting')
                                                <div class="flex lg:mt-0 lg:ltr:ml-4 lg:rtl:mr-4">
                                                
                                                    {{-- Request refund --}}
                                                    @if (!$item->refund)
                                                        <span class="block">
                                                            <a href="{{ url('account/refunds/request', $item->uid) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-600 rounded-sm shadow-sm text-xs font-bold tracking-wide text-gray-700 dark:text-gray-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-4 w-4 text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                                                {{ __('messages.t_request_refund') }}
                                                            </a>
                                                        </span>
                                                    @endif
                                                

                                                    <?php
                                                    if($item->refund){
                                                        /*
                                                        <center>
                                                        <button x-on:click="confirm('{{ __('messages.t_are_u_sure_raise_dispute_refund', ['app_name' => config('app.name')]) }}') ? $wire.raise : ''" 
                                                        wire:loading.attr="disabled" wire:target="raise" type="button" 
                                                        class="inline-flex items-center px-5 py-5 border border-transparent text-xs leading-4 font-bold tracking-wide rounded-sm text-red-700 bg-red-200 hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">

                                                            {{-- Loading indicator --}}
                                                            <div wire:loading wire:target="raise">
                                                                <svg role="status" class="ltr:-ml-1 rtl:-mr-1 ltr:mr-2 rtl:ml-2 h-4 w-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                </svg>
                                                            </div>

                                                            {{-- Icon --}}
                                                            <div wire:loading.remove wire:target="raise">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 rtl:-mr-1 ltr:mr-2 rtl:ml-2 h-4 w-4 text-red-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
                                                            </div>

                                                            <span class="text-sm font-bold">{{ __('messages.t_raise_a_dispute') }}</span>
                                                        </button>
                                                        </center>
                                                        */
                                                    }
                                                    ?>
                                  


                                                    {{-- Job completed --}}
                                                    @if (!$item->refund)
                                                    <span class="ltr:ml-3 rtl:mr-3">
                                                        <button id="work_btn_id_dis" onclick="verifcaCheckbox();" type="button" 
                                                        class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-600 rounded-sm shadow-sm text-xs font-bold tracking-wide text-gray-700 dark:text-gray-200 
                                                        bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                            <svg class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/> </svg>
                                                            {{ __('messages.t_work_completed') }} 
                                                        </button>
                                    
                                                        <button style="display: none !important;" id="work_btn_id_en" x-on:click='confirm("{{ __('messages.t_are_sure_completed_work_buyer') }}") ? $wire.completed() : "" ' wire:loading.attr="disabled" wire:target="completed" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-bold tracking-wide text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                                            <svg class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/> </svg>
                                                            {{ __('messages.t_work_completed') }} 
                                                        </button>
                                                    </span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>

                                        @if (!$item->is_finished && $item->status === 'delivered' OR $item->status === 'waiting' AND !$item->refund)
                                        <div class="ltr:ml-4 rtl:mr-3 mb-1 mt-3 lg:flex">
                                            <input type="checkbox" id="checkboxValidar" onclick="$('#work_btn_id_en').toggle(); $('#work_btn_id_dis').toggle();" class="dark:bg-transparent text-xs rounded border-2 dark:border-zinc-700 dark:placeholder-gray-300 dark:text-gray-200" name="checkbox" id="checkbox_id" value="1" required/>
                                            <label for="checkbox_id" class="text-xs">&nbsp;Ao clicar aqui, você aceita as condições e bla bla bla</label>
                                        </div>
                                        @endif

                                    </div>
                                    @endif

                                </div>



                            </div><!--/ FIM COL DIR -->

                        </div>

                         <!-- AREA DO CHAT -->
                        {{-- Chat with the seller --}}
                        <div class="col-span-12 xl:col-span-6" style="max-height: 850px !important;">
                            <section>
                                <div class="rounded-lg bg-white dark:bg-zinc-700 overflow-hidden border border-gray-200 dark:border-zinc-600">
                                    
                                    {{-- Section title --}}
                                    <div class="bg-gray-50 dark:bg-zinc-600 px-8 py-4 rounded-t-md">
                                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-100">{{ __('messages.t_conversation_with_seller') }}</h3>
                                                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_communicate_with_seller_about_changes') }}</p>
                                            </div>
                                            <div class="ltr:ml-4 rtl:mr-4 mt-4 flex-shrink-0">
                                                <!--
                                                <a href="{{ url('account/orders') }}" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2" " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                                                    span class="text-xs font-medium text-primary-600 hover:text-primary-600"> 
                                                        {{ __('messages.t_back_to_orders') }}
                                                    </span>
                                                </a>
                                                -->
                                            </div>
                                        </div>
                                    </div>

                                    <div>

                                        {{-- Chat messages --}}

                                        <div class="w-full" style="max-height: 350px !important; overflow-y: scroll;" id="chat-with-seller-scrolled">
                                            <ul role="list" class="py-6 px-8" onchange="rolllChatToEnd();">

                                                @foreach ($item->conversation as $message)
                                                    <?php
                                                    $all_blacklistedwords = $this->blacklistwords->toArray();
                                                    ?>
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
                                                                        //TROCA AS BLACKLISTED WORDS

                                                                        foreach($all_blacklistedwords as $blws){
                                                                            if($message->msg_content <> ""){
                                                                                if (str_contains($message->msg_content, $blws->palvra)) {
                                                                                    //$message->msg_content = "<span style='color: red;'>".$message->msg_content."</span>";
                                                                                    $message->msg_content = "********";
                                                                                }
                                                                            }

                                                                        }

                                                                    echo $message->msg_content;
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

                                        {{-- Send message --}}
                                        @if (!$item->is_finished)
                                            <div class="mt-auto w-full px-8 py-10 border-t bg-gray-50 dark:border-zinc-700 dark:bg-zinc-600 rounded-br-md" style="position: relative;">
                                                <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                                    <div class="flex-shrink-0">
                                                        <img class="inline-block h-10 w-10 rounded-full object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src(auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}">
                                                    </div>
                                                    <div class="min-w-0 flex-1">
                                                        <div class="relative">
                                                            <div class="border border-gray-300 dark:border-zinc-500 rounded-lg shadow-sm overflow-hidden focus-within:border-primary-600 focus-within:ring-1 focus-within:ring-primary-600">
                                                                <textarea rows="3" maxlength="750" wire:model.defer="message" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm dark:bg-transparent dark:text-gray-200 dark:placeholder-gray-300" placeholder="{{ __('messages.t_type_ur_message_here') }}"></textarea>
                                                                <div class="py-2" aria-hidden="true">
                                                                    <div class="py-px">
                                                                        <div class="h-9"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    
                                                            <div class="absolute bottom-0 inset-x-0 ltr:pl-3 ltr:pr-2 rtl:pr-3 rtl:pl-2 py-2 flex justify-between">
                                                                <div></div>
                                                                <div class="flex-shrink-0">
                                                                    <button onclick="rolllChatToEnd();" wire:click="sendMessage" wire:loading.attr="disabled" wire:target="sendMessage" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-700 dark:ring-offset-primary-600">{{ __('messages.t_send') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        @endif

                                    </div>
                                    <br>

                                </div>
                            </section>
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

    /*
    var varterms = document.getElementById('terms');
    var varrecebido = document.getElementById('recebido');

    terms.addEventListener('change', function() {
        if (this.checked) {
            recebido.disabled = false;
        } else {
            recebido.disabled = true;
        }
    });
    */

    function verifcaCheckbox(){
        var checado = $("#checkboxValidar").find("input[name='analisar']:checked").length > 0;

        if(!checado){
            alert('Você precisa aceitar as condições!')
        }
    }




    
</script> 




@endpush



</main>

