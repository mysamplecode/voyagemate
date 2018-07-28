  <script type="text/javascript">
    var APP_URL = "<?php echo e(url('/')); ?>";
    var USER_ID = "<?php echo e(@Auth::user()->id); ?>";
  </script>
  <script src="<?php echo e(url('public/front/js/jquery.js')); ?>"></script>
  <?php echo @$head_code; ?>

  <script src="<?php echo e(url('public/front/js/bootstrap.js')); ?>"></script>
  
  <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=<?php echo e(@$map_key); ?>&libraries=places&callback=initMap' async defer></script>

  <!-- <script src="<?php echo e(url('public/front/js/locationpicker.jquery.min.js')); ?>"></script> -->
  <script src="<?php echo e(url('public/front/js/jquery-ui.js')); ?>"></script>
  <script src="<?php echo e(url('public/front/js/jquery-ui-timepicker-addon.js')); ?>"></script>

  <script src="<?php echo e(url('public/front/js/bootbox.min.js')); ?>"></script>
  <script src="<?php echo e(url('public/front/js/front.js')); ?>"></script>
  <?php if(Route::current()->uri() == 'reservation/change' || Route::current()->uri() == 'reservation/{id}'): ?>
    <script src="<?php echo e(url('public/front/js/front.js')); ?>"></script>
  <?php endif; ?>
  <script src="<?php echo e(url('public/front/js/jquery.sidr.js')); ?>"></script>
  <?php if(Route::current()->uri() == 'payments/stripe'): ?>
    <script src="https://js.stripe.com/v3/"></script>
  <?php endif; ?>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.menubar-toggle').sidr({
        displace: false
      });
      $('.date').datetimepicker({
        timeFormat: "hh:mm tt"
      });
    });

    function closeNav(){
      $.sidr('close', 'sidr');
    }
  </script>
  <?php echo $__env->yieldPushContent('scripts'); ?>
  
  <script src="<?php echo e(url('public/front/js/ninja/ninja-slider.js')); ?>"></script>
  <script src="<?php echo e(url('public/front/js/bootstrap-slider.js')); ?>"></script>
  <script src="<?php echo e(url('public/front/js/selectFx.js')); ?>"></script>
  <script src="<?php echo e(url('public/front/js/admin.js')); ?>"></script>
  

 </body>
</html>