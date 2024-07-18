<div class="w-full relative md:pt-16">


    
	<div class="fixed top-0 ltr:left-0 rtl:right-0 hidden p-6 lg:block lg:px-12">
		<?php if(settings('general')->logo_dark): ?>
			<a href="<?php echo e(url('/')); ?>" class="flex items-center">
				<img src="<?php echo e(src(settings('general')->logo_dark)); ?>" alt="<?php echo e(settings('general')->title); ?>" style="height: <?php echo e(settings('appearance')->sizes['header_desktop_logo_height']); ?>px;">
			</a>
		<?php else: ?>
			<a href="<?php echo e(url('/')); ?>" class="flex items-center">
				<img src="<?php echo e(src(settings('general')->logo)); ?>" alt="<?php echo e(settings('general')->title); ?>" style="height: <?php echo e(settings('appearance')->sizes['header_desktop_logo_height']); ?>px;">
			</a>
		<?php endif; ?>
	</div>



    <div class="bg-white dark:bg-zinc-800 sm:max-w-md sm:w-full sm:mx-auto sm:rounded-lg sm:overflow-hidden shadow-sm border dark:border-zinc-700">
        <div class="px-4 py-8 sm:px-10">

            <div class="mb-6 text-center">
                <p class="text-base font-black text-gray-700 dark:text-gray-100 text-center mb-2">
                    <?php echo e(__('messages.t_update_password')); ?>

                </p>

                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">
                    <?php echo e(__('messages.t_update_password_subtitle')); ?>

                </p>
            </div>

            <div class="mt-12">
                <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_password')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_password')),'model' => 'password','type' => 'password','icon' => 'lock']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_password_confirmation')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_password_confirmation')),'model' => 'password_confirmation','type' => 'password','icon' => 'lock']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="col-span-12 mt-2">
                        <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'update','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_update')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                    </div>

                </div>
                
            </div>
        </div>

    </div>
</div><?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/main/auth/password/update.blade.php ENDPATH**/ ?>