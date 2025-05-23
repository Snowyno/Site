<header class="z-10 py-4 bg-white shadow-sm dark:bg-gray-800 h-16 fixed w-full">
    <div class="flex items-center justify-between h-full px-6 text-purple-600 dark:text-purple-300">

        
        <div class="h-full flex items-center">

            
            <button class="p-1 ltr:mr-5 rtl:ml-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16"/></svg>
            </button>

            
            <a href="<?php echo e(admin_url()); ?>" class="block h-full">
                <img src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src(settings('general')->logo)); ?>" alt="<?php echo e(settings('general')->title); ?>" class="lazy h-full hidden md:block">
            </a>
        </div>
        
        
        <ul class="flex items-center flex-shrink-0 space-x-6 rtl:space-x-reverse">
            
            
            <button class="h-8 w-8 flex items-center transition ease-in-out duration-150 justify-center rounded-md bg-slate-100 hover:bg-slate-200 relative" data-drawer-target="notifications-drawer" data-drawer-show="notifications-drawer" aria-controls="notifications-drawer" data-drawer-placement="right">

                
                <svg class="w-5 h-5 text-slate-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="currentColor"/> <rect fill="currentColor" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/> </g></svg>

                
                <div class="hidden" id="admin-header-notification-badge">
                    <span class="flex absolute h-2 w-2 top-0 ltr:right-0 rtl:left-0 -mt-1 ltr:-mr-1 rtl:-ml-1">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-300 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-400"></span>
                    </span>
                </div>

            </button>
            
            
            <li class="flex">

                
                <button class="h-8 w-8 flex items-center transition ease-in-out duration-150 justify-center rounded-md bg-slate-100 hover:bg-slate-200 relative" data-dropdown-toggle="admin-dropdown" data-dropdown-placement="bottom-start">
                    <svg class="w-5 h-5 text-slate-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <polygon points="0 0 24 0 24 24 0 24"/> <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/> <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="currentColor" fill-rule="nonzero"/> </g></svg>
                </button>

                
                <div id="admin-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 !mt-2">
                    <ul class="py-1 text-xs font-bold tracking-wide text-gray-700 dark:text-gray-200">

                        
                        <li>
                            <a href="<?php echo e(url('https://wa.me/'. config('global.whatsapp') .'/?text=Hello')); ?>" target="_blank" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <?php echo e(__('messages.t_fast_support')); ?>

                            </a>
                        </li>

                        
                        <li>
                            <a href="<?php echo e(admin_url('profile')); ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <?php echo e(__('messages.t_edit_profile')); ?>

                            </a>
                        </li>

                        
                        <li>
                            <a href="<?php echo e(url('/')); ?>" target="_blank" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <?php echo e(__('messages.t_go_homepage')); ?>

                            </a>
                        </li>
                    </ul>
                    <div class="py-1 text-xs font-bold tracking-wide">

                        
                        <a href="<?php echo e(admin_url('logout')); ?>" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <?php echo e(__('messages.t_logout')); ?>

                        </a>

                    </div>
                </div>
            </li>
            
        </ul>
    </div>
</header>
<?php /**PATH /home/u991810173/domains/p2win.com.br/public_html/resources/views/livewire/admin/includes/header.blade.php ENDPATH**/ ?>