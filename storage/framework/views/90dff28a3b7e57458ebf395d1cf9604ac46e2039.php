<?php $__env->startSection('main'); ?>
<?php if($results->count()): ?>
<div class="container mb20 mtop20" style="min-height:400px;">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					  <tr>
					  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
						<th class="text-center pinkColor"><?php echo e(trans('messages.utility.price')); ?></th>
						<th class="text-center pinkColor"><?php echo e(trans('messages.utility.date_of_purchase')); ?></th>
						<th class="text-center pinkColor"><?php echo e(trans('messages.utility.payment_method')); ?></th>
						<th></th>
					  </tr>
				</thead>
				<tbody>
				<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
					  	<td class="userPhoto-List"><img style="max-height:150px;max-width:150px;" src="<?php echo e(url('public/images/uploads').'/'.@$result->photos->user_id.'/medium'.'/'.@$result->photos->image); ?>" alt="" class="img-responsive" /></td>
						<td align="center"><?php echo e($result->currency->symbol.' '.$result->amount); ?></td>
						<td align="center"><?php echo e(date('d F Y',strtotime($result->created_at))); ?></td>
						<td align="center"><?php echo e($result->method->name); ?></td>
						<td align="center"><form method="post" action="<?php echo e(url('photos/download').'/'.$result->photo_id); ?>"><input type="hidden" name="download" value="download"><button type="submit" class="btn btn-pinkbg"><i class="fa fa-download" aria-hidden="true"></i> <?php echo e(trans('messages.utility.download')); ?></button></form></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</div><!--controls end-->
<?php else: ?>
<div class="bG_color">  
    <div class="container ">
	    <div class="h2 text-center mtop50 mb20"><?php echo e(trans('messages.purchase.order_history')); ?></div>
		<div class="mtop50 mb50">
		   <div class="text-center">
		      <img src="<?php echo e(url('public/front/img/sold.png')); ?>" alt="">
		   </div>
		</div>
		<div class="text-center e_TextSmall mtop30">
		  <h4><strong><?php echo e(trans('messages.purchase.purchase_show_here')); ?></strong></h4>
		</div>
		<div class="text-center mtop50 mb40">
		  <a href="<?php echo e(url('/')); ?>" class="btn btn-pinkbg"><?php echo e(trans('messages.purchase.browse_photos')); ?></a>
		</div>
	</div>
</div>
<?php endif; ?>
<div class="container">
	<div class="clearfix"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>