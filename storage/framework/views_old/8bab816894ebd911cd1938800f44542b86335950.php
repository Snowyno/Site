<div class="w-full">

    
    <?php if($step === 'overview'): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.overview', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l969651171-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l969651171-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l969651171-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l969651171-0');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.overview', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l969651171-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>

    
    <?php if($step === 'pricing'): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.pricing', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l969651171-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l969651171-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l969651171-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l969651171-1');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.pricing', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l969651171-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>

    
    <?php if($step === 'requirements'): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.requirements', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l969651171-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l969651171-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l969651171-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l969651171-2');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.requirements', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l969651171-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>

    
    <?php if($step === 'gallery'): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.gallery', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l969651171-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l969651171-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l969651171-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l969651171-3');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.gallery', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l969651171-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>

</div><?php /**PATH /home/u991810173/domains/p2win.com.br/public_html/resources/views/livewire/admin/gigs/options/edit.blade.php ENDPATH**/ ?>