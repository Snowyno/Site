<div class="w-full" x-data="window.HtBWuUxgpMyrQEM" x-init="initialize">

    
    <div wire:loading>
        <div class="fixed inset-0 flex items-end overflow-hidden justify-center sm:items-center z-50">
            <div class="w-full h-full flex items-center justify-center">
                <div class="app-preloader fixed z-50 grid h-full w-full place-content-center inset-0 bg-secondary-400 bg-opacity-60 transform transition-opacity dialog-backdrop backdrop-blur-sm dark:bg-secondary-700 dark:bg-opacity-60">
                    <div class="app-preloader-inner relative inline-block h-32 w-32"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">
        
        
        <?php if(session()->has('success')): ?>
            <div class="col-span-12">
                <div class="rounded-md bg-green-100 dark:bg-zinc-700 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400 dark:text-zinc-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <p class="text-sm font-medium text-green-800 dark:text-zinc-400"><?php echo e(session()->get('success')); ?></p>
                        </div>
                    </div>
                </div>

            </div>
        <?php endif; ?>

        
        <div class="col-span-12 lg:col-span-7" wire:key="section_images">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6 dark:bg-zinc-800 dark:border-zinc-700">

                
                <div class="mb-14 flex justify-between items-center">
                    <div>
                        <h2 class="text-[15px] mb-1 tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100">
                            <?php echo e(__('messages.t_images')); ?></h2>
                        <p class="text-[13px] text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_get_noticed_by_right_buyers_images')); ?></p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                        <button id="modal-add-youtube-video-button" type="button"
                            class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-500 hover:text-gray-600 dark:text-zinc-300 dark:hover:text-white" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                            </svg>
                        </button>
                    </div>
                </div>

                
                <div class="w-full mb-10">

                    
                    <div wire:ignore>
                        <?php if (isset($component)) { $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59 = $component; } ?>
<?php $component = App\View\Components\Forms\Uploader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Uploader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'images','id' => 'uploader_images','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['jpg', 'jpeg', 'png']),'accept' => 'image/jpg, image/jpeg, image/png','size' => ''.e(settings('publish')->max_image_size).'','max' => ''.e(settings('publish')->max_images).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59)): ?>
<?php $component = $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59; ?>
<?php unset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59); ?>
<?php endif; ?>
                    </div>

                </div>

                
                <div class="mt-14 mb-6">
                    <h2 class="text-[15px] mb-1 tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100">
                        <?php echo e(__('messages.t_gig_gallery')); ?></h2>
                    <p class="text-[13px] text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_if_u_upload_new_images_below_will_be_deleted')); ?>

                    </p>
                </div>

                
                <div class="fileuploader fileuploader-theme-thumbnails">
                    <div class="fileuploader-items">
                        <ul class="!grid !grid-cols-12 sm:!gap-x-6 gap-y-6 !m-auto fileuploader-items-list">

                            <?php $__currentLoopData = $gig->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li
                                    wire:key="gallery-image-item-<?php echo e($img->id); ?>"
                                    class="!col-span-12 sm:!col-span-6 md:!col-span-4 lg:!col-span-3 !w-full h-24 !m-auto fileuploader-item file-type-image file-ext-png file-has-popup rounded-[6px]">
                                    <div class="fileuploader-item-inner">
                                        <div class="type-holder"><?php echo e($img->small->file_extension); ?></div>
                                        <div class="actions-holder">
                                            <button type="button"
                                                x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_delete_this_image')); ?>') ? $wire.removeImage('<?php echo e($img->id); ?>') : ''" 
                                                wire:loading.attr="disabled" 
                                                wire:target="removeImage('<?php echo e($img->id); ?>')"
                                                class="fileuploader-action fileuploader-action-remove"
                                                title="<?php echo e(__('messages.t_delete')); ?>">
                                                <i class="fileuploader-icon-remove"></i>
                                            </button>
                                        </div>
                                        <div class="thumbnail-holder">
                                            <div class="fileuploader-item-image">
                                                <img class="lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($img->small)); ?>" draggable="false">
                                            </div>
                                            <span class="fileuploader-action-popup"></span>
                                        </div>
                                        <div class="content-holder">
                                            <span><?php echo e(human_filesize($img->large->file_size)); ?></span>
                                        </div>
                                        <div class="progress-holder"></div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>
                </div>

                
                <div class="mt-14 mb-6">
                    <h2 class="text-[15px] mb-1 tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100">
                        <?php echo e(__('messages.t_gig_thumbnail')); ?></h2>
                    <p class="text-[13px] text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_catch_buyers_eyes_with_nice_img')); ?>

                    </p>
                </div>

                
                <div class="w-full">
                    <?php if (isset($component)) { $__componentOriginal67b391f64c2f9b357e08926622ed3b8c3e15e254 = $component; } ?>
<?php $component = App\View\Components\Forms\FileInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_upload_thumbnail')),'model' => 'thumbnail']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67b391f64c2f9b357e08926622ed3b8c3e15e254)): ?>
<?php $component = $__componentOriginal67b391f64c2f9b357e08926622ed3b8c3e15e254; ?>
<?php unset($__componentOriginal67b391f64c2f9b357e08926622ed3b8c3e15e254); ?>
<?php endif; ?>
                    
                    <?php if($gig->thumbnail): ?>
                        <div class="mt-3">
                            <img src="<?php echo e(src( $gig->thumbnail )); ?>" class="h-24 w-24 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    <?php endif; ?>
                </div>

            </div>

            
            <div class="hidden justify-between items-center lg:flex">
                <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'back','text' => ''.e(__('messages.t_back')).'','active' => 'bg-white dark:bg-zinc-800 dark:hover:bg-zinc-900 shadow-sm hover:bg-gray-300 text-gray-900 dark:text-zinc-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'save','text' => ''.e(__('messages.t_save_and_continue')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
            </div>

        </div>

        
        <div class="col-span-12 lg:col-span-5">

            
            <?php if(settings('publish')->is_documents_enabled): ?>
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6 dark:bg-zinc-800 dark:border-zinc-700"
                    wire:key="section_documents">

                    
                    <div class="mb-14">
                        <h2 class="text-[15px] mb-1 tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100">
                            <?php echo e(__('messages.t_documents')); ?></h2>
                        <p class="text-[13px] text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_show_some_of_best_work_doc_pdfs_only')); ?>

                        </p>
                    </div>

                    
                    <div class="w-full <?php echo e($gig->documents()->count() === 0 ? '' : 'mb-10'); ?>">

                        
                        <div wire:ignore>
                            <?php if (isset($component)) { $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59 = $component; } ?>
<?php $component = App\View\Components\Forms\Uploader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Uploader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'documents','id' => 'uploader_documents','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['pdf']),'accept' => 'application/pdf','size' => ''.e(settings('publish')->max_document_size).'','max' => ''.e(settings('publish')->max_documents).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59)): ?>
<?php $component = $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59; ?>
<?php unset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59); ?>
<?php endif; ?>
                        </div>

                    </div>

                    
                    <?php if($gig->documents()->count()): ?>
                        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                            <?php $__currentLoopData = $gig->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="ltr:pl-3 rtl:pr-3 ltr:pr-4 rtl:pl-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                            x-description="Heroicon name: solid/paper-clip"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="ltr:ml-2 rtl:mr-2 flex-1 w-0 truncate">
                                            <?php echo e($doc->name); ?>

                                        </span>
                                    </div>
                                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                                        <button 
                                            x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_delete_this_file')); ?>') ? $wire.removeDocument('<?php echo e($doc->id); ?>') : ''"
                                            wire:loading.attr="disabled"
                                            wire:target="removeDocument(<?php echo e($doc->id); ?>)" type="button"
                                            class="font-medium text-primary-600 hover:text-primary-600">
                                            <?php echo e(__('messages.t_remove')); ?>

                                        </button>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>

                </div>
            <?php endif; ?>


        </div>



    </div>


</div>


<?php $__env->startPush('scripts'); ?>
    
    <script>
        function HtBWuUxgpMyrQEM() {
            return {

                initialize() {}

            }
        }
        window.HtBWuUxgpMyrQEM = HtBWuUxgpMyrQEM();
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u991810173/domains/p2win.com.br/public_html/resources/views/livewire/main/seller/gigs/options/steps/overview.blade.php ENDPATH**/ ?>