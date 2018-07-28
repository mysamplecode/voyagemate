<?php $__env->startSection('emails.main'); ?>
<div style="margin:0;padding:0;font-family:&quot;Helvetica Neue&quot;,&quot;Helvetica&quot;,Helvetica,Arial,sans-serif;margin-top:1em">
We've received a request to reset your password. If you didn't make the request, just ignore this email. Otherwise, you can reset your password using this link:
</div>
<div style="margin:0;padding:0;font-family:&quot;Helvetica Neue&quot;,&quot;Helvetica&quot;,Helvetica,Arial,sans-serif;margin-top:1em">
<a href="<?php echo e($url.('users/set_password?secret='.$token)); ?>" style="margin:0;font-family:&quot;Helvetica Neue&quot;,&quot;Helvetica&quot;,Helvetica,Arial,sans-serif;border:1px solid;display:block;padding:10px 16px;text-decoration:none;border-radius:2px;text-align:center;vertical-align:middle;font-weight:bold;white-space:nowrap;background:#ffffff;border-color:#f10077;background-color:#f10077;color:#ffffff;border-top-width:1px" target="_blank" rel="noreferrer">
Click here to reset your password</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('emails.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>