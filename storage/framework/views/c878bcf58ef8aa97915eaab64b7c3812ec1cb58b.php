 
<?php $__env->startSection('main'); ?>
<div class="container margin-top30 mb30">
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
        <input type="hidden" name="property_id" value="<?php echo e($messages[0]->bookings->property_id); ?>">
        <input type="hidden" name="start_date" value="<?php echo e($messages[0]->bookings->start_date); ?>">
        <input type="hidden" name="end_date" value="<?php echo e($messages[0]->bookings->end_date); ?>">
        <input type="hidden" name="price" value="<?php echo e($messages[0]->bookings->total); ?>">
        <textarea rows="3" placeholder="" class="form-control" id="message_text" name="message"></textarea>
        <span style="float:right;"><input type="submit" class="btn ex-btn navbar-btn topbar-btn" id="reply_message" value="<?php echo e(trans('messages.booking_my.send_message')); ?>"></span>
      </form>
      <?php if($errors->has('message')): ?> <p class="error-tag"><?php echo e($errors->first('message')); ?></p> <?php endif; ?>
      <div class="clearfix"></div>
    </div>
  
    <div id="message-list">
      <?php for($i=0; $i<count($messages); $i++): ?>
        <?php if(@$messages[$i]->sender_id == Auth::user()->id): ?>
          <div class="col-lg-12 row">
            <div class="col-md-2 col-sm-2 col-xs-3">
              <div class="media-photo-badgeSMS text-center">
                <a href="<?php echo e(url('/')); ?>/users/show/<?php echo e($messages[$i]->bookings->host_id); ?>" ><img class="" src="<?php echo e($messages[$i]->bookings->properties->users->profile_src); ?>"></a>
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
        <?php if($messages[$i]->sender_id != Auth::user()->id): ?>
          <?php if($messages[$i]->type_id == 4): ?>
            <div class="col-lg-12 row">
              <div class="col-md-10 col-sm-10 col-xs-9">
                <div class="dialogbox">
                  <div class="body">
                    <div class="h5">
                      <?php echo e(trans('messages.message.inquiry_about')); ?> <a locale="en" data-popup="true" href="<?php echo e(url('/')); ?>/properties/<?php echo e($messages[$i]->bookings->property_id); ?>"><?php echo e(@$messages[$i]->bookings->properties->name); ?></a>
                    </div>
                    <p class="text-muted">
                      <?php echo e(@$messages[$i]->bookings->date_range); ?>

                      ·
                      <?php echo e(@$messages[$i]->bookings->guest); ?> <?php echo e(trans('messages.header.guest')); ?><?php echo e((@$messages[$i]->bookings->guest > 1) ? 's' : ''); ?>

                      <br>
                      <?php echo e(trans('messages.message.you_will_get')); ?> <?php echo e($messages[$i]->bookings->currency->symbol.$messages[$i]->bookings->host_payout); ?> <?php echo e($messages[$i]->bookings->currency->code); ?>

                    </p>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
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
               <a href="<?php echo e(url('/')); ?>/users/show/<?php echo e($messages[$i]->bookings->user_id); ?>" ><img src="<?php echo e($messages[$i]->bookings->users->profile_src); ?>"></a>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endfor; ?>
    </div>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default row-space-4">
      <div class="mini-profile va-container media panel-body row">
        <div class="va-top pull-left">
          <a class="media-photo" href="<?php echo e(url('/')); ?>/users/show/<?php echo e($messages[0]->bookings->user_id); ?>">
            <img width="100" height="100" alt="<?php echo e($messages[0]->bookings->users->first_name); ?>" src="<?php echo e($messages[0]->bookings->users->profile_src); ?>">
          </a>
        </div>

        <div class="va-middle">
          <div class="h4">
            <a class="text-normal" href="<?php echo e(url('/')); ?>/users/show/<?php echo e($messages[0]->bookings->user_id); ?>"><?php echo e($messages[0]->bookings->users->first_name); ?></a>
              &nbsp;<!-- <i data-tooltip-sticky="true" data-tooltip-position="bottom" data-tooltip-el="#verifications-tooltip" class="icon icon-verified-id icon-lima" id="verified-id-icon"></i> -->
              <br>
            <small>
              <?php echo e(trans('messages.booking_detail.member_since')); ?> <?php echo e(date('Y',strtotime($messages[0]->bookings->users->created_at))); ?>

            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->startPush('scripts'); ?>
  <script type="text/javascript">
    /*$('#host-message-form').on('submit', function(e){
      e.preventDefault();
    });*/
  </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>