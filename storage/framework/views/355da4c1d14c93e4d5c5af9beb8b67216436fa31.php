<?php $__env->startSection('main'); ?>
<!-- Modal -->
<div class="modal fade" id="payout_popup1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('messages.account_preference.add_payout')); ?></h4>
      </div>
      <div class="flash-container" id="popup1_flash-container"></div>
      <form class="modal-add-payout-pref" method="post" id="payout_address">
        <div class="modal-body">
            <div class="panel-body">
              <div>
                <label for="payout_info_payout_address1"><?php echo e(trans('messages.account_preference.address')); ?>*</label>
                <input type="text" class='form-control' autocomplete="billing address-line1" id="payout_info_payout_address1" name="address1">
              </div>
              <div>
                <label for="payout_info_payout_address2"><?php echo e(trans('messages.account_preference.address_2')); ?></label>
                <input type="text" class='form-control' autocomplete="billing address-line2" id="payout_info_payout_address2" name="address2">
              </div>
              <div>
                <label for="payout_info_payout_city"><?php echo e(trans('messages.account_preference.city')); ?>*</label>
                <input type="text" class='form-control' autocomplete="billing address-level2" id="payout_info_payout_city" name="city">
              </div>
              <div>
                <label for="payout_info_payout_state"><?php echo e(trans('messages.account_preference.state_province')); ?></label>
                <input type="text" class='form-control' autocomplete="billing address-level1" id="payout_info_payout_state" name="state">
              </div>
              <div>
                <label for="payout_info_payout_zip"><?php echo e(trans('messages.account_preference.postal_code')); ?>*</label>
                <input type="text" class='form-control' autocomplete="billing postal-code" id="payout_info_payout_zip" name="postal_code">
              </div>
              <div>
                <label for="payout_info_payout_country"><?php echo e(trans('messages.account_preference.country')); ?>*</label>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('messages.account_preference.add_payout')); ?></h4>
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
            <p><?php echo e(trans('messages.account_preference.payment_data_1')); ?>.</p>
            <p><?php echo e(trans('messages.account_preference.send_money')); ?></b> <?php echo e(trans('messages.account_preference.send_money_2')); ?></p>
          </div>
          <table id="payout_method_descriptions" class="table table-striped">
            <thead><tr>
              <th></th>
              <th><?php echo e(trans('messages.account_preference.payout_method')); ?></th>
              <th><?php echo e(trans('messages.account_preference.processing_time')); ?></th>
              <th><?php echo e(trans('messages.account_preference.additional_fee')); ?></th>
              <th><?php echo e(trans('messages.account_preference.currency')); ?></th>
              <th><?php echo e(trans('messages.account_preference.datail')); ?></th>
            </tr></thead>
            <tbody>
              <tr>
                <td>
                  <input type="radio" value="1" name="payout_method" id="payout2_method">
                </td>
                <td class="type"><label for="payout_method"><?php echo e(trans('messages.account_preference.paypal')); ?></label></td>
                <td><?php echo e(trans('messages.account_preference.business_day')); ?></td>
                <td><?php echo e(trans('messages.account_preference.none')); ?></td>
                <td><?php echo e(trans('messages.account_preference.eur')); ?></td>
                <td><?php echo e(trans('messages.account_preference.business_day_data')); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn ex-btn btn-large">
            <?php echo e(trans('messages.account_preference.save')); ?>

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
        <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('messages.account_preference.add_payout')); ?></h4>
      </div>
      <div class="flash-container" id="popup3_flash-container"> </div>
      <form method="post" id="payout_paypal" action="<?php echo e(url('users/account_preferences')); ?>" accept-charset="UTF-8">
        <input type="hidden" id="payout_info_payout3_address1" value="" name="address1">
        <input type="hidden" id="payout_info_payout3_address2" value="" name="address2">
        <input type="hidden" id="payout_info_payout3_city" value="" name="city">
        <input type="hidden" id="payout_info_payout3_country" value="" name="country">
        <input type="hidden" id="payout_info_payout3_state" value="" name="state">
        <input type="hidden" id="payout_info_payout3_zip" value="" name="postal_code">
        <input type="hidden" id="payout3_method" value="" name="payout_method">
        <div class="modal-body">
         <?php echo e(trans('messages.account_preference.paypal_email_id')); ?> 
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
          <?php echo e(trans('messages.account_preference.account_method')); ?>

        </div>
        <div class="panel-footer">
          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <p>
                 <?php echo e(trans('messages.account_preference.account_method_data')); ?> 
                </p>
                <table class="table table-striped" id="payout_methods">
                  <?php if(count($payouts)): ?>
                  <thead>
                    <tr class="text-truncate">
                      <th><?php echo e(trans('messages.account_preference.method')); ?></th>
                      <th><?php echo e(trans('messages.account_preference.detail')); ?></th>
                      <th><?php echo e(trans('messages.account_preference.status')); ?></th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $payouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                         <?php echo e(trans('messages.account_preference.paypal')); ?> 
                          <?php if($row->selected == 'Yes'): ?>
                          <span class="label label-info"><?php echo e(trans('messages.account_preference.default')); ?></span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php echo e($row->account); ?> (<?php echo e($row->currency_code); ?>)
                        </td>
                        <td>
                            <?php echo e(trans('messages.account_preference.ready')); ?>

                        </td>
                        <td class="payout-options">
                        <?php if($row->default != 'yes'): ?>
                        <div class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown"><?php echo e(trans('messages.account_preference.option')); ?>

                          <span class="caret"></span></a>
                          <ul class="dropdown-menu" style="background-color:white;">
                            <li><a href="<?php echo e(url('/')); ?>/users/account_delete/<?php echo e($row->id); ?>"><?php echo e(trans('messages.account_preference.remove')); ?></a></li>
                            <li><a href="<?php echo e(url('/')); ?>/users/account_default/<?php echo e($row->id); ?>"><?php echo e(trans('messages.account_preference.set_default')); ?></a></li>
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
                             <?php echo e(trans('messages.account_preference.add_payout')); ?>

                            </a>
                          <span class="text-muted">
                            &nbsp;
                           <?php echo e(trans('messages.account_preference.deposit_paypal')); ?> 
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