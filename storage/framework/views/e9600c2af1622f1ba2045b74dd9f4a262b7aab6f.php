   
<?php $__env->startSection('main'); ?>
	
<div class="container" style="min-height:300px;margin-top:20px;">
    <div class="row">
    <?php echo $content; ?>

	</div>
</div>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>