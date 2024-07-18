<?php 
if(isset($_GET['id'])){
    header("Location: ?started");
    die();
}
?>
<div class="w-full" x-data="window.sxXCqbSjPWcHTfe">

    
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
    
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-16">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        <?php echo app('translator')->get('messages.t_orders'); ?>
                    </h2>
    
                    
                    <div class="mt-3 flex flex-col sm:flex-row sm:flex-wrap sm:space-x-6 rtl:space-x-reverse">
                        <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 md:rtl:space-x-reverse sm:mb-0">

                            
                            <li>
                                <div class="flex items-center">
                                    <a href="<?php echo e(url('/')); ?>" class="text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-zinc-300 dark:hover:text-white">
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
                                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                        <?php echo app('translator')->get('messages.t_orders'); ?>
                                    </span>
                                </div>
                            </li>
            
                        </ol>
                    </div>
                    
                </div>
    
                
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
        
                    
                    <span class="block">
                        <a href="<?php echo e(url('/')); ?>" class="inline-flex items-center rounded-sm border border-gray-300 bg-white px-4 py-2 text-[13px] font-semibold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 dark:bg-zinc-800 dark:border-zinc-800 dark:text-zinc-100 dark:hover:bg-zinc-900 dark:focus:ring-offset-zinc-900 dark:focus:ring-zinc-900">
                            <?php echo app('translator')->get('messages.t_switch_to_buying'); ?>
                        </a>
                    </span>
        
                </div>
    
            </div>
        </div>
    </div>

    
    <?php if(session()->has('message')): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
            <div class="bg-yellow-100 ltr:border-l-4 rtl:border-r-4 border-yellow-400 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    </div>
                    <div class="ltr:ml-3 rtl:mr-3">
                        <p class="text-sm text-yellow-700 font-medium">
                            <?php echo e(session()->get('message')); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


  

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="mt-8 overflow-x-auto overflow-y-hidden sm:mt-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">


        <form method="GET" id="formStatus" style="display:none;">
                                        <input type="text" name="statusFilter" id="statusFilter">
                                    </form>


                                    <div class="form-group row">
                                        <label for="statusFilter" class="col-md-6 col-form-label text-md-right"><?php echo e(__('messages.t_show_items_with_status')); ?>:</label> 
                                        <div class="col-md-6">
                                            <select class="disabled:cursor-not-allowed focus:!ring-1 block 
                                            ltr:pr-10 ltr:pl-4 
                                            rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] 
                                            dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 
                                            dark:text-white rounded-md dark:bg-transparent 
                                            focus:!ring-primary-600 focus:!border-primary-600 
                                            border-gray-300 dark:border-zinc-500" id="statusFilterSelect"  name="statusFilterSelect" onchange="changeFilter();">
                                                <option class="dark:bg-zinc-700" value="todos" <?php echo (!isset($_GET['statusFilter'])) ? "selected" : ""; ?>> <?php echo app('translator')->get('messages.t_all'); ?> </option>
                                                <option class="dark:bg-zinc-700" value="pending" <?php echo (isset($_GET['statusFilter']) AND $_GET['statusFilter'] == "pending") ? "selected" : ""; ?>> <?php echo app('translator')->get('messages.t_pending'); ?> </option>
                                                <option class="dark:bg-zinc-700" value="proceeded" <?php echo (isset($_GET['statusFilter']) AND $_GET['statusFilter'] == "proceeded") ? "selected" : ""; ?>> <?php echo app('translator')->get('messages.t_proceed'); ?> </option>
                                                <option class="dark:bg-zinc-700" value="delivered" <?php echo (isset($_GET['statusFilter']) AND $_GET['statusFilter'] == "delivered") ? "selected" : ""; ?>> <?php echo app('translator')->get('messages.t_delivered'); ?> </option>
                                                <option class="dark:bg-zinc-700" value="canceled" <?php echo (isset($_GET['statusFilter']) AND $_GET['statusFilter'] == "canceled") ? "selected" : ""; ?>> <?php echo app('translator')->get('messages.t_canceled'); ?> </option>
                                                <option class="dark:bg-zinc-700" alue="refunded" <?php echo (isset($_GET['statusFilter']) AND $_GET['statusFilter'] == "refunded") ? "selected" : ""; ?>> <?php echo app('translator')->get('messages.t_refunded'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <script>
                                        function changeFilter(){
                                            var status = $("#statusFilterSelect").val();

                                            if(status != "todos"){
                                                $("#statusFilter").val(status);
                                                $("#formStatus").submit();
                                            }
                                            else{
                                                window.location.href = 'https://p2win.com.br/seller/orders';
                                            }


                                            
                                        }
                                    </script>

            <table class="w-full text-left border-spacing-y-[10px] border-separate sm:mt-2" id="tabela">
                <thead class="">
                    <tr class="bg-slate-200 dark:bg-zinc-600">

                        
                        <th sortable class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right"><?php echo app('translator')->get('messages.t_gig'); ?></th>

                        
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">
                           
                            <?php
                            if(isset($_GET['order'])){
                                if($_GET['order'] == 'asc'){

                                $filtroStatusAsc = "display: none;";
                                $filtroStatusDesc = "";
                                }
                                else{
                                    $filtroStatusAsc = "";
                                    $filtroStatusDesc = "display: none;"; 
                                }
                            }
                            else{
                                $filtroStatusAsc = "";
                                $filtroStatusDesc = "display: none;";
                            }
                            ?>
                            <svg id="filtroStatusAsc" style="<?php echo $filtroStatusAsc; ?>position: absolute; width: 10px !important; cursor: pointer;margin: -5px 0px 0px 39px;" onclick="window.location.href = '?col=status&order=asc';"  class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1"></path>
                            </svg>   
                            
                            <svg id="filtroStatusDesc" style="<?php echo $filtroStatusDesc; ?> position: absolute; width: 10px !important; cursor: pointer;margin: -5px 0px 0px 39px;" onclick="window.location.href = '?col=status&order=desc';" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"></path>
                            </svg>
                            
                            <?php echo app('translator')->get('messages.t_status'); ?>
                        </th>

                        
                        <th sortable class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"><?php echo app('translator')->get('messages.t_profit'); ?></th>

                        
                        <th sortable class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"><?php echo app('translator')->get('messages.t_expected_delivery_date'); ?></th>

                        
                        <th sortable class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"><?php echo app('translator')->get('messages.t_options'); ?></th>

                    </tr>
                </thead>
                <thead>
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="freelancer-dashboard-orders-<?php echo e($order->uid); ?>">

                            
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-52 rtl:text-right">
                                <div class="flex items-center space-x-3 rtl:space-x-reverse">

                                    
                                    <div class="h-10 w-10">
                                        <img class="w-full h-full rounded-md object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($order->gig?->thumbnail)); ?>" alt="<?php echo e($order->gig?->title); ?>">
                                    </div>

                                    
                                    <div>
                                        
                                        
                                        <a href="<?php echo e(url('service', $order->gig->slug)); ?>" class="font-medium whitespace-nowrap truncate block max-w-[240px] hover:text-primary-600 dark:text-white text-sm" title="<?php echo e($order->gig->title); ?>">
                                            <?php echo e($order->gig->title); ?>

                                        </a>

                                        
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-2">
                                            <nav class="flex" aria-label="Breadcrumb">
                                                <ol role="list" class="flex items-center space-x-1 rtl:space-x-reverse">
                                                    
                                                    
                                                    <li>
                                                        <div class="flex items-center">
                                                            <a href="<?php echo e(url('categories', $order->gig->category->slug)); ?>" target="_blank" class="text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100"><?php echo e($order->gig->category->name); ?></a>
                                                        </div>
                                                    </li>
                                            
                                                    
                                                    <li>
                                                        <div class="flex items-center">

                                                            
                                                            <svg class="flex-shrink-0 h-4 w-4 text-gray-400 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>

                                                            

                                                        </div>
                                                    </li>

                                                </ol>
                                            </nav>
                                        </div>

                                    </div>

                                </div>
                            </td>

                            
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                              
                                <?php //echo $order->status; ?>
                                
                                <?php if($order->refund && $order->refund->status === 'pending'): ?>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-50 text-red-800 dark:text-red-400 dark:bg-transparent">
                                        <?php echo e(__('messages.t_redund_requested')); ?>

                                    </span>
                                <?php elseif($order->refund && $order->refund->status === 'rejected_by_admin'): ?>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-50 text-red-800 dark:text-red-400 dark:bg-transparent">
                                    <?php echo e(__('messages.t_declined_by_admin')); ?>

                                </span>
                                    
                                <?php elseif($order->order?->invoice && $order->order->invoice->status === 'pending'): ?>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-amber-50 text-amber-800 dark:text-amber-400 dark:bg-transparent">
                                        <?php echo e(__('messages.t_pending_payment')); ?>

                                    </span>
                                <?php else: ?>
                                    <?php switch($order->status):

                                        
                                        case ('pending'): ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-yellow-50 text-yellow-800 dark:text-yellow-400 dark:bg-transparent">
                                                <?php echo e(__('messages.t_pending')); ?>

                                            </span>
                                            <?php break; ?>
                                        
                                        
                                        <?php case ('waiting'): ?>
                                            <?php if($order->refund && $order->refund->status === 'rejected_by_seller' && $order->refund->request_admin_intervention): ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-50 text-red-800 dark:text-red-400 dark:bg-transparent">
                                            <?php echo e(__('messages.t_dispute_opened')); ?>

                                            </span><br>


                                            <?php elseif($order->refund && $order->refund->status === 'rejected_by_seller'): ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-50 text-red-800 dark:text-red-400 dark:bg-transparent">
                                            <?php echo e(__('messages.t_u_have_declined_this_refund')); ?>

                                            </span><br>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-green-50 text-green-800 dark:text-green-400 dark:bg-transparent">
                                                <?php echo e(__('messages.t_waiting_buyer')); ?>

                                            </span>
                                     

                                            <?php else: ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-green-50 text-green-800 dark:text-green-400 dark:bg-transparent">
                                                <?php echo e(__('messages.t_waiting_buyer')); ?>

                                            </span>
                                            <?php endif; ?>

                                            <?php break; ?>
                                        <?php case ('delivered'): ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-green-50 text-green-800 dark:text-green-400 dark:bg-transparent">
                                                <?php echo e(__('messages.t_delivered')); ?>

                                            </span>
                                            <?php break; ?>

                                        
                                        <?php case ('refunded'): ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-50 text-red-800 dark:text-red-400 dark:bg-transparent">
                                                <?php echo e(__('messages.t_refunded')); ?>

                                            </span>
                                            <?php break; ?>

                                        
                                        <?php case ('proceeded'): ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-blue-50 text-blue-800 dark:text-blue-400 dark:bg-transparent">
                                                <?php echo e(__('messages.t_in_the_process')); ?>

                                            </span>
                                            <?php break; ?>

                                        
                                        <?php case ('canceled'): ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-gray-50 text-gray-800 dark:text-gray-300 dark:bg-transparent">
                                                <?php echo e(__('messages.t_canceled')); ?>

                                            </span>
                                            <?php break; ?>

                                        <?php default: ?>
                                            
                                    <?php endswitch; ?>
                                <?php endif; ?>
                                
                            </td>

                            
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-900 dark:text-gray-100 text-sm font-black">
                                    <?php echo money($order->profit_value, settings('currency')->code, true); ?>
                                </div>
                            </td>

                            
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <?php if($order->expected_delivery_date): ?>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                    <?php echo date("d/m/Y \à\s h:i:s A", strtotime($order->expected_delivery_date)); ?> <!--<?php echo e(format_date($order->expected_delivery_date, config('carbon-formats.F_j,_Y_h_:_i_A'))); ?>-->
                                    </span>
                                <?php elseif(in_array($order->status, ['pending', 'proceeded']) && !$order->is_requirements_sent): ?>
                                    <!--
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                        <?php echo e(__('messages.t_waiting_for_requirements')); ?>

                                    </span>
                                    -->
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                        <span id="msg_agir_ate<?php echo $order->id;?>"><?php echo e(__('messages.t_agir_ate')); ?>:</span> <span id="TEMPORESTANTE<?php echo $order->id;?>"></span>
                                    </span>
                                <?php else: ?>
                                    <span class="text-2xl font-medium text-gray-500 dark:text-gray-400">-</span>
                                <?php endif; ?>
                            </td>

                            

                            
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="flex justify-center items-center space-x-2 rtl:space-x-reverse" id="hide_<?php echo $order->id; ?>">

                                    <?php
                                    //REGRAS DE BOTÕES

                                    //Produto "Pendente" ter as opções: Começar, Entrar em contato com comprador, Detalhes do Pedido, Cancelar.
                                    if(!$order->refund && $order->status === 'pending' && $order->order?->invoice && $order->order->invoice->status !== 'pending'){
                                        ?>
                                        <!--COMECAR BTN-->
                                        
                                        <a href="?id" wire:click="confirmProgress('<?php echo e($order->uid); ?>')" 
                                        
                                        class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-primary-300 bg-primary-100/20 text-primary-700 shadow-sm hover:text-white hover:bg-primary-400 hover:border-primary-400 hover:shadow focus:ring focus:ring-primary-400 focus:ring-opacity-25 active:bg-primary-500 active:border-primary-500 active:shadow-none" >
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" 
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.92 2.38A15.72 15.72 0 0 0 17.5 2a8.26 8.26 0 0 0-6 2.06Q9.89 5.67 8.31 7.27c-1.21-.13-4.08-.2-6 1.74a1 1 0 0 0 0 1.41l11.3 11.32a1 1 0 0 0 1.41 0c1.95-2 1.89-4.82 1.77-6l3.21-3.2c3.19-3.19 1.74-9.18 1.68-9.43a1 1 0 0 0-.76-.73zm-2.36 8.75L15 14.67a1 1 0 0 0-.27.9 6.81 6.81 0 0 1-.54 3.94L4.52 9.82a6.67 6.67 0 0 1 4-.5A1 1 0 0 0 9.39 9s1.4-1.45 3.51-3.56A6.61 6.61 0 0 1 17.5 4a14.51 14.51 0 0 1 2.33.2c.24 1.43.62 5.04-1.27 6.93z"></path>
                                            <circle cx="15.73" cy="8.3" r="2"></circle><path d="M5 16c-2 1-2 5-2 5a7.81 7.81 0 0 0 5-2z"></path>
                                            </svg>
                                        </a>
                                        
                                        <!--DETALHES BTN-->
                                        <a href="<?php echo e(url('messages/new', $order->order?->buyer->username)); ?>" target="_blank" data-tooltip-target="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-contact-buyer-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_contact_buyer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                        <!-- CONTATO COM COMPRADOR BTN -->
                                        <a href="<?php echo e(url('seller/orders/details', $order->uid)); ?>" data-tooltip-target="tooltip-actions-order-details-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-order-details-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-order-details-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_order_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                        <!-- CANCELAR BTN -->
                                        <button wire:click="confirmCancel('<?php echo e($order->uid); ?>')" type="button" data-tooltip-target="tooltip-actions-cancel-order-<?php echo e($order->uid); ?>" 
                                        class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-red-300 bg-red-100 text-red-700 shadow-sm 
                                        hover:text-white hover:bg-red-400 hover:border-red-400 hover:shadow focus:ring focus:ring-red-400 focus:ring-opacity-25 active:bg-red-500 active:border-red-500 active:shadow-none" wire:key="tooltip-actions-cancel-order-<?php echo e($order->uid); ?>">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 11h10v2H7z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
                                        </button>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-cancel-order-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_cancel_order'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                        <?php
                                    }

                                    //Produto "Sem processo" ter as opções: Entregar trabalho, Entrar em contato com comprador, detalhes do pedido, Cancelar.
                                    //NAO ACHEI ESTE STATUS

                                    //Produto "Aguardando Aprovação do Comprador" ter as opções: Entregar Trabalho, Entrar em contato com comprador, detalhes do pedido.
                                    if(!$order->refund &&  ($order->status === 'waiting' && $order->order?->invoice && $order->order->invoice->status !== 'waiting')OR($order->status === 'proceeded' && $order->order?->invoice && $order->order->invoice->status !== 'proceeded')){
                                        ?>
                                        <!-- ENTREGAR TRABALHO BTN -->
                                        <a href="<?php echo e(url('seller/orders/deliver', $order->uid)); ?>" data-tooltip-target="tooltip-actions-deliver-work-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-deliver-work-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.56,3.34a1,1,0,0,0-1-.08l-17,8a1,1,0,0,0-.57.92,1,1,0,0,0,.6.9L8,15.45v6.72L13.84,18l4.76,2.08a.93.93,0,0,0,.4.09,1,1,0,0,0,.52-.15,1,1,0,0,0,.48-.79l1-15A1,1,0,0,0,20.56,3.34ZM18.1,17.68l-5.27-2.31L16,9.17,8.35,13.42,5.42,12.13,18.89,5.79Z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-deliver-work-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_deliver_work'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                        <!--DETALHES BTN-->
                                        <a href="<?php echo e(url('messages/new', $order->order?->buyer->username)); ?>" target="_blank" data-tooltip-target="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-contact-buyer-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_contact_buyer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                        <!-- CONTATO COM COMPRADOR BTN -->
                                        <a href="<?php echo e(url('seller/orders/details', $order->uid)); ?>" data-tooltip-target="tooltip-actions-order-details-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-order-details-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-order-details-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_order_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                        <?php
                                        if(!$order->refund && ($order->status === 'proceeded' && $order->order?->invoice && $order->order->invoice->status !== 'proceeded')){
                                            ?>
                                            <!-- CANCELAR BTN 2 -->
                                            
                                            <button wire:click="confirmCancel('<?php echo e($order->uid); ?>')" type="button" data-tooltip-target="tooltip-actions-cancel-order-<?php echo e($order->uid); ?>" 
                                            class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-red-300 bg-red-100 text-red-700 shadow-sm 
                                            hover:text-white hover:bg-red-400 hover:border-red-400 hover:shadow focus:ring focus:ring-red-400 focus:ring-opacity-25 active:bg-red-500 active:border-red-500 active:shadow-none" wire:key="tooltip-actions-cancel-order-<?php echo e($order->uid); ?>">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 11h10v2H7z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
                                            </button>
                                            <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-cancel-order-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_cancel_order'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                            <?php
                                        }
                                    }

                                    //Produto "Entrada" e caso a entrega seja confirmada, ter as opções: Entrar em contato com comprador, detalhes do pedido.
                                    if(!$order->refund && $order->status === 'delivered' && $order->order?->invoice && $order->order->invoice->status !== 'delivered'){
                                        ?>
                                        <!-- CONTATO COM COMPRADOR BTN -->
                                        <a href="<?php echo e(url('seller/orders/details', $order->uid)); ?>" data-tooltip-target="tooltip-actions-order-details-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-order-details-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-order-details-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_order_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                        <!--DETALHES BTN-->
                                        <a href="<?php echo e(url('messages/new', $order->order?->buyer->username)); ?>" target="_blank" data-tooltip-target="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-contact-buyer-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_contact_buyer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                        <?php
                                    }

                                    //Produto "Disputa aberta" ter as opções: Entrar em contato com comprador, detalhes do pedido, detalhes do reembolso. - OK
                                    if($order->refund && ($order->status == 'delivered' OR $order->status == 'waiting' OR $order->status == 'proceeded')){
                                        ?>
                                        <!-- CONTATO COM COMPRADOR BTN -->
                                        <a href="<?php echo e(url('seller/orders/details', $order->uid)); ?>" data-tooltip-target="tooltip-actions-order-details-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-order-details-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-order-details-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_order_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                        <!--DETALHES BTN-->
                                        <a href="<?php echo e(url('messages/new', $order->order?->buyer->username)); ?>" target="_blank" data-tooltip-target="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-contact-buyer-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_contact_buyer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                        <!--DETALHES REFUND-->
                                        <a href="<?php echo e(url('seller/refunds/details', $order->refund->uid)); ?>" data-tooltip-target="tooltip-actions-view-refund-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-view-refund-<?php echo e($order->uid); ?>">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 12h2v4h-2z"></path><path d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM5 5h13v2H5a1.001 1.001 0 0 1 0-2zm15 14H5.012C4.55 18.988 4 18.805 4 18V8.815c.314.113.647.185 1 .185h15v10z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-view-refund-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_refund_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                        <?php
                                    }


                                    //Produto " Reembolsado" ter as opções: Entrar em contato com comprador, detalhes do pedido, detalhes do reembolso.
                                    if(!$order->refund && $order->status === 'refunded' && $order->order?->invoice && $order->order->invoice->status !== 'refunded'){
                                        ?>
                                        <!-- CONTATO COM COMPRADOR BTN -->
                                        <a href="<?php echo e(url('seller/orders/details', $order->uid)); ?>" data-tooltip-target="tooltip-actions-order-details-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-order-details-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-order-details-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_order_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                        <!--DETALHES BTN-->
                                        <a href="<?php echo e(url('messages/new', $order->order?->buyer->username)); ?>" target="_blank" data-tooltip-target="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-contact-buyer-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_contact_buyer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                        
                                        <!--DETALHES REEMBOLSO BTN-->
                                        <a href="<?php echo e(url('seller/refunds/details', $order->refund->uid)); ?>" data-tooltip-target="tooltip-actions-view-refund-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-view-refund-<?php echo e($order->uid); ?>">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 12h2v4h-2z"></path><path d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM5 5h13v2H5a1.001 1.001 0 0 1 0-2zm15 14H5.012C4.55 18.988 4 18.805 4 18V8.815c.314.113.647.185 1 .185h15v10z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-view-refund-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_refund_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                        <?php
                                    }


                                    //Produto "Cancelado" ter as opções: Entrar em contato com comprador, detalhes do pedido
                                    if(!$order->refund && $order->status === 'canceled' && $order->order?->invoice && $order->order->invoice->status !== 'canceled'){
                                        ?>
                                        <!-- CONTATO COM COMPRADOR BTN -->
                                        <a href="<?php echo e(url('seller/orders/details', $order->uid)); ?>" data-tooltip-target="tooltip-actions-order-details-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-order-details-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-order-details-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_order_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                        <!--DETALHES BTN-->
                                        <a href="<?php echo e(url('messages/new', $order->order?->buyer->username)); ?>" target="_blank" data-tooltip-target="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-contact-buyer-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_contact_buyer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                        <?php
                                    }

                                    
                                    ?>

                                    <!-- BOTOES ANTIGOS -->
                                    <!--
                                    
                                    <?php if($order->status === 'pending' && $order->order?->invoice && $order->order->invoice->status !== 'pending'): ?>
                                        <button wire:click="confirmProgress('<?php echo e($order->uid); ?>')" type="button" data-tooltip-target="tooltip-actions-get-started-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-primary-300 bg-primary-100/20 text-primary-700 shadow-sm hover:text-white hover:bg-primary-400 hover:border-primary-400 hover:shadow focus:ring focus:ring-primary-400 focus:ring-opacity-25 active:bg-primary-500 active:border-primary-500 active:shadow-none" wire:key="tooltip-actions-get-started-<?php echo e($order->uid); ?>">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.92 2.38A15.72 15.72 0 0 0 17.5 2a8.26 8.26 0 0 0-6 2.06Q9.89 5.67 8.31 7.27c-1.21-.13-4.08-.2-6 1.74a1 1 0 0 0 0 1.41l11.3 11.32a1 1 0 0 0 1.41 0c1.95-2 1.89-4.82 1.77-6l3.21-3.2c3.19-3.19 1.74-9.18 1.68-9.43a1 1 0 0 0-.76-.73zm-2.36 8.75L15 14.67a1 1 0 0 0-.27.9 6.81 6.81 0 0 1-.54 3.94L4.52 9.82a6.67 6.67 0 0 1 4-.5A1 1 0 0 0 9.39 9s1.4-1.45 3.51-3.56A6.61 6.61 0 0 1 17.5 4a14.51 14.51 0 0 1 2.33.2c.24 1.43.62 5.04-1.27 6.93z"></path><circle cx="15.73" cy="8.3" r="2"></circle><path d="M5 16c-2 1-2 5-2 5a7.81 7.81 0 0 0 5-2z"></path></svg>
                                        </button>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-get-started-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_get_started'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                        
                                    <?php endif; ?>

                                    
                                    <?php if($order->requirements()->count()): ?>
                                        <a href="<?php echo e(url('seller/orders/requirements', $order->uid)); ?>" data-tooltip-target="tooltip-actions-view-requirements-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-view-requirements-<?php echo e($order->uid); ?>">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.004 5H9c-1.838 0-3.586.737-4.924 2.076C2.737 8.415 2 10.163 2 12c0 1.838.737 3.586 2.076 4.924C5.414 18.263 7.162 19 9 19h8v-2H9c-1.303 0-2.55-.529-3.51-1.49C4.529 14.55 4 13.303 4 12c0-1.302.529-2.549 1.49-3.51C6.45 7.529 7.697 7 9 7h8V6l.001 1h.003c.79 0 1.539.314 2.109.886.571.571.886 1.322.887 2.116a2.966 2.966 0 0 1-.884 2.11A2.988 2.988 0 0 1 17 13H9a.99.99 0 0 1-.698-.3A.991.991 0 0 1 8 12c0-.252.11-.507.301-.698A.987.987 0 0 1 9 11h8V9H9c-.79 0-1.541.315-2.114.889C6.314 10.461 6 11.211 6 12s.314 1.54.888 2.114A2.974 2.974 0 0 0 9 15h8.001a4.97 4.97 0 0 0 3.528-1.473 4.967 4.967 0 0 0-.001-7.055A4.95 4.95 0 0 0 17.004 5z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-view-requirements-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_view_requirements'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                    <?php endif; ?>

                                    
                                    <?php if(in_array($order->status, ['proceeded', 'delivered']) && !$order->is_finished): ?>
                                        <a href="<?php echo e(url('seller/orders/deliver', $order->uid)); ?>" data-tooltip-target="tooltip-actions-deliver-work-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-deliver-work-<?php echo e($order->uid); ?>">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.56,3.34a1,1,0,0,0-1-.08l-17,8a1,1,0,0,0-.57.92,1,1,0,0,0,.6.9L8,15.45v6.72L13.84,18l4.76,2.08a.93.93,0,0,0,.4.09,1,1,0,0,0,.52-.15,1,1,0,0,0,.48-.79l1-15A1,1,0,0,0,20.56,3.34ZM18.1,17.68l-5.27-2.31L16,9.17,8.35,13.42,5.42,12.13,18.89,5.79Z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-deliver-work-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_deliver_work'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                    <?php endif; ?>

                                    
                                    <a href="<?php echo e(url('messages/new', $order->order?->buyer->username)); ?>" target="_blank" data-tooltip-target="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-contact-buyer-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
                                    </a>
                                    <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-contact-buyer-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_contact_buyer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                   

                                    
                                    <a href="<?php echo e(url('seller/orders/details', $order->uid)); ?>" data-tooltip-target="tooltip-actions-order-details-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-order-details-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg>
                                    </a>
                                    <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-order-details-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_order_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                    
                                    <?php if($order->refund): ?>
                                        <a href="<?php echo e(url('seller/refunds/details', $order->refund->uid)); ?>" data-tooltip-target="tooltip-actions-view-refund-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-view-refund-<?php echo e($order->uid); ?>">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 12h2v4h-2z"></path><path d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM5 5h13v2H5a1.001 1.001 0 0 1 0-2zm15 14H5.012C4.55 18.988 4 18.805 4 18V8.815c.314.113.647.185 1 .185h15v10z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-view-refund-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_refund_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                    <?php endif; ?>

                                    
                                    <?php if($order->status === 'pending' && $order->order?->invoice && $order->order->invoice->status !== 'pending'): ?>
                                        <button wire:click="confirmCancel('<?php echo e($order->uid); ?>')" type="button" data-tooltip-target="tooltip-actions-cancel-order-<?php echo e($order->uid); ?>" 
                                        class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-red-300 bg-red-100 text-red-700 shadow-sm 
                                        hover:text-white hover:bg-red-400 hover:border-red-400 hover:shadow focus:ring focus:ring-red-400 focus:ring-opacity-25 active:bg-red-500 active:border-red-500 active:shadow-none" wire:key="tooltip-actions-cancel-order-<?php echo e($order->uid); ?>">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 11h10v2H7z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
                                        </button>
                                        <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-cancel-order-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_cancel_order'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>

                                    <?php endif; ?>

                                    <button wire:click="confirmCancel('<?php echo e($order->uid); ?>')" type="button" data-tooltip-target="tooltip-actions-cancel-order-<?php echo e($order->uid); ?>" 
                                    class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-red-300 bg-red-100 text-red-700 shadow-sm 
                                    hover:text-white hover:bg-red-400 hover:border-red-400 hover:shadow focus:ring focus:ring-red-400 focus:ring-opacity-25 active:bg-red-500 active:border-red-500 active:shadow-none" wire:key="tooltip-actions-cancel-order-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 11h10v2H7z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
                                    </button>
                                    <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-cancel-order-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_cancel_order'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>


                                    <button wire:click="confirmCancel('<?php echo e($order->uid); ?>')" type="button" data-tooltip-target="tooltip-actions-get-started-<?php echo e($order->uid); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-primary-300 bg-primary-100/20 text-primary-700 shadow-sm hover:text-white hover:bg-primary-400 hover:border-primary-400 hover:shadow focus:ring focus:ring-primary-400 focus:ring-opacity-25 active:bg-primary-500 active:border-primary-500 active:shadow-none" wire:key="tooltip-actions-get-started-<?php echo e($order->uid); ?>">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.92 2.38A15.72 15.72 0 0 0 17.5 2a8.26 8.26 0 0 0-6 2.06Q9.89 5.67 8.31 7.27c-1.21-.13-4.08-.2-6 1.74a1 1 0 0 0 0 1.41l11.3 11.32a1 1 0 0 0 1.41 0c1.95-2 1.89-4.82 1.77-6l3.21-3.2c3.19-3.19 1.74-9.18 1.68-9.43a1 1 0 0 0-.76-.73zm-2.36 8.75L15 14.67a1 1 0 0 0-.27.9 6.81 6.81 0 0 1-.54 3.94L4.52 9.82a6.67 6.67 0 0 1 4-.5A1 1 0 0 0 9.39 9s1.4-1.45 3.51-3.56A6.61 6.61 0 0 1 17.5 4a14.51 14.51 0 0 1 2.33.2c.24 1.43.62 5.04-1.27 6.93z"></path><circle cx="15.73" cy="8.3" r="2"></circle><path d="M5 16c-2 1-2 5-2 5a7.81 7.81 0 0 0 5-2z"></path></svg>
                                    </button>
                                    <?php if (isset($component)) { $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-get-started-'.e($order->uid).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_get_started'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4)): ?>
<?php $component = $__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4; ?>
<?php unset($__componentOriginal90fbf2c6e499bdb3000b35d71910378103e092b4); ?>
<?php endif; ?>
                                    -->

                                </div>
                            </td>

                            <!-- SCRIPT TO TIMELEFT TO ACT -->
                            <script>
                                /*tempoRestante('<?php //echo $order->id; ?>', '<?php //echo $order->placed_at; ?>');*/

                                var restFinal;


                                var url = "/public/altasis/timeLeft.php"

                                var http = new XMLHttpRequest();

                                var params = 'placed_at=' + '<?php echo $order->placed_at; ?>';

                                    http.open('POST', url, true);
                                    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                    http.onreadystatechange = function () {

                                    if (http.readyState == 4 && http.status == 200) {
                                    let resposta = http.responseText;
                                    resposta = this.responseText;
                                    
                                    restFinal = resposta;

              

                                    if(document.getElementById("msg_agir_ate"+<?php echo $order->id; ?>) != null){
                                        document.getElementById("msg_agir_ate"+<?php echo $order->id; ?>).style.display = 'inline';
                                    }

                                    if(document.getElementById("TEMPORESTANTE"+<?php echo $order->id; ?>)) != null){
                                        document.getElementById("TEMPORESTANTE"+<?php echo $order->id; ?>).innerHTML = "";
                                        document.getElementById("TEMPORESTANTE"+<?php echo $order->id; ?>).innerHTML = restFinal;
                                    }
                                
                           
                                    
                                    }
                                    else{

                                        if(document.getElementById("msg_agir_ate"+<?php echo $order->id; ?>) != null){
                                            document.getElementById("msg_agir_ate"+<?php echo $order->id; ?>).style.display = 'none';
                                        }

                                        if(document.getElementById("TEMPORESTANTE"+<?php echo $order->id; ?>)) != null){
                                            document.getElementById("TEMPORESTANTE"+<?php echo $order->id; ?>).innerHTML = "";
                                            document.getElementById("TEMPORESTANTE"+<?php echo $order->id; ?>).innerHTML = "<?php echo $order->placed_at;?>";
                                        }
       
                   
                                    }

                                }
                                http.send(params);

                                
                            </script>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="py-3 font-light text-sm text-gray-400 dark:text-zinc-200 text-center tracking-wide shadow-sm bg-white dark:bg-zinc-800 rounded-md">
                                <?php echo app('translator')->get('messages.no_results_found'); ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                </thead>
            </table>
        </div>
    </div>

    
    <?php if($orders->hasPages()): ?>
        <div class="flex justify-center pt-12">
            <?php echo $orders->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>

<!--
//MOSTRANDO MENSAGEM AO INICAR O ATENDIMENTO DO PRODUTO 
POR ALTASIS EM 03/07/2023
-->
<script>
    document.addEventListener("DOMContentLoaded", function(){
        <?php 
        if(isset($_GET['started'])){
        ?>
            ///livewire mostra notificações usando a func abaixo com js
            window.$wireui.notify({title: '<?php echo app('translator')->get('messages.t_success'); ?>', description: '<?php echo app('translator')->get('messages.t_order_has_been_successfully_marked_progress'); ?>',icon: 'success'});
        <?php
        }
        ?>
    });
</script>


<!--<script src="<?php echo e(url('public/altasis/tempoRestante.js')); ?>"> </script>-->







<?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/main/seller/orders/orders.blade.php ENDPATH**/ ?>