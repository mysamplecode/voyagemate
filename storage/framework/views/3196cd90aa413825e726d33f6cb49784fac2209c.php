<?php $__env->startSection('main'); ?>

<?php if($results->count()): ?>	  
<div class="container mb20 mtop20" style="min-height:400px;">
	<div class="col-md-12" >
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>
						&nbsp;
					</th>
					<th>
						<h5><?php echo e(trans('messages.utility.date_of_purchase')); ?></h5>
					</th>
					<th>
						<h5><?php echo e(trans('messages.utility.payment_method')); ?></h5>
					</th>
					<th>
						<h5><?php echo e(trans('messages.utility.price')); ?></h5>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td>
						<img style="height:40px;padding-left:20px;" src="<?php echo e(url('public/images/uploads').'/'.@$result->user_id.'/medium'.'/'.@$result->photos->image); ?>" alt="" class="img-responsive"/>
					</td>
					<td>
						<h5><?php echo e(date('d F Y',strtotime($result->created_at))); ?></h5>
					</td>
					<td>
						<h5><?php echo e($result->method->name); ?></h5>
					</td>
					<td>
						<h5><?php echo e($result->currency->symbol.' '.$result->amount); ?></h5>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><h5><?php echo e(trans('messages.utility.total')); ?> :</h5></td>
					<td><h5>$ <?php echo e($total); ?></h5></td>
				</tr>
			</tbody>
		</table>
		<div class="col-lg-1" style="float: none;margin:0 auto;padding-top:20px;padding-bottom:20px"><a class="btn btn-pinkbg" href="<?php echo e(url('withdraws')); ?>"><?php echo e(trans('messages.utility.withdraw')); ?></a></div>
	</div>
</able>
<?php else: ?>
<div class="bG_color">  
    <div class="container ">
	    <div class="h2 text-center mtop50 mb20"><?php echo e(trans('messages.earning.your_sales')); ?></div>
		<div class="mtop30">
		   <div class="text-center earningIcon_size"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
		</div>
		<div class="text-center e_TextSmall mtop30">
		  <h4><strong><?php echo e(trans('messages.earning.any_sales_shown')); ?></strong></h4>
		</div>
		<div class="text-center mtop50 mb40">
		  <a href="<?php echo e(url('manage-photos')); ?>" class="btn btn-pinkbg"><?php echo e(trans('messages.earning.manages_my_photos')); ?></a>
		</div>
	</div>
</div>
<?php endif; ?>
</div><!--controls end-->	
<div class="container">
	<div class="clearfix"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>