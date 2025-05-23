<?php
if($order->refund ){
    header("Location: https://p2win.com.br/seller/refunds/details/".$order->refund->uid."");
    die();
}
?>
<div class="w-full" x-data="window.TBhqVNUmCYEnOEj" x-on:livewire-upload-start="uploadStart()" x-on:livewire-upload-finish="uploadFinish()" x-on:livewire-upload-error="uploadError()" x-on:livewire-upload-progress="uploadingProgress = $event.detail.progress">





    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.loading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


    
    <!-- QUADRO TOTAL -->
    <main class="w-full" x-data>
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-16 pb-24 space-y-8 min-h-screen">


        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-10">
            <nav class="justify-between px-4 py-3 text-gray-700 border border-gray-100 rounded-lg shadow-sm sm:flex sm:px-5 bg-white dark:bg-zinc-800 dark:border-zinc-700 dark:shadow-none" aria-label="Breadcrumb">

                
                <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 md:rtl:space-x-reverse sm:mb-0">

                    
                    <li>
                        <div class="flex items-center">
                            <a href="<?php echo e(url('/')); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                                <?php echo app('translator')->get('messages.t_home'); ?>
                            </a>
                        </div>
                    </li>

                    
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="<?php echo e(url('seller/home')); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                                <?php echo app('translator')->get('messages.t_my_dashboard'); ?>
                            </a>
                        </div>
                    </li>

                    
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="<?php echo e(url('seller/orders')); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                                <?php echo app('translator')->get('messages.t_orders'); ?>
                            </a>
                        </div>
                    </li>

                    
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                <?php echo app('translator')->get('messages.t_deliver_work'); ?>
                            </span>
                        </div>
                    </li>

                </ol>

                
                <div class="flex items-center">

                    
                    <span class="block">
                        <a href="<?php echo e(url('seller/orders')); ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-700/40 rounded shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-700/40 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary-600 dark:focus:ring-offset-zinc-700/40">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 dark:text-zinc-200 ltr:mr-2 rtl:ml-2 rtl:rotate-180" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>

                            <?php echo e(__('messages.t_back_to_orders')); ?>

                        </a>
                    </span>
                    
                </div>

            </nav>
        </div>


        <div class="px-4 sm:px-6 lg:px-8">
        
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow overflow-hidden">
                
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">
                    
                
                    <!-- QUADRO CINZA -->
                    
                    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-12">

                    <!-- ALTASIS UI -->
                    <div class="container-fluid">
 

                        <!-- ROW DE DETALHAMENTO -->
                        <div class="row">
                            <!-- COL ESQ-->
                            
                            <div class="col-6" style="width: 50% !important; max-width: 50% !important; float:left;">
                                
                               
                                
                                    <?php 
                                    /*
                                    echo "<pre>";
                                    print_r($order);
                                    echo "</pre>";
                                    */
                                    ?>
                                    
                              
                                <div class="row mx-1 my-1 px-1 py-1 border border-gray-200 dark:border-zinc-600 rounded-lg ">
                                    <!-- Detalhes transação -->
                                    <div class="col-12 px-3 py-3">
                                        
                                        <div>
                                            <h3 class="text-gray-900 dark:text-gray-300 text-sm font-bold tracking-wide"><?php echo e(__('messages.t_details')); ?></h3>
                                            <dl class="mt-2 divide-y divide-gray-200 border-t border-b border-gray-200 dark:divide-zinc-700 dark:border-zinc-700">
                                                
                                                <div class="flex justify-between py-3 text-sm font-medium">
                                                    <dt class="text-gray-500 dark:text-gray-400"><?php echo e(__('messages.t_buyer')); ?></dt>
                                                    <dd class="text-gray-900 dark:text-gray-200  font-extrabold"><?php echo e(__($order->order->buyer->username)); ?></dd>
                                                </div>

                                                
                                                <div class="flex justify-between py-3 text-sm font-medium">
                          
                                                    <dt class="text-gray-500 dark:text-gray-400"><?php echo e(__('messages.t_order_status')); ?></dt>
                                                    <dd class="text-gray-900 dark:text-gray-200">

                                                        
                                                        <?php if($order->refund && $order->refund->status === 'closed'): ?>
                                                        <span class="text-red-600 text-sm font-medium"><?php echo e(__('messages.t_declined_by_seller')); ?></span>
                                                        <?php else: ?>
                                                            <?php switch($order->status):
                                                            
                                                                
                                                                case ('delivered'): ?> 
                                                                    <span class="text-amber-600 text-sm font-medium"><?php echo e(__('messages.t_delivered_work')); ?></span> 
                                                                    <?php break; ?>

                                                                
                                                                <?php case ('pending'): ?>
                                                                    <span class="text-amber-600 text-sm font-medium"><?php echo e(__('messages.t_in_progress')); ?></span>
                                                                    <?php break; ?>

                                                                
                                                                <?php case ('refund'): ?>
                                                                    <span class="text-amber-600 text-sm font-medium"><?php echo e(__('messages.t_seller_has_declined_ur_refund')); ?></span>
                                                                    <?php break; ?>

                                                                
                                                                <?php case ('rejected_by_seller'): ?>
                                                                    <span class="text-red-600 text-sm font-medium"><?php echo e(__('messages.t_declined_by_seller')); ?></span>
                                                                    <?php break; ?>

                                                                
                                                                <?php case ('rejected_by_admin'): ?>
                                                                    <span class="text-red-600 text-sm font-medium"><?php echo e(__('messages.t_declined_by_admin', ['app_name' => config('app.name')])); ?></span>
                                                                    <?php break; ?>

                                                                
                                                                <?php case ('accepted_by_seller'): ?>
                                                                    <span class="text-green-600 text-sm font-medium"><?php echo e(__('messages.t_approved_by_seller')); ?></span>
                                                                    <?php break; ?>

                                                                
                                                                <?php case ('accepted_by_admin'): ?>
                                                                    <span class="text-green-600 text-sm font-medium"><?php echo e(__('messages.t_approved_by_admin', ['app_name' => config('app.name')])); ?></span>
                                                                    <?php break; ?>
                                                                    
                                                                
                                                                <?php case ('closed'): ?>
                                                                    <span class="text-gray-600 text-sm font-medium"><?php echo e(__('messages.t_closed')); ?></span>
                                                                    <?php break; ?>
                                                                
                                                                <?php case ('proceeded'): ?>
                                                                    <span class="text-gray-600 text-sm font-medium"><?php echo e(__('messages.t_in_the_process')); ?></span>
                                                                <?php break; ?>
                                                                
                                                                <?php case ('waiting'): ?>
                                                                    <span class="text-gray-600 text-sm font-medium"><?php echo e(__('messages.t_waiting_buyer')); ?></span>
                                                                <?php break; ?>
                                                            <?php endswitch; ?>
                                                        <?php endif; ?>                                                            
                                                    </dd>
                                                </div>
                                                
                                                <div class="flex justify-between py-3 text-sm font-medium">
                                                    <dt class="text-gray-500 dark:text-gray-400"><?php echo e(__('messages.t_quantity')); ?></dt>
                                                    <dd class="text-gray-900 dark:text-gray-200  font-extrabold"><?php echo e(__($order->quantity)); ?></dd>
                                                </div>
                                                
                                                <div class="flex justify-between py-3 text-sm font-medium">
                                                    <dt class="text-gray-500 dark:text-gray-400"><?php echo e(__('messages.t_amount_lucro')); ?></dt>
                                                    <dd class="text-gray-900 dark:text-gray-200  font-extrabold"><?php echo money($order->total_value, settings('currency')->code, true); ?></dd>
                                                </div>

                                                <?php
                                                //echo "<pre>";
                                                //print_r($order);
                                                //echo "</pre>";
                                                
                                                ?>

                                                <?php if(!$order->is_finished && $order->status === 'refunded'): ?>
                                                
                                                <!--
                                                <div class="flex justify-between py-3 text-sm font-medium">
                                                    <dt class="text-gray-500 dark:text-gray-400"><?php echo e(__('messages.t_refund_date')); ?></dt>
                                                    <dd class="text-gray-900 dark:text-gray-200"><?php echo e(format_date($order->created_at, 'ago')); ?></dd>
                                                </div>
                                                -->
                                                <?php endif; ?>

                                                
                                                <div class="flex justify-between py-3 text-sm font-medium">
                                                    <dt class="text-gray-500 dark:text-gray-400"><?php echo e(__('messages.t_expected_delivery_date')); ?></dt>
                                                    <dd class="text-gray-900 dark:text-gray-200">
                                                        <?php 
                                                            
                                                            if ($order->expected_delivery_date){
                                                                echo date("d/m/Y \à\s h:i:s A", strtotime($order->expected_delivery_date)); 
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

                        <!-- AREA DO CHAT -->
                         
                            <div class="w-full">
                                <div class="row mx-1 my-1 px-1 py-1 border border-gray-200 dark:border-zinc-600 rounded-lg ">
                                

                                <div class="mb-14">
                                    <h2 class="ml-5 mt-5 text-base tracking-wide font-bold text-zinc-900 dark:text-gray-100">
                                    <?php echo e(__('messages.t_chat_with_buyer')); ?>

                                    </h2>
                                </div>

        
                                <ul role="list" class="px-4 pb-3 last:pb-0">

                                    <?php $__currentLoopData = $order->conversation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $all_blacklistedwords = $this->blacklistwords->toArray();
                                        ?>
                                        <li wire:key="seller-deliver-order-msg-id-<?php echo e($message->id); ?>">
                                            <div class="relative pb-8">
                                                <?php if(!$loop->last): ?>
                                                    <span class="absolute top-5 ltr:left-5 rtl:right-5 ltr:-ml-px rtl:-mr-px h-full w-0.5 bg-gray-200 dark:bg-zinc-700" aria-hidden="true"></span>
                                                <?php endif; ?>
                                            <div class="relative flex items-start space-x-3 rtl:space-x-reverse">
                                                <div class="relative">
                                                    <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white dark:ring-transparent object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($message->from->avatar)); ?>" alt="<?php echo e($message->from->username); ?>">
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                <div>
                                                    <div class="text-sm">
                                                        <a href="<?php echo e(url('profile', $message->from->username)); ?>" target="_blank" class="font-bold tracking-wide text-gray-900 dark:text-gray-100"><?php echo e($message->from->username); ?></a>
                                                    </div>
                                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400"><?php echo e(format_date($message->created_at, 'ago')); ?></p>
                                                </div>
                                                <div class="mt-2 text-sm text-gray-700 dark:text-gray-200">
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                                </div>
                            </div>

                            
                            <?php if(!$order->is_finished): ?>
                                <div class="mt-auto w-full px-4 py-10 border-t bg-gray-50 dark:bg-zinc-800 dark:border-zinc-700 rounded-b-lg">
                                    <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                        <div class="flex-shrink-0">
                                            <img class="inline-block h-10 w-10 rounded-full object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src(auth()->user()->avatar)); ?>" alt="<?php echo e(auth()->user()->username); ?>">
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="relative">
                                                <div class="border border-gray-300 dark:border-zinc-600 rounded-lg shadow-sm overflow-hidden focus-within:border-primary-600 focus-within:ring-1 focus-within:ring-primary-600">
                                                    <textarea rows="3" maxlength="750" wire:model.defer="message" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm dark:bg-transparent dark:text-gray-200" placeholder="<?php echo e(__('messages.t_type_ur_message_here')); ?>"></textarea>
                                                    <div class="py-2" aria-hidden="true">
                                                        <div class="py-px">
                                                            <div class="h-9"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="absolute bottom-0 inset-x-0 ltr:pl-3 rtl:pr-3 ltr:pr-2 rtl:pl-2 py-2 flex justify-between">
                                                    <div></div>
                                                    <div class="flex-shrink-0">
                                                        <button wire:click="sendMessage" wire:loading.attr="disabled" wire:target="sendMessage" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600"><?php echo e(__('messages.t_send')); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            </div> <!--/FIM COL ESQ -->
                            

                            <!-- COL DIR -->
                            <div class="col-6" style="width: 50% !important; max-width: 50% !important; float:left;">

                                <!-- STATUS PRODUTO -->
                                <div class="row mx-1 my-1 px-1 py-1 border border-gray-200 dark:border-zinc-600 rounded-lg ">
                                    <div class="col-2 py-3">
                                        <center>
                                            
                                            <?php if($order->refund && $order->refund->status === 'closed'): ?>
                                            <img src="https://p2win.com.br/public/img/order/order_status_img/pending.png" />
                                            <?php else: ?>
                                                <?php if(!$order->is_finished && $order->status === 'pending'): ?>
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/pending.png" />
                                                <?php endif; ?>
                                                <?php if(!$order->is_finished && $order->status === 'proceeded'): ?>
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/pending.png" />
                                                <?php endif; ?>
                                                <?php if(!$order->is_finished && $order->status === 'waiting'): ?>
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/pending.png" />
                                                <?php endif; ?>
                                                <?php if($order->is_finished && $order->status === 'delivered'): ?>
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/delivered.png" />
                                                <?php endif; ?>
                                                <?php if(!$order->is_finished && $order->status === 'canceled'): ?>
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/canceled.png" />
                                                <?php endif; ?>
                                                <?php if(!$order->is_finished && $order->status === 'refunded'): ?>
                                                <img src="https://p2win.com.br/public/img/order/order_status_img/refunded.png" />
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </center>
                                    </div>

                                    <!-- INFORMATIVO -->
                                    
                                    <?php if($order->refund && $order->refund->status === 'closed'): ?>
                                    <div class="col-10 px-3 py-3">
                                        <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_subject_seller_refund_closed')); ?> </h2>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_waiting_buyer')); ?></p>
                                    </div>
                                    <?php else: ?>
                                        <?php if(!$order->is_finished && $order->status === 'pending'): ?>
                                        
                                        <?php endif; ?>

                                        <?php if(!$order->is_finished && $order->status === 'waiting'): ?>
                                        
                                        <div class="col-10 px-3 py-3">
                                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_in_the_waiting')); ?></h2>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_waiting_buyer')); ?></p>
                                        </div>
                                        <?php endif; ?>

                                        <?php if(!$order->is_finished && $order->status === 'proceeded'): ?>
                                        
                                        <div class="col-10 px-3 py-3">
                                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_in_the_process')); ?></h2>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_waiting_for_seller_as_seller')); ?></p>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($order->is_finished && $order->status === 'delivered'): ?>
                                        
                                        <div class="col-10 px-3 py-3">
                                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_delivered_work')); ?></h2>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_download_received_files_from_seller')); ?></p>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(!$order->is_finished && $order->status === 'canceled'): ?>
                                        
                                        <?php endif; ?>
                                        <?php if(!$order->is_finished && $order->status === 'refunded'): ?>
                                        <?php endif; ?>
                                    <?php endif; ?>




                                    <div class="col-12 px-3 py-1">
                                        
                                        <?php
                                        //if (!$order->is_finished && !$order->refund){
                                            if(1!=1){
                                        ?>
                                            <div class="flex items-center mb-8 text-blue-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <span class="text-xs font-medium tracking-wide ltr:ml-2 rtl:mr-2">

                                                <?php echo e(__('messages.t_order_item_will_mark_done_after_1_week')); ?> <?php echo date("d/m/Y \à\s h:i:s A", strtotime($order->delivered_at));  ?>
                                                </span>

        
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <!-- AÇÔES -->
                                <div class="row mx-1 my-1 px-1 py-1 border border-gray-200 dark:border-zinc-600 rounded-lg ">
                                <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-sm border border-gray-200 dark:border-zinc-700 px-8 py-6 mb-8">
    

    
    <div class="mb-14">
        <h2 class="text-base tracking-wide font-bold text-zinc-900 dark:text-gray-100">
            <?php echo e(__('messages.t_deliver_completed_work_subtitle')); ?>

        </h2>
    </div>

    
    <?php if($order->delivered_work): ?>
    
        
        <?php if($order->delivered_work->attached_work): ?>
            
            <div class="py-4 flex items-center justify-between space-x-3 rtl:space-x-reverse mb-10">
                <div class="min-w-0 flex-1 flex items-center space-x-3 rtl:space-x-reverse">
                    <div class="flex-shrink-0">
                        <svg class="w-10" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path style="fill:#ECEDEF;" d="M100.641,0c-14.139,0-25.6,11.461-25.6,25.6v460.8c0,14.139,11.461,25.6,25.6,25.6h375.467c14.139,0,25.6-11.461,25.6-25.6V85.333L416.375,0H100.641z"/><path style="fill:#D9DCDF;" d="M441.975,85.333h59.733L416.375,0v59.733C416.375,73.872,427.836,85.333,441.975,85.333z"/><path style="fill:#C6CACF;" d="M399.308,42.667H75.041v153.6h324.267c4.713,0,8.533-3.821,8.533-8.533V51.2C407.841,46.487,404.02,42.667,399.308,42.667z"/><path style="fill:#FFC44F;" d="M382.241,179.2H18.843c-7.602,0-11.41-9.191-6.034-14.567L75.041,102.4L12.809,40.167C7.433,34.791,11.241,25.6,18.843,25.6h363.398c4.713,0,8.533,3.821,8.533,8.533v136.533C390.775,175.379,386.954,179.2,382.241,179.2z"/><g><path style="fill:#FFFFFF;" d="M194.508,128H170.06l31.003-37.203c2.119-2.544,2.577-6.084,1.173-9.083c-1.405-2.998-4.417-4.914-7.728-4.914h-42.667c-4.713,0-8.533,3.821-8.533,8.533s3.821,8.533,8.533,8.533h24.448l-31.003,37.203c-2.119,2.544-2.577,6.084-1.173,9.083c1.405,2.998,4.417,4.914,7.728,4.914h42.667c4.713,0,8.533-3.821,8.533-8.533S199.22,128,194.508,128z"/><path style="fill:#FFFFFF;" d="M220.108,76.8c-4.713,0-8.533,3.821-8.533,8.533v51.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-51.2C228.641,80.621,224.82,76.8,220.108,76.8z"/><path style="fill:#FFFFFF;" d="M279.841,76.8h-34.133c-4.713,0-8.533,3.821-8.533,8.533v51.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-17.067h25.6c4.713,0,8.533-3.821,8.533-8.533v-25.6C288.375,80.621,284.554,76.8,279.841,76.8z M271.308,102.4h-17.067v-8.533h17.067V102.4z"/></g><path style="fill:#A1A7AF;" d="M416.37,332.8c-1.927,0-3.863-0.649-5.458-1.978l-51.2-42.667c-1.946-1.621-3.071-4.023-3.071-6.556s1.125-4.934,3.071-6.556l51.2-42.667c3.62-3.017,9.001-2.527,12.018,1.092c3.018,3.621,2.528,9.002-1.092,12.019L378.504,281.6l43.333,36.111c3.621,3.018,4.111,8.398,1.092,12.019C421.243,331.755,418.815,332.8,416.37,332.8z"/><g><path style="fill:#55606E;" d="M313.975,315.733c-4.713,0-8.533-3.821-8.533-8.533v-25.6c0-4.713,3.821-8.533,8.533-8.533s8.533,3.821,8.533,8.533v25.6C322.508,311.913,318.687,315.733,313.975,315.733z"/><path style="fill:#55606E;" d="M365.175,273.067h-17.067V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533s-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-17.067c-4.713,0-8.533,3.821-8.533,8.533c0,4.713,3.821,8.533,8.533,8.533h42.667V307.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-17.067h34.133V307.2c0,4.713,3.821,8.533,8.533,8.533s8.533-3.821,8.533-8.533v-17.067h93.867c4.713,0,8.533-3.821,8.533-8.533C373.708,276.887,369.887,273.067,365.175,273.067z"/><path style="fill:#55606E;" d="M365.175,349.333c-4.419,0-8-3.582-8-8V281.6c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v59.733C373.175,345.751,369.594,349.333,365.175,349.333z"/></g><path style="fill:#F79F4D;" d="M333.54,364.434l25.6-25.6c3.332-3.332,8.736-3.332,12.068,0l25.6,25.6c1.6,1.6,2.499,3.771,2.499,6.034V460.8c0,4.713-3.821,8.533-8.533,8.533h-51.2c-4.713,0-8.533-3.821-8.533-8.533v-90.332C331.041,368.205,331.94,366.034,333.54,364.434z"/><polygon style="fill:#FFC44F;" points="339.575,460.8 339.575,370.467 365.175,344.867 390.775,370.467 390.775,460.8 "/><g><path style="fill:#BF722A;" d="M365.175,451.733c-4.419,0-8-3.582-8-8v-17.067c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v17.067C373.175,448.151,369.594,451.733,365.175,451.733z"/><path style="fill:#BF722A;" d="M365.175,400.533c-4.419,0-8-3.582-8-8v-17.067c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v17.067C373.175,396.951,369.594,400.533,365.175,400.533z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-200 truncate pb-2">
                            <?php echo e($order->delivered_work->attached_work['id']); ?>.<?php echo e($order->delivered_work->attached_work['extension']); ?>

                        </p>
                        <p class="text-xs font-[400] text-gray-400 truncate">
                            <?php echo e(human_filesize($order->delivered_work->attached_work['size'])); ?>

                        </p>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <a href="<?php echo e(url('uploads/delivered/' . $order->order->uid . '/' . $order->uid . '/' . $order->delivered_work->id . '/' . $order->delivered_work->attached_work['id'])); ?>" target="_blank" class="inline-flex items-center py-2 px-4 border border-transparent rounded-full bg-gray-100 hover:bg-gray-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 focus:outline-none focus:ring-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-2 rtl:ml-2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-zinc-300">
                            <?php echo e(__('messages.t_download')); ?>

                        </span>
                    </a>
                </div>
            </div>

        <?php endif; ?>

        
        <?php if($order->delivered_work->quick_response): ?>
        
            <div class="flex flex-col space-y-4 overflow-y-auto mb-6">
                <div class="flex items-center">
                    <div class="flex flex-col space-y-2 text-sm ltr:ml-2 rtl:mr-2 order-2 items-center">
                    <div><span class="px-4 py-2 rounded-lg italic inline-block bg-gray-100 text-gray-900 dark:bg-zinc-700 dark:text-zinc-300 w-full"><?php echo nl2br($order->delivered_work->quick_response); ?></span></div>
                    </div>
                    <img src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src(auth()->user()->avatar)); ?>" alt="<?php echo e(auth()->user()->username); ?>" class="lazy w-10 h-10 rounded-full order-1 object-cover">
                </div>
            </div>

        <?php endif; ?>

        <!--
        
        <?php if(!$order->is_finished): ?>
            <div class="mt-12 mb-4">
                <button x-on:click="confirm('<?php echo e(__("messages.t_are_u_sure_u_want_to_resubmit_work_again")); ?>') ? $wire.resubmit() : ''" type="button" class="text-white w-full bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-0 font-medium rounded-md text-sm px-5 py-4 text-center inline-flex items-center justify-center" wire:loading.attr="disabled" wire:target="resubmit">

                    
                    <div wire:loading wire:target="resubmit">
                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                        </svg>
                    </div>

                   
                    
                    <div wire:loading.remove wire:target="resubmit">
                        <?php echo e(__('messages.t_resubmit_work_again')); ?>

                    </div>
                    
                    
                </button>
            </div>
        <?php endif; ?>
        -->

    <?php elseif(!$order->is_finished): ?>
        <div class="grid grid-cols-12 md:gap-x-6 gap-y-10">

            
            <div class="col-span-12" wire:ignore>

                
                <span class="mb-2 text-[0.8125rem] font-semibold tracking-wide flex items-center text-gray-700 dark:text-white"><?php echo e(__('messages.t_upload_work')); ?></span>

                 
                <!--<?php if (isset($component)) { $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59 = $component; } ?>
<?php $component = App\View\Components\Forms\Uploader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Uploader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'images','id' => 'uploader_work','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['*']),'accept' => 'image/png, image/jpeg, video/*','size' => '50000','max' => '1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59)): ?>
<?php $component = $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59; ?>
<?php unset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59); ?>
<?php endif; ?>-->


                <?php if (isset($component)) { $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59 = $component; } ?>
<?php $component = App\View\Components\Forms\Uploader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Uploader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'files','id' => 'uploader_files','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['rar', 'zip','png', 'jpeg', 'jpg', 'mp4', 'm4v', 'ogg']),'accept' => '*','size' => '500000','max' => '1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59)): ?>
<?php $component = $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59; ?>
<?php unset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59); ?>
<?php endif; ?>


                
                <span class="text-xs text-gray-400 font-normal">
                    <?php echo e(__('messages.t_only_zip_allowed_max_size', ['size' => settings('media')->delivered_work_max_size])); ?>

                </span>
                
            </div>

            
            <div class="col-span-12">
                <label for="deliver-work-quick-response" class="block text-[0.8125rem] font-semibold text-gray-700 dark:text-white">
                    <?php echo e(__('messages.t_quick_response')); ?>

                </label>
                <div class="mt-2 relative">
                    <textarea placeholder="<?php echo e(__('messages.t_describe_ur_delivery_in_detail')); ?>" wire:model.defer="quick_response" rows="8" id="deliver-work-quick-response" class="resize-none focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500" maxlength="2500"></textarea>
                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                        <svg class="text-gray-400 w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M7 7h10v2H7zm0 4h7v2H7z"></path><path d="M20 2H4c-1.103 0-2 .897-2 2v18l5.333-4H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14H6.667L4 18V4h16v12z"></path></svg>
                    </div>
                </div>
            </div>

            
            <div class="col-span-12 mt-10 mb-8">
                <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'submit','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_submit')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
            </div>

        </div>
    <?php endif; ?>

</div>

                                </div>



                            </div><!--/ FIM COL DIR -->

                        </div>

                         <!-- AREA DO CHAT -->
                         <!--
                         
                            <div class="w-full">
                                <ul role="list" class="px-4 pb-3 last:pb-0">

                                    <?php $__currentLoopData = $order->conversation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li wire:key="seller-deliver-order-msg-id-<?php echo e($message->id); ?>">
                                            <div class="relative pb-8">
                                                <?php if(!$loop->last): ?>
                                                    <span class="absolute top-5 ltr:left-5 rtl:right-5 ltr:-ml-px rtl:-mr-px h-full w-0.5 bg-gray-200 dark:bg-zinc-700" aria-hidden="true"></span>
                                                <?php endif; ?>
                                            <div class="relative flex items-start space-x-3 rtl:space-x-reverse">
                                                <div class="relative">
                                                    <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white dark:ring-transparent object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($message->from->avatar)); ?>" alt="<?php echo e($message->from->username); ?>">
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                <div>
                                                    <div class="text-sm">
                                                        <a href="<?php echo e(url('profile', $message->from->username)); ?>" target="_blank" class="font-bold tracking-wide text-gray-900 dark:text-gray-100"><?php echo e($message->from->username); ?></a>
                                                    </div>
                                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400"><?php echo e(format_date($message->created_at, 'ago')); ?></p>
                                                </div>
                                                <div class="mt-2 text-sm text-gray-700 dark:text-gray-200">
                                                    <p><?php echo nl2br($message->msg_content); ?></p>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>

                            
                            <?php if(!$order->is_finished): ?>
                                <div class="mt-auto w-full px-4 py-10 border-t bg-gray-50 dark:bg-zinc-800 dark:border-zinc-700 rounded-b-lg">
                                    <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                        <div class="flex-shrink-0">
                                            <img class="inline-block h-10 w-10 rounded-full object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src(auth()->user()->avatar)); ?>" alt="<?php echo e(auth()->user()->username); ?>">
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="relative">
                                                <div class="border border-gray-300 dark:border-zinc-600 rounded-lg shadow-sm overflow-hidden focus-within:border-primary-600 focus-within:ring-1 focus-within:ring-primary-600">
                                                    <textarea rows="3" maxlength="750" wire:model.defer="message" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm dark:bg-transparent dark:text-gray-200" placeholder="<?php echo e(__('messages.t_type_ur_message_here')); ?>"></textarea>
                                                    <div class="py-2" aria-hidden="true">
                                                        <div class="py-px">
                                                            <div class="h-9"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="absolute bottom-0 inset-x-0 ltr:pl-3 rtl:pr-3 ltr:pr-2 rtl:pl-2 py-2 flex justify-between">
                                                    <div></div>
                                                    <div class="flex-shrink-0">
                                                        <button wire:click="sendMessage" wire:loading.attr="disabled" wire:target="sendMessage" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600"><?php echo e(__('messages.t_send')); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        -->

                    </div>

                </div>
            </div>
        </div>
    </div>    




    <?php $__env->startPush('scripts'); ?>

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




<?php $__env->stopPush(); ?>



</main>






<!-- ###################################################################################
######################################################################################## -->

<!--

<div class="w-full" x-data="window.TBhqVNUmCYEnOEj" x-on:livewire-upload-start="uploadStart()" x-on:livewire-upload-finish="uploadFinish()" x-on:livewire-upload-error="uploadError()" x-on:livewire-upload-progress="uploadingProgress = $event.detail.progress">

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.loading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-10">
        <nav class="justify-between px-4 py-3 text-gray-700 border border-gray-100 rounded-lg shadow-sm sm:flex sm:px-5 bg-white dark:bg-zinc-800 dark:border-zinc-700 dark:shadow-none" aria-label="Breadcrumb">

            
            <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 md:rtl:space-x-reverse sm:mb-0">

                
                <li>
                    <div class="flex items-center">
                        <a href="<?php echo e(url('/')); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                            <?php echo app('translator')->get('messages.t_home'); ?>
                        </a>
                    </div>
                </li>

                
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="<?php echo e(url('seller/home')); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                            <?php echo app('translator')->get('messages.t_my_dashboard'); ?>
                        </a>
                    </div>
                </li>

                
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="<?php echo e(url('seller/orders')); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                            <?php echo app('translator')->get('messages.t_orders'); ?>
                        </a>
                    </div>
                </li>

                
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                            <?php echo app('translator')->get('messages.t_deliver_work'); ?>
                        </span>
                    </div>
                </li>

            </ol>

            
            <div class="flex items-center">

                
                <span class="block">
                    <a href="<?php echo e(url('seller/orders')); ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-700/40 rounded shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-700/40 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary-600 dark:focus:ring-offset-zinc-700/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 dark:text-zinc-200 ltr:mr-2 rtl:ml-2 rtl:rotate-180" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>

                        <?php echo e(__('messages.t_back_to_orders')); ?>

                    </a>
                </span>
                
            </div>

        </nav>
    </div>

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

            
            <div class="col-span-12 lg:col-span-6">
                <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-sm border border-gray-200 dark:border-zinc-700 px-8 py-6 mb-8">

                    
                    <div class="mb-14">
                        <h2 class="text-base tracking-wide font-bold text-zinc-900 dark:text-gray-100">
                            <?php echo e(__('messages.t_deliver_completed_work_subtitle')); ?>

                        </h2>
                    </div>
    
                    
                    <?php if($order->delivered_work): ?>
                    
                        
                        <?php if($order->delivered_work->attached_work): ?>
                            
                            <div class="py-4 flex items-center justify-between space-x-3 rtl:space-x-reverse mb-10">
                                <div class="min-w-0 flex-1 flex items-center space-x-3 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <svg class="w-10" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path style="fill:#ECEDEF;" d="M100.641,0c-14.139,0-25.6,11.461-25.6,25.6v460.8c0,14.139,11.461,25.6,25.6,25.6h375.467c14.139,0,25.6-11.461,25.6-25.6V85.333L416.375,0H100.641z"/><path style="fill:#D9DCDF;" d="M441.975,85.333h59.733L416.375,0v59.733C416.375,73.872,427.836,85.333,441.975,85.333z"/><path style="fill:#C6CACF;" d="M399.308,42.667H75.041v153.6h324.267c4.713,0,8.533-3.821,8.533-8.533V51.2C407.841,46.487,404.02,42.667,399.308,42.667z"/><path style="fill:#FFC44F;" d="M382.241,179.2H18.843c-7.602,0-11.41-9.191-6.034-14.567L75.041,102.4L12.809,40.167C7.433,34.791,11.241,25.6,18.843,25.6h363.398c4.713,0,8.533,3.821,8.533,8.533v136.533C390.775,175.379,386.954,179.2,382.241,179.2z"/><g><path style="fill:#FFFFFF;" d="M194.508,128H170.06l31.003-37.203c2.119-2.544,2.577-6.084,1.173-9.083c-1.405-2.998-4.417-4.914-7.728-4.914h-42.667c-4.713,0-8.533,3.821-8.533,8.533s3.821,8.533,8.533,8.533h24.448l-31.003,37.203c-2.119,2.544-2.577,6.084-1.173,9.083c1.405,2.998,4.417,4.914,7.728,4.914h42.667c4.713,0,8.533-3.821,8.533-8.533S199.22,128,194.508,128z"/><path style="fill:#FFFFFF;" d="M220.108,76.8c-4.713,0-8.533,3.821-8.533,8.533v51.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-51.2C228.641,80.621,224.82,76.8,220.108,76.8z"/><path style="fill:#FFFFFF;" d="M279.841,76.8h-34.133c-4.713,0-8.533,3.821-8.533,8.533v51.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-17.067h25.6c4.713,0,8.533-3.821,8.533-8.533v-25.6C288.375,80.621,284.554,76.8,279.841,76.8z M271.308,102.4h-17.067v-8.533h17.067V102.4z"/></g><path style="fill:#A1A7AF;" d="M416.37,332.8c-1.927,0-3.863-0.649-5.458-1.978l-51.2-42.667c-1.946-1.621-3.071-4.023-3.071-6.556s1.125-4.934,3.071-6.556l51.2-42.667c3.62-3.017,9.001-2.527,12.018,1.092c3.018,3.621,2.528,9.002-1.092,12.019L378.504,281.6l43.333,36.111c3.621,3.018,4.111,8.398,1.092,12.019C421.243,331.755,418.815,332.8,416.37,332.8z"/><g><path style="fill:#55606E;" d="M313.975,315.733c-4.713,0-8.533-3.821-8.533-8.533v-25.6c0-4.713,3.821-8.533,8.533-8.533s8.533,3.821,8.533,8.533v25.6C322.508,311.913,318.687,315.733,313.975,315.733z"/><path style="fill:#55606E;" d="M365.175,273.067h-17.067V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533s-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-17.067c-4.713,0-8.533,3.821-8.533,8.533c0,4.713,3.821,8.533,8.533,8.533h42.667V307.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-17.067h34.133V307.2c0,4.713,3.821,8.533,8.533,8.533s8.533-3.821,8.533-8.533v-17.067h93.867c4.713,0,8.533-3.821,8.533-8.533C373.708,276.887,369.887,273.067,365.175,273.067z"/><path style="fill:#55606E;" d="M365.175,349.333c-4.419,0-8-3.582-8-8V281.6c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v59.733C373.175,345.751,369.594,349.333,365.175,349.333z"/></g><path style="fill:#F79F4D;" d="M333.54,364.434l25.6-25.6c3.332-3.332,8.736-3.332,12.068,0l25.6,25.6c1.6,1.6,2.499,3.771,2.499,6.034V460.8c0,4.713-3.821,8.533-8.533,8.533h-51.2c-4.713,0-8.533-3.821-8.533-8.533v-90.332C331.041,368.205,331.94,366.034,333.54,364.434z"/><polygon style="fill:#FFC44F;" points="339.575,460.8 339.575,370.467 365.175,344.867 390.775,370.467 390.775,460.8 "/><g><path style="fill:#BF722A;" d="M365.175,451.733c-4.419,0-8-3.582-8-8v-17.067c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v17.067C373.175,448.151,369.594,451.733,365.175,451.733z"/><path style="fill:#BF722A;" d="M365.175,400.533c-4.419,0-8-3.582-8-8v-17.067c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v17.067C373.175,396.951,369.594,400.533,365.175,400.533z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-200 truncate pb-2">
                                            <?php echo e($order->delivered_work->attached_work['id']); ?>.<?php echo e($order->delivered_work->attached_work['extension']); ?>

                                        </p>
                                        <p class="text-xs font-[400] text-gray-400 truncate">
                                            <?php echo e(human_filesize($order->delivered_work->attached_work['size'])); ?>

                                        </p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="<?php echo e(url('uploads/delivered/' . $order->order->uid . '/' . $order->uid . '/' . $order->delivered_work->id . '/' . $order->delivered_work->attached_work['id'])); ?>" target="_blank" class="inline-flex items-center py-2 px-4 border border-transparent rounded-full bg-gray-100 hover:bg-gray-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 focus:outline-none focus:ring-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-2 rtl:ml-2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                        <span class="text-sm font-medium text-gray-700 dark:text-zinc-300">
                                            <?php echo e(__('messages.t_download')); ?>

                                        </span>
                                    </a>
                                </div>
                            </div>

                        <?php endif; ?>

                        
                        <?php if($order->delivered_work->quick_response): ?>
                        
                            <div class="flex flex-col space-y-4 overflow-y-auto mb-6">
                                <div class="flex items-center">
                                    <div class="flex flex-col space-y-2 text-sm ltr:ml-2 rtl:mr-2 order-2 items-center">
                                    <div><span class="px-4 py-2 rounded-lg italic inline-block bg-gray-100 text-gray-900 dark:bg-zinc-700 dark:text-zinc-300 w-full"><?php echo nl2br($order->delivered_work->quick_response); ?></span></div>
                                    </div>
                                    <img src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src(auth()->user()->avatar)); ?>" alt="<?php echo e(auth()->user()->username); ?>" class="lazy w-10 h-10 rounded-full order-1 object-cover">
                                </div>
                            </div>

                        <?php endif; ?>

                      
                        
                        <?php if(!$order->is_finished): ?>
                            <div class="mt-12 mb-4">
                                <button x-on:click="confirm('<?php echo e(__("messages.t_are_u_sure_u_want_to_resubmit_work_again")); ?>') ? $wire.resubmit() : ''" type="button" class="text-white w-full bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-0 font-medium rounded-md text-sm px-5 py-4 text-center inline-flex items-center justify-center" wire:loading.attr="disabled" wire:target="resubmit">

                                    
                                    <div wire:loading wire:target="resubmit">
                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                   
                                    
                                    <div wire:loading.remove wire:target="resubmit">
                                        <?php echo e(__('messages.t_resubmit_work_again')); ?>

                                    </div>
                                    
                                    
                                </button>
                            </div>
                        <?php endif; ?>
                        -->
<!--
                    <?php elseif(!$order->is_finished): ?>
                        <div class="grid grid-cols-12 md:gap-x-6 gap-y-10">

                            
                            <div class="col-span-12" wire:ignore>

                                
                                <span class="mb-2 text-[0.8125rem] font-semibold tracking-wide flex items-center text-gray-700 dark:text-white"><?php echo e(__('messages.t_upload_work')); ?></span>

                                
                                <?php if (isset($component)) { $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59 = $component; } ?>
<?php $component = App\View\Components\Forms\Uploader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Uploader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'work','id' => 'uploader_work','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['zip']),'accept' => 'application/zip','size' => ''.e(settings('media')->delivered_work_max_size).'','max' => '1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59)): ?>
<?php $component = $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59; ?>
<?php unset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59); ?>
<?php endif; ?>

                                
                                <span class="text-xs text-gray-400 font-normal">
                                    <?php echo e(__('messages.t_only_zip_allowed_max_size', ['size' => settings('media')->delivered_work_max_size])); ?>

                                </span>
                                
                            </div>

                            
                            <div class="col-span-12">
                                <label for="deliver-work-quick-response" class="block text-[0.8125rem] font-semibold text-gray-700 dark:text-white">
                                    <?php echo e(__('messages.t_quick_response')); ?>

                                </label>
                                <div class="mt-2 relative">
                                    <textarea placeholder="<?php echo e(__('messages.t_describe_ur_delivery_in_detail')); ?>" wire:model.defer="quick_response" rows="8" id="deliver-work-quick-response" class="resize-none focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500" maxlength="2500"></textarea>
                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                        <svg class="text-gray-400 w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M7 7h10v2H7zm0 4h7v2H7z"></path><path d="M20 2H4c-1.103 0-2 .897-2 2v18l5.333-4H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14H6.667L4 18V4h16v12z"></path></svg>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-span-12 mt-10 mb-8">
                                <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'submit','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_submit')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                            </div>

                        </div>
                    <?php endif; ?>

                </div>
            </div>

            
            <div class="col-span-12 lg:col-span-6">
                <div class="bg-white dark:bg-zinc-900 rounded-lg shadow-sm border border-gray-200 dark:border-zinc-700 mb-8">

                    
                    <div class="mb-6">
                        <div class="w-full">
                            <div class="mx-auto">
                                <div class="py-3 px-1 md:flex md:items-center md:justify-between lg:border-b lg:border-gray-200 lg:dark:border-zinc-700 bg-gray-50 dark:bg-zinc-800 rounded-t-lg">
                                    <div class="flex-1 min-w-0 px-3">
                                        <div class="flex items-center">
                                            <img class="hidden h-10 w-10 rounded-full sm:block object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($order->order->buyer->avatar)); ?>" alt="<?php echo e($order->order->buyer->username); ?>">
                                            <div>
                                                <div class="flex items-center">
                                                    <h1 class="ltr:ml-3 rtl:mr-3 text-base font-bold leading-7 text-gray-900 dark:text-gray-200 sm:leading-9 sm:truncate">
                                                        <?php echo e($order->order->buyer->username); ?>

                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 flex space-x-3 rtl:space-x-reverse md:mt-0 md:ltr:mr-4 md:rtl:ml-4 ltr:ml-6 rtl:mr-6">
                                        <a href="<?php echo e(url('profile', $order->order->buyer->username)); ?>" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-sm text-gray-700 bg-white hover:bg-gray-50 dark:bg-zinc-700 dark:hover:bg-zinc-600 dark:text-zinc-300 dark:border-zinc-700 focus:outline-none focus:ring-0">
                                            <?php echo e(__('messages.t_view_profile')); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="w-full">
                        <ul role="list" class="px-4 pb-3 last:pb-0">

                            <?php $__currentLoopData = $order->conversation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li wire:key="seller-deliver-order-msg-id-<?php echo e($message->id); ?>">
                                    <div class="relative pb-8">
                                        <?php if(!$loop->last): ?>
                                            <span class="absolute top-5 ltr:left-5 rtl:right-5 ltr:-ml-px rtl:-mr-px h-full w-0.5 bg-gray-200 dark:bg-zinc-700" aria-hidden="true"></span>
                                        <?php endif; ?>
                                    <div class="relative flex items-start space-x-3 rtl:space-x-reverse">
                                        <div class="relative">
                                            <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white dark:ring-transparent object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($message->from->avatar)); ?>" alt="<?php echo e($message->from->username); ?>">
                                        </div>
                                        <div class="min-w-0 flex-1">
                                        <div>
                                            <div class="text-sm">
                                                <a href="<?php echo e(url('profile', $message->from->username)); ?>" target="_blank" class="font-bold tracking-wide text-gray-900 dark:text-gray-100"><?php echo e($message->from->username); ?></a>
                                            </div>
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400"><?php echo e(format_date($message->created_at, 'ago')); ?></p>
                                        </div>
                                        <div class="mt-2 text-sm text-gray-700 dark:text-gray-200">
                                            <p><?php echo nl2br($message->msg_content); ?></p>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>

                    
                    <?php if(!$order->is_finished): ?>
                        <div class="mt-auto w-full px-4 py-10 border-t bg-gray-50 dark:bg-zinc-800 dark:border-zinc-700 rounded-b-lg">
                            <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                <div class="flex-shrink-0">
                                    <img class="inline-block h-10 w-10 rounded-full object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src(auth()->user()->avatar)); ?>" alt="<?php echo e(auth()->user()->username); ?>">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="relative">
                                        <div class="border border-gray-300 dark:border-zinc-600 rounded-lg shadow-sm overflow-hidden focus-within:border-primary-600 focus-within:ring-1 focus-within:ring-primary-600">
                                            <textarea rows="3" maxlength="750" wire:model.defer="message" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm dark:bg-transparent dark:text-gray-200" placeholder="<?php echo e(__('messages.t_type_ur_message_here')); ?>"></textarea>
                                            <div class="py-2" aria-hidden="true">
                                                <div class="py-px">
                                                    <div class="h-9"></div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="absolute bottom-0 inset-x-0 ltr:pl-3 rtl:pr-3 ltr:pr-2 rtl:pl-2 py-2 flex justify-between">
                                            <div></div>
                                            <div class="flex-shrink-0">
                                                <button wire:click="sendMessage" wire:loading.attr="disabled" wire:target="sendMessage" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600"><?php echo e(__('messages.t_send')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>

        </div>
    </div>

</div>
--><?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/main/seller/orders/options/deliver.blade.php ENDPATH**/ ?>