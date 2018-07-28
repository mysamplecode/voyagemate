<?php $__env->startSection('main'); ?>
	
	<?php 
		if(\Auth::user()->banner_image == '')
			$img_path = 'public/front/img/feed.jpg';
		else
			$img_path = 'public/images/profile/'.\Auth::user()->id.'/'.\Auth::user()->banner_image;
	 ?>
	<div class="provater-images mouse-show" data-rel="banner-button" style="background: url(<?php echo e($img_path); ?>) 50% 50% no-repeat;background-size: cover;">
	  	<div class="container">
	  		<div class="text-center" >
			 	<a href="<?php echo e(url('profile-uploads/banner')); ?>">
			 		<div id="banner-button" class="fixDiv mouse-hide"><i class="fa fa-camera" aria-hidden="true"></i> &nbsp; <?php echo e(trans('messages.utility.upload_photo')); ?></div>
				</a>
			</div>
		  	<div class="banner-buttons">
		     	<!--<a href="#"> <div class="envelopbox"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></div></a>
	        	<button class="btn btn-pinkbg">Follow</button>-->
	        </div>
	    </div>	
	</div>
	
	<div class="avater mouse-show" data-rel="avatar-button">
	  <div class="profile-avater" >
	  	<div class="text-center" >
		 	<a href="<?php echo e(url('profile-uploads/profile')); ?>">
		 		<div id="avatar-button" class="fixDiv-avater mouse-hide"><i class="fa fa-camera" aria-hidden="true"></i></div>
			</a>
		</div>
	    <img src="<?php echo e(Auth::user()->profile_src); ?>" alt="" class="img-responsive">
	  </div>
	</div>
    <div class="container mtop20">
	  <div class="avater-heading text-center"><?php echo e(ucfirst(Auth::user()->name)); ?></div>
	    <div class="pro-bar">
			  <div class="pro-bar-menu">
			    <ul class="nav navbar-nav">
				   <li><a class="photo_page" data-rel="profile" href="javascript:void(0)"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a></li>
				   <li><a class="photo_page" data-rel="shop" href="javascript:void(0)"><?php echo e(trans('messages.profile.shop')); ?><br><span class="pro-bar-menuOdd"><?php echo e(Helpers::thousandsCurrencyFormat(\Auth::user()->photos->where('sell_photo', 'Yes')->count())); ?></span></a></li>
				   <li><a class="photo_page" data-rel="all_photos" href="javascript:void(0)"><?php echo e(trans('messages.profile.all_photos')); ?><br><span class="pro-bar-menuOdd"><?php echo e(Helpers::thousandsCurrencyFormat(\Auth::user()->photos->count())); ?></span></a></li>
				   <li><a class="photo_page" data-rel="followers" href="javascript:void(0)"><?php echo e(trans('messages.profile.followers')); ?><br><span class="pro-bar-menuOdd"><?php echo e(Helpers::thousandsCurrencyFormat(\Auth::user()->follower->count())); ?></span></a></li>
				   <li><a class="photo_page" data-rel="following" href="javascript:void(0)"><?php echo e(trans('messages.profile.following')); ?><br><span class="pro-bar-menuOdd"><?php echo e(Helpers::thousandsCurrencyFormat(\Auth::user()->following->count())); ?></span></a></li>
				   <li><a class="photo_page" data-rel="loved_photos" href="javascript:void(0)"><?php echo e(trans('messages.profile.loved_photos')); ?><br><span class="pro-bar-menuOdd"><?php echo e(Helpers::thousandsCurrencyFormat(\Auth::user()->user_love->count())); ?></span></a></li>
				</ul>
		   </div>
		  </div>
		  
		 <div class="morebar mtop20">
			<div class="morebar-menu">
			    <ul class="navbar-nav">
			    	<!--<i class="fa fa-map-marker" aria-hidden="true"></i> Český Krumlov, Jihočeský kraj, Czech Republic . -->
				   <li><?php echo isset($user_details['location'])?'<i class="fa fa-map-marker" aria-hidden="true"></i> '.$user_details['location']:''; ?> . <?php echo e(\Auth::user()->photos->sum('view_count')); ?> <?php echo e(trans('messages.profile.photo_views')); ?> . <?php echo e(trans('messages.profile.joined')); ?> <?php echo e(date('M Y',strtotime(\Auth::user()->created_at))); ?></li>
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
					<button id="load_profile" data-rel="load_profile_photo" class="btn btn-pinkbg <?php echo e($photos->count() == 20?'':'hide'); ?>"><?php echo e(trans('messages.utility.load_more')); ?></button>
				</div>
				<input type="hidden" value="" id="type">
				<input type="hidden" value="" id="page_no">
			</div>  
	</div>
	
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
var PH_COUNT = "<?php echo e($photos->count()); ?>";
</script>
<script src="<?php echo e(url('public/front/js/photo.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>