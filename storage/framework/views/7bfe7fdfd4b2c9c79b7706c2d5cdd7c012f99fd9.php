 
<?php $__env->startSection('main'); ?>
<div class="container margin-top30 mb30">
  <div class="col-md-3 col-sm-3 col-xs-12">
    <?php if($messages[0]->bookings->status == 'Accepted'): ?>
    <p class="padding-top20 padding-bottom20 text-justify h6">
      <span class="text-left col-sm-4"><?php echo e(trans('messages.login.email')); ?></span>
      <span class="text-right col-sm-8"><?php echo e($messages[0]->bookings->properties->users->email); ?></span>
    </p>
    <div class="clearfix"></div>
    <?php endif; ?>
    <hr/>
    <h4 class="text-center"><?php echo e($messages[0]->bookings->properties->name); ?></h4>
    <div class="col-lg-12 row margin-top20">
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="h6"><strong><?php echo e(trans('messages.booking_detail.check_in')); ?></strong></div>
        <div class="h5"><?php echo e(date('d/m/y', strtotime($messages[0]->bookings->start_date))); ?></div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="h6"><strong><?php echo e(trans('messages.booking_detail.check_out')); ?></strong></div>
        <div class="h5"><?php echo e(date('d/m/y', strtotime($messages[0]->bookings->end_date))); ?></div>
      </div>
      <!--<div class="col-md-6 col-sm-6 col-xs-6">
        <p class="h5"><strong>1</strong> <br> night</p>
      </div>-->
      <div class="col-md-6 col-sm-6 col-xs-6">
        <p class="h5"><strong><?php echo e($messages[0]->bookings->guest); ?></strong> <br> <?php echo e(trans('messages.home.guest')); ?><?php echo e((@$messages[$i]->bookings->guest > 1) ? 's' : ''); ?></p>
      </div>
    </div>
    <div class="clearfix"></div>
    <hr/>
    <div class="col-lg-12 mb20">
      <h5><strong><?php echo e(trans('messages.payment.payment')); ?></strong></h5>
    </div>
    <p class="margin-top10 text-justify h6">
      <span class="text-left col-sm-6"><?php echo e($messages[0]->bookings->currency->symbol.$messages[0]->bookings->per_night); ?> x <?php echo e($messages[0]->bookings->total_night); ?> <?php echo e(trans('messages.property_single.night')); ?> </span>
      <span class="text-right col-sm-6"><?php echo e($messages[0]->bookings->currency->symbol.$messages[0]->bookings->per_night*$messages[0]->bookings->total_night); ?></span>
    </p>
    <div class="clearfix"></div>
    <?php if($messages[0]->bookings->guest_charge != 0): ?>
    <p class="margin-top10 text-justify h6">
      <span class="text-left col-sm-6"><?php echo e(trans('messages.property_single.addtional_guest_fee')); ?></span>
      <span class="text-right col-sm-6"><?php echo e($messages[0]->bookings->currency->symbol.$messages[0]->bookings->guest_charge); ?></span>
    </p>
    <div class="clearfix"></div>
    <?php endif; ?>
    <?php if($messages[0]->bookings->cleaning_charge != 0): ?>
    <p class="margin-top10 text-justify h6">
      <span class="text-left col-sm-6"><?php echo e(trans('messages.property_single.cleaning_fee')); ?></span>
      <span class="text-right col-sm-6"><?php echo e($messages[0]->bookings->currency->symbol.$messages[0]->bookings->cleaning_charge); ?></span>
    </p>
    <div class="clearfix"></div>
    <?php endif; ?>
    <?php if($messages[0]->bookings->security_money != 0): ?>
    <p class="margin-top10 text-justify h6">
      <span class="text-left col-sm-6"><?php echo e(trans('messages.property_single.security_fee')); ?></span>
      <span class="text-right col-sm-6"><?php echo e($messages[0]->bookings->currency->symbol.$messages[0]->bookings->security_money); ?></span>
    </p>
    <div class="clearfix"></div>
    <?php endif; ?>
    <p class="margin-top10 text-justify h6">
      <span class="text-left col-sm-6"><?php echo e(trans('messages.property_single.service_fee')); ?></span>
      <span class="text-right col-sm-6"><?php echo e($messages[0]->bookings->currency->symbol.$messages[0]->bookings->service_charge); ?></span>
    </p>
    <div class="clearfix"></div>
    <p class="margin-top10 text-justify h6"><span class="text-left col-sm-6"><?php echo e(trans('messages.property_single.total')); ?></span><span class="text-right col-sm-6"><?php echo e($messages[0]->bookings->currency->symbol.$messages[0]->bookings->total); ?></span></p>
  </div>
  <div class="col-md-9 col-sm-9 col-xs-12">
    <?php if($messages[0]->type_id == 4): ?>
    <div class="dialogbox text-center">
      <div class="body">
        <div class="message padding-top10 padding-bottom10">
          <h4><?php echo e(trans('messages.message.request_sent')); ?></h4>
          <h5><?php echo e(trans('messages.message.booking_is_not_confirmed')); ?></5>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if($messages[0]->type_id == 5): ?>
    <div class="dialogbox text-center">
      <div class="body">
        <div class="message padding-top10 padding-bottom10">
          <h4><?php echo e(trans('messages.message.booking_confirmed_place')); ?> <?php echo e($messages[0]->bookings->properties->property_address->city); ?>, <?php echo e($messages[0]->bookings->properties->property_address->country_name); ?></h4>
          <h5><a href="<?php echo e(url('/')); ?>/booking/itinerary_friends?code=<?php echo e($messages[0]->bookings->code); ?>"><?php echo e(trans('messages.message.view_itinerary')); ?></a></h5>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if($messages[0]->type_id == 6): ?>
    <div class="dialogbox text-center">
      <div class="body">
        <div class="message padding-top10 padding-bottom10">
          <h4><?php echo e(trans('messages.message.request_declined')); ?></h4>
          <h5><?php echo e(trans('messages.message.more_places_available')); ?></h5>
          <span><a href="<?php echo e(url('/')); ?>/search?location=<?php echo e($messages[0]->bookings->properties->property_address->city); ?>" class="btn ex-btn navbar-btn topbar-btn"><?php echo e(trans('messages.message.keep_searching')); ?></a></span>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <div class="col-lg-12 row" style="margin-left:0px;">
      <form action="<?php echo e(url('/')); ?>/inbox/reply/<?php echo e($messages[0]->booking_id); ?>" method="post">
        <input type="hidden" value="<?php echo e($messages[0]->booking_id); ?>" name="booking_id">
        <textarea rows="3" placeholder="" class="form-control" name="message"></textarea>
        <span style="float:right;"><button type="submit" class="btn ex-btn navbar-btn topbar-btn"><?php echo e(trans('messages.booking_my.send_message')); ?></button></span>
      </form>
      <div class="clearfix"></div>
    </div>
    <div id="message-list">
      <?php for($i=0; $i<count($messages); $i++): ?>
        
        <?php if($messages[$i]->type_id == 5): ?>
          <div class="col-md-12 text-center">
            <span class="message-info">
              <span>
                <span><?php echo e(trans('messages.message.request_sent')); ?> </span>
                <span><?php echo e($messages[$i]->created_time); ?></span>
              </span>
            </span>
          </div>
        <?php endif; ?>
        <?php if($messages[$i]->type_id == 6): ?>
          <div class="col-md-12 text-center">
            <span class="message-info">
              <span>
                <span><?php echo e(trans('messages.message.booking_declined')); ?> </span>
                <span><?php echo e($messages[$i]->created_time); ?></span>
              </span>
            </span>
          </div>
        <?php endif; ?>
        <?php if($messages[$i]->type_id == 7): ?>
          <div class="col-md-12 text-center">
            <span class="message-info">
              <span>
                <span><?php echo e(trans('messages.message.booking_expired')); ?> </span>
                <span><?php echo e($messages[$i]->created_time); ?></span>
              </span>
            </span>
          </div>
        <?php endif; ?>
        <?php if($messages[$i]->sender_id != Auth::user()->id && $messages[$i]->message != ''): ?>
          <div class="col-lg-12 row">
            <div class="col-md-2 col-sm-2 col-xs-3">
              <div class="media-photo-badgeSMS text-center">
                <a href="#" ><img class="" src="<?php echo e($messages[$i]->sender->profile_src); ?>"></a>
              </div>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-9">
              <div class="dialogbox">
                <div class="body">
                  <span class="tip tip-left"></span>
                  <div class="message">
                    <span><?php echo e($messages[$i]->message); ?></span><br/>
                    <span><?php echo e($messages[$i]->created_time); ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if($messages[$i]->sender_id == Auth::user()->id): ?>
        <div class="col-lg-12 row">
          <div class="col-md-10 col-sm-10 col-xs-9">
            <div class="dialogbox">
              <div class="body">
                <span class="tip tip-right"></span>
                <div class="message">
                  <span><?php echo e($messages[$i]->message); ?></span><br/>
                  <span><?php echo e($messages[$i]->created_time); ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-3">
            <div class="media-photo-badgeSMS text-center">
             <a href="#" ><img src="<?php echo e(Auth::user()->profile_src); ?>"></a>
            </div>
          </div>
        </div>
        <?php endif; ?>
      <?php endfor; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>