<?php $__env->startSection('emails.main'); ?>
<h3 style="text-align:center;font-weight: bold;">Vrent</h3>
<p>Hi <?php echo e(@$first_name); ?>,</p>
<p>
	<?php if($type == 'register'): ?>
		Welcome to <?php echo e($site_name); ?>!
	<?php elseif($type == 'change'): ?>
		Please click the link below to complete the process of changing your email address
	<?php else: ?>
		Please Confirm your email address:
	<?php endif; ?>
</p>
<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
  <tbody>
    <tr>
      <td align="center">
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td> <a href="<?php echo e($url.('users/confirm_email?code='.$token)); ?>" target="_blank">Confirm Email</a> </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('emails.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>