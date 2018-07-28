
<?php $__env->startSection('main'); ?>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
	<section class="content-header">
	        <h1>
	        List Your Space
	        <small>List Your Space</small>
	      </h1>
	      <ol class="breadcrumb">
		<li><a href="<?php echo e(url('/')); ?>/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>

    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Your Space</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" method="post" action="<?php echo e(url('admin/add_properties')); ?>" id="lys_form" accept-charset='UTF-8'>  
            <div class="box-body">
            <input type="hidden" name='street_number' id='street_number'>
            <input type="hidden" name='route' id='route'>
            <input type="hidden" name='postal_code' id='postal_code'>
            <input type="hidden" name='city' id='city'>
            <input type="hidden" name='state' id='state'>
            <input type="hidden" name='country' id='country'>
            <input type="hidden" name='latitude' id='latitude'>
            <input type="hidden" name='longitude' id='longitude'>
            
            <div class="form-group">
              <label for="exampleInputEmail1" class="control-label col-sm-3">User</label>
              <div class="col-sm-6">
              <select name="host_id" class="form-control">
              	<option value=""> Select </option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option data-icon-class="icon-star-alt"  value="<?php echo e($value->id); ?>">
                    <?php echo e($value->first_name.' '.$value->last_name); ?>

                  </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>
              <?php if($errors->has('host_id')): ?> 
              	<p class="error-tag"><?php echo e($errors->first('host_id')); ?></p> 
              <?php endif; ?>
            </div>


            <div class="form-group">
              <label for="exampleInputEmail1" class="control-label col-sm-3"><?php echo e(trans('messages.property.home_type')); ?></label>
              <div class="col-sm-6">
              <select name="property_type_id" class="form-control">
                <?php $__currentLoopData = $property_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option data-icon-class="icon-star-alt"  value="<?php echo e($key); ?>">
                    <?php echo e($value); ?>

                  </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>
              <?php if($errors->has('property_type_id')): ?> <p class="error-tag"><?php echo e($errors->first('property_type_id')); ?></p> <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1" class="control-label col-sm-3"><?php echo e(trans('messages.property.room_type')); ?></label>

			<div class="col-sm-6">
              <select name="space_type" class="form-control">
                <?php $__currentLoopData = $space_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option data-icon-class="icon-star-alt" value="<?php echo e($key); ?>">
                    <?php echo e($value); ?>

                  </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>
              <?php if($errors->has('space_type')): ?> <p class="error-tag"><?php echo e($errors->first('space_type')); ?></p> <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1" class="control-label col-sm-3"><?php echo e(trans('messages.property.accommodate')); ?></label>
              <div class="col-sm-6">
              <select name="accommodates" class="form-control">
                <?php for($i=1;$i<=16;$i++): ?>
                  <option class="accommodates" data-accommodates="<?php echo e(($i == '16') ? $i.'+' : $i); ?>" value="<?php echo e(($i == '16') ? $i.'+' : $i); ?>">
                    <?php echo e($i); ?>

                  </option>
                <?php endfor; ?>
              </select>
              </div>
              <?php if($errors->has('accommodates')): ?> <p class="error-tag"><?php echo e($errors->first('accommodates')); ?></p> <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="control-label col-sm-3"><?php echo e(trans('messages.property.city')); ?></label>
              <div class="col-sm-6">
              <input type="text" class="form-control" id="map_address" name="map_address" placeholder="" required>
              </div>
              <?php if($errors->has('map_address')): ?> <p class="error-tag"><?php echo e($errors->first('map_address')); ?></p> <?php endif; ?>
              <div id="us3"></div>
            </div>
            </div> 
				<div class="box-footer">
                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                <button type="submit" class="btn btn-info pull-right btn-sm">Continue</button>
              </div>
          </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
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
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>