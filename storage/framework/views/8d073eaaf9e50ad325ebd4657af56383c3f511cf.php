<?php $__env->startSection('main'); ?>
  <div class="container margin-top40 mb30">
    <?php echo $__env->make('listing.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <form method="post" action="<?php echo e(url('listing/'.$result->id.'/'.$step)); ?>" class='signup-form login-form' accept-charset='UTF-8'>
      <div class="col-md-9">
        <input type="hidden" name='latitude' id='latitude'>
        <input type="hidden" name='longitude' id='longitude'>
        <div class="row">
          <div class="col-md-8">
            <label class="label-large"><?php echo e(trans('messages.listing_location.country')); ?></label>
            <select id="basics-select-bed_type" name="country" class="form-control" id='country'>
                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($key); ?>" <?php echo e(($key == @$result->property_address->country) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span class="text-danger"><?php echo e($errors->first('country')); ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <label class="label-large"><?php echo e(trans('messages.listing_location.address_line_1')); ?></label>
            <input type="text" name="address_line_1" id="address_line_1" value="<?php echo e(@$result->property_address->address_line_1); ?>" class="form-control" placeholder="House name/number + street/road">
            <span class="text-danger"><?php echo e($errors->first('address_line_1')); ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div id="map_view" style="width:100%; height:400px;"></div>
          </div>
          <div class="col-md-8">
            <p>You can move the pointer to set the correct map position</p>
            <span class="text-danger"><?php echo e($errors->first('latitude')); ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <label class="label-large"><?php echo e(trans('messages.listing_location.address_line_2')); ?></label>
            <input type="text" name="address_line_2" id="address_line_2" value="<?php echo e(@$result->property_address->address_line_2); ?>" class="form-control" placeholder="Apt., suite, building access code">
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <label class="label-large"><?php echo e(trans('messages.listing_location.city_town_district')); ?></label>
            <input type="text" name="city" id="city" value="<?php echo e(@$result->property_address->city); ?>" class="form-control">
            <span class="text-danger"><?php echo e($errors->first('city')); ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <label class="label-large"><?php echo e(trans('messages.listing_location.state_province')); ?></label>
            <input type="text" name="state" id="state" value="<?php echo e(@$result->property_address->state); ?>" class="form-control">
            <span class="text-danger"><?php echo e($errors->first('state')); ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <label class="label-large"><?php echo e(trans('messages.listing_location.zip_postal_code')); ?></label>
            <input type="text" name="postal_code" id="postal_code" value="<?php echo e(@$result->property_address->postal_code); ?>" class="form-control">
            <span class="text-danger"><?php echo e($errors->first('postal_code')); ?></span>
          </div>
        </div>

        <div class="row mrg-top-25">
          <div class="col-md-6 text-left">
              <a data-prevent-default="" href="<?php echo e(url('listing/'.$result->id.'/description')); ?>" class="btn btn-large btn-primary"><?php echo e(trans('messages.listing_description.back')); ?></a>
          </div>
          <div class="col-md-6 text-right">
            <button type="submit" class="btn btn-large btn-primary next-section-button">
             <?php echo e(trans('messages.listing_basic.next')); ?> 
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
<?php $__env->startPush('scripts'); ?>
  <script type="text/javascript">
    function updateControls(addressComponents) {
        $('#street_number').val(addressComponents.streetNumber);
        $('#route').val(addressComponents.streetName);
        $('#city').val(addressComponents.city);
        $('#state').val(addressComponents.stateOrProvince);
        $('#postal_code').val(addressComponents.postalCode);
        $('#country').val(addressComponents.country);
    }

    $('#map_view').locationpicker({
        location: {
            latitude: <?php echo e($result->property_address->latitude != ''? $result->property_address->latitude:0); ?>,
            longitude: <?php echo e($result->property_address->longitude != ''? $result->property_address->longitude:0); ?>

        },
        radius: 0,
        addressFormat: "",
        inputBinding: {
            latitudeInput: $('#latitude'),
            longitudeInput: $('#longitude'),
            locationNameInput: $('#address_line_1')
        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            var addressComponents = $(this).locationpicker('map').location.addressComponents;
            updateControls(addressComponents);
        },
        oninitialized: function (component) {
            var addressComponents = $(component).locationpicker('map').location.addressComponents;
            updateControls(addressComponents);
        }
    });
  </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>