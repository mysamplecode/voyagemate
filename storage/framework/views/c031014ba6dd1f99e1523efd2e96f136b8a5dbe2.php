<?php $__env->startSection('main'); ?>
<!-- Modal -->
<div class="modal fade" id="payout_popup1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Payout Method</h4>
      </div>
      <div class="flash-container" id="popup1_flash-container"></div>
      <form class="modal-add-payout-pref" method="post" id="payout_address">
        <div class="modal-body">
            <div class="panel-body">
              <div>
                <label for="payout_info_payout_address1">Address*</label>
                <input type="text" class='form-control' autocomplete="billing address-line1" id="payout_info_payout_address1" name="address1">
              </div>
              <div>
                <label for="payout_info_payout_address2">Address 2 / Zone</label>
                <input type="text" class='form-control' autocomplete="billing address-line2" id="payout_info_payout_address2" name="address2">
              </div>
              <div>
                <label for="payout_info_payout_city">City*</label>
                <input type="text" class='form-control' autocomplete="billing address-level2" id="payout_info_payout_city" name="city">
              </div>
              <div>
                <label for="payout_info_payout_state">State / Province</label>
                <input type="text" class='form-control' autocomplete="billing address-level1" id="payout_info_payout_state" name="state">
              </div>
              <div>
                <label for="payout_info_payout_zip">Postal Code*</label>
                <input type="text" class='form-control' autocomplete="billing postal-code" id="payout_info_payout_zip" name="postal_code">
              </div>
              <div>
                <label for="payout_info_payout_country">Country*</label>
                <div class="select">
                  <select name='country_dropdown' class='form-control' id='payout_info_payout_country'>
                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($key); ?>" <?php echo e($key == $default_country?'selected':''); ?>><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" value="Next" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal End -->
<!-- Modal -->
<div class="modal fade" id="payout_popup2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Payout Method</h4>
      </div>
      <div class="flash-container" id="popup2_flash-container"> </div>
      <form class="modal-add-payout-pref" method="post" id="payout_method">
        <input type="hidden" id="payout_info_payout2_address1" value="" name="address1">
        <input type="hidden" id="payout_info_payout2_address2" value="" name="address2">
        <input type="hidden" id="payout_info_payout2_city" value="" name="city">
        <input type="hidden" id="payout_info_payout2_country" value="" name="country">
        <input type="hidden" id="payout_info_payout2_state" value="" name="state">
        <input type="hidden" id="payout_info_payout2_zip" value="" name="postal_code">
        <div class="modal-body">
          <div>
            <p>Payouts for reservations are released to you the day after your guest checks in, and it takes some additional time for the money to arrive depending on your payout method.</p>
            <p>We can send money to people</b> with these payout methods. Which do you prefer?</p>
          </div>
          <table id="payout_method_descriptions" class="table table-striped">
            <thead><tr>
              <th></th>
              <th>Payout method</th>
              <th>Processing time</th>
              <th>Additional fees</th>
              <th>Currency</th>
              <th>Details</th>
            </tr></thead>
            <tbody>
              <tr>
                <td>
                  <input type="radio" value="1" name="payout_method" id="payout2_method">
                </td>
                <td class="type"><label for="payout_method">PayPal</label></td>
                <td>3-5 business days</td>
                <td>None</td>
                <td>EUR</td>
                <td>Business day processing only; weekends and banking holidays may cause delays</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn ex-btn btn-large">
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal End -->
<!-- Modal -->
<div class="modal fade" id="payout_popup3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Payout Method</h4>
      </div>
      <div class="flash-container" id="popup3_flash-container"> </div>
      <form method="post" id="payout_paypal" action="<?php echo e(url('users/payout_preferences')); ?>" accept-charset="UTF-8">
        <input type="hidden" id="payout_info_payout3_address1" value="" name="address1">
        <input type="hidden" id="payout_info_payout3_address2" value="" name="address2">
        <input type="hidden" id="payout_info_payout3_city" value="" name="city">
        <input type="hidden" id="payout_info_payout3_country" value="" name="country">
        <input type="hidden" id="payout_info_payout3_state" value="" name="state">
        <input type="hidden" id="payout_info_payout3_zip" value="" name="postal_code">
        <input type="hidden" id="payout3_method" value="" name="payout_method">
        <div class="modal-body">
          PayPal Email ID
          <input type="email" name="account" id="paypal_email" class='form-control' required>
        </div>
        <div class="modal-footer">
          <input type="submit" value="Submit" id="modal-paypal-submit" class="btn ex-btn">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal End -->
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
        <div class="panel-body h5">
          Payout Methods
        </div>
        <div class="panel-footer">
          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <p>
                  When you receive a payment for a reservation, we call that payment to you a “payout”. Our secure payment system supports several payout methods, which can be setup and edited here. Your available payout options and currencies differ by country.
                </p>
                <table class="table table-striped" id="payout_methods">
                  <?php if(count($payouts)): ?>
                  <thead>
                    <tr class="text-truncate">
                      <th>Method</th>
                      <th>Details</th>
                      <th>Status</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $payouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                          PayPal
                          <?php if($row->selected == 'Yes'): ?>
                          <span class="label label-info">Default</span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php echo e($row->account); ?> (<?php echo e($row->currency_code); ?>)
                        </td>
                        <td>
                            Ready
                        </td>
                        <td class="payout-options">
                        <?php if($row->default != 'yes'): ?>
                        <div class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown">Options
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu" style="background-color:white;">
                            <li><a href="<?php echo e(url('/')); ?>/users/payout_delete/<?php echo e($row->id); ?>">Remove</a></li>
                            <li><a href="<?php echo e(url('/')); ?>/users/payout_default/<?php echo e($row->id); ?>">Set default</a></li>
                          </ul>
                        </div>
                        <?php endif; ?>        
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                  <?php endif; ?>
                    <tfoot>
                      <tr id="add_payout_method_section">
                        <td colspan="4">
                            <a id="add-payout-method-button" class="btn ex-btn" href="javascript:void(0);" data-toggle="modal" data-target="#payout_popup1">
                              Add Payout Method
                            </a>
                          <span class="text-muted">
                            &nbsp;
                            Direct Deposit, PayPal, etc...
                          </span>
                        </td>
                      </tr>
                    </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>