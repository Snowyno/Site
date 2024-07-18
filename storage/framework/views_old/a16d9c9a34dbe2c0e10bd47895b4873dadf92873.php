<div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-16 pb-24 space-y-8 min-h-screen">
    <main class="w-full" x-data="window.DIFZGFMIayApDwK" x-init="initialize">
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
                                <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_write_a_review')); ?></h2>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_give_ur_opinion_about_this_item')); ?></p>
                            </div>
                            
                            
                            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                                
                                <div class="col-span-12 md:col-span-6">

                                    
                                    <div class="mb-4 w-full">
                                        <span class="block text-xs font-semibold text-gray-700 dark:text-gray-50 mb-2"><?php echo e(__('messages.t_rating')); ?></span>
                                        <template x-for="(star, index) in ratings" :key="index">
                                            <button @click="rate(star)" @mouseover="hoverRating= star"
                                                @mouseleave="hoverRating= rating"
                                                aria-hidden="true"
                                                class="rounded-sm text-gray-400 fill-current focus:outline-none
                                                focus:shadow-outline p-1 w-6 m-0 cursor-pointer"
                                                :class="{'text-gray-600 dark:text-gray-100': hoverRating>= star, 'text-amber-400 dark:text-amber-400':
                                                rating >= star && hoverRating >= star}">
                                                <svg class="w-6 transition duration-150"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" style="color: inherit">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0
                                                        00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364
                                                        1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175
                                                        0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0
                                                        00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0
                                                        00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </button>
                                        </template>
                                    </div>

                                    
                                    <div class="w-full mb-6">
                                        <?php if (isset($component)) { $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_message')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_your_review_message')),'model' => 'message','rows' => '8','icon' => 'calendar-text']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11; ?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11); ?>
<?php endif; ?>
                                    </div>

                                    
                                    <div class="w-full">
                                        <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'create','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_submit_ur_review')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                                    </div>

                                </div>

                                
                                <div class="col-span-12 md:col-span-6">
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $item->gig])->html();
} elseif ($_instance->childHasBeenRendered('l894411481-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l894411481-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l894411481-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l894411481-0');
} else {
    $response = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $item->gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l894411481-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                </div>

                            </div>

                        </div>               

                    </div>

                </div>
            </div>
        </div>
    </main>
</div>

<?php $__env->startPush('scripts'); ?>

    
    <script>
        function DIFZGFMIayApDwK() {
            return {

                rating     : 0,
                hoverRating: 0,
                ratings    : [1,2,3,4,5],
    			rate(amount) {
    				if (this.rating == amount) {
					    this.rating= 0;
    				} else {
    					this.rating= amount;
    					window.livewire.find('<?php echo e($_instance->id); ?>').set('rating', amount);
    				} 
    			},

                // Init
                initialize() {
                }

            }
        }
        window.DIFZGFMIayApDwK = DIFZGFMIayApDwK();
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u991810173/domains/p2win.com.br/public_html/resources/views/livewire/main/account/reviews/options/create.blade.php ENDPATH**/ ?>