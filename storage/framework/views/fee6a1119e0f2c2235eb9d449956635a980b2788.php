<?php $__env->startSection('main'); ?>
<div class="filter-bar">
	<div class="filter-bar-menu">
	    <ul class="nav navbar-nav">
		   <li><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('messages.header.best_photos')); ?></a></li>
		   <li><a class="active1" href="<?php echo e(url('newest')); ?>"><?php echo e(trans('messages.header.newest_photos')); ?></a></li>
		</ul>
   </div>
</div>
		  
<div class="filter-set">
  	<div class="filter-bar__form__filtering">
	  	<label class="hide-f"><?php echo e(trans('messages.header.filter')); ?> :</label>
	  	<div class="filter-bar__form__toggle-wrapper">
		  	<div class="radio-wrapper">
			  	<a href="#" class="photo-sale" data-rel="all_photo" data-page="load_newest" ><div id="all_photo" class="hide-f pinkColor"><strong><?php echo e(trans('messages.header.all_photos')); ?></strong></div></a>
			  	<a href="#" class="photo-sale" data-rel="sale_photo" data-page="load_newest" ><div id="sale_photo" class="hide-f"><strong><?php echo e(trans('messages.header.for_sale')); ?></strong></div></a>
			  	<div class="clearfix"></div>
			</div>
		</div>
	  	<label for="Categories" class="hide-mobile">+</label>
	  	<div class="filter-bar__form__select-wrapper">
		  	<select id="categories" data-rel="load_newest" name="tags" class="form-control">
			  <option value="0" ><?php echo e(trans('messages.header.all_categories')); ?></option>\
			  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  	<option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  	</select>
		</div>
	</div>
</div>
			  
<div class="">  
	<div class="mb20 gallery-wp mtop10 pg-mn-height300">
		<div id="preloader"></div>
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
	</div>
	<div style="text-align:center;margin-bottom:10px;">
		<?php if($photos->count() == 20): ?>
			<button id="load_more" data-rel="load_newest" class="btn btn-pinkbg <?php echo e($photos->count() == 20?'':'hide'); ?>"><?php echo e(trans('messages.utility.load_more')); ?></button>
		<?php endif; ?>
	</div>
	<input type="hidden" value="" id="sell_photo_value">
	<input type="hidden" value="" id="page_no">
</div>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
var PH_COUNT = "<?php echo e($photos->count()); ?>";
</script>
<script src="<?php echo e(url('public/front/js/photo.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>