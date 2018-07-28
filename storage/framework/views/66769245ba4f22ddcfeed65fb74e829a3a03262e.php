<?php $__env->startSection('main'); ?>
<div class="container margin-top30">
  <div class="col-md-3">
      <div class="panel panel-default">
          <div class="panel-footer">
              <div class="panel">
              <?php echo $__env->make('common.sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-9">
    <div class="panel panel-default">
      <div class="panel-body rc-body">
        <?php echo e(trans('messages.booking_detail.request_reservation')); ?>

        <?php if($result->status == 'Pending'): ?>
        <div class="pull-right">
          <span class="label label-info">
            <i class="fa fa-clock-o"></i>
            <?php echo e(trans('messages.booking_detail.expire_in')); ?>

            <span class="countdown_timer hasCountdown"><span class="countdown_row countdown_amount" id="countdown_1"></span></span>
          </span>
        </div>
        <?php endif; ?>
      </div>
      <div class="panel-footer">
        <div class="table-responsive margin-top20">
          <table class="table table-bordered">
            <tr>
              <td class=""><?php echo e(trans('messages.booking_detail.property')); ?></td>
              <td class="">
                <?php echo e($result->properties->name); ?>

                <a href="<?php echo e(url('/')); ?>/properties/<?php echo e($result->property_id); ?>" class="pull-right" data-popup="true"><?php echo e(trans('messages.booking_detail.view_property')); ?></a>
              </td>
            </tr>
            <tr>
              <td class=""><?php echo e(trans('messages.booking_detail.check_in')); ?></td>
              <td class="">
                <?php echo e($result->startdate_dmy); ?>

                <!--<a href="<?php echo e(url('/')); ?>/manage-listing/<?php echo e($result->property_id); ?>/calendar" class="pull-right" data-popup="true"><?php echo e(trans('messages.booking_detail.view_calender')); ?></a>-->
              </td>
            </tr>
            <tr>
              <td class=""><?php echo e(trans('messages.booking_detail.check_out')); ?></td>
              <td class=""><?php echo e($result->enddate_dmy); ?></td>
            </tr>
            <tr>
              <td><?php echo e(trans('messages.booking_detail.night')); ?></td>
              <td><?php echo e($result->total_night); ?></td>
            </tr>
            <tr>
              <td><?php echo e(trans('messages.booking_detail.guest')); ?></td>
              <td><?php echo e($result->guest); ?></td>
            </tr>
            <tr>
              <td>
                 <?php echo e(trans('messages.booking_detail.rate_per_night')); ?> 
              </td>
              <td><?php echo e($result->currency->symbol); ?><?php echo e($result->per_night); ?></td>
            </tr>
            <?php if($result->cleaning_charge != 0): ?>
            <tr>
              <td><?php echo e(trans('messages.booking_detail.cleanning_fee')); ?></td>
              <td><?php echo e($result->currency->symbol); ?><?php echo e($result->cleaning_charge); ?></td>
            </tr>
            <?php endif; ?>
            <?php if($result->guest_charge != 0): ?>
            <tr>
              <td><?php echo e(trans('messages.booking_detail.additional_guest_fee')); ?></td>
              <td><?php echo e($result->currency->symbol); ?><?php echo e($result->guest_charge); ?></td>
            </tr>
            <?php endif; ?>
            <?php if($result->security_money != 0): ?>
            <tr>
              <td><?php echo e(trans('messages.booking_detail.security_fee')); ?></td>
              <td><?php echo e($result->currency->symbol); ?><?php echo e($result->security_money); ?></td>
            </tr>
            <?php endif; ?>
            <tr>
              <td><?php echo e(trans('messages.booking_detail.subtotal')); ?></td>
              <td><?php echo e($result->currency->symbol); ?><?php echo e($result->base_price); ?></td>
            </tr>
            <?php if($result->host_fee): ?>
            <tr>
              <td>
                    <?php echo e(trans('messages.booking_detail.host_fee')); ?>

                    <i class="icon icon-question icon-question-sign" data-behavior="tooltip" rel="tooltip" style="font-size: " aria-label="Vrent charges a fee to cover the cost (banking fees) of processing payment from the traveler."></i>
              </td>
              <td><?php echo e($result->currency->symbol); ?><?php echo e($result->host_fee); ?></td>
            </tr>
            <?php endif; ?>
            <tr id="total">
              <td><?php echo e(trans('messages.booking_detail.total_payout')); ?></td>
              <td><strong><?php echo e($result->currency->symbol); ?><?php echo e($result->host_payout); ?></strong></td>
            </tr>
          </table>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="panel panel-default rc-panel">
      <div class="panel-body rc-body"><?php echo e(trans('messages.booking_detail.about_the_guest')); ?></div>
      <div class="panel-footer">
        <div class="col-lg-12 row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="media-photo-badge text-center">
               <a href="<?php echo e(url('/')); ?>/users/show/<?php echo e($result->users->id); ?>" ><img alt="<?php echo e($result->users->first_name); ?>" class="" src="<?php echo e($result->users->profile_src); ?>" title="<?php echo e($result->users->first_name); ?>"></a>
            </div>
            <div class="margin-top40 rc-txt"><strong><a href="<?php echo e(url('/')); ?>/users/show/<?php echo e($result->users->id); ?>" class="verification_user_name"><?php echo e($result->users->first_name); ?></a></strong></div>
            <h6><?php echo e(trans('messages.booking_detail.member_since')); ?> <?php echo e($result->users->account_since); ?></h6>
            <?php if($result->users->age): ?>
            <div class="margin-top40">
              <h6><strong><?php echo e(trans('messages.booking_detail.age')); ?></strong></h6>
              <p><?php echo e($result->users->age); ?></p>
            </div>
            <?php endif; ?>
          
          </div>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="dialogbox">
            <div class="body">
              <span class="tip tip-left"></span>
              <div class="message">
                <span><?php echo e($result->messages[0]->message); ?></span>
                <a href="<?php echo e(url('/')); ?>/messaging/qt_with/<?php echo e($booking_id); ?>" class="view_message_history_link" target="_blank"><?php echo e(trans('messages.booking_detail.view_mess_history')); ?></a>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <?php if($result->status == 'Pending'): ?>
    <div class="panel panel-default">
      <div class="panel-body rc-body">
        <?php echo e(trans('messages.booking_detail.accept_request')); ?>

        <div class="pull-right">
          <span class="label label-info">
            <i class="fa fa-clock-o"></i>
            <?php echo e(trans('messages.booking_detail.expire_in')); ?>

            <span class="countdown_timer hasCountdown"><span class="countdown_row countdown_amount" id="countdown_2"></span></span>
          </span>
        </div>
      </div>
      <div class="panel-footer">
        <p>
          <?php echo e(trans('messages.booking_detail.expire_in_data')); ?>

        </p>
        <button class="js-host-action btn btn-large ex-btn" id="accept-modal-trigger">
          <?php echo e(trans('messages.booking_detail.accept')); ?>

        </button>
        <button class="js-host-action btn btn-large btn-primary" id="decline-modal-trigger">
          <?php echo e(trans('messages.booking_detail.decline')); ?>

        </button>
        <!--<button class="js-host-action btn btn-large btn-primary" id="discuss-modal-trigger">
          Discuss
        </button>-->
      </div>
    </div>
    <?php else: ?>
    <div class="panel panel-default rc-panel">
      <div class="panel-body rc-body text-center text-success"><?php echo e($result->status); ?></div>
    </div>
    <?php endif; ?>
  </div>
</div>

<div class="modal" id="accept-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo e(trans('messages.booking_detail.accept_this_request')); ?></h4>
      </div>
      <form accept-charset="UTF-8" action="<?php echo e(url('booking/accept/'.$booking_id)); ?>" id="accept_reservation_form" method="post" name="accept_reservation_form">
        <div class="modal-body">
          <label for="cancel_message" class="row-space-top-2">
            <?php echo e(trans('messages.booking_detail.optional_message_request')); ?>

          </label>
          <textarea class="form-control" cols="40" id="accept_message" name="message" rows="10"></textarea>
          <div class="col-md-12">
            <div class="col-md-1">
              <input id="tos_confirm" name="tos_confirm" type="checkbox" value="1">
            </div>
            <div class="col-md-11">
              <label class="label-inline" for="tos_confirm"><?php echo e(trans('messages.booking_detail.check_box_agree')); ?> <br><a href="<?php echo e(url('/')); ?>/host_guarantee" target="_blank"><?php echo e(trans('messages.booking_detail.guarantee_term_condition')); ?></a> <br><a href="<?php echo e(url('/')); ?>/guest_refund" target="_blank"><?php echo e(trans('messages.booking_detail.refund_policy_term')); ?></a>, <?php echo e(trans('messages.booking_detail.and')); ?>and <a href="<?php echo e(url('/')); ?>/terms_of_service" target="_blank"><?php echo e(trans('messages.booking_detail.term_of_service')); ?></a>.</label>
            </div>
          </div>  
        </div>
        <div class="modal-footer">
          <input type="hidden" name="decision" value="accept">
          <!--<button type="submit" type="button" class="btn ex-btn">Cancel My Reservation</button>-->
          <input class="btn ex-btn" id="accept_submit" name="commit" type="submit" value="<?php echo e(trans('messages.booking_detail.accept')); ?>">
          <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(trans('messages.booking_detail.close')); ?></button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" id="decline-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo e(trans('messages.booking_detail.cancel_this_reserve')); ?></h4>
        </div>
        <form accept-charset="UTF-8" action="<?php echo e(url('booking/decline/'.$booking_id)); ?>" id="decline_reservation_form" method="post" name="decline_reservation_form">
          <div class="modal-body">
              <div id="decline_reason_container">
                <p>
                  <?php echo e(trans('messages.booking_detail.improve_experience')); ?><?php echo e(trans('messages.booking_detail.what_reason_cancelling')); ?> 
                </p>
                <p>
                  <strong>
                    <?php echo e(trans('messages.booking_detail.response_not_shared')); ?>

                  </strong>
                </p>
                <div class="select">
                  <select class="form-control" id="decline_reason" name="decline_reason"><option value=""><?php echo e(trans('messages.booking_detail.why_declining')); ?></option>
                    <option value="dates_not_available"><?php echo e(trans('messages.booking_detial.date_are_not_avialable')); ?></option>
                    <option value="not_comfortable"><?php echo e(trans('messages.booking_detail.not_feel_comfortable_guest')); ?></option>
                    <option value="not_a_good_fit"><?php echo e(trans('messages.booking_detail.listing_is_not_good')); ?></option>
                    <option value="waiting_for_better_reservation"><?php echo e(trans('messages.booking_detail.waiting_more_attractive')); ?></option>
                    <option value="different_dates_than_selected"><?php echo e(trans('messages.booking_detail.different_date_one_selected')); ?></option>
                    <option value="spam"><?php echo e(trans('messages.booking_detail.spam_message')); ?></option>
                    <option value="other"><?php echo e(trans('messages.booking_detail.other')); ?></option>
                  </select>
                </div>

                <div id="cancel_reason_other_div" style="display:none;" class="row-space-top-2">
                  <label for="cancel_reason_other">
                    <?php echo e(trans('messages.booking_detail.why_declining')); ?>?
                  </label>
                  <textarea class="form-control" id="decline_reason_other" name="decline_reason_other" rows="4"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <input type="checkbox" checked="checked" name="block_calendar" value="yes">
               <?php echo e(trans('messages.booking_detail.block_calender')); ?>  <b><?php echo e($result->startdate_md); ?></b> <?php echo e(trans('messages.booking_details.through')); ?> <b><?php echo e($result->enddate_md); ?></b>
              </div>
              <label for="cancel_message" class="row-space-top-2">
                <?php echo e(trans('messages.booking_detail.optional_message_request')); ?>

              </label>
              <textarea class="form-control" cols="40" id="decline_message" name="message" rows="10"></textarea>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="decision" value="decline">
            <!--<button type="submit" type="button" class="btn ex-btn">Cancel My Reservation</button>-->
            <input class="btn ex-btn" id="decline_submit" name="commit" type="submit" value="<?php echo e(trans('messages.booking_detail.decline')); ?>">
            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(trans('messages.booking_detail.close')); ?></button>
          </div>
        </form>
      </div>
    </div>
</div>

<div class="modal" id="discuss-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo e(trans('messages.booking_detail.discuss_this_request')); ?></h4>
      </div>
      <div class="modal-body">
        <p>
          <?php echo e(trans('messages.booking_detail.accept_or_decline')); ?>:
        </p>
        <label>
          <a href="<?php echo e(url('/')); ?>/messaging/qt_with/<?php echo e($result->id); ?>" id="other_reservation_send_message">Send a message to <?php echo e($result->users->first_name); ?></a>
        </label>
        <p>
          <?php echo e(trans('messages.booking_detail.messaging_or_contacting_data')); ?>

        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(trans('messages.booking_detail.close')); ?>Close</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="expired_at" value="<?php echo e($result->expiration_time); ?>">
<input type="hidden" id="booking_id" value="<?php echo e($booking_id); ?>">
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $('#accept-modal-trigger').on('click', function(){
    expirationTimeSet()
    $('#accept-modal').modal();
  })
  $('#decline-modal-trigger').on('click', function(){
    $('#decline-modal').modal();
  })
  $('#discuss-modal-trigger').on('click', function(){
    $('#discuss-modal').modal();
  })

  $('#decline_reason').on('change', function(){
      var res = $('#decline_reason').val();
      if(res == 'other') $('#cancel_reason_other_div').show();
  });

  var expiration_time  =  "<?php echo e($result->expiration_time); ?>";
  var _second = 1e3, _minute = 60 * _second, _hour = 60 * _minute, _day = 24 * _hour, timer;

  function expirationTimeSet(){
    date_ele = new Date,
    present_time = new Date(date_ele.getUTCFullYear(), date_ele.getUTCMonth(), date_ele.getUTCDate(), date_ele.getUTCHours(), date_ele.getUTCMinutes(), date_ele.getUTCSeconds()).getTime(),
    expiration_time = new Date(this.expiration_time).getTime(),
    time_remaining = expiration_time - present_time;
    if (time_remaining < 0) return clearInterval(interval), document.getElementById("countdown_2").innerHTML = "Expired!", document.getElementById("countdown_1").innerHTML = "Expired!", void(window.location.href = APP_URL + "/booking/expire/" + $("#booking_id").val());
    else{
       var h = (Math.floor(time_remaining / this._day), Math.floor(time_remaining % this._day / this._hour)),
        m = Math.floor(time_remaining % this._hour / this._minute),
        s = Math.floor(time_remaining % this._minute / this._second);
        document.getElementById("countdown_2").innerHTML = h + ":", document.getElementById("countdown_2").innerHTML += m + ":", document.getElementById("countdown_2").innerHTML += s + "", document.getElementById("countdown_1").innerHTML = h + ":", document.getElementById("countdown_1").innerHTML += m + ":", document.getElementById("countdown_1").innerHTML += s + ""
    }
    //console.log(h+':'+m+':'+s);
  }

  var interval = setInterval(expirationTimeSet, 1e3)

</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>