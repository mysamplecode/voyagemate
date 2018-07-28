<?php $__env->startSection('main'); ?>
<div class="container margin-top30 mb30">
  <div class="col-lg-12">
    <?php if($booking_details->status == 'Pending'): ?>
    <h2><?php echo e(trans('messages.booking_request.request_has_sent')); ?></h2>
    <p><?php echo e(trans('messages.booking_request.not_a_confirmed_booking')); ?> <?php echo e(trans('messages.booking_request.hear_back_within_24')); ?> <?php echo e(trans('messages.booking_request.not_be_charged')); ?> <?php echo e($booking_details->properties->users->first_name); ?> <?php echo e(trans('messages.booking_request.accommodate_stay')); ?>.</p>
    <?php endif; ?>
    <?php if($booking_details->status == 'Accepted'): ?>
    <h2><?php echo e(trans('messages.booking_request.get_ready')); ?> <?php echo e($booking_details->properties->property_address->city); ?>!</h2>
    <p><?php echo e(trans('messages.booking_request.confirmed_booking')); ?> <?php echo e($booking_details->properties->users->first_name); ?>. <?php echo e(trans('messages.booking_request.emailed_itinerary')); ?> <?php echo e($booking_details->properties->email); ?>.</p>
    <?php endif; ?>
  </div>
  
  <!--<div class="col-md-6 col-sm-6 col-xs-12 mb10 ">
    <div>
      <h3>Email your itinerary to anyone</h3>
      <?php if($booking_details->status == 'Pending'): ?>
        <p>If the host confirms, we’ll send over the trip details. Don’t worry, we won’t spam your friends.</p>
      <?php endif; ?>   
    </div>
    <form autocomplete="off" method="post" action="<?php echo e(url('booking/itinerary_friends')); ?>">
      <div class="form-group">
        <input type="email" name="friend[]" class="form-control" id="exampleInputEmail1" placeholder="Email">
      </div>
      <div class="form-group">
        <input type="email" name="friend[]" class="form-control" id="exampleInputPassword1" placeholder="Email">
      </div>
      <div id="add-email-field"></div>
      <div class="form-group">
        <p class="help-block"><a href="#" id="request-add-email"><strong>Add another</strong></a></p>
      </div>
      <button type="submit" class="btn ex-btn">Continue</button>
    </form>
  </div>-->
  
  <div class="col-md-6 col-sm-6 col-xs-12 mb10">
    <a href="<?php echo e(url('/')); ?>/properties/<?php echo e($booking_details->property_id); ?>" class="">
      <img style="margin-left:8%;width:350px;" src="<?php echo e($booking_details->properties->cover_photo); ?>" class="img-responsive" alt="">
    </a>
    <div class="row margin-top50 mb25">
      <div class="col-md-4 text-center">
        <div class="media-photo-badgeSm">
          <a href="" ><img alt="User Profile Image" class="" src="<?php echo e($booking_details->properties->users->profile_src); ?>"></a>
          <p><strong><?php echo e($booking_details->properties->users->first_name); ?></strong></p>
        </div>
      </div>
      <div class="col-md-8">
        <p class="h4"><a style="color:black;" href="<?php echo e(url('/')); ?>/properties/<?php echo e($booking_details->property_id); ?>"><?php echo e($booking_details->properties->name); ?></a></p> 
        <p class="h5"><strong><?php echo e($booking_details->dates); ?></strong></p>  
        <?php if($booking_details->status == 'Accepted'): ?>
         <p><span><?php echo e($booking_details->properties->property_address->address_line_1); ?></span><span><?php echo e($booking_details->properties->property_address->city); ?>, <?php echo e($booking_details->properties->property_address->state); ?> <?php echo e($booking_details->properties->property_address->postal_code); ?></span></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $('#request-add-email').on('click', function(){
    var content = '<div class="form-group">'
        +'<input type="email" name="friend[]" class="form-control" id="exampleInputPassword1" placeholder="Email">'
        +'</div>';
    $(content).insertBefore('#add-email-field');
  });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>