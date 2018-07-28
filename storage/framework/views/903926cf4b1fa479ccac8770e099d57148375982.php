<script type="text/javascript">
	var APP_URL = "<?php echo e(url('/')); ?>";
	var USER_ID = "<?php echo e(@Auth::user()->id); ?>";
</script>
<script src="<?php echo e(url('public/front/plugin/light-gallary/js/lightgallery.js')); ?>"></script>
<script src="<?php echo e(url('public/front/plugin/light-gallary/js/lg-hash.js')); ?>"></script>
<script src="<?php echo e(url('public/front/js/jquery.flex-images.js')); ?>"></script>
<script src="<?php echo e(url('public/front/js/jquery.flex-images.js')); ?>"></script>
<script src="<?php echo e(url('public/front/js/front.js')); ?>"></script>
<script src="<?php echo e(url('public/front/js/select2.js')); ?>"></script>
<?php if(Route::current()->uri() == '/' || Route::current()->uri() == 'newest' || Route::current()->uri() == 'photo-details/{id}' || Route::current()->uri() == 'photo/single/{id}' || Route::current()->uri() == 'search/{word}' || Route::current()->uri() == 'dashboard' || Route::current()->uri() == 'profile'|| Route::current()->uri() == 'profile/{id}' ): ?>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=<?php echo e($map_key); ?>&sensor=false&libraries=places'></script>
<script src="<?php echo e(url('public/front/js/locationpicker.jquery.min.js')); ?>"></script>
<?php endif; ?>

<script type="text/javascript">	
	$(window).resize(function () 
	{
		if( $(window).width() <=767 ){
			$('.mx-pod').css('margin-left','6px');
		}else{
			$('.mx-pod').css('margin-left','0px');
		}
	});
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>