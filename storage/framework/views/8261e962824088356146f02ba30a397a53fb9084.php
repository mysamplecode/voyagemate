<?php echo $__env->make('emails.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('emails.main'); ?>

<?php echo $__env->make('emails.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>