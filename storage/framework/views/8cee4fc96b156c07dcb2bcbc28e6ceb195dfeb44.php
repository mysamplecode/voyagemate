<?php $__env->startSection('main'); ?>
<div class="container">
  <div class="panel-body">
     <h6><?php echo e($booking->receipt_date); ?></h6>
     <h6>Receipt # <?php echo e($booking->id); ?></h6>
  </div>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-md-12 l-pad-none margin-bottom30">
        <div class="col-md-11 l-pad-none">
          <div class="rptTitle"><?php echo e(trans('messages.trips_receipt.customer_receipt')); ?></div>
          <h6 class="margin-top20"><?php echo e(trans('messages.trips_receipt.confirmation_code')); ?></h6>
          <h5><strong><?php echo e($booking->code); ?></strong></h5>
        </div>
        <div class="col-md-1 print-div">
          <a href="#" onclick="print_receipt()" class="btn ex-btn navbar-btn topbar-btn"><?php echo e(trans('messages.trips_receipt.receipt')); ?></a>
        </div>
      </div>

      <div class="margin-top30 row rpt">
        <div class="col-md-3 col-sm-3 col-xs-3">
          <h4><strong><?php echo e(trans('messages.trips_receipt.name')); ?></strong></h4>
          <h5 class="margin-top20"><?php echo e($booking->users->full_name); ?></h5>
          <h4 class="margin-top20"><strong><?php echo e(trans('messages.trips_receipt.accommodatoin_address')); ?></strong></h4>
          <h5 class="margin-top20"><p class="text-lead">
              <strong><?php echo e($booking->properties->name); ?></strong>
            </p>
              <p class="text-lead"><?php echo e($booking->properties->property_address->address_line_1); ?><br><?php echo e($booking->properties->property_address->city); ?>, <?php echo e($booking->properties->property_address->state); ?> <?php echo e($booking->properties->property_address->postal_code); ?><br><?php echo e($booking->properties->property_address->country_name); ?><br></h5>

        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
          <h4><strong><?php echo e(trans('messages.trips_receipt.travel_destination')); ?></strong></h4>
          <h5 class="margin-top20"><?php echo e($booking->properties->property_address->city); ?></h5>
          <h4 class="margin-top20"><strong><?php echo e(trans('messages.trips_receipt.accommodation_host')); ?></strong></h4>
          <h5 class="margin-top20"><?php echo e($booking->properties->users->full_name); ?></h5>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
          <h4><strong><?php echo e(trans('messages.trips_receipt.duration')); ?></strong></h4>
          <h5 class="margin-top20"><?php echo e($booking->total_night); ?> <?php echo e(trans('messages.trips_receipt.night')); ?></h5>
          <h4 class="margin-top20"><strong><?php echo e(trans('messages.trips_receipt.check_in')); ?></strong></h4>
          <h5 class="margin-top20"><?php echo e($booking->startdate_dmy); ?><br><?php echo e(trans('messages.trips_receipt.flexible_check_time')); ?></h5>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
          <h4><strong><?php echo e(trans('messages.trips_receipt.accommodation_type')); ?></strong></h4>
          <h5 class="margin-top20"><?php echo e($booking->properties->property_type_name); ?></h5>
          <h4 class="margin-top20"><strong><?php echo e(trans('messages.trips_receipt.check_out')); ?></strong></h4>
          <h5 class="margin-top20"><?php echo e($booking->enddate_dmy); ?><br><?php echo e(trans('messages.trips_receipt.flexible_check_out')); ?></h5>
        </div>
      </div>
      <div class="rptTitle margin-top30"><?php echo e(trans('messages.trips_receipt.booking_charge')); ?></div>
      <div class="clearfix"></div>
      <div class="table-responsive margin-top20">
        <table class="table table-bordered rpt">
          <tr>
            <td class=""><strong><?php echo e($booking->currency->symbol.$booking->per_night); ?> x <?php echo e($booking->total_night); ?> <?php echo e(trans('messages.trips_receipt.night')); ?></strong></td>
            <td class=""><?php echo e($booking->currency->symbol.$booking->per_night * $booking->total_night); ?></td>
          </tr>
          <?php if($booking->additional_guest): ?>
          <tr>
            <td class=""><strong><?php echo e(trans('messages.trips_receipt.additional_guest_fee')); ?></strong></td>
            <td class=""><?php echo e($booking->currency->symbol.$booking->guest_charge); ?></td>
          </tr>
          <?php endif; ?>
          <?php if($booking->cleaning): ?>
          <tr>
            <td class=""><strong><?php echo e(trans('messages.trips_receipt.cleaning_fee')); ?></strong></td>
            <td class=""><?php echo e($booking->currency->symbol.$booking->cleaning_charge); ?></td>
          </tr>
          <?php endif; ?>
          <?php if($booking->security): ?>
          <tr>
            <td class=""><strong><?php echo e(trans('messages.trips_receipt.security_fee')); ?></strong></td>
            <td class=""><?php echo e($booking->currency->symbol.$booking->security_money); ?></td>
          </tr>
          <?php endif; ?>
          <tr>
            <td class=""><strong><?php echo e($site_name); ?> <?php echo e(trans('messages.trips_receipt.service_fee')); ?></strong></td>
            <td class=""><?php echo e($booking->currency->symbol.$booking->service_charge); ?></td>
          </tr>
          <tr>
            <td class=""><strong><?php echo e(trans('messages.trips_receipt.total')); ?></strong></td>
            <td class=""><?php echo e($booking->currency->symbol.$booking->total); ?></td>
          </tr>
        </table>
      </div>
      <div class="table-responsive margin-top10 rpt">
        <table class="table table-bordered">
        <tr>
          <td class=""><strong><?php echo e(trans('messages.trips_receipt.payment_received')); ?>:<?php echo e($booking->receipt_date); ?></strong></td>
          <td class=""><?php echo e($booking->currency->symbol.$booking->total); ?></td>
        </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="panel-body">
   <p><?php echo e(trans('messages.trips_receipt.receipt_data')); ?></p>
  </div>
</div>

<script>
function print_receipt()
{
  window.print();
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>