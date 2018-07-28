<?php $__env->startSection('main'); ?>
	<div class="provater-images">
	  	<div class="container">
		  	<div class="banner-buttons">
		     	<?php if($user->id != Auth::user()->id): ?>
		     		<!--<a href="#"> <div class="envelopbox"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></div></a>-->
		        	<?php if($is_follower): ?>
		        		<a style="color:white;" href="javascript:void(0)" id="follow" data-rel="<?php echo e($user->id); ?>" class="btn btn-pinkbg"><?php echo e(trans('messages.utility.following')); ?></a>
		        	<?php else: ?>
		        		<a style="color:white;" href="javascript:void(0)" id="follow" data-rel="<?php echo e($user->id); ?>" class="btn btn-pinkbg"><?php echo e(trans('messages.utility.follow')); ?></a>
		        	<?php endif; ?>
		    	<?php endif; ?>
	        </div>
	    </div>	
	</div>
	<div class="avater">
	  <div class="profile-avater">
	    <img src="<?php echo e($user->profile_src); ?>" alt="" class="img-responsive">
	  </div>
	</div>
    <div class="container mtop20">
	  <div class="avater-heading text-center"><?php echo e(ucfirst($user->name)); ?></div>
	    <div class="pro-bar">
			  <div class="pro-bar-menu">
			    <ul class="nav navbar-nav">
				   <li><a class="photo_page" data-rel="profile" href="javascript:void(0)"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a></li>
				   <li><a class="photo_page" data-rel="shop" href="javascript:void(0)"><?php echo e(trans('messages.profile.shop')); ?><br><span class="pro-bar-menuOdd"><?php echo e(Helpers::thousandsCurrencyFormat($user->photos->where('sell_photo', 'Yes')->count())); ?></span></a></li>
				   <li><a class="photo_page" data-rel="all_photos" href="javascript:void(0)"><?php echo e(trans('messages.profile.all_photos')); ?><br><span class="pro-bar-menuOdd"><?php echo e(Helpers::thousandsCurrencyFormat($user->photos->count())); ?></span></a></li>
				   <li><a class="photo_page" data-rel="followers" href="javascript:void(0)"><?php echo e(trans('messages.profile.followers')); ?><br><span class="pro-bar-menuOdd"><?php echo e(Helpers::thousandsCurrencyFormat($user->follower->count())); ?></span></a></li>
				   <li><a class="photo_page" data-rel="following" href="javascript:void(0)"><?php echo e(trans('messages.profile.following')); ?><br><span class="pro-bar-menuOdd"><?php echo e(Helpers::thousandsCurrencyFormat($user->following->count())); ?></span></a></li>
				   <li><a class="photo_page" data-rel="loved_photos" href="javascript:void(0)"><?php echo e(trans('messages.profile.loved_photos')); ?><br><span class="pro-bar-menuOdd"><?php echo e(Helpers::thousandsCurrencyFormat($user->user_love->count())); ?></span></a></li>
				</ul>
		   </div>
		  </div>
		  
		 <div class="morebar mtop20">
			<div class="morebar-menu">
			    <ul class="navbar-nav">
			    	<!--<i class="fa fa-map-marker" aria-hidden="true"></i> Český Krumlov, Jihočeský kraj, Czech Republic . -->
				   <li><?php echo e($user->photos->sum('view_count')); ?> photo views . Joined <?php echo e(date('M Y',strtotime($user->created_at))); ?></li>
				   <!--<li><a href="#">More  <i class="fa fa-arrow-down" aria-hidden="true"></i></a></li>-->
				</ul>
		   </div>
		  </div> 
		   <div class="clearfix"></div>
			<div class="">  
				<div class="mb20 gallery-wp mtop10 pg-mn-height300">
					<div id="preloader"></div>
					<div id="demo1" class="flex-images">
						<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div href="<?php echo e(url('public/images/uploads/'.$photo->user_id.'/medium/'.$photo->image)); ?>" data-sub-html='<div class="fb-comments" data-href="#lg=1&slide=0" data-width="400" data-numposts="5"><div class="lg-main-content" data-rel="<?php echo e($photo->id); ?>"></div></div>' class="item pic-link" data-rel="<?php echo e('ph'.$photo->id); ?>" data-w="<?php echo e($photo->width); ?>" data-h="<?php echo e($photo->height); ?>">
								<img src="blank.gif" data-src="<?php echo e(url('public/images/uploads/'.$photo->user_id.'/medium/'.$photo->image)); ?>">
								<div class="flex-over display-off" id="<?php echo e('ph'.$photo->id); ?>">
									<div class="col-md-12 flex-over-top"><a href="#"><strong><?php echo e(ucfirst($photo->users->name)); ?></a></strong></div>
									<div class="flex-over-bottom">
										<div class="col-md-6">
											<?php if($photo->sell_photo == 'Yes'): ?>
												<strong><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;<?php echo e($default_currency->symbol.$photo->price); ?></a></strong>
											<?php endif; ?>
										</div>
										<div class="col-md-6" style="text-align:right;"><strong><a href="#"><span id="<?php echo e('love_num_'.$photo->id); ?>"><?php echo e($photo->love_count); ?></span>&nbsp;<i class="fa fa-heart-o" aria-hidden="true"></i></a></strong></div>
									</div>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  	</div>
				</div>
				<div style="text-align:center;margin-bottom:10px;">
					<button id="load_more" class="btn btn-pinkbg <?php echo e($photos->count() == 20?'':'hide'); ?>"><?php echo e(trans('messages.utility.load_more')); ?></button>
				</div>
				<input type="hidden" value="profile" id="type">
				<input type="hidden" value="1" id="page_no">
			</div>  
	</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
var numItems = $('.flex-over').length;
if(numItems) $('#demo1').flexImages({rowHeight: 240});
$(document).ready(function(){
    var $commentBoxSep = $('#demo1');

  	$commentBoxSep.lightGallery({
      addClass: 'fb-comments',
      download: false,
      galleryId: 2
  	}); 
});
//initilize();

$(document).on('onAfterAppendSubHtml.lg',function(event){
    var dataURL = APP_URL+'/get_comments';
    var photo_id = $('.lg-sub-html .fb-comments .lg-main-content').attr('data-rel');
	$.ajax({
	    url: dataURL,
	    data: {'photo_id': photo_id},
	    type: 'post',
	    async: true,
	    dataType: 'json',
	    success: function (result) {
	    	//console.log(result.success);
	    	if(result.success){
	    		$('.lg-sub-html .fb-comments .lg-main-content').html(result.comments);
	    		map_initialize();
	    	}
	    },
	    error: function (request, error) {
	      
	    }
	});
	
});

$(document).on('click', '.photo_page', function(){
	var type = $(this).attr('data-rel');
	$('#type').val(type);
	$('#page_no').val(0);
	load_more();
	$('#page_no').val(1);
	$('.photo_page').removeClass('pinkColor');
	$(this).addClass('pinkColor');
});


$(document).on('click', '#follow', function(){
	
	var dataURL = APP_URL+'/follow';
    var follow_id = $(this).attr('data-rel');
	$.ajax({
	    url: dataURL,
	    data: {'follow_id': follow_id},
	    type: 'post',
	    async: false,
	    dataType: 'json',
	    success: function (result) {
	    	if(result.success){
	    		$('#follow').html(result.button);
	    	}else{
	    		modal_show();
	    	}
	    },
	    error: function (request, error) {
	      
	    }
	});
});

$(document).on('click', '#report', function(){
	var dataURL = APP_URL+'/report_add';
    var photo_id = $('.lg-sub-html .fb-comments .lg-main-content').attr('data-rel');
	$.ajax({
	    url: dataURL,
	    data: {'photo_id': photo_id},
	    type: 'post',
	    async: false,
	    dataType: 'json',
	    success: function (result) {
	    	if(result.success){
	    		
	    	}else{
	    		modal_show();
	    	}
	    },
	    error: function (request, error) {
	      
	    }
	});
});
/*$(window).scroll(function(){
    if ($(window).scrollTop() == $(document).height() - $(window).height()){
          //alert('hello');
    }
});*/
$(document).on('keypress', '#new-comment', function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);

    if(keycode == '13'){
    	event.preventDefault();
    	var dataURL = APP_URL+'/save_comments';
    	var photo_id = $('.lg-sub-html .fb-comments .lg-main-content').attr('data-rel');
        var comment = $('#new-comment').val();
        $.ajax({
		    url: dataURL,
		    data: {
		    	'photo_id': photo_id,
		    	'comment' : comment,
		    },
		    type: 'post',
		    async: false,
		    dataType: 'json',
		    success: function (res) {
		    	if(res.success){
		    		$('#cmnt-append').before(res.result);
		    		$('#new-comment').val('');
		    	}
		    },
		    error: function (request, error) {
		      
		    }
		});  
    }
});

$('#load_more').on('click', function(){
	//loader_start();
	var pg = $('#page_no').val();
	load_more();
	$('#page_no').val(Number(pg)+Number(1));
	//loader_off();
});

$(document).on('mouseenter', '.pic-link', function(){
	var id = $(this).attr('data-rel');
	$('#'+id).show();
});
$(document).on('mouseleave', '.pic-link', function(){
	$('.flex-over').hide();
});

$(document).on('click', '.feed-love', function(e){
	var photo_id = $(this).attr('data-rel');
	var dataURL = APP_URL+'/love_add';
	$.ajax({
	    url: dataURL,
	    data: {'photo_id': photo_id},
	    type: 'post',
	    async: false,
	    dataType: 'json',
	    success: function (result) {
	    	if(result.success){
	    		$('#love_num').html(result.love_count);
	    		$('#love_num_'+photo_id).html(result.love_count);
	    	}else{
	    		modal_show();
	    	}
	    },
	    error: function (request, error) {
	      
	    }
	});
});

/*$(document).on('click', '.flex-over', function(){
	var link = $(this).attr('data-link');
	window.location.href = link;
});*/
function initilize(){
	var type = $(this).attr('data-rel');
	$('#type').val(type);
	$('#page_no').val(0);
	load_more();
	$('#page_no').val(1);
}
function load_more(){
	
	var dataURL = APP_URL+'/load_profile_photo';
	var page = $('#page_no').val();
	var type = $('#type').val();
	var id = "<?php echo e($user->id); ?>";
	$.ajax({
	    url: dataURL,
	    data: {'page': page, 'type': type, 'id': id},
	    type: 'post',
	    async: false,
	    dataType: 'json',
	    success: function (result) {
	    	if(result.success && result.photo_count > 0){
	    		if(page != 0){
	    			$('#demo1').append(result.photos);
	    		}else{
	    			$('#demo1').html(result.photos);
	    		}

	    		if(result.photo_count == 20) $('#load_more').show();
	    		else $('#load_more').hide();
	    		
	    		if(result != ''){
	    			$('#demo1').flexImages({rowHeight: 240});
	    			comment_box_reset();
	    		}

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
function comment_box_reset(){
	var $commentBoxSep = $('#demo1');
	$commentBoxSep.data('lightGallery').destroy(true);
	
  	$commentBoxSep.lightGallery({
      addClass: 'fb-comments',
      download: false,
      galleryId: 3
  	}); 
}

function map_initialize(){
	$(document).ready(function(){
		$('#us3').locationpicker({
	        location: {
	            latitude: $('#us3-lat').val(),
	            longitude: $('#us3-lon').val()
	        },
	        markerDraggable: false,
	        radius: 0,
	        inputBinding: {
	            latitudeInput: $('#us3-lat'),
	            longitudeInput: $('#us3-lon'),
	        },
	    });
	});
}

function modal_show(){
	$('#myModal').modal('show');
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>