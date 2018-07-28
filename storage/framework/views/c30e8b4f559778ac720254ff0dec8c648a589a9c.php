<?php $__env->startSection('emails.main'); ?>
<h3 style="text-align:center;font-weight: bold;">Vrent</h3>
<p>Hi <?php echo e(@$first_name); ?>,</p>
<p>Your requested password reset link is below. If you didn't make the request, just ignore this email</p>
<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
  <tbody>
    <tr>
      <td align="center">
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td> <a href="<?php echo e($url.('users/reset_password?secret='.$token)); ?>" target="_blank">Reset your password</a> </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('emails.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>