<div class="w-full">

    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_chats')); ?>

            </p>
        </div>
    </div>

    
    <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
        <table class="w-full whitespace-nowrap old-tables">
            <thead class="bg-gray-200">
                <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_chat_id')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_from')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_to')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_last_message_at')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_options')); ?></th>
                </tr>
            </thead>
            <tbody class="w-full">

                <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" wire:key="chats-<?php echo e($chat->id); ?>">

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <span class="text-xs font-bold text-gray-900"><?php echo e($chat->uid); ?></span>
                        </td>

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="<?php echo e(url('profile', $chat->msg_from->username)); ?>" target="_blank" class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($chat->msg_from->avatar)); ?>" alt="<?php echo e($chat->msg_from->username); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs flex items-center">
                                        <?php echo e($chat->msg_from->username); ?>

                                        <?php if($chat->msg_from->status === 'verified'): ?>
                                            <img data-tooltip-target="tooltip-account-verified-<?php echo e($chat->id); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-3.5 w-3.5 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg')); ?>" alt="<?php echo e(__('messages.t_account_verified')); ?>">
                                            <div id="tooltip-account-verified-<?php echo e($chat->id); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                <?php echo e(__('messages.t_account_verified')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-2"><?php echo e($chat->msg_from->email); ?></p>
                                </div>
                            </a>
                        </td>


                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="<?php echo e(url('profile', $chat->msg_to->username)); ?>" target="_blank" class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($chat->msg_to->avatar)); ?>" alt="<?php echo e($chat->msg_to->username); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs flex items-center">
                                        <?php echo e($chat->msg_to->username); ?>

                                        <?php if($chat->msg_to->status === 'verified'): ?>
                                            <img data-tooltip-target="tooltip-account-verified-<?php echo e($chat->id); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-3.5 w-3.5 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg')); ?>" alt="<?php echo e(__('messages.t_account_verified')); ?>">
                                            <div id="tooltip-account-verified-<?php echo e($chat->id); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                <?php echo e(__('messages.t_account_verified')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-2"><?php echo e($chat->msg_to->email); ?></p>
                                </div>
                            </a>
                        </td>


                        
                        <td class="text-center">
                            <span class="text-xs font-medium text-gray-500"><?php echo e(format_date($chat->last_message_at, 'ago')); ?></span>
                        </td>

                        
                        <td class="text-center">
                            <div class="relative inline-block text-left">
                                <div>
                                    <button data-dropdown-toggle="table-options-dropdown-<?php echo e($chat->id); ?>" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white dark:bg-zinc-700 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                    </button>
                                </div>
                                <div id="table-options-dropdown-<?php echo e($chat->id); ?>" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 dark:divide-zinc-700 focus:outline-none" role="menu"  aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">

                                        
                                        <a href="<?php echo e(admin_url('chats/details/' . $chat->uid)); ?>" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/> <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>
                                            <span class="text-xs font-medium"><?php echo e(__('messages.t_chat_details')); ?></span>
                                        </a>


                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>

    
    <?php if($chats->hasPages()): ?>
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            <?php echo $chats->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>
<?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/admin/chats/chats.blade.php ENDPATH**/ ?>