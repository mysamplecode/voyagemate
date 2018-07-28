<?php $__env->startSection('emails.main'); ?>
<h3 style="text-align:center;font-weight: bold;">Vrent</h3>
<p>Hi <?php echo e(@$first_name); ?>,</p>
<?php if($type == 'update'): ?>
<p>
  Your <?php echo e($site_name); ?> payout information was updated on <?php echo e($updated_time); ?>.
</p>
<?php endif; ?>
<?php if($type == 'delete'): ?>
<p>
  Your <?php echo e($site_name); ?> payout information was deleted on <?php echo e($deleted_time); ?>.
</p>
<?php endif; ?>
<?php if($type == 'default_update'): ?>
<p>
    We hope this message finds you well. Your <?php echo e($site_name); ?> payout account information was recently changed on <?php echo e($updated_date); ?>. To help keep your account secure, we wanted to reach out to confirm that you made this change. Feel free to disregard this message if you updated your payout account information on <?php echo e($updated_date); ?>.
</p>
<p>
    If you did not make this change to your account, please contact us.
</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('emails.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>