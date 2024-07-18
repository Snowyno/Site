<div class="w-full">

    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_refunds')); ?>

            </p>
        </div>
    </div>


    
    <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
    
    <?php
    $toSel = "";
    $onSel = "";
    $twSel = "";
    $trSel = "";
    $foSel = "";
    $fiSel = '';

    if(isset($_GET['filterStatus'])){

        if($_GET['filterStatus'] == ''){
            $toSel = 'selected';
        }

        if($_GET['filterStatus'] == '1'){
            $onSel = 'selected';
        }
        if($_GET['filterStatus'] == '2'){
            $twSel = 'selected';
        }
        if($_GET['filterStatus'] == '3'){
            $trSel = 'selected';
        }
        if($_GET['filterStatus'] == '4'){
            $foSel = 'selected';
        }
        if($_GET['filterStatus'] == '5'){
            $fiSel = 'selected';
        }

    }
    ?>

    <form method="GET" id="filterStatusFrm">
    <select onchange="$('#filterStatusFrm').submit();"id="filterStatus" name="filterStatus" class="appearance-none rounded-none 
    relative block w-full px-3 py-2 
    border border-gray-300 placeholder-gray-500 
    dark:placeholder-gray-200 dark:text-gray-100 
    text-gray-900 rounded-t-md focus:outline-none 
    focus:ring-primary-600 focus:border-primary-600 
    focus:z-10 sm:text-sm font-medium
    dark:bg-transparent dark:border-zinc-600"
    
    style="width: 30%;margin-top: 10px;margin-bottom: 10px; margin-left: 10px;">
    <option selected="" <?php echo $toSel; ?>>Todos</option>
    <option value="1"   <?php echo $onSel; ?>>Aprovado por P2Win </option>
    <option value="2"   <?php echo $twSel; ?>>Aprovado pelo vendedor</option>
    <option value="3"   <?php echo $trSel; ?>>Pendente</option>
    <option value="4"   <?php echo $foSel; ?>>Recusado por P2Win </option>
    <option value="5"   <?php echo $fiSel; ?>>Disputa com site </option>
    </select> 
    </form>

    
    <table class="w-full whitespace-nowrap old-tables">
            <thead class="bg-gray-200">
                <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_item')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_seller')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_buyer')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_status')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_date')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_options')); ?></th>
                </tr>
            </thead>
            <tbody class="w-full">

                <?php $__currentLoopData = $refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" wire:key="refunds-<?php echo e($r->id); ?>">

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="<?php echo e(url('service', $r->item->gig->slug)); ?>" target="_blank" class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($r->item->gig->thumbnail)); ?>" alt="<?php echo e($r->item->gig->title); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs"><?php echo e($r->item->gig->title); ?></p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-2"><?php echo money($r->item->gig->price, settings('currency')->code, true); ?></p>
                                </div>
                            </a>
                        </td>

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="<?php echo e(url('profile', $r->seller->username)); ?>" target="_blank" class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($r->seller->avatar)); ?>" alt="<?php echo e($r->seller->username); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs"><?php echo e($r->seller->username); ?></p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-2"><?php echo e($r->seller->email); ?></p>
                                </div>
                            </a>
                        </td>

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="<?php echo e(url('profile', $r->buyer->username)); ?>" target="_blank" class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($r->buyer->avatar)); ?>" alt="<?php echo e($r->buyer->username); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs"><?php echo e($r->buyer->username); ?></p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-2"><?php echo e($r->buyer->email); ?></p>
                                </div>
                            </a>
                        </td>

                        
                        <td class="text-center">
                            <?php switch($r->status):

                                
                                case ('pending'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-amber-500 bg-amber-50">
                                        <?php echo e(__('messages.t_pending')); ?>

                                    </span>
                                    <?php break; ?>

                                
                                <?php case ('closed'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-gray-500 bg-gray-50">
                                        <?php echo e(__('messages.t_closed')); ?>

                                    </span>
                                    <?php break; ?>

                                
                                <?php case ('rejected_by_seller'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                        <?php echo e(__('messages.t_declined_by_seller_site_dispute')); ?>

                                    </span>
                                    <?php break; ?>

                                
                                <?php case ('rejected_by_admin'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                        <?php echo e(__('messages.t_declined_by_admin', ['app_name' => config('app.name')])); ?>

                                    </span>
                                    <?php break; ?>

                                
                                <?php case ('accepted_by_seller'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                        <?php echo e(__('messages.t_approved_by_seller')); ?>

                                    </span>
                                    <?php break; ?>

                                
                                <?php case ('accepted_by_admin'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                        <?php echo e(__('messages.t_approved_by_admin', ['app_name' => config('app.name')])); ?>

                                    </span>
                                    <?php break; ?>
                                    
                            <?php endswitch; ?>
                        </td>

                        
                        <td class="text-center">
                            <span class="text-[11px] font-normal text-gray-400 dark:text-gray-200"><?php echo e(format_date($r->created_at, 'ago')); ?></span>
                        </td>

                        
                        <td class="text-center">
                            <div class="relative inline-block text-left">
                                <div>
                                    <a href="<?php echo e(admin_url('refunds/details/' . $r->uid)); ?>" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0" aria-expanded="true" aria-haspopup="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    </a>
                                </div>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>

    
    <?php if($refunds->hasPages()): ?>
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            <?php echo $refunds->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>
<?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/admin/refunds/refunds.blade.php ENDPATH**/ ?>