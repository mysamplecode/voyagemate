<?php $__env->startSection('emails.main'); ?>
<div>
	<div>
	  	<span>
	      Amount <?php echo e($currency_symbol); ?><?php echo e($payout_amount); ?> is waiting for you but you did not add any payment account to send the money. Please log in to your <?php echo e($site_name); ?> account and <a href="<?php echo e($url.'users/account_preferences'); ?>" target="_blank">Add a payout method</a>.
	    </span>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('emails.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>