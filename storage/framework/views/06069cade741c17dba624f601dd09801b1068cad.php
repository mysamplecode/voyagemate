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
    <?php if($pending_trips->count() == 0 && $current_trips->count() == 0 && $upcoming_trips->count() == 0): ?>
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo e(trans('messages.trips_active.your_trip')); ?></div>
      <div class="panel-body">
        <p><?php echo e(trans('messages.trips_active.no_current_trip')); ?>.</p>
        <!--<form method="get" class="row" action="<?php echo e(url('/')); ?>/s" accept-charset="UTF-8"><div style="margin:0;padding:0;display:inline"><input type="hidden" value="✓" name="utf8"></div>
          <div class="col-md-8">
            <input type="text" placeholder="<?php echo e(trans('messages.header.where_are_you_going')); ?>" name="location" id="location-search-google" autocomplete="off" class="form-control">
          </div>
          <div class="col-md-4">
            <button id="submit_location" class="btn btn-primary" type="submit">
              <?php echo e(trans('messages.home.search')); ?>

            </button>
          </div>
        </form>-->
      </div>
    </div>
    <?php endif; ?>
    <?php if($pending_trips->count() > 0): ?>
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo e(trans('messages.trips_active.pending_trip')); ?></div>
      <div class="panel-body">
        <table class="table panel-body panel-light">
          <tbody>
            <tr>
              <th><?php echo e(trans('messages.trips_active.status')); ?></th>
              <th><?php echo e(trans('messages.trips_active.location')); ?></th>
              <th><?php echo e(trans('messages.trips_active.host')); ?></th>
              <th><?php echo e(trans('messages.trips_active.date')); ?></th>
              <th><?php echo e(trans('messages.trips_active.option')); ?></th>
            </tr>
            <?php $__currentLoopData = $pending_trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pending_trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <span class="label label-orange label-<?php echo e(@$pending_trip->label_color); ?>">
                  <?php echo e(@$pending_trip->status); ?>

                </span>
                <br>
              </td>
              <td>
                <a href="<?php echo e(url('/')); ?>/properties/<?php echo e(@$pending_trip->property_id); ?>"><?php echo e(@$pending_trip->properties->name); ?></a>
                <br>
                <?php echo e(@$pending_trip->properties->property_address->city); ?>

              </td>
              <td><a href="<?php echo e(url('/')); ?>/users/show/<?php echo e(@$pending_trip->host_id); ?>"><?php echo e(@$pending_trip->properties->users->full_name); ?></a></td>
              <td><?php echo e(@$pending_trip->date_range); ?></td>
              <td>
                <ul class="unstyled list-unstyled">
                  <li class="row-space-1">
                    <!-- <a target="_blank" rel="nofollow" data-method="post" data-confirm="Are you sure that you want to cancel the request? Any money transacted will be refunded." class="button-steel" href="<?php echo e(url('/')); ?>/reservation/cancel?code=<?php echo e(@$pending_trip->code); ?>"><?php echo e(trans('messages.your_trips.cancel_request')); ?></a> -->
                    <a data-rel="<?php echo e(@$pending_trip->id); ?>" href="#" class="booking_cancel"><?php echo e(trans('messages.trips_active.cancel_request')); ?></a>
                  </li>
                </ul>
              </td>         
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php endif; ?>
    <?php if($current_trips->count() > 0): ?>
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo e(trans('messages.trips_active.current_trip')); ?></div>
      <div class="panel-body">
        <table class="table panel-body panel-light">
          <tbody>
            <tr>
              <th><?php echo e(trans('messages.trips_active.status')); ?></th>
              <th><?php echo e(trans('messages.trips_active.location')); ?></th>
              <th><?php echo e(trans('messages.trips_active.host')); ?></th>
              <th><?php echo e(trans('messages.trips_active.date')); ?></th>
              <th><?php echo e(trans('messages.trips_active.option')); ?></th>
            </tr>
            <?php $__currentLoopData = $current_trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $current_trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <span class="label label-orange label-<?php echo e(@$current_trip->label_color); ?>">
                  <?php echo e(@$current_trip->status); ?>

                </span>
                <br>
              </td>
              <td>
                <a href="<?php echo e(url('/')); ?>/properties/<?php echo e(@$current_trip->property_id); ?>"><?php echo e(@$current_trip->properties->name); ?></a>
                <br>
                <?php echo e(@$current_trip->properties->property_address->city); ?>

              </td>
              <td><a href="<?php echo e(url('/')); ?>/users/show/<?php echo e(@$current_trip->host_id); ?>"><?php echo e(@$current_trip->properties->users->full_name); ?></a></td>
              <td><?php echo e(@$current_trip->date_range); ?></td>
              <td>
                <ul class="unstyled list-unstyled">
                  <?php if(@$current_trip->status != "Cancelled" && @$current_trip->status != "Declined" && @$current_trip->status != "Expired"): ?>
                  <li class="row-space-1">
                    <a href="<?php echo e(url('/')); ?>/booking/receipt?code=<?php echo e(@$current_trip->code); ?>"><?php echo e(trans('messages.trips_active.view_receipt')); ?></a>
                  </li>
                  <li class="row-space-1">
                    <a data-rel="<?php echo e(@$current_trip->id); ?>" href="#" class="booking_cancel"><?php echo e(trans('messages.booking_my.cancel')); ?></a>
                  </li>
                  <?php endif; ?>
                </ul>
              </td>         
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php endif; ?>
    <?php if($upcoming_trips->count() > 0): ?>
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo e(trans('messages.trips_active.upcoming_trip')); ?></div>
      <div class="panel-body">
        <table class="table panel-body panel-light">
          <tbody>
            <tr>
              <th><?php echo e(trans('messages.trips_active.status')); ?></th>
              <th><?php echo e(trans('messages.trips_active.location')); ?></th>
              <th><?php echo e(trans('messages.trips_active.host')); ?></th>
              <th><?php echo e(trans('messages.trips_active.date')); ?></th>
              <th><?php echo e(trans('messages.trips_active.option')); ?></th>
            </tr>
            <?php $__currentLoopData = $upcoming_trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcoming_trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <span class="label label-orange label-<?php echo e(@$upcoming_trip->label_color); ?>">
                  <?php echo e(@$upcoming_trip->status); ?>

                </span>
                <br>
              </td>
              <td>
                <a href="<?php echo e(url('/')); ?>/properties/<?php echo e(@$upcoming_trip->property_id); ?>"><?php echo e(@$upcoming_trip->properties->name); ?></a>
                <br>
                <?php echo e(@$upcoming_trip->properties->property_address->city); ?>

              </td>
              <td><a href="<?php echo e(url('/')); ?>/users/show/<?php echo e(@$upcoming_trip->host_id); ?>"><?php echo e(@$upcoming_trip->properties->users->full_name); ?></a></td>
              <td><?php echo e(@$upcoming_trip->date_range); ?></td>
              <td>
                <ul class="unstyled list-unstyled">
                  <?php if(@$upcoming_trip->status != "Cancelled"): ?>
                  <li class="row-space-1">
                    <a href="<?php echo e(url('/')); ?>/booking/receipt?code=<?php echo e(@$upcoming_trip->code); ?>"><?php echo e(trans('messages.trips_active.view_receipt')); ?></a>
                  </li>
                  <li class="row-space-1">
                    <a data-rel="<?php echo e(@$upcoming_trip->id); ?>" href="#" class="booking_cancel"><?php echo e(trans('messages.booking_my.cancel')); ?></a>
                  </li>
                  <?php endif; ?>
                </ul>
              </td>         
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php endif; ?>
  </div>
  <?php if($upcoming_trips->count() > 0 || $current_trips->count() > 0 || $pending_trips->count() > 0): ?>
  <!-- Modal -->
  <div class="modal" id="cancel-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo e(trans('messages.trips_active.cancel_booking')); ?></h4>
        </div>
        <form accept-charset="UTF-8" action="<?php echo e(url('trips/guest_cancel_booking')); ?>" id="cancel_reservation_form" method="post" name="cancel_reservation_form">
          <div class="modal-body">
              <div id="decline_reason_container">
                <p>
                  <?php echo e(trans('messages.trips_active.cancel_booking_data')); ?>

                </p>
                <p>
                  <strong>
                    <?php echo e(trans('messages.trips_active.response_not_share')); ?>

                  </strong>
                </p>
                <div class="select">
                  <select id="cancel_reason" name="cancel_reason" class="form-control" required>
                    <option value=""><?php echo e(trans('messages.trips_active.declining')); ?></option>
                    <option value="no_longer_need_accommodations"><?php echo e(trans('messages.trips_active.need_accommodation')); ?></option>
                    <option value="travel_dates_changed"><?php echo e(trans('messages.trips_active.travel_date_change')); ?></option>
                    <option value="made_the_reservation_by_accident"><?php echo e(trans('messages.trips_active.made_it_accident')); ?></option>
                    <option value="I_have_an_extenuating_circumstance"><?php echo e(trans('messages.trips_active.extenuating_circumstance')); ?></option>
                    <option value="my_host_needs_to_cancel"><?php echo e(trans('messages.trips_active.host_need_cancel')); ?></option>
                    <option value="uncomfortable_with_the_host"><?php echo e(trans('messages.trips_active.uncomfortable_host')); ?></option>
                    <option value="place_not_okay"><?php echo e(trans('messages.trips_active.place_not_expect')); ?></option>
                    <option value="other"><?php echo e(trans('messages.trips_active.other')); ?></option>
                  </select>
                </div>

                <div id="cancel_reason_other_div" class="hide row-space-top-2">
                  <label for="cancel_reason_other">
                    <?php echo e(trans('messages.trips_active.why_are_cancel')); ?>

                  </label>
                  <textarea class="form-control" id="decline_reason_other" name="decline_reason_other" rows="4"></textarea>
                </div>
              </div>
              <label for="cancel_message" class="row-space-top-2">
                <?php echo e(trans('messages.trips_active.type_message')); ?>

              </label>
              <textarea class="form-control" cols="40" id="cancel_message" name="cancel_message" rows="10"></textarea>
              <input type="hidden" name="id" id="booking_id" value="">
          </div>
          <div class="modal-footer">
            <input type="hidden" name="decision" value="decline">
            <!--<button type="submit" type="button" class="btn ex-btn">Cancel My Reservation</button>-->
            <input class="btn ex-btn" id="cancel_submit" name="commit" type="submit" value="<?php echo e(trans('messages.trips_active.cancel_my_booking')); ?>">
            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(trans('messages.trips_active.close')); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $('.booking_cancel').on('click', function(){
    var booking_id = $(this).attr('data-rel');
    $('#booking_id').val(booking_id);
    $('#cancel-modal').modal();
  });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>