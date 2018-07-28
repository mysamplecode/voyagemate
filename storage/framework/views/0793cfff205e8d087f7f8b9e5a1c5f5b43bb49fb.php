<?php $__env->startSection('main'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-8 col-sm-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info box_info">
            <div class="box-header with-border">
              <h3 class="box-title">Booking Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo e(url('admin/bookings/detail/'.$result->id)); ?>" method="post" class='form-horizontal'>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Property name
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->properties->name); ?>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Host name
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e(ucfirst($result->properties->users->first_name)); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Guest name
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e(ucfirst($result->users->first_name)); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Checkin
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->start_date); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Checkout
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->end_date); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Number of guests
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->guest); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Total nights
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->total_night); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Subtotal amount
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->currency->symbol); ?><?php echo e($result->base_price); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Cleaning fee
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->currency->symbol); ?><?php echo e($result->cleaning_charge); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Additional guest fee
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->currency->symbol); ?><?php echo e($result->guest_charge); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Security fee
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->currency->symbol); ?><?php echo e($result->security_money); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Service fee
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->currency->symbol); ?><?php echo e($result->service_charge); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Host fee
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->currency->symbol); ?><?php echo e($result->host_fee); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Total amount
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->currency->symbol); ?><?php echo e($result->total); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Currency
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->currency_code); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Paymode
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->payment_methods->name); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Status
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->status); ?>

                   </div>
                </div>
                <?php if($result->status == "Cancelled"): ?>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Cancelled By
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->cancelled_by); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Cancelled Date
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->cancelled_at); ?>

                   </div>
                </div>
                <?php endif; ?>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Transaction ID
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->transaction_id); ?>

                   </div>
                </div>
                <?php if($result->paymode == 'Credit Card'): ?>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    First name
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->first_name); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Last name
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->last_name); ?>

                   </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Postal code
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->postal_code); ?>

                   </div>
                </div>
                <?php endif; ?>
                <!--<div class="form-group">
                  <label class="col-sm-3 control-label">
                    Country
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e(@$details['country']); ?>

                   </div>
                </div>-->
                <?php if(@$result->host_account != ''): ?>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Host Paypal account
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->host_account); ?>

                   </div>
                </div>
                <?php endif; ?>
                <?php if(@$result->guest_account != ''): ?>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Guest Paypal account
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->guest_account); ?>

                   </div>
                </div>
                <?php endif; ?>
                <?php if(@$result->host_penalty_amount != 0): ?>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Applied Penalty Amount
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->currency->symbol); ?><?php echo e($result->host_penalty->converted_amount); ?>

                   </div>
                </div>
                <?php endif; ?>
                <?php if($penalty_amount != 0): ?>
                <div class="form-group">
                  <label class="col-sm-3 control-label">
                    Subtracted Penalty Amount
                  </label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <?php echo e($result->currency->symbol); ?><?php echo e($penalty_amount); ?>

                   </div>
                </div>
                <?php endif; ?>
              </div>
              <!-- /.box-body -->
            </form> 
              <?php if((($result->status == 'Accepted' &&  $result->checkin_cross == 0 ) || $result->status == 'Cancelled') && $result->check_host_payout != 'yes' && $result->admin_host_payment != 0): ?>
                <?php if($result->host_account): ?>
                  <form action="<?php echo e(url('admin/bookings/pay')); ?>" method="post">
                    <input type="hidden" name="booking_id" value="<?php echo e($result->id); ?>">
                    <input type="hidden" name="host_payout_id" value="<?php echo e($result->host_payout_id); ?>">
                    <input type="hidden" name="user_type" value="host">
                    <div class="text-center"> 
                      <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to mark it as paid?')">Paid to Host(<?php echo e($result->currency->symbol); ?><?php echo e($result->admin_host_payment); ?>)</button>
                    </div>
                  </form>
                <?php else: ?>
                  <div class="text-bold text-danger text-center">Yet, host doesn't enter his/her Account preferences. <a href="<?php echo e(url('admin/booking/need_pay_account/'.$result->id.'/host')); ?>">Send Email to Host</a></div>
                <?php endif; ?>
              <?php endif; ?>

              <?php if(($result->status == 'Declined' || $result->status == 'Cancelled' || $result->status == 'Expired') && $result->check_guest_payout != 'yes' && $result->admin_guest_payment != 0): ?>
                <?php if($result->guest_account): ?>
                  <br>
                  <form action="<?php echo e(url('admin/bookings/pay')); ?>" method="post">
                    <input type="hidden" name="booking_id" value="<?php echo e($result->id); ?>">
                    <input type="hidden" name="guest_payout_id" value="<?php echo e($result->guest_payout_id); ?>">
                    <input type="hidden" name="user_type" value="guest">
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to mark it as paid?')">Paid to Guest(<?php echo e($result->currency->symbol); ?><?php echo e($result->admin_guest_payment); ?>)</button>
                    </div>
                  </form>
                <?php else: ?>
                  <div class="text-bold text-danger text-center">Yet, guest doesn't enter his/her Account preferences. <a href="<?php echo e(url('admin/booking/need_pay_account/'.$result->id.'/guest')); ?>">Send Email to Guest</a></div>
                <?php endif; ?>
              <?php endif; ?>
              
              <?php if($result->check_host_payout == 'yes'): ?>
                <div class="text-bold text-success text-center">Host payout amount (<?php echo e($result->currency->symbol.$result->host_payout); ?>) transferred.</div>
              <?php endif; ?>
              <?php if($result->check_guest_payout == 'yes'): ?>
                <div class="text-bold text-success text-center">Guest payout amount (<?php echo e($result->currency->symbol.$result->guest_payout); ?>) transferred.</div>
              <?php endif; ?>
              <div class="box-footer text-center">
                <a class="btn btn-default" href="<?php echo e(url('admin/bookings')); ?>">Back</a>
              </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $__env->startPush('scripts'); ?>
<script>
  $('#input_dob').datepicker({ 'format': 'dd-mm-yyyy'});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>