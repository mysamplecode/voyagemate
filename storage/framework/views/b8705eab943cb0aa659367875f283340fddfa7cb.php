<?php $__env->startSection('main'); ?>

<div class="section-images" >
  <div class="container">
	<div class="section-btn">
		<a style="color:white;" href="<?php echo e(url('uploads')); ?>" class="btn btn-pinkbg"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?php echo e(trans('messages.feeds.photo_upload')); ?></a>
	</div>
   </div>	
</div>
<div class="container" style="min-height:400px;">
	<div class="section-width" >
		<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php 
			$photo_category = $photo->photo_categories;
		    $category_str = '';
	      	foreach ($photo_category as $value) {
	          $category_str .= '#'.$value->category->name.' &nbsp;';
	      	}
	      	$fl = 0;
		 ?>
		<div class="feed-panel mtop40">
		  	<div class="user-panel">
			   <div class="media-photo-badge">
			     <img class="img-responsive inblk" src="<?php echo e($photo->users->profile_src); ?>" alt="">
				 <div class="h4 pinkColor inblk use-left"><strong><a target="_blank" href="<?php echo e(url('profile/'.$photo->user_id)); ?>"><?php echo e(ucfirst($photo->users->name)); ?></a></strong></div>
				 <div class="h5 lightColor inblk">&nbsp;<?php echo e(date('d F Y',strtotime($photo->created_at))); ?></div>
			   </div>
			  </div>
			<div class="mtop10 feed-panel-BigImages photo-div">
				<div href="<?php echo e(url('public/images/uploads/'.$photo->user_id.'/medium/'.$photo->image)); ?>" data-sub-html='<div class="fb-comments" data-href="#lg=1&slide=0" data-width="400" data-numposts="5"><div class="lg-main-content" data-rel="<?php echo e($photo->id); ?>"></div></div>'>
					<img src="<?php echo e(url('public/images/uploads/'.$photo->user_id.'/medium/'.$photo->image)); ?>"  alt="" class="img-responsive" style="width:100%;">
				</div>
			</div>
			<div class="user-panel mtop20">
				<div class="pull-left user-heading"><strong><?php echo e($photo->title); ?></strong></div>
				<div class="pull-right">
				<div class="inblk marginRt h4 grayColor"><i class="fa fa-eye pinkColor" aria-hidden="true"></i> <span id="<?php echo e('view_num_'.$photo->id); ?>"><?php echo e(Helpers::thousandsCurrencyFormat($photo->view_count)); ?></span></div>
				<div class="inblk h4 grayColor feed-love" data-rel="<?php echo e($photo->id); ?>"><a href="javascript:void(0)"><i class="fa fa-heart pinkColor" aria-hidden="true"></i></a> <span id="<?php echo e('love_num_'.$photo->id); ?>"><?php echo e(Helpers::thousandsCurrencyFormat($photo->love_count)); ?></span></div>
				</div>
				<div class="clearfix"></div>
				<div class="markText mtop10">
				   	<span class="pinkColor"><?php echo e($category_str); ?></span>
				</div>
				<div id="<?php echo e('comment_div_'.$photo->id); ?>">
					<?php  $cnt = 1;  ?> 
					<?php $__currentLoopData = $photo->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php 
						$delete_div = '';
              			if($value->user_id == \Auth::user()->id) $delete_div = '<div class="pull-right"><a href="javascript:void(0)" class="cmnt-del" data-rel="'.$value->id.'">'.trans('messages.utility.delete').'</a></div>';
					 ?>	
					<div class="mtop20" id="dv-cmnt-<?php echo e($value->id); ?>">
						<div class="use-img-feed media-photo-badge">
							<a href="#"><img alt="" class="img-responsive" src="<?php echo e($value->users->profile_src); ?>"></a>
						</div>
						<div class="comt">
		                    <div class="pull-left wd100">
		                        <div class="user-heading"><strong class="pinkColor"><a target="_blank" href="<?php echo e(url('profile/'.$value->users->id)); ?>"><?php echo e(ucfirst($value->users->name)); ?></a></strong>&nbsp;<span class="h5"><?php echo e($value->comment); ?></span></div>
		                        <div class="chonOption">
		                           <ul>
		                              <li><?php echo e(date('d F Y',strtotime($value->created_at))); ?><?php echo $delete_div; ?></li>
		                           </ul>
		                        </div>
		                    </div>
		                </div>  
					</div>
					<div class="clearfix"></div>
					
					<?php  
						if($cnt == 3 && count($photo->comments) != 3){
							echo "<div id='feed_comment_add_$photo->id'></div>";
							echo "<a class='comment_load_more' data-rel='".$photo->id."' href='javascript:void(0)'><h5 class='pinkColor' style='text-align:center;'>".trans('messages.utility.load_more')."</h5></a>";
							$fl = 1;
							break;
						}  $cnt++;
					 ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php if($fl == 0): ?>
						<div id="feed_comment_add_<?php echo e($photo->id); ?>"></div>
					<?php endif; ?>
				</div>
				<div class="mtop20">
					<div class="media-photo-badge picx">
						<a href="#"><img alt="" class="img-responsive" src="<?php echo e($photo->users->profile_src); ?>"></a>
					</div>
					<div class="picx-comt">
						<textarea class="feed-comment" data-rel="<?php echo e($photo->id); ?>" style="padding: 5px;background-color: #eee; border: 1px;border-radius: 0;width: 100%;" rows="1" placeholder="<?php echo e(trans('messages.utility.just_made_a_comment')); ?>"></textarea>
				   	</div>  
				</div> 
			</div>		  
			<div class="clearfix"></div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<div id="load-feed"></div>
		<div style="text-align:center;margin-bottom:10px;">
			<?php if($photos->count()): ?>
				<button id="load_more" class="btn btn-pinkbg"><?php echo e(trans('messages.utility.load_more')); ?></button>
			<?php endif; ?>
		</div>
		<input type="hidden" value="1" id="page_no">
	</div>
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		initilize();
	});

	$(document).ready(function(){
	    var $commentBoxSep = $('.photo-div');

	  	$commentBoxSep.lightGallery({
	      addClass: 'fb-comments',
	      download: false,
	      galleryId: 2
	  	}); 
	});
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
		    		$('#view_num_'+photo_id).html(result.view_count);
		    		map_initialize();
		    	}
		    },
		    error: function (request, error) {
		      
		    }
		});
	});

	$('#load_more').on('click', function(){
		//loader_start();
		var pg = $('#page_no').val();
		load_more(pg);
		$('#page_no').val(Number(pg)+Number(1));
		//loader_off();
	});

	function load_more(page){
		
		var dataURL = APP_URL+'/more_feeds';
		$.ajax({
		    url: dataURL,
		    data: {'page': page},
		    type: 'post',
		    async: false,
		    dataType: 'json',
		    success: function (result) {
		    	if(result.success && result.feed_count > 0){
		    		$('#load-feed').before(result.feeds);
		    		//$('#demo1').flexImages({rowHeight: 240});
		    		//comment_box_reset();
		    		var $commentBoxSep = $('.photo-div');

				  	$commentBoxSep.lightGallery({
				      addClass: 'fb-comments',
				      download: false,
				      galleryId: 2
				  	}); 
		    	}else if(result.photo_count == 0){
		    		$('#load_more').html('No More Photo Left');
		    	}
		    },
		    error: function (request, error) {
		      
		    }
		});
		
	}

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

	$(document).on('click', '.feed-love', function(event){
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

	$(document).on('click', '.comment_load_more', function(event){
		var dataURL = APP_URL+'/only-comment-feed';
		var photo_id = $(this).attr('data-rel');
		//console.log(photo_id);
		$.ajax({
		    url: dataURL,
		    data: {'photo_id': photo_id},
		    type: 'post',
		    async: false,
		    dataType: 'json',
		    success: function (result) {
		    	if(result.success){
		    		$('#comment_div_'+photo_id).html(result.comments);
		    	}else{
		    		//modal_show();
		    	}
		    },
		    error: function (request, error) {
		      
		    }
		});
	});

	$(document).on('keypress', '.feed-comment', function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);

	    if(keycode == '13'){
	    	event.preventDefault();
	    	var dataURL = APP_URL+'/save_comment_feed';
	    	var photo_id = $(this).attr('data-rel');
	        var comment = $(this).val();
	        var obj = $(this);
	     
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
			    		$('#feed_comment_add_'+photo_id).before(res.result);
			    		obj.val('');
			    	}
			    },
			    error: function (request, error) {
			      
			    }
			});  
	    }
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

	function initilize(){
		$('#page_no').val(1);
	}

	$(document).on('click', '.cmnt-del', function(){
		var dataURL = APP_URL+'/delete-comment';
		var id = $(this).attr('data-rel');
		$.ajax({
		    url: dataURL,
		    data: {'id': id},
		    type: 'post',
		    async: false,
		    dataType: 'json',
		    success: function (result) {
		    	if(result.success){
		    		$('#dv-cmnt-'+id).hide();
		    	}else if(result.photo_count == 0){
		    		//$('#load_more').hide();
		    		//$('#load_more').html('No More Photo Left');
		    	}
		    },
		    error: function (request, error) {
		      
		    }
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>