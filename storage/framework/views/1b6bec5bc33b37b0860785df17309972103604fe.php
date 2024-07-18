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

<div  class="gig-card" x-data="window._<?php echo e($gig->uid); ?>" dir="<?php echo e(config()->get('direction')); ?>">

    <div class="bg-white dark:bg-zinc-800 rounded-md shadow-sm ring-1 ring-gray-200 dark:ring-zinc-800">

    <div id="solOut" style="<?php echo $soldout; ?>position: absolute;background-color: red;color: white;margin: 17px 170px 5px;transform: rotate(390deg);padding: 1px 15px 1px 15px;text-transform: uppercase;"><?php echo e(__('messages.t_sold_off')); ?></div>

        
        <?php
        if($link ){
        ?>
        <a href="<?php echo e(url('service', $gig->slug)); ?>" wire:click="clearCart()" class="flex items-center justify-center overflow-hidden w-full h-52 bg-gray-100 dark:bg-zinc-700">
            <img class="object-contain max-h-52 lazy h-52 w-auto" width="200" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($gig->thumbnail)); ?>" alt="<?php echo e($gig->title); ?>">
        </a>
        <?php
        }
        else{
        ?>
        <div class="flex items-center justify-center overflow-hidden w-full h-52 bg-gray-100 dark:bg-zinc-700">
        <img class="object-contain max-h-52 lazy h-52 w-auto" width="200" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($gig->thumbnail)); ?>" alt="<?php echo e($gig->title); ?>">
        </div>
        <?php
        }
        ?>


        
        <div class="px-4 pb-2 mt-4">

            
            <?php if($profile_visible): ?>
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
            <?php endif; ?>

            
            <?php
            if($link ){
            ?>
            <a href="<?php echo e(url('service', $gig->slug)); ?>" wire:click="clearCart()" class="gig-card-title font-semibold text-gray-800 dark:text-gray-100 hover:text-primary-600 dark:hover:text-white mb-4 !overflow-hidden">
                <?php echo e(htmlspecialchars_decode($gig->title)); ?>

            </a>
            <?php
            }
            else{
            ?>
            <div class="gig-card-title font-semibold text-gray-800 dark:text-gray-100 hover:text-primary-600 dark:hover:text-white mb-4 !overflow-hidden">
                <?php echo e(htmlspecialchars_decode($gig->title)); ?>

            </div>
            <?php
            }
            ?>
            

        </div>

        
        <div class="px-3 py-3 bg-[#fdfdfd] dark:bg-zinc-800 border-t border-gray-50 dark:border-zinc-700 text-right sm:px-4 rounded-b-md flex justify-between">

            <div class="flex items-center">

      
               

            </div>

            
            <div class="gig-card-price" style="<?php echo $dspPrice; ?>">
                <small class="text-body-3 dark:!text-zinc-200"><?php echo e(__('messages.t_starting_at')); ?></small>
                <span class=" ltr:text-right rtl:text-left dark:!text-white"><?php echo money($gig->price, settings('currency')->code, true); ?></span>
            </div>
            
        </div>

    </div>

</div>

<?php $__env->startPush('scripts'); ?>
    
    
    <script>
        function _<?php echo e($gig->uid); ?>() {
            return {

                // Login to add to favorite
                loginToAddToFavorite() {
                    window.$wireui.notify({
                        title      : "<?php echo e(__('messages.t_info')); ?>",
                        description: "<?php echo e(__('messages.t_pls_login_or_register_to_add_to_favovorite')); ?>",
                        icon       : 'info'
                    });
                }

            }
        }
        window._<?php echo e($gig->uid); ?> = _<?php echo e($gig->uid); ?>();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/main/cards/gig.blade.php ENDPATH**/ ?>