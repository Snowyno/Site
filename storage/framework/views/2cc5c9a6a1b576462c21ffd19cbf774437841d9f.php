<div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-16 pb-24 space-y-8 min-h-screen">
    <main class="w-full">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow overflow-hidden">
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                    
                    <aside class="lg:col-span-3 py-6 hidden lg:block" wire:ignore>
                        <?php if (isset($component)) { $__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3 = $component; } ?>
<?php $component = App\View\Components\Main\Account\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main.account.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Main\Account\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3)): ?>
<?php $component = $__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3; ?>
<?php unset($__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3); ?>
<?php endif; ?>
                    </aside>

                    
                    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">

                        
                        <div class="py-6 px-4 sm:p-6 lg:pb-8 h-[calc(100%-80px)]">

                            
                            <div class="mb-14">
                                <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_change_password')); ?></h2>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_change_password_subtitle')); ?></p>
                            </div>
                            
                            
                            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                                
                                <div class="col-span-12">
                                    <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_current_password')).'','placeholder' => ''.e(__('messages.t_enter_current_password')).'','model' => 'current_password','type' => 'password','icon' => 'lock']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                                </div>

                                
                                <div class="col-span-12 md:col-span-6">
                                    <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_new_password')).'','placeholder' => ''.e(__('messages.t_enter_new_password')).'','model' => 'new_password','type' => 'password','icon' => 'lock']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                                </div>

                                
                                <div class="col-span-12 md:col-span-6">
                                    <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_password_confirmation')).'','placeholder' => ''.e(__('messages.t_enter_password_confirmation')).'','model' => 'new_password_confirmation','type' => 'password','icon' => 'lock']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                                </div>

                            </div>

                        </div>

                        
                        <div class="py-4 px-4 flex justify-end sm:px-6 bg-gray-50 dark:bg-zinc-700">
                            <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'update','text' => ''.e(__('messages.t_update')).'']); ?>
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
    </main>
</div><?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/main/account/password/password.blade.php ENDPATH**/ ?>