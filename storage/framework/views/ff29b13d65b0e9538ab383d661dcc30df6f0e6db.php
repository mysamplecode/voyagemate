<?php $__env->startSection('main'); ?>
<div class="filter-bar">
	<div class="filter-bar-menu">
	    <ul class="nav navbar-nav">
	       <?php  
	       $for_sell =(isset($parameter['availableForSale']) && $parameter['availableForSale'] == 'true')?'&availableForSale=true':'';
	        ?>
		   <li><a class="<?php echo e(@$parameter['ordering'] != 'newest'?'active1':''); ?>" href="<?php echo e(url('search/'.@$parameter['word'].'?ordering='.'best'.$for_sell)); ?>"><?php echo e(trans('messages.header.best_photos')); ?></a></li>
		   <li><a class="<?php echo e(@$parameter['ordering'] == 'newest'?'active1':''); ?>" href="<?php echo e(url('search/'.@$parameter['word'].'?ordering='.'newest'.$for_sell)); ?>"><?php echo e(trans('messages.header.newest_photos')); ?></a></li>
		</ul>
   </div>
</div>
		  
<div class="filter-set">
  	<div class="filter-bar__form__filtering">
	  	<label class="hide-f"><?php echo e(trans('messages.header.filter')); ?> :</label>
	  	<div class="filter-bar__form__toggle-wrapper">
		  	<div class="radio-wrapper">
		  	   <?php  
		       	$ordering = isset($parameter['ordering'])?'&ordering='.$parameter['ordering']:'';
		        ?>
			  	<a href="<?php echo e(url('search/'.@$parameter['word'].'?availableForSale=false'.$ordering)); ?>" class="" data-rel="all_photo"><div id="all_photo" class="hide-f <?php echo e(@$parameter['availableForSale'] != 'true'?'pinkColor':''); ?>"><strong><?php echo e(trans('messages.header.all_photos')); ?></strong></div></a>
			  	<a href="<?php echo e(url('search/'.@$parameter['word'].'?availableForSale=true'.$ordering)); ?>" class="" data-rel="sale_photo"><div id="sale_photo" class="hide-f <?php echo e(@$parameter['availableForSale'] == 'true'?'pinkColor':''); ?>"><strong><?php echo e(trans('messages.header.for_sale')); ?></strong></div></a>
			  	<div class="clearfix"></div>
			</div>
		</div>
	  	<!--<label for="Categories" class="hide-mobile">+</label>
	  	<div class="filter-bar__form__select-wrapper">
		  	<select id="categories" name="tags" class="form-control">
			  <option value="0" >All categories</option>\
			  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  	<option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  	</select>
		</div>-->
	</div>
</div>
<div class="alert text-center" style="margin-bottom:0px;background-color:#f10077;color:white;font-size:18px;padding:5px;" role="alert">
	<?php echo e(trans('messages.search.results_for')); ?> <b><?php echo e($word); ?></b>
</div>			  
<div class="">  
	<div class="mb20 gallery-wp mtop10 pg-mn-height300">
		<div id="preloader"></div>
		<?php if(count($photos)): ?>
			<div class=" col-md-9" style="min-height:400px;">
				<div id="demo1" class="flex-images">
					<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div href="<?php echo e(url('public/images/uploads/'.$photo->user_id.'/medium'.'/'.$photo->image)); ?>" data-sub-html='<div class="fb-comments" data-href="#lg=1&slide=0" data-width="400" data-numposts="5"><div class="lg-main-content" data-rel="<?php echo e($photo->id); ?>"></div></div>' class="item pic-link" data-rel="<?php echo e('ph'.$photo->id); ?>" data-w="<?php echo e($photo->width); ?>" data-h="<?php echo e($photo->height); ?>">
							<img src="blank.gif" data-src="<?php echo e(url('public/images/uploads/'.$photo->user_id.'/medium'.'/'.$photo->image)); ?>">
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
			  	<div class="clearfix"></div>
				<div style="text-align:center;margin-bottom:10px;">
					<button id="load_more" class="btn btn-pinkbg <?php echo e($photos->count() == 20?'':'hide'); ?>"><?php echo e(trans('messages.utility.load_more')); ?></button>
				</div>
			</div>
		<?php else: ?>
			<div class="col-md-9" style="min-height:400px;text-align:center;">
				<h3><?php echo e(trans('messages.utility.no_photos_found')); ?></h3>
			</div>
		<?php endif; ?>
		<?php if(count($users)): ?>
		  	<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <div class="col-md-3 col-sm-3 col-md-3 mtop5">
		  		<div class="col-md-3">
		  			<div class="followDv_profile-avater">
		            	<img src="<?php echo e($user->profile_src); ?>" alt="" class="img-responsive">
		          	</div>
		  		</div>
		  		<div class="ptop10">
		  			<div class="col-md-6">
		          		<h5 style="margin:0;font-weight:bold;"><a href="<?php echo e(url('profile/'.$user->id)); ?>"><?php echo e(ucfirst($user->name)); ?></a></h5>
		          		<p><?php echo e(trans('messages.profile.followers')); ?>: <?php echo e($user->follower_count); ?></p>
		          	</div>
		          	<div class="col-md-3">
			  			<!--<p><a style="color:white;" href="http://localhost/photocrowd/uploads" class="btn btn-sm btn-pinkbg">Follow</a></p>-->
			  			<?php if(in_array($user->id, $following)): ?>
			  				<p><button type="button" data-rel="<?php echo e($user->id); ?>" class="btn btn-sm btn-pinkbg follow"><?php echo e(trans('messages.utility.following')); ?></button></p>
			  			<?php else: ?>
			  				<p><button type="button" data-rel="<?php echo e($user->id); ?>" class="btn btn-sm btn-pinkbg follow"><?php echo e(trans('messages.utility.follow')); ?></button></p>
			  			<?php endif; ?>
			  		</div>
		  		</div>
	        </div>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    <?php else: ?>
	    	<div class="col-md-3 col-sm-3 col-md-3 mtop5" style="text-align:center;">
		  		<h3><?php echo e(trans('messages.utility.no_users_found')); ?></h3>
	        </div>
	    <?php endif; ?>
        <?php if($users->count() == 5): ?>
        <div class="col-md-3 col-sm-3 col-md-3 mtop5">
        	<div style="float:right;padding-right:5px;font-size:13px;color: #f10077;">
        		<a href="<?php echo e(url('search/user/'.$parameter['word'])); ?>"><b><?php echo e(trans('messages.utility.see_all')); ?></b></a>
        	</div>
        </div>
        <?php endif; ?>
	</div>
	
	<input type="hidden" value="" id="sell_photo_value">
	<input type="hidden" value="" id="page_no">
	<input type="hidden" value="<?php echo e(isset($parameter['word']) ? $parameter['word'] : ''); ?>" id="word">
	<input type="hidden" value="<?php echo e(isset($parameter['availableForSale']) ? $parameter['availableForSale'] : 'false'); ?>" id="availableForSale">
	<input type="hidden" value="<?php echo e(isset($parameter['ordering']) ? $parameter['ordering'] : ''); ?>" id="ordering">
</div>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
$('#demo1').flexImages({rowHeight: 240});
$(document).ready(function(){
    var $commentBoxSep = $('#demo1');

  	$commentBoxSep.lightGallery({
      addClass: 'fb-comments',
      download: false,
      galleryId: 2
  	}); 
});
initilize();

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

$(document).on('click', '#load-more-comment', function(){
	var dataURL = APP_URL+'/only-comments';
	var photo_id = $('.lg-sub-html .fb-comments .lg-main-content').attr('data-rel');
   
        $.ajax({
		    url: dataURL,
		    data: {
		    	'photo_id': photo_id,
		    },
		    type: 'post',
		    async: false,
		    dataType: 'json',
		    success: function (res) {
		    	if(res.success){
		    		$('#comment-div').html(res.comments);
		    		$('#load-more-comment').hide();
		    	}
		    },
		    error: function (request, error) {
		      
		    }
		});  
});
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
$(document).on('keypress', '.feed-comment', function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);

    if(keycode == '13'){
    	event.preventDefault();
    	var dataURL = APP_URL+'/save_comments';
    	var photo_id = $('.lg-sub-html .fb-comments .lg-main-content').attr('data-rel');
        var comment = $('.feed-comment').val();
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
		    		$('.feed-comment').val('');
		    	}
		    },
		    error: function (request, error) {
		      
		    }
		});  
    }
});
$(document).on('click', '.photo-sale', function(){
	loader_start();
	var rel = $(this).attr('data-rel');
	$('.hide-f').removeClass('pinkColor');
	$('#'+rel).addClass('pinkColor');
	
	if(rel == 'sale_photo'){
		$('#sell_photo_value').val('Yes');
		var pg = 0;
		$('#availableForSale').val('true');
		remove_all_item();
		load_more(pg);
		$('#page_no').val(1);
		$('#load_more').html('Load More');
	}else{
		$('#sell_photo_value').val('All');
		var pg = 0;
		$('#availableForSale').val('false');
		remove_all_item();
		load_more(pg, cat, 'All');
		$('#page_no').val(1);
		$('#load_more').html('Load More');
	}
	loader_off();
	
});
$('#load_more').on('click', function(){
	//loader_start();
	var pg = $('#page_no').val();
	load_more(pg);
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
	$('#page_no').val(1);
	$('#category_no').val(0);
	$('#sell_photo_value').val('All');
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