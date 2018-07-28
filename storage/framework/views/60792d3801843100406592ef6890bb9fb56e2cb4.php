<?php $__env->startSection('main'); ?>
<div class="container mtop20 pg-mn-height300">
	<div class="gallery-wp mtop40 mb20">
		<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    <div class="col-md-4 col-sm-4 col-md-4 mb40">
		 	<div class="followDv">
			   	<div class="followDv_avater">
				  <div class="followDv_profile-avater">
					<img src="<?php echo e($user->profile_src); ?>" alt="" class="img-responsive">
				  </div>
				</div>
				<div class="h4 text-center mtop10"><strong><a href="<?php echo e(url('profile/'.$user->id)); ?>"><?php echo e($user->name); ?></a></strong></div>
				<div class="shareTXT text-center"><strong><?php echo e($user->photos->count()); ?></strong> photos &nbsp; <strong><?php echo e($user->photos->sum('view_count')); ?></strong> views &nbsp; <strong><?php echo e($user->follower->count()); ?></strong> followers</div>
				<div style="width:25%;margin:0 auto;">
					<?php if(in_array($user->id, $following)): ?>
		  				<p><button type="button" data-rel="<?php echo e($user->id); ?>" class="btn btn-sm btn-pinkbg follow">Following</button></p>
		  			<?php else: ?>
		  				<p><button type="button" data-rel="<?php echo e($user->id); ?>" class="btn btn-sm btn-pinkbg follow">Follow</button></p>
			  		<?php endif; ?>
				</div>
			</div>

		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  	</div>  
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

initilize();

$(document).on('click', '.follow', function(){
	var dataURL = APP_URL+'/follow';
    var follow_id = $(this).attr('data-rel');
    var obj = $(this);
	$.ajax({
	    url: dataURL,
	    data: {'follow_id': follow_id},
	    type: 'post',
	    async: false,
	    dataType: 'json',
	    success: function (result) {
	    	if(result.success){
	    		//console.log($(this).attr('data-rel'));
	    		obj.html(result.button);
	    	}else{
	    		modal_show();
	    	}
	    },
	    error: function (request, error) {
	      
	    }
	});
});

$('#load_more').on('click', function(){
	var pg = $('#page_no').val();
	load_more(pg);
	$('#page_no').val(Number(pg)+Number(1));
});

function initilize(){
	$('#page_no').val(1);
}

function load_more(page){
	var dataURL = APP_URL+'/load-search';
	var availableForSale = $('#availableForSale').val();
	var ordering = $('#ordering').val();
	var word = $('#word').val();
	$.ajax({
	    url: dataURL,
	    data: {'page': page, 'availableForSale': availableForSale, 'ordering': ordering, 'word': word},
	    type: 'post',
	    async: false,
	    dataType: 'json',
	    success: function (result) {
	    	if(result.success && result.photo_count > 0){
	    		$('#demo1').append(result.photos);
	    		$('#demo1').flexImages({rowHeight: 240});
	    		if(result.photo_count == 10) $('#load_more').show();
	    		else $('#load_more').hide();
	    		comment_box_reset();
	    	}else if(result.photo_count == 0){
	    		$('#load_more').hide();
	    		//$('#load_more').html('No More Photo Left');
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

function modal_show(){
	$('#myModal').modal('show');
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>