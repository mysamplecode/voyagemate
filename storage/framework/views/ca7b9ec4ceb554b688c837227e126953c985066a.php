<?php $__env->startSection('main'); ?>
  <div class="container margin-top40 mb30">
    <?php echo $__env->make('listing.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <form method="post" action="<?php echo e(url('listing/'.$result->id.'/'.$step)); ?>" class='signup-form login-form' accept-charset='UTF-8'>
      <div class="col-md-9">
        <input type="hidden" name='from_place_id' value="<?php echo e($result->property_address->from_place_id); ?>" id='from_place_id'>
        <input type="hidden" name='to_place_id' value="<?php echo e($result->property_address->to_place_id); ?>" id='to_place_id'>
        
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
            <label class="label-large"><?php echo e(trans('messages.listing_location.from')); ?></label>
            <input type="text" name="address_line_1" id="address_line_1" value="<?php echo e(@$result->property_address->address_line_1); ?>" class="form-control" placeholder="House name/number + street/road">
            <span class="text-danger"><?php echo e($errors->first('address_line_1')); ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <label class="label-large"><?php echo e(trans('messages.listing_location.to')); ?></label>
            <input type="text" name="address_line_2" id="address_line_2" value="<?php echo e(@$result->property_address->address_line_2); ?>" class="form-control" placeholder="Apt., suite, building access code">
            <span class="text-danger"><?php echo e($errors->first('address_line_2')); ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <style>
                 .controls {
                margin-top: 10px;
                border: 1px solid transparent;
                border-radius: 2px 0 0 2px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                height: 32px;
                outline: none;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
              }
              #mode-selector {
                color: #fff;
                background-color: #4d90fe;
                padding: 5px 11px 0px 11px;
              }

              #mode-selector label {
                font-family: Roboto;
                font-size: 13px;
                font-weight: 300;
              }
            </style>
            <div id="mode-selector" class="controls">
              <input type="radio" name="type" id="changemode-walking" checked="checked">
              <label for="changemode-walking">Walking</label>

              <input type="radio" name="type" id="changemode-transit">
              <label for="changemode-transit">Transit</label>

              <input type="radio" name="type" id="changemode-driving">
              <label for="changemode-driving">Driving</label>
            </div>
            <div id="map_view" style="width:100%; height:400px;"></div>
          </div>
          <div class="col-md-8">
            <p>You can move the pointer to set the correct map position</p>
            <span class="text-danger"><?php echo e($errors->first('latitude')); ?></span>
            
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
 <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map_view'), {
          mapTypeControl: false,
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });

        new AutocompleteDirectionsHandler(map);

      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = '<?php echo e($result->property_address->from_place_id); ?>';
        this.destinationPlaceId = '<?php echo e($result->property_address->to_place_id); ?>';
        this.travelMode = 'WALKING';
        var originInput = document.getElementById('address_line_1');
        var destinationInput = document.getElementById('address_line_2');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
            $('#from_place_id').val(place.place_id);
          } else {
            me.destinationPlaceId = place.place_id;
            $('#to_place_id').val(place.place_id);
          }
          me.route();
        });
        me.route();

      };

      AutocompleteDirectionsHandler.prototype.route = function() {

        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;
        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>