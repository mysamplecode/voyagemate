<?php $__env->startSection('main'); ?>
<div class="controls">
	<div class="upload-section">
	    <div class="upload-images">
			<img src="<?php echo e(url('public/images/uploads').'/'.@$result->user_id.'/medium/'.@$result->image); ?>" alt="" class="img-responsive"/>
		</div>
		<!--<div class="mtop15 text-center rotat">
			<div class="favPhoto tot"><i class="fa fa-repeat fa-2x" aria-hidden="true"></i></div>
			<div class="favPhoto rotColor pinkColor">Replace Images</div>
			<div class="favPhoto"><i class="fa fa-repeat fa-2x" aria-hidden="true"></i></div>
		</div>-->
	</div>
	<div class="load-section">
		<form method="post" action="<?php echo e(url('photo-details').'/'.@$result->id); ?>">
			<div class="panel-body mtop20">
				<div class="col-md-12">
					<div class="col-md-9"><strong><?php echo e(trans('messages.photo_details.sell_photo')); ?></strong></div>
					<div class="col-md-3">
						<input style="height:20px;margin-left:35px !important;" id="sell_photo" name="sell_photo" class="form-control" type="checkbox" value="Yes" <?php echo e($result->sell_photo == 'Yes'? 'checked':''); ?>>
					</div>
				</div>
				<div class="col-md-12 <?php echo e(@$result->sell_photo != 'Yes'? 'display-off':''); ?>" id="price" style="margin-top:5px;">
					<div class="col-md-1" style="padding-top:5px;">
						<?php echo e($default_currency->symbol); ?>

					</div>
					<div class="col-md-11">
						<input  type="number" name="price" class="form-control" placeholder="" value="<?php echo e(@$result->price); ?>">
					</div>
				</div>
			</div>
			<div class="form-group mtop10">
				<label for="exampleInputEmail1"><?php echo e(trans('messages.photo_details.category')); ?></label>
				<select name="category[]" class="form-control custom" id="details-category" multiple="multiple">
					<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				   		<option value="<?php echo e($key); ?>" <?php echo e(isset($details['categories']) && in_array($key, unserialize($details['categories']))?"selected=selected":''); ?>><?php echo e($value); ?></option>
				  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			</div>
			<hr>
			<div class="dot">
			  <div class="form-group ">
				<label for="exampleInputEmail1"><?php echo e(trans('messages.photo_details.title')); ?></label>
				<input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo e(@$result->title); ?>">
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1"><?php echo e(trans('messages.photo_details.description')); ?></label>
				<textarea name="description" class="form-control" rows="5"><?php echo e(@$result->description); ?></textarea>
			  </div>
				</div>
			<hr>
			
			<!--<div class="checkbox-widget">
				<div class="checked favPhoto">
					<input type="checkbox"> 
				</div>
				<div class="checkget favPhoto">  
					Favourite this photo and show it on the front page of my profile
					<div>You can use the favourite icon while managing your photos to change this at any time </div>
				</div>
			</div>-->
			<div class="clearfix"></div>
			<hr>
			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo e(trans('messages.photo_details.location')); ?></label>
				<div class="map">
					<div id="us3" style="width: 400px; height: 250px;"></div>
					<!--<img src="img/map.png" alt="" class="img-responsive" >-->
				</div>
				<div class="form-group mtop20">
					<input type="hidden" class="form-control" name="longitude" id="us3-lat" placeholder="" value="<?php echo e(isset($details['longitude'])?$details['longitude']:0); ?>">
					<input type="hidden" class="form-control" name="latitude" id="us3-lon" placeholder="" value="<?php echo e(isset($details['latitude'])?$details['latitude']:0); ?>">
					<input type="text" class="form-control" name="address" id="us3-address" placeholder="" value="<?php echo e(@$details['address']); ?>">
				</div>
			</div>
			<hr>
			<div class="finish-b">
				<button type="submit" class="btn btn-pinkbg"><?php echo e(trans('messages.photo_details.finish_upload')); ?></button>
			</div>
		</form>
	</div>
</div><!--controls end-->	
<div class="container">
	<div class="clearfix"></div>
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
	$('#details-category').select2();

	function updateControls(addressComponents) {
        if( addressComponents.stateOrProvince !== 'undefined' && addressComponents.city !== 'undefined' && addressComponents.country !== 'undefined' && addressComponents.city !== null && addressComponents.country !== null && addressComponents.city !== '' && addressComponents.country !== '' && addressComponents.stateOrProvince !== ''){
            $('#us3-address').val(addressComponents.city+', '+addressComponents.country_fullname);
        }
    }
    
    $('#sell_photo').on('change', function(){
    	//alert($('#price').val());
    	//$('#price').show();
    	if (this.checked) {
	        $('#price').show();
	    }else{
	    	 $('#price').hide();
	    }
    });

    $('#us3').locationpicker({
        location: {
            latitude: $('#us3-lat').val(),
            longitude: $('#us3-lon').val()
        },
        radius: 0,
        inputBinding: {
            latitudeInput: $('#us3-lat'),
            longitudeInput: $('#us3-lon'),
            locationNameInput: $('#us3-address')
        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            var addressComponents = $(this).locationpicker('map').location.addressComponents;
            updateControls(addressComponents);
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>