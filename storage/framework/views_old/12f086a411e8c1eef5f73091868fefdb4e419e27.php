<div class="w-full px-2 lg:px-0">
    <div class="w-full lg:max-w-4xl mx-auto">
        <div class="relative py-16 bg-white dark:bg-zinc-800 overflow-hidden rounded-md shadow-sm border border-gray-100 dark:border-zinc-700">
            <div class="relative px-4 sm:px-6 lg:px-8">
                <div class="text-lg mx-auto">
                    <h1>
                        <span class="block text-xl text-center leading-8 font-extrabold tracking-wide text-gray-900 dark:text-gray-100 sm:text-3xl mb-2"><?php echo e($page->title); ?></span>
                        <span class="block text-xs text-center text-gray-400 dark:text-gray-300 font-normal tracking-widest">
                            <?php echo e(__('messages.t_page_last_update_date', ['date' => format_date($page->updated_at)])); ?>

                        </span>
                    </h1>
                </div>
                <div class="mt-16 px-12 dark:text-gray-200 quill-container text-base">
                    <?php echo htmlspecialchars_decode($page->content); ?>

                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/main/page/page.blade.php ENDPATH**/ ?>