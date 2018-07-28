<?php $__env->startSection('main'); ?>
<div class="container margin-top30">
      
      <div class="middle-div">
        <h3 class="text-center"><?php echo e(trans('messages.property.list_space')); ?></h3>
        <p class="text-center"><?php echo e($site_name); ?> <?php echo e(trans('messages.property.property_title')); ?>.</p>
          <form method="post" action="<?php echo e(url('property/create')); ?>" id="lys_form" accept-charset='UTF-8'>  
            <input type="hidden" name='street_number' id='street_number'>
            <input type="hidden" name='route' id='route'>
            <input type="hidden" name='postal_code' id='postal_code'>
            <input type="hidden" name='city' id='city'>
            <input type="hidden" name='state' id='state'>
            <input type="hidden" name='country' id='country'>
            <input type="hidden" name='latitude' id='latitude'>
            <input type="hidden" name='longitude' id='longitude'>
            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo e(trans('messages.property.home_type')); ?></label>
              <select name="property_type_id" class="form-control">
                <?php $__currentLoopData = $property_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option data-icon-class="icon-star-alt"  value="<?php echo e($key); ?>">
                    <?php echo e($value); ?>

                  </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <?php if($errors->has('property_type_id')): ?> <p class="error-tag"><?php echo e($errors->first('property_type_id')); ?></p> <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo e(trans('messages.property.room_type')); ?></label>
              <select name="space_type" class="form-control">
                <?php $__currentLoopData = $space_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option data-icon-class="icon-star-alt" value="<?php echo e($key); ?>">
                    <?php echo e($value); ?>

                  </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <?php if($errors->has('space_type')): ?> <p class="error-tag"><?php echo e($errors->first('space_type')); ?></p> <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo e(trans('messages.property.accommodate')); ?></label>
              <select name="accommodates" class="form-control">
                <?php for($i=1;$i<=16;$i++): ?>
                  <option class="accommodates" data-accommodates="<?php echo e($i); ?>" value="<?php echo e($i); ?>">
                    <?php echo e($i); ?>

                  </option>
                <?php endfor; ?>
              </select>
              <?php if($errors->has('accommodates')): ?> <p class="error-tag"><?php echo e($errors->first('accommodates')); ?></p> <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1"><?php echo e(trans('messages.property.city')); ?></label>
              <input type="text" class="form-control" id="map_address" name="map_address" placeholder="" required>
              <?php if($errors->has('map_address')): ?> <p class="error-tag"><?php echo e($errors->first('map_address')); ?></p> <?php endif; ?>
              <div id="us3"></div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn ex-btn"><?php echo e(trans('messages.property.continue')); ?></button>
            </div>    
          </form>
      </div>  
      
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
        if( addressComponents.city !== 'undefined' && addressComponents.country !== 'undefined' && addressComponents.city !== null && addressComponents.country !== null && addressComponents.city !== '' && addressComponents.country !== ''){
            $('#map_address').val(addressComponents.city+', '+addressComponents.country_fullname);
        }
          
    }

    $('#us3').locationpicker({
        location: {
            latitude: 0,
            longitude: 0
        },
        radius: 0,
        addressFormat: "",
        inputBinding: {
            latitudeInput: $('#latitude'),
            longitudeInput: $('#longitude'),
            locationNameInput: $('#map_address')
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