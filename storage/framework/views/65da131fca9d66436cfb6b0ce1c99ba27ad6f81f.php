<div class="w-full">

    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_withdrawals_history')); ?>

            </p>
        </div>
    </div>

    
    <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
        <table class="w-full whitespace-nowrap old-tables">
            <thead class="bg-gray-200">
                <tr tabindex="0"
                    class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">
                        <?php echo e(__('messages.t_user')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">
                        <?php echo e(__('messages.t_for')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">
                        <?php echo e(__('messages.t_amount')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">
                        <?php echo e(__('messages.t_status')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">
                        <?php echo e(__('messages.t_options')); ?></th>
                </tr>
            </thead>
            <tbody class="w-full">

                <?php $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                    $vCenter = DB::table('verification_center')->where('user_id', $w->user->id)->first();
                    //print_r($vCenter);
                    ?>

                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100"
                        wire:key="withdrawals-<?php echo e($w->id); ?>">

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="<?php echo e(url('profile', $w->user->username)); ?>" target="_blank"
                                class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($w->user->avatar)); ?>"
                                        alt="<?php echo e($w->user->username); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs"><?php echo e($w->user->username); ?></p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-2"><?php echo e($w->user->email); ?></p>
                                    <?php echo date("h:i:sa"); ?>
                                </div>
                            </a>
                        </td>

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <div class="whitespace-nowrap text-sm text-gray-500 flex items-center">
                                
                                    <span class="font-medium text-sm">CAHVE PIX | CPF: <?php echo e($vCenter->numCPF); ?></span>
                             
                            </div>
                        </td>

                        
                        <td class="text-center">
                            <span class="text-xs font-black "><?php echo money($w->amount, settings('currency')->code, true); ?></span>
                        </td>

                        
                        <td class="text-center">
                            <?php switch($w->status):
                                case ('paid'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                        <?php echo e(__('messages.t_paid')); ?>

                                    </span>
                                <?php break; ?>

                                <?php case ('pending'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-amber-500 bg-amber-50">
                                        <?php echo e(__('messages.t_pending')); ?>

                                    </span>
                                <?php break; ?>

                                <?php case ('rejected'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                        <?php echo e(__('messages.t_rejected')); ?>

                                    </span>
                                <?php break; ?>

                                <?php default: ?>
                            <?php endswitch; ?>
                        </td>

                        
                        <td class="text-center">
                            <?php if($w->status === 'pending'): ?>
                                <div class="relative inline-block text-left">
                                    <div>
                                        <button data-dropdown-toggle="table-options-dropdown-<?php echo e($w->id); ?>"
                                            type="button"
                                            class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0"
                                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="table-options-dropdown-<?php echo e($w->id); ?>"
                                        class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                        tabindex="-1">
                                        <div class="py-1" role="none">

                                            
                                            <button wire:key="option-approve-<?php echo e($w->id); ?>"
                                                x-on:click='confirm("<?php echo e(__('messages.t_are_u_sure_u_want_to_approve_this_withdrawal')); ?>") ?  $wire.approve("<?php echo e($w->id); ?>") : ""'
                                                wire:loading.attr="disabled"
                                                wire:target="approve('<?php echo e($w->id); ?>')" type="button"
                                                class="text-gray-800 group flex items-center px-4 py-2 text-sm"
                                                role="menuitem" tabindex="-1">

                                                
                                                <div wire:loading wire:target="approve('<?php echo e($w->id); ?>')">
                                                    <svg role="status"
                                                        class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin"
                                                        viewBox="0 0 100 101" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                            fill="#E5E7EB" />
                                                        <path
                                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="approve('<?php echo e($w->id); ?>')">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>

                                                <span
                                                    class="text-xs font-medium"><?php echo e(__('messages.t_approve_payment')); ?></span>

                                            </button>

                                            
                                            <button wire:key="option-reject-<?php echo e($w->id); ?>"
                                                x-on:click='confirm("<?php echo e(__('messages.t_are_u_sure_u_want_to_reject_this_withdrawal')); ?>") ?  $wire.reject("<?php echo e($w->id); ?>") : ""'
                                                wire:loading.attr="disabled"
                                                wire:target="reject('<?php echo e($w->id); ?>')" type="button"
                                                class="text-gray-800 group flex items-center px-4 py-2 text-sm"
                                                role="menuitem" tabindex="-1">

                                                
                                                <div wire:loading wire:target="reject('<?php echo e($w->id); ?>')">
                                                    <svg role="status"
                                                        class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin"
                                                        viewBox="0 0 100 101" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                            fill="#E5E7EB" />
                                                        <path
                                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="reject('<?php echo e($w->id); ?>')">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>

                                                <span
                                                    class="text-xs font-medium"><?php echo e(__('messages.t_reject_payment')); ?></span>

                                            </button>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>

    
    <?php if($withdrawals->hasPages()): ?>
        <div
            class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            <?php echo $withdrawals->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>
<?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/admin/withdrawals/withdrawals.blade.php ENDPATH**/ ?>