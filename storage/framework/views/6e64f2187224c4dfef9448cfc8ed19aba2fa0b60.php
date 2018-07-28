

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
  <div class="col-md-9 min-height-div">
    <div class="your-listings-flash-container"></div>
    <div class="panel" id="print_area">
      <?php if(@$bookings->count() == 0 && @$code != 1): ?>
        <div class="panel-body">
          <p>
           <?php echo e(trans('messages.booking_my.upcoming_booking')); ?> 
          </p>
          <a href="<?php echo e(url('/')); ?>/my_bookings?all=1"><?php echo e(trans('messages.booking_my.booking_history')); ?></a>
        </div>
      <?php elseif(@$bookings->count() == 0 && @$code == 1): ?>
        <div class="panel-body">
          <p>
              <?php echo e(trans('messages.booking_my.no_booking')); ?>

          </p>
            <a href="<?php echo e(url('/')); ?>/property/create" class="btn btn-special list-your-space-btn" id="list-your-space"><?php echo e(trans('messages.booking_my.add_list')); ?></a>
        </div>
      <?php else: ?>
      <div class="panel-header">
        <div class="row row-table">
          <div class="col-md-6 col-middle">
              <?php echo e((@$code == 1) ? 'All' : 'Upcoming'); ?> <?php echo e(trans('messages.booking_my.booking')); ?>

          </div>
          <div class="col-md-6 col-middle">
            &nbsp;
            <!--<a class="btn pull-right" href="<?php echo e(url('/')); ?>/my_reservations?all=<?php echo e($code); ?>&amp;print=<?php echo e($code); ?>">
              <i class="icon icon-description"></i>
              <?php echo e(trans('messages.your_reservations.print_this_page')); ?>

            </a>-->  
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table style="background-color:white" class="table panel-body space-1">
          <tbody>
            <tr>
              <th width="10%"><?php echo e(trans('messages.booking_my.status')); ?></th>
              <th width="42%"><?php echo e(trans('messages.booking_my.date_location')); ?></th>
              <th width="28%"><?php echo e(trans('messages.booking_my.guest')); ?></th>
              <th width="20%"><?php echo e(trans('messages.booking_my.detail')); ?></th>
            </tr>
            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-reservation-id="<?php echo e($row->id); ?>" class="booking">
              <td>
                <span class="label label-<?php echo e($row->label_color); ?>">
                  <?php echo e(@$row->status); ?>

                </span>
              </td>
              <td>
                <?php echo e(@$row->date_range); ?>

                <br>
                <a locale="en" href="<?php echo e(url('/')); ?>/properties/<?php echo e(@$row->property_id); ?>"><?php echo e(@$row->properties->name); ?></a>
                <br>
                    <?php echo e(@$row->properties->property_address->address_line_1); ?>

                <br>
                    <?php echo e(@$row->properties->property_address->city.', '.@$row->properties->property_address->state.' '.@$row->properties->property_address->postal_code); ?>

                <br>
              </td>
              <td>
                <div class="media va-container">
                  <a class="pull-left media-photo media-round r-pad-none" href="<?php echo e(url('/')); ?>/users/show/<?php echo e(@$row->users->id); ?>">
                    <img width="50" height="50" title="<?php echo e(@$row->users->first_name); ?>" src="<?php echo e(@$row->users->profile_src); ?>" alt="<?php echo e(@$row->users->first_name); ?>">
                  </a>      
                  <div class="va-top">
                    <a class="text-normal pad-l-5" href="<?php echo e(url('/')); ?>/users/show/<?php echo e(@$row->users->id); ?>"><?php echo e(@$row->users->first_name.' '.@$row->users->last_name); ?></a>
                    <br>
                    <?php if(isset($row->status) && $row->status == 'Accepted'): ?>
                      <a href="<?php echo e(url('/')); ?>/messaging/host/<?php echo e(@$row->id); ?>" class="text-normal pad-l-5">
                        <i class="icon icon-envelope"></i>
                       <?php echo e(trans('messages.booking_my.send_message')); ?> 
                      </a>
                      <br>
                      <a href="mailto:<?php echo e(@$row->users->email); ?>" class="pad-l-5">
                        <?php echo e(trans('messages.booking_my.email_contact')); ?>

                      </a>
                    <?php endif; ?>
                    <br>
                  </div>
                </div>
              </td>
              <td>
                <?php echo e($row->currency->symbol.$row->total); ?> <?php echo e(trans('messages.booking_my.total')); ?>

                <ul class="list-unstyled">
                  <?php if($row->status == "Accepted"): ?>
                    <?php if(!$row->checkout_cross): ?>
                      <li>
                        <a data-rel="<?php echo e(@$row->id); ?>" href="#" id="reservation_cancel"><?php echo e(trans('messages.booking_my.cancel')); ?></a>
                      </li>
                    <?php endif; ?>
                  <?php endif; ?>
                </ul>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <?php if($code == '0' || $code == ''): ?>
        <div class="panel-body">
          <a href="<?php echo e(url('/')); ?>/my_bookings?all=1"><?php echo e(trans('messages.booking_my.all_booking_history')); ?></a>
        </div>
       <?php else: ?>
        <div class="panel-body">
          <a href="<?php echo e(url('/')); ?>/my_bookings?all=0"><?php echo e(trans('messages.booking_my.upcoming_book')); ?></a>
        </div>
       <?php endif; ?>
    <?php endif; ?>
    </div>
  </div>

  <div class="modal" id="cancel-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo e(trans('messages.modal.cancel_this_booking')); ?></h4>
        </div>
        <form accept-charset="UTF-8" action="<?php echo e(url('booking/host_cancel')); ?>" id="cancel_reservation_form" method="post" name="cancel_reservation_form">
          <div class="modal-body">
              <div id="decline_reason_container">
                <p>
                  <?php echo e(trans('messages.modal.what_reason_cancelling')); ?>

                </p>
                <div class="select">
                  <select id="cancel_reason" name="cancel_reason" class="form-control" required>
                    <option value=""><?php echo e(trans('messages.modal.why_are_you_cancelling')); ?></option>
                    <option value="i_am_uncomfortable_with_guest"><?php echo e(trans('messages.modal.i_am_uncomfortable')); ?></option>
                    <option value="no_longer_available"><?php echo e(trans('messages.modal.place_no_longer_available')); ?></option>
                    <option value="offer_a_different_listing"><?php echo e(trans('messages.modal.offer_a_different_listing')); ?></option>
                    <option value="need_maintenance"><?php echo e(trans('messages.modal.need_maintenance')); ?></option>
                    <option value="I_have_an_extenuating_circumstance"><?php echo e(trans('messages.modal.extenuating_cicumstance')); ?></option>
                    <option value="my_guest_needs_to_cancel"><?php echo e(trans('messages.modal.guest_needs_cancel')); ?></option>
                    <option value="other"><?php echo e(trans('messages.modal.other')); ?></option></select>
                  </select>
                </div>

                <!--<div id="cancel_reason_other_div" class="hide row-space-top-2">
                  <label for="cancel_reason_other">
                    <?php echo e(trans('messages.your_reservations.why_cancel')); ?>

                  </label>
                  <textarea class="form-control" id="decline_reason_other" name="decline_reason_other" rows="4"></textarea>
                </div>-->
              </div>
              <label for="cancel_message" class="row-space-top-2">
                <?php echo e(trans('messages.modal.messsage_guest')); ?>...
              </label>
              <textarea class="form-control" cols="40" id="cancel_message" name="cancel_message" rows="10"></textarea>
              <input type="hidden" name="id" id="booking_id" value="">
          </div>
          <div class="modal-footer">
            <input type="hidden" name="decision" value="decline">
            <input class="btn ex-btn" id="cancel_submit" name="commit" type="submit" value="<?php echo e(trans('messages.trips_active.cancel_my_booking')); ?>">
            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(trans('messages.trips_active.close')); ?></button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $('#reservation_cancel').on('click', function(){
    var booking_id = $(this).attr('data-rel');
    $('#booking_id').val(booking_id);
    $('#cancel-modal').modal();
  })
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>