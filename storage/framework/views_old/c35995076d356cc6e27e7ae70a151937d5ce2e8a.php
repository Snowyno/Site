<div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-16 pb-24 space-y-8 min-h-screen">
    <div class="w-full" x-data="window.vjOXhkLsunWIxQy" x-init="initialize()" x-cloak>
        <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

            
            <?php if($user->availability): ?>
                <div class="col-span-12">
                    <div class="rounded-md bg-amber-100 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                            </div>
                            <div class="ltr:ml-3 rtl:mr-3">
                                <h3 class="text-sm font-medium text-amber-800"><?php echo e(__('messages.t_attention_needed')); ?></h3>
                                <div class="mt-2 text-sm text-amber-700">
                                    <span class="text-xs font-medium mb-3 block"><?php echo e(__('messages.t_this_user_is_not_available_right_now_msg', ['date' => format_date($user->availability->expected_available_date, config('carbon-formats.F_j,_Y'))])); ?></span>
                                    <div class="italic text-xs border-l-4 border-amber-500 pl-2">
                                        <?php echo e($user->availability->message); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="col-span-12 lg:col-span-4">
                
                
                <div class="bg-white dark:bg-zinc-800 border border-gray-100 dark:border-zinc-700 rounded-xl shadow-sm overflow-hidden mb-6">
                    <div class="md:flex">
                        <div class="w-full p-2 py-10">
                        
                            <div class="flex justify-center">
                                <div class="relative">
                    
                                    
                                    <img src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($user->avatar)); ?>" alt="<?php echo e($user->username); ?>" class="lazy rounded-full w-20 h-20 object-cover">

                                  
                                        <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-green-400 rounded-full"></span>
                                   
                            
                                </div>
                            </div>
                
                            <div class="flex flex-col text-center mt-3 mb-4">
                                <span class="text-md font-extrabold text-gray-800 dark:text-gray-100 flex items-center justify-center">
                                    <?php echo e($user->username); ?>

                                    <?php if($user->status === 'verified'): ?>
                                        <img data-tooltip-target="tooltip-account-verified-<?php echo e($user->id); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg')); ?>" alt="<?php echo e(__('messages.t_account_verified')); ?>">
                                        <div id="tooltip-account-verified-<?php echo e($user->id); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            <?php echo e(__('messages.t_account_verified')); ?>

                                        </div>
                                    <?php endif; ?>
                                </span>
                                <span class="text-sm text-gray-400 dark:text-gray-300"><?php echo e($user->headline); ?></span>
                            </div>
                
                            <p class="px-16 text-center text-sm text-gray-500 dark:text-gray-200 italic">
                                <?php echo e($user->description); ?>

                            </p>

                            
                            <div class="px-14 mt-8">

                                
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->id() != $user->id): ?>
                                        <a href="<?php echo e(url('messages/new', $user->username)); ?>" class="flex items-center justify-center h-12 bg-primary-600 w-full text-white text-sm font-medium rounded hover:shadow hover:bg-primary-700 <?php echo e(auth()->check() && auth()->id() !== $user->id ? 'mb-4' : ''); ?>"><?php echo e(__('messages.t_contact_me')); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                        
                                
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->id() !== $user->id): ?>
                                        <button id="modal-report-button" type="button" class="h-12 bg-gray-200 dark:bg-zinc-700 w-full text-black dark:text-zinc-300 text-sm font-medium rounded dark:hover:bg-zinc-600 hover:shadow hover:bg-gray-300 mb-2"><?php echo e(__('messages.t_report')); ?></button>
                                    <?php endif; ?>
                                <?php endif; ?>
                                
                            </div>
                            
                        </div>
                    
                    </div>
                </div>

                
                <div class="bg-white dark:bg-zinc-800 border border-gray-100 dark:border-zinc-700 rounded-xl shadow-sm overflow-hidden mb-6">
                    <div class="px-4 py-5 sm:px-6 bg-gray-50 dark:bg-zinc-700">
                        <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-900 dark:text-gray-100">
                            <?php echo e(__('messages.t_details')); ?>

                        </h3>
                        <p class="mt-1 max-w-2xl text-xs font-medium text-gray-500 dark:text-gray-300">
                            <?php echo e(__('messages.t_more_details_about_this_user')); ?>

                        </p>
                    </div>
                    <div class="border-t-1 border-gray-100 dark:border-zinc-700 px-1 py-2 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-100 dark:divide-zinc-500">

                            
                            <?php if($user->country): ?>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                        <?php echo e(__('messages.t_country')); ?>

                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:mt-0 sm:col-span-2 flex items-center">
                                        <img src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(url('public/img/flags/rounded/'. strtolower($user->country?->code) .'.svg')); ?>" alt="<?php echo e($user->country?->name); ?>" class="lazy h-5 w-5 ltr:mr-2 rtl:ml-2">  
                                        <span><?php echo e($user->country?->name); ?></span>
                                    </dd>
                                </div>
                            <?php endif; ?>

                            
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                    <?php echo e(__('messages.t_level')); ?>

                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:mt-0 sm:col-span-2">
                                    <?php echo e($user->level?->title); ?>

                                </dd>
                            </div>

                            
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                    <?php echo e(__('messages.t_member_since')); ?>

                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:mt-0 sm:col-span-2">
                               
                                    <?php echo date('d/m/Y', strtotime($user->created_at)); ?>
                                </dd>
                            </div>

                            
                            <?php if($user->account_type === 'seller' && $last_delivery): ?>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                        <?php echo e(__('messages.t_last_delivery')); ?>

                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:mt-0 sm:col-span-2">
                                        <?php echo e(format_date($last_delivery, 'ago')); ?>

                                    </dd>
                                </div>
                            <?php endif; ?>
                            
                        </dl>
                    </div>
                </div>

                
                <?php if($user->account_type === 'seller' && count($user->projects)): ?>
                    <div class="bg-white dark:bg-zinc-800 border border-gray-100 dark:border-zinc-700 rounded-xl shadow-sm overflow-hidden mb-6">
                        <div class="px-4 py-5 sm:px-6 bg-gray-50 dark:bg-zinc-700">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-900 dark:text-gray-100">
                                <?php echo e(__('messages.t_portfolio')); ?>

                            </h3>
                            <p class="mt-1 max-w-2xl text-xs font-medium text-gray-500 dark:text-gray-300">
                                <?php echo e(__('messages.t_see_my_latest_works')); ?>

                            </p>
                        </div>
                        <div class="border-t-2 border-gray-100 dark:border-zinc-700 px-4 py-5 sm:p-0">
                            <div class="px-6 py-5">
                                <div class="container-mansory mb-4">

                                    <?php $__currentLoopData = $user->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($project->status === 'active'): ?>
                                            <figure>
                                                <a href="<?php echo e(url('profile/' . $project->user->username . '/portfolio/' . $project->slug)); ?>" target="_blank">
                                                    <img src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($project->thumbnail)); ?>" alt="<?php echo e($project->title); ?>" class="lazy rounded-md hover:opacity-75 object-cover" />
                                                </a>
                                            </figure>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </div>

                                <a href="<?php echo e(url('profile/' . $user->username . '/portfolio')); ?>" target="_blank" class="block mt-8 text-center text-xs font-bold text-primary-600 hover:underline"><?php echo e(__('messages.t_view_my_porfolio')); ?></a>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                
                <?php if(count($user->skills)): ?>
                    <div class="bg-white dark:bg-zinc-800 border border-gray-100 dark:border-zinc-700 rounded-xl shadow-sm overflow-hidden mb-6">
                        <div class="px-4 py-5 sm:px-6 bg-gray-50 dark:bg-zinc-700">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-900 dark:text-gray-100">
                                <?php echo e(__('messages.t_skills')); ?>

                            </h3>
                            <p class="mt-1 max-w-2xl text-xs font-medium text-gray-500 dark:text-gray-300">
                                <?php echo e(__('messages.t_user_skills_and_hobbies')); ?>

                            </p>
                        </div>
                        <div class="border-t-2 border-gray-100 dark:border-zinc-700 px-4 py-5 sm:p-0">
                            
                            
                            <?php $__currentLoopData = $user->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(url('hire', $skill->slug)); ?>" class="block mb-1 px-6 py-5">
                                    <div class="flex justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-200"><?php echo e($skill->name); ?></span>
                                        <span class="text-xs font-normal text-gray-600 dark:text-gray-400"><?php echo e(__('messages.t_' . $skill->experience)); ?></span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <?php switch($skill->experience):
                                            case ('beginner'): ?>
                                                <div class="bg-gray-500 h-2 rounded-full" style="width: 33%"></div>
                                                <?php break; ?>
                                            <?php case ('intermediate'): ?>
                                                <div class="bg-primary-600 h-2 rounded-full" style="width: 67%"></div>
                                                <?php break; ?>
                                            <?php case ('pro'): ?>
                                                <div class="bg-green-400 h-2 rounded-full" style="width: 100%"></div>
                                                <?php break; ?>
                                        <?php endswitch; ?>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                <?php endif; ?>



                
                <?php if(count($user->languages)): ?>
                    <div class="bg-white dark:bg-zinc-800 border border-gray-100 dark:border-zinc-700 rounded-xl shadow-sm overflow-hidden mb-6">
                        <div class="px-4 py-5 sm:px-6 bg-gray-50 dark:bg-zinc-700">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-900 dark:text-gray-100">
                                <?php echo e(__('messages.t_languages')); ?>

                            </h3>
                            <p class="mt-1 max-w-2xl text-xs font-medium text-gray-500 dark:text-gray-300">
                                <?php echo e(__('messages.t_list_of_languages_i_speak')); ?>

                            </p>
                        </div>
                        <div class="border-t-2 border-gray-100 dark:border-zinc-700 px-4 py-5 sm:p-0">
                            <div class="py-5 grid items-center">

                                 
                                <ul class="-my-5 divide-y divide-gray-100 dark:divide-zinc-700">
                                    <?php $__currentLoopData = $user->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="py-4 px-6">
                                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                                <div class="flex-shrink-0 h-8 w-8 rounded-full flex justify-center items-center bg-gray-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/></svg>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-xs font-bold text-gray-900 dark:text-gray-200 truncate">
                                                        <?php echo e($lang->name); ?>

                                                    </p>
                                                </div>
                                                <div>
                                                    <span class="text-xs text-gray-400 dark:text-gray-300 font-medium"><?php echo e(__('messages.t_' . $lang->level)); ?></span>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            
            <div class="col-span-12 lg:col-span-8">
            
                    <div class="lg:col-span-2 xl:col-span-3">
                        <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">
                            <?php
                            $contatudo = 0;
                            ?>
                            <?php $__empty_1 = true; $__currentLoopData = $gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                
                                <?php
                                  
                                
                                if($gig->orders_in_queue > 0 or $gig->counter_sales > 0){
                                    $contatudo++;
                                ?>
                                    <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-6 xl:col-span-4" wire:key="gigs-list-<?php echo e($gig->uid); ?>">
                                    <?php

                                   

                                    ?>
                                    <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-6 xl:col-span-4" >
                                        <div class="gig-card" dir="ltr">
                                            <div id="solOut" style="position: absolute;background-color: red;color: white;margin: 17px 170px 5px;transform: rotate(390deg);padding: 1px 15px 1px 15px;text-transform: uppercase;"><?php echo e(__('messages.t_sold_off')); ?></div>
                                            <div class="bg-white dark:bg-zinc-800 rounded-md shadow-sm ring-1 ring-gray-200 dark:ring-zinc-800">
                                            <center>
                                            <img class="object-contain max-h-52 h-52 w-auto" src="https://p2win.com.br/public/storage/gigs/gallery/small/<?php echo $gig->thumbnail->uid; ?>.webp" data-src="https://p2win.com.br/public/storage/gigs/gallery/small/<?php echo $gig->thumbnail->uid; ?>.webp" alt="Teste" width="200">
                                            <center>
                                            <div class="px-4 pb-2 mt-4">
                                                <div class="w-full mb-4 flex justify-between items-center">
                                                
                                                    <div class="flex items-center">
                                                    <span class="inline-block relative">
                                                        <div style='background-color: red; width: 13px; min-height: 13px; border-radius: 13px;position: absolute;margin: 0px 16px;border: 2px solid white;'></div>
                                              
                                                        <img class="h-6 w-6 rounded-full object-cover" src="https://p2win.com.br/public/storage/default/default-placeholder.jpg" data-src="https://p2win.com.br/public/storage/default/default-placeholder.jpg">
                                                    </span>
                                              
                                                    </div>
                                             
                                                </div>
                                                <a href="" class="gig-card-title font-semibold text-gray-800 dark:text-gray-100 hover:text-primary-600 dark:hover:text-white mb-4 !overflow-hidden">
                                                <?php echo $gig->title; ?>
                                                </a>
                                 
                                            </div>
                                            <div class="px-3 py-3 bg-[#fdfdfd] dark:bg-zinc-800 border-t border-gray-50 dark:border-zinc-700 text-right sm:px-4 rounded-b-md flex justify-between">
                                                <div class="flex items-center">
                                                
                                                <div id="tooltip-add-to-favorites-491df946-15ff-4e41-8" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1510px, 17px);" data-popper-placement="top" data-popper-reference-hidden=""> Adicionar aos favoritos </div>
                                                </div>
                                                <div class="gig-card-price">
                                                <small class="text-body-3 dark:!text-zinc-400">ESGOTADO</small>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                else{

                                   
                                        $contatudo++;
                                ?>
                                
                                        <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-6 xl:col-span-4" wire:key="gigs-list-<?php echo e($gig->uid); ?>">
                                        <div  class="gig-card" x-data="window._<?php echo e($gig->uid); ?>" dir="<?php echo e(config()->get('direction')); ?>">
                                            <div class="bg-white dark:bg-zinc-800 rounded-md shadow-sm ring-1 ring-gray-200 dark:ring-zinc-800">

                                                
                                                <a href="<?php echo e(url('service', $gig->slug)); ?>" class="flex items-center justify-center overflow-hidden w-full h-52 bg-gray-100 dark:bg-zinc-700">
                                                    <img class="object-contain max-h-52 lazy h-52 w-auto" width="200" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($gig->thumbnail)); ?>" alt="<?php echo e($gig->title); ?>">
                                                </a>

                                                
                                                <div class="px-4 pb-2 mt-4">

                                                    
                                        
                                                        <div class="w-full mb-4 flex justify-between items-center">
                                                            <a href="<?php echo e(url('profile', $gig->owner->username)); ?>" target="_blank" class="flex-shrink-0 group block">
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
                                                                        <img class="h-6 w-6 rounded-full object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($gig->owner->avatar)); ?>" alt="<?php echo e($gig->owner->username); ?>">
                                                                    </span>
                                                                <div class="ltr:ml-3 rtl:mr-3">
                                                                    <div class="text-gray-500 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300 flex items-center mb-0.5 font-extrabold tracking-wide text-[13px]">
                                                                        <?php echo e($gig->owner->username); ?>

                                                                        <?php if($gig->owner->status === 'verified'): ?>
                                                                            <img data-tooltip-target="tooltip-account-verified-<?php echo e($gig->uid); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg')); ?>" alt="<?php echo e(__('messages.t_account_verified')); ?>">
                                                                            <div id="tooltip-account-verified-<?php echo e($gig->uid); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                                <?php echo e(__('messages.t_account_verified')); ?>

                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                            

                                                    
                                                    <a href="<?php echo e(url('service', $gig->slug)); ?>" class="gig-card-title font-semibold text-gray-800 dark:text-gray-100 hover:text-primary-600 dark:hover:text-white mb-4 !overflow-hidden">
                                                        <?php echo e(htmlspecialchars_decode($gig->title)); ?>                                            
                                                    </a>
                                                </div>

                                                
                                                <div class="px-3 py-3 bg-[#fdfdfd] dark:bg-zinc-800 border-t border-gray-50 dark:border-zinc-700 text-right sm:px-4 rounded-b-md flex justify-between">

                                                    <div class="flex items-center">

                                                        
                                                        <!-- btn de add para favorito removido para teste -->



                                                    </div>

                                                    
                                                    <div class="gig-card-price">
                                                        <small class="text-body-3 dark:!text-zinc-200"><?php echo e(__('messages.t_starting_at')); ?></small>
                                                        <span class=" ltr:text-right rtl:text-left dark:!text-white"><?php echo money($gig->price, settings('currency')->code, true); ?></span>
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                        </div>
                                        </div>
                                <?php
                                

                                if($contatudo == 0){
                                    $empty = true;
                                }
                                else{
                                    $empty = false; 
                                }
                            }
                            ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                
                                <div class="col-span-12">
                                    <div class="py-14 px-6 text-center text-sm sm:px-14 border-dashed border-2">
                                        <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/> </svg>
                                        <p class="mt-4 font-semibold text-gray-900"><?php echo e(__('messages.no_results_found')); ?></p>
                                        <p class="mt-2 text-gray-500"><?php echo e(__('messages.t_we_couldnt_find_anthing_search_term')); ?></p>
                                    </div>
                                </div>

                            <?php endif; ?>

                            <?php
                            if(!$contatudo AND !isset($_GET['q'])){
                            ?>
                            <div class="col-span-12">
                                <div class="py-14 px-6 text-center text-sm sm:px-14 border-dashed border-2">
                                    <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/> </svg>
                                    <p class="mt-4 font-semibold text-gray-900"><?php echo e(__('messages.no_results_found')); ?></p>
                                    <p class="mt-2 text-gray-500"><?php echo e(__('messages.t_we_couldnt_find_anthing_search_term')); ?></p>
                                </div>
                            </div>
                            <?php
                            }

                            ?>

                            
                            <?php if($gigs->hasPages()): ?>
                                <div class="col-span-12">
                                    <div class="flex justify-center pt-12">
                                        <?php echo $gigs->links('pagination::tailwind'); ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
            </div>

        </div>

        
        <?php if(auth()->check() && auth()->id() !== $user->id): ?>
            <?php if (isset($component)) { $__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-report-container','target' => 'modal-report-button','uid' => 'modal_'.e(uid()).'','placement' => 'center-center','size' => 'max-w-md']); ?>

                
                 <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_report_user')); ?> <?php $__env->endSlot(); ?>

                
                 <?php $__env->slot('content', null, []); ?> 
                    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                        
                        <div class="col-span-12">
                            <?php if (isset($component)) { $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_reason')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_report_user_reason_placeholder')),'model' => 'reason','icon' => 'message-question']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11; ?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11); ?>
<?php endif; ?>
                        </div>

                    </div>
                 <?php $__env->endSlot(); ?>

                
                 <?php $__env->slot('footer', null, []); ?> 
                    <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'report','text' => ''.e(__('messages.t_report')).'','block' => 0]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                 <?php $__env->endSlot(); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f)): ?>
<?php $component = $__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f; ?>
<?php unset($__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f); ?>
<?php endif; ?>
        <?php endif; ?>

    </div>
</div>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-icons-font@v5/font/simple-icons.min.css" type="text/css">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

    
    <script>
        function vjOXhkLsunWIxQy() {
            return {

                open: false,

                // Init component
                initialize() {
                    
                }

            }
        }
        window.vjOXhkLsunWIxQy = vjOXhkLsunWIxQy();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/main/profile/profile.blade.php ENDPATH**/ ?>