<?php $__env->startComponent('mail::layout'); ?>

<?php $__env->slot('header'); ?>
<?php $__env->startComponent('mail::header', ['url' => config('app.url')]); ?>
<a href="<?php echo e(url('/')); ?>" class="h-full">
    <img src="<?php echo e(src(settings('general')->logo)); ?>" alt="<?php echo e(settings('general')->title); ?>"
        height="30px">
</a>
<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>


<?php echo e($slot); ?>



<?php if(isset($subcopy)): ?>
<?php $__env->slot('subcopy'); ?>
<?php $__env->startComponent('mail::subcopy'); ?>
<?php echo e($subcopy); ?>

<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>
<?php endif; ?>


<?php $__env->slot('footer'); ?>
<?php $__env->startComponent('mail::footer'); ?>
© <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. <?php echo app('translator')->get('All rights reserved.'); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/u991810173/domains/p2win.com.br/public_html/resources/views/vendor/mail/html/message.blade.php ENDPATH**/ ?>