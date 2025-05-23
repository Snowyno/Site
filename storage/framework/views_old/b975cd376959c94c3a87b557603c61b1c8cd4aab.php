<div class="fixed inset-0 flex items-end overflow-y-auto sm:pt-16 justify-center <?php echo e($align); ?> <?php echo e($zIndex); ?>"
    x-data="wireui_dialog({ id: '<?php echo e($dialog); ?>' })"
    x-show="show"
    x-on:wireui:<?php echo e($dialog); ?>.window="showDialog($event.detail)"
    x-on:wireui:confirm-<?php echo e($dialog); ?>.window="confirmDialog($event.detail)"
    x-on:keydown.escape.window="handleEscape"
    style="display: none"
    x-cloak>
    <div class="fixed inset-0 bg-secondary-400 bg-opacity-60 transform transition-opacity
        <?php echo e($dialog); ?>-backdrop <?php if($blur): ?> <?php echo e($blur); ?> <?php endif; ?> dark:bg-secondary-700 dark:bg-opacity-60"
        x-show="show"
        x-on:click="dismiss"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
    </div>

    <div class="w-full transition-all p-4 sm:max-w-lg"
        x-show="show"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-on:mouseenter="pauseTimeout"
        x-on:mouseleave="resumeTimeout">
        <div class="relative shadow-md bg-white dark:bg-secondary-800 rounded-xl space-y-4 p-4"
            :class="{
                'sm:p-5 sm:pt-7': style === 'center',
                'sm:p-0 sm:pt-1': style === 'inline',
            }">
            <div class="bg-secondary-300 dark:bg-secondary-600 rounded-full transition-all duration-150 ease-linear absolute top-0 left-0"
                style="height: 2px; width: 100%;"
                x-ref="progressbar"
                x-show="dialog && dialog.progressbar && dialog.timeout">
            </div>

            <div x-show="dialog && dialog.closeButton" class="absolute ltr:right-2 rtl:left-2 -top-2">
                <button class="<?php echo e($dialog); ?>-button-close focus:outline-none p-1 focus:ring-2 focus:ring-secondary-200 rounded-full text-secondary-300"
                    x-on:click="close"
                    type="button">
                    <span class="sr-only">close</span>
                    <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5','name' => 'x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
                </button>
            </div>

            <div class="space-y-4" :class="{ 'sm:space-x-4 rtl:space-x-reverse sm:flex sm:items-center sm:space-y-0 sm:px-5 sm:py-2': style === 'inline' }">
                <div class="mx-auto flex items-center self-start justify-center shrink-0"
                    :class="{ 'sm:items-start sm:mx-0': style === 'inline' }"
                    x-show="dialog && dialog.icon">
                    <div x-ref="iconContainer"></div>
                </div>

                <div class="mt-4 w-full" :class="{ 'sm:mt-5': style === 'center' }">
                    <h3 class="text-lg leading-6 font-medium text-secondary-900 dark:text-secondary-400 text-center"
                        :class="{ 'sm:text-left sm:rtl:text-right': style === 'inline' }"
                        <?php if (! ($title)): ?> x-ref="title" <?php endif; ?>>
                        <?php echo e($title); ?>

                    </h3>

                    <p class="mt-2 text-sm text-secondary-500 text-center"
                        :class="{ 'sm:text-left sm:rtl:text-right': style === 'inline' }"
                        <?php if (! ($description)): ?> x-ref="description" <?php endif; ?>>
                        <?php echo e($description); ?>

                    </p>

                    <?php echo e($slot); ?>

                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-2 sm:gap-x-3 rounded-b-xl"
                :class="{
                    'sm:grid-cols-2 sm:gap-y-0': style === 'center',
                    'sm:p-4 sm:bg-secondary-100 sm:dark:bg-secondary-800 sm:grid-cols-none sm:flex sm:justify-end': style === 'inline',
                }"
                x-show="dialog && (dialog.accept || dialog.reject)">
                <div x-show="dialog && dialog.accept" class="sm:order-last" x-ref="accept"></div>
                <div x-show="dialog && dialog.reject" x-ref="reject"></div>
            </div>

            <div class="flex justify-center"
                x-show="dialog && dialog.close && !dialog.accept && !dialog.accept"
                x-ref="close">
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u991810173/domains/p2win.com.br/public_html/resources/views/vendor/wireui/components/dialog.blade.php ENDPATH**/ ?>