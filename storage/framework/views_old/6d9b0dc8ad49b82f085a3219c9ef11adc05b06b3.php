<div class="container" x-data="window.WbHObCwPcNqueuQ" x-init="init()" s>
    <div class="rounded-md shadow-sm border border-gray-100 dark:border-zinc-700 chat-menor">

        
        <div class="header py-3 px-5">
                
            
            <div class="">
                <span class="text-sm font-semibold tracking-wide text-gray-700 dark:text-gray-100"><?php echo e(__('messages.t_messages')); ?></span>
            </div>

            
            <div class="user-settings rtl:!mr-auto rtl:!ml-[unset]">
                
                
                <div class="settings">
                    <a href="<?php echo e(url('account/settings')); ?>" target="_blank" data-tooltip-target="tooltip-account-settings">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3" />
                            <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" />
                        </svg>
                        <div id="tooltip-account-settings" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            <?php echo e(__('messages.t_account_settings')); ?>

                        </div>
                    </a>
                </div>

                
                <img class="user-profile object-cover rtl:!ml-0 rtl:!mr-4 lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src(auth()->user()->avatar)); ?>" alt="<?php echo e(auth()->user()->username); ?>">

            </div>

        </div>

        
        <div class="wrapper !grid md:!flex" >

            
            <div class="conversation-area rtl:!border-r-0 rtl:border-l border-gray-200 dark:border-zinc-700">

                <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <<?php echo e($c->uid !== $conversation->uid ? 'a' : 'div'); ?> href="<?php echo e($c->uid !== $conversation->uid ? url('messages', $c->uid) : ''); ?>" class="msg <?php echo e($c->sender->isOnline() ? 'online' : 'offline'); ?> <?php echo e($c->uid === $conversation->uid ? 'active' : ''); ?>" wire:key="conversation-id-<?php echo e($c->uid); ?>">
                        <img class="msg-profile object-cover rtl:!mr-0 rtl:!ml-4 lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($c->sender->avatar)); ?>" alt="<?php echo e($c->sender->username); ?>" />
                        <div class="msg-detail">
                            <div class="msg-username flex items-center">
                                <?php echo e($c->sender->username); ?>

                                <?php if($c->unreadMessages()->count() > 0): ?>
                                    <div class="flex items-center justify-center w-5 h-5 pt-[1px] bg-primary-600 text-[11px] font-medium text-white ltr:ml-2 rtl:mr-2 rounded-full">
                                        <?php echo e($c->unreadMessages()->count()); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="msg-content">

                                <?php
                                    $latest = $c->messages()->latest()->first();
                                ?>

                                <?php if($latest): ?>
                                    <span class="msg-message">

                                        <?php
                                        $latest->message  = str_replace("&lt;","<", $latest->message);
                                        $latest->message  = str_replace("&gt;",">", $latest->message);
                                        echo $latest->message;
                                        ?>
                                    
                                    </span>
                                    <span class="msg-date rtl:!ml-0 rtl:!mr-1"><?php echo date('d/m/Y', strtotime($latest->created_at)); ?> </span>
                                <?php else: ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </<?php echo e($c->uid !== $conversation->uid ? 'a' : 'div'); ?>>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <div class="overlay"></div>
            </div>

            
            <div style="display: flex;flex-direction: column;flex-grow: 1;">
            <div class="chat-area" id="chat-area">
                <div class="chat-area-header"></div>
                <div class="chat-area-main">

                    <?php if(count($messages)): ?>

                        
                        <?php if($messages->hasPages()): ?>
                            <div class="flex justify-center py-6">
                                <?php echo $messages->links('pagination::tailwind'); ?>

                            </div>
                        <?php endif; ?>

                        
                        <?php $__currentLoopData = $messages->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php
                                $all_blacklistedwords = $this->blacklistwords->toArray();
                            ?>
                            <div class="chat-msg <?php echo e($msg->message_from == auth()->id() ? 'owner' : 'rtl:flex-row-reverse'); ?>" wire:key="conversation-message-<?php echo e($msg->uid); ?>">
                                <div class="chat-msg-profile">
                                    <img class="chat-msg-img object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($msg->sender->avatar)); ?>" alt="<?php echo e($msg->sender->username); ?>" />
                                    <div class="chat-msg-date"><?php echo e(format_date($msg->created_at, 'Y-m-d h:i:s')); ?></div>
                                </div>
                                <div class="chat-msg-content">
                                    <div class="chat-msg-text">
                     

                                         <?php
                                        $msg->message  = str_replace("&lt;","<", $msg->message);
                                        $msg->message  = str_replace("&gt;",">", $msg->message);
                                    
                                        //TROCA AS BLACKLISTED WORDS

                                        foreach($all_blacklistedwords as $blws){
                                            if($msg->message <> ""){
                                                if (str_contains($msg->message, $blws->palvra)) {
                                                    //$message->msg_content = "<span style='color: red;'>".$message->msg_content."</span>";
                                                    $msg->message = "********";
                                                }
                                            }

                                        }

                                        echo $msg->message;
                                        ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>

                        
                        <div class="py-14 px-6 text-center text-sm sm:px-14">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            <p class="mt-4 font-semibold text-gray-900 dark:text-gray-200"><?php echo e(__('messages.t_no_messages_yet')); ?></p>
                            <p class="mt-2 text-gray-500 dark:text-gray-400"><?php echo e(__('messages.t_no_messages_yet_subtitle')); ?></p>
                        </div>

                    <?php endif; ?>
                    
                </div>

            </div>

            <div class="chat-area-footer dark:bg-zinc-700 dark:border-zinc-700">

            
            <?php if($conversation->status === 'active'): ?>
                <input class="focus:ring-2 focus:ring-primary-600 dark:bg-zinc-600 dark:text-gray-400" type="text" placeholder="<?php echo e(__('messages.t_type_ur_message_here')); ?>" wire:model.defer="message" wire:keydown.enter="send" />

                
                <div>

                    
                    <div wire:loading wire:target="send">
                        <div class="w-10 h-10 flex items-center justify-center rounded-md bg-primary-600 text-white">
                            <svg role="status" class="inline w-6 h-6 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                            </svg>
                        </div>
                    </div>

                    
                    <div wire:loading.remove wire:target="send" wire:click="send" class="cursor-pointer">

                        
                        <div class="w-10 h-10 items-center justify-center rounded-md bg-primary-600 text-white ltr:flex rtl:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </div>

                        
                        <div class="w-10 h-10 items-center justify-center rounded-md bg-primary-600 text-white ltr:hidden rtl:flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                        </div>

                    </div>
                    
                </div>

            <?php elseif($conversation->status === 'blocked'): ?>
                <div class="flex items-center justify-center w-full m-auto py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-xs font-medium text-gray-400"><?php echo e(__('messages.t_u_cant_reply_this_conversation')); ?></span>
                </div>
            <?php endif; ?>


            </div>
            </div>



            
            <div class="detail-area dark:border-zinc-700" wire:key="conversation-user-details">
                <div class="detail-area-header">
                    <div class="msg-profile group" wire:ignore>
                        <img class="inline-block h-14 w-14 rounded-full object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($conversation->sender->avatar)); ?>" alt="">
                    </div>
                    <div class="detail-title flex items-center dark:text-gray-200" wire:ignore>
                        <?php echo e($conversation->sender->username); ?>

                        <?php if($conversation->sender->status === 'verified'): ?>
                            <img data-tooltip-target="tooltip-account-verified-<?php echo e($conversation->id); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg')); ?>" alt="<?php echo e(__('messages.t_account_verified')); ?>">
                            <div id="tooltip-account-verified-<?php echo e($conversation->id); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                <?php echo e(__('messages.t_account_verified')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="detail-subtitle" wire:ignore> <?php echo date('d/m/Y', strtotime($conversation->created_at)); ?></div>
                    <div class="detail-buttons m-auto">
                        <div class="flex flex-col <?php echo e($conversation->status === 'blocked' ? 'justify-center' : 'justify-between'); ?> space-y-3 sm:flex-row sm:space-y-0 sm:space-x-2 sm:rtl:space-x-reverse px-4">

                            
                            <a href="<?php echo e(url('profile', $conversation->sender->username)); ?>" target="_blank" class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span class="whitespace-nowrap font-semibold"><?php echo e(__('messages.t_view_profile')); ?></span>
                            </a>

                            
                            <?php if($conversation->status !== 'blocked'): ?>
                                <button type="button" x-on:click='confirm("<?php echo e(__('messages.t_are_u_sure_block_conversation_user')); ?>") ? $wire.block : "" ' wire:loading.attr="disabled" wire:target="block" class="inline-flex justify-center items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-red-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">

                                    
                                    <div wire:loading wire:target="block">
                                        <div class="flex items-center justify-center">
                                            <svg role="status" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-5 w-5 text-red-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#fffafa"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                            <span><?php echo e(__('messages.t_working_dots')); ?></span>
                                        </div>
                                    </div>

                                    
                                    <div wire:loading.remove wire:target="block">
                                        <div class="flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-5 w-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                            <span class="whitespace-nowrap font-semibold"><?php echo e(__('messages.t_block_user')); ?></span>
                                        </div>
                                    </div>

                                </button>
                            <?php else: ?>

                                <?php
                                if(Auth::user()->id == $conversation->blocked_by){
                                ?>
                                <button type="button" x-on:click='confirm("<?php echo e(__('messages.t_are_u_sure_unblock_conversation_user')); ?>") ? $wire.unblock : "" ' wire:loading.attr="disabled" wire:target="unblock" class="inline-flex justify-center items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-red-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">

                                    
                                    <div wire:loading wire:target="unblock">
                                        <div class="flex items-center justify-center">
                                            <svg role="status" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-5 w-5 text-red-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#fffafa"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                            <span><?php echo e(__('messages.t_working_dots')); ?></span>
                                        </div>
                                    </div>

                                    
                                    <div wire:loading.remove wire:target="unblock">
                                        <div class="flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-5 w-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/></svg>
                                            <span class="whitespace-nowrap font-semibold"><?php echo e(__('messages.t_unblock_user')); ?></span>
                                        </div>
                                    </div>

                                </button> 
                                <?php
                                }
                                else{
                                ?>
                                 
                                <span class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 
                                shadow-sm text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-5 w-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                <span class="whitespace-nowrap font-semibold text-red-700">Indisponível</span>
                                </span>
                                <?php
                                }
                                ?>


                            <?php endif; ?>
                          </div>

                    </div>
                </div>
                <div class="detail-changes" wire:ignore>

                    
                    <?php if($conversation->sender->fullname): ?>
                        <div class="detail-change flex items-center justify-between">
                            <span class="text-xs text-gray-400 dark:text-gray-400"><?php echo e(__('messages.t_fullname')); ?></span>
                            <span class="text-xs text-gray-800 dark:text-gray-200"><?php echo e($conversation->sender->fullname); ?></span>
                        </div>
                    <?php endif; ?>

                    
                    <?php if($conversation->sender->country): ?>
                        <div class="detail-change flex items-center justify-between">
                            <span class="text-xs text-gray-400 dark:text-gray-400"><?php echo e(__('messages.t_country')); ?></span>
                            <div class="text-xs text-gray-800 dark:text-gray-200 flex items-center">
                                <img src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(countryFlag($conversation->sender->country?->code)); ?>" alt="<?php echo e($conversation->sender->country?->name); ?>" class="lazy h-4 w-4 ltr:mr-2 rtl:ml-2 object-cover">  
                                <span><?php echo e($conversation->sender->country?->name); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if($conversation->sender->level): ?>
                        <div class="detail-change flex items-center justify-between">
                            <span class="text-xs text-gray-400 dark:text-gray-400"><?php echo e(__('messages.t_level')); ?></span>
                            <span class="text-xs" style="color: <?php echo e($conversation->sender->level->level_color); ?>"><?php echo e($conversation->sender->level->title); ?></span>
                        </div>
                    <?php endif; ?>

                    
                    <div class="detail-change flex items-center justify-between">
                        <span class="text-xs text-gray-400 dark:text-gray-400"><?php echo e(__('messages.t_member_since')); ?></span>
                        <span class="text-xs text-gray-800 dark:text-gray-200"><?php echo date('d/m/Y', strtotime($conversation->sender->created_at)); ?> </span>
                    </div>

                </div>

                <?php if($conversation->sender->projects()->count()): ?>
                    <div class="detail-photos">
                        <div class="detail-photo-title">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                <circle cx="8.5" cy="8.5" r="1.5" />
                                <path d="M21 15l-5-5L5 21" />
                            </svg>
                            <?php echo e(__('messages.t_portfolio')); ?>

                        </div>
                        <div class="detail-photo-grid grid grid-cols-4 md:gap-x-6 gap-y-6 mb-6">
                            <?php $__currentLoopData = $conversation->sender->projects()->limit(16)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($project->status === 'active'): ?>
                                    <a href="<?php echo e(url('projects', $project->slug)); ?>" target="_blank">
                                        <img src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($project->thumbnail)); ?>" alt="<?php echo e($project->title); ?>" class="lazy w-12 h-12 rounded-md object-cover shadow-sm">
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <a href="<?php echo e(url('profile/' . $conversation->sender->username . '/portfolio')); ?>" target="_blank" class="view-more"><?php echo e(__('messages.t_view_more')); ?></a>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
        
    </div>
</div>

<?php $__env->startPush('scripts'); ?>

    
    <script>
        function WbHObCwPcNqueuQ() {
            return {

                init() {
                    var _this = this;

                    // Listen when livewire event received
                    document.addEventListener("DOMContentLoaded", () => {

                        _this.scrollDown();

                        Livewire.hook('message.processed', (message, component) => {
                            _this.scrollDown();
                        })
                    });

                },

                scrollDown() {
                    var target = document.getElementById("chat-area");
                    target.scrollTop = target.scrollHeight;
                }

            }
        }
        window.WbHObCwPcNqueuQ = WbHObCwPcNqueuQ();
    </script>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    
    
    <link rel="stylesheet" href="<?php echo e(url('public/css/chat.css')); ?>">

<?php $__env->stopPush(); ?><?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/main/messages/conversation.blade.php ENDPATH**/ ?>