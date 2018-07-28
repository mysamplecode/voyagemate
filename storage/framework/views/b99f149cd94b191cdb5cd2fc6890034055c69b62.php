<?php $__env->startSection('main'); ?>

<?php if($notifications->count()): ?>
<div class="container" style="min-height:400px;">
	<div class="section-width" >
		<?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="feed-panel mtop10">
			<div class="user-panel">
				<div class="pull-left notifiy-cmnt"><?php echo $notification->message; ?></div>
				<div class="pull-right">
					<?php echo e(date('h:i:s F d, Y', strtotime($notification->created_at))); ?>

				</div>
			</div>		  
			<div class="clearfix"></div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<div id="load-notification"></div>
	</div>
</div>
<?php else: ?>
<div class="bG_color">  
    <div class="container ">
	    <div class="h2 text-center mtop50 mb20"><strong><?php echo e(trans('messages.notification.notification')); ?></strong></div>
		<div class="mtop50 mb20">
		   <div class="notice_size">
		   	<i class="fa fa-bell-o" aria-hidden="true"></i>
		  </div>
		</div>
		<div class="text-center e_TextSmall mtop30">
		  <h4><strong><?php echo e(trans('messages.notification.no_notification')); ?></strong></h4>
		</div>
		<div class="text-center mtop50 mb40">
		  <a href="<?php echo e(url('manage-photos')); ?>" class="btn btn-pinkbg"><?php echo e(trans('messages.earning.manages_my_photos')); ?></a>
		</div>
	</div>
</div>
<?php endif; ?>
<div style="text-align:center;margin-bottom:10px;">
	<?php if($notifications->count() == 20): ?>
		<button id="load_more" class="btn btn-pinkbg"><?php echo e(trans('messages.utility.load_more')); ?></button>
	<?php endif; ?>
</div>
<input type="hidden" value="1" id="page_no">
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

	$('#load_more').on('click', function(){
		//loader_start();
		var pg = $('#page_no').val();
		load_more(pg);
		$('#page_no').val(Number(pg)+Number(1));
		//loader_off();
	});

	$( document ).ready(function() {
  		var dataURL = APP_URL+'/notification_seen';
		$.ajax({
		    url: dataURL,
		    type: 'get',
		    async: false,
		    success: function (result) {
		    },
		    error: function (request, error) {
		      
		    }
		});
	});

	function load_more(page){
		
		var dataURL = APP_URL+'/more_notification';
		$.ajax({
		    url: dataURL,
		    data: {'page': page},
		    type: 'post',
		    async: false,
		    dataType: 'json',
		    success: function (result) {
		    	if(result.success && result.notification_count > 0){
		    		$('#load-notification').before(result.notifications);
		    	}else if(result.notification_count == 0){
		    		$('#load_more').html('No More Notification Left');
		    	}
		    },
		    error: function (request, error) {
		      
		    }
		});
	}

	function remove_all_item(){
		$('.item').remove();
	}

	function loader_start(){
		$('#preloader').show();
	}
	function loader_off(){
		$('#preloader').fadeOut('slow');
	}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>