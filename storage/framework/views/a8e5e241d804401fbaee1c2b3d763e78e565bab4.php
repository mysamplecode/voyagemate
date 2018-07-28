   
<?php $__env->startSection('main'); ?>
	
<main role="main" id="site-content">

<div class="container" style="min-height: 300px;">
    <?php echo $content; ?>

</div>

</main>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>