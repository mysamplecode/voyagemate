

<?php $__env->startSection('main'); ?>
<div class="container-fluid margin-top10 mb30">
  <div class="col-md-7 col-sm-8 col-xs-12 mb10 l-pad-none r-pad-none hidden-pod" style="">
    <div>
      <h5 class="col-sm-2" for="user_birthdate"><?php echo e(trans('messages.search.dates')); ?></h5>
      <div class="col-sm-10">
        <div class="row">
          <div class="select col-sm-4">
            <input id="search-pg-checkin" size="30" class="form-control" name="text" value="<?php echo e($checkin); ?>" placeholder="<?php echo e(trans('messages.search.check_in')); ?>" type="text">
          </div>
      
          <div class="select col-sm-4">
            <input id="search-pg-checkout" size="30" class="form-control" name="text" value="<?php echo e($checkout); ?>" placeholder="<?php echo e(trans('messages.search.check_out')); ?>"type="text">
          </div>
          <input type="hidden" name='location' id="search-pg-location" value="<?php echo e($location); ?>">
          <input type="hidden" id="location" value="<?php echo e($location); ?>">
          <input type="hidden" id="lat" value="<?php echo e($lat); ?>">
          <input type="hidden" id="long" value="<?php echo e($long); ?>">
          <div class="select col-sm-4">
          <select id="search-pg-guest" class="form-control" name="birthday_year">
              <option value=""><?php echo e(trans('messages.search.guest')); ?></option>
              <?php for($i=1;$i<=16;$i++): ?>
                <option value="<?php echo e($i); ?>" <?php echo e($guest == $i ? "selected=selected":''); ?>> <?php echo e(($i == '16') ? $i.'+ '.'guest' : $i.' '.'guest'); ?> </option>
              <?php endfor; ?>
          </select>
          </div>
        </div>
      </div>
    </div>
         
    <div>
      <h5 class="col-sm-2" for="user_birthdate"><?php echo e(trans('messages.search.room_type')); ?></h5>
      <div class="col-sm-10">
       
          <?php $__currentLoopData = $space_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-4 l-pad-none">
            <div class="list-group-item" style="padding:10px 10px;">
              <?php if($row == 1): ?>
              <i class="icon icon-entire-place h5 needsclick"></i>
              <?php endif; ?>
              <?php if($row == 2): ?>
              <i class="icon icon-private-room h5 needsclick"></i>
              <?php endif; ?>
              <?php if($row == 3): ?>
              <i class="icon icon-shared-room h5 needsclick"></i>
              <?php endif; ?>
              <?php echo e($value); ?>

              <label class="pull-right">
                <input type="checkbox" id="space_type_<?php echo e($row); ?>" name="space_type[]" value="<?php echo e($row); ?>" class="space_type" <?php echo e(in_array($row, $space_type_selected)?'checked':''); ?>>
              </label>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    <div>
      <h5 class="col-sm-2" for="user_birthdate" style="margin-top:20px;"><?php echo e(trans('messages.search.price_range')); ?></h5>
      <div class="col-sm-9" style="margin-top:20px;">
        <input id="price-range" data-provide="slider" data-slider-min="<?php echo e($min_price); ?>" data-slider-max="<?php echo e($max_price); ?>" data-slider-value="[<?php echo e($min_price); ?>,<?php echo e($max_price); ?>]"/>  
      </div>
    </div>

    <div class="clearfix"></div>
    <hr>
        
    <button class="btn btn-warning" id="more_filters" data-status="show" type="submit"><?php echo e(trans('messages.search.more_filters')); ?></button>
    <div class="margin-top20 mb30" >
      <div class="rooms">
        <div id="loader" class="display-off" style="min-height:200px;width:100%;text-align:center;opacity:0.9;padding-top: 70px;">
          <img src="<?php echo e(URL::to('/')); ?>/public/front/img/green-loader.gif">
        </div>
        <div id="properties_show">
          <h2 class="text-center" ><?php echo e(trans('messages.search.no_result_found')); ?></h2>
        </div>
      </div>

      <div class="display-off room_filter">
        <div class="size-div">
          <h5 class="col-sm-2" for="user_birthdate"><?php echo e(trans('messages.search.size')); ?></h5>
          <div class="col-sm-10">
            <div class="row">
              <div class="select col-sm-4">
                <select name="min_bedrooms" class="form-control" id="map-search-min-bedrooms">
                  <option value=""><?php echo e(trans('messages.search.bedrooms')); ?></option>
                  <?php for($i=1;$i<=10;$i++): ?>
                  <option value="<?php echo e($i); ?>" { $bedrooms == $i?'selected':''}}>
                  <?php echo e($i); ?> <?php echo e(trans('messages.search.bedrooms')); ?>

                  </option>
                  <?php endfor; ?> 
                </select>
              </div>
          
              <div class="select col-sm-4">
                <select name="min_bathrooms" class="form-control" id="map-search-min-bathrooms">
                  <option value=""><?php echo e(trans('messages.search.bathrooms')); ?></option>
                  <?php for($i=0.5;$i<=8;$i+=0.5): ?>
                  <option class="bathrooms" value="<?php echo e($i); ?>" <?php echo e($bathrooms == $i?'selected':''); ?>>
                  <?php echo e(($i == '8') ? $i.'+' : $i); ?> <?php echo e(trans('messages.search.bathrooms')); ?>

                  </option>
                  <?php endfor; ?>
                </select>
              </div>
              
              <div class="select col-sm-4">
                <select name="min_beds" class="form-control" id="map-search-min-beds">
                  <option value=""><?php echo e(trans('messages.search.beds')); ?></option>
                  <?php for($i=1;$i<=16;$i++): ?>
                  <option value="<?php echo e($i); ?>" <?php echo e($beds == $i?'selected':''); ?>>
                  <?php echo e(($i == '16') ? $i.'+' : $i); ?> <?php echo e(trans('messages.search.beds')); ?>

                  </option>
                  <?php endfor; ?> 
                </select>
              </div>
            </div>
          </div>
        </div>
		
    		<div style="height:180px; overflow-y:scroll; overflow:auto; border:1px solid #FFFFFF;">
            <div class="amenities">
              <h5 class="col-sm-2" for="user_birthdate"><?php echo e(trans('messages.search.amenities')); ?></h5>
              <div class="col-sm-9 mrg-top-10">
                <?php  $row_inc = 1  ?>
                <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_amenities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if($row_inc <= 3): ?>
                    <div class="col-md-4 l-pad-none">
                      <label class="text-truncate" title="<?php echo e($row_amenities->title); ?>">
                        <input type="checkbox" name="amenities[]" value="<?php echo e($row_amenities->id); ?>" class="form-control amenities_array" id="map-search-amenities-<?php echo e($row_amenities->id); ?>" >
                        <?php echo e($row_amenities->title); ?>

                      </label>
                    </div>
                   <?php endif; ?>
                  <?php  $row_inc++  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <div class="collapse" id="amenities-collapse">
                  <?php  $amen_inc = 1  ?>
                  <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_amenities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($amen_inc > 3): ?>
                    <div class="col-md-4 l-pad-none">
                      <label class="text-truncate" title="<?php echo e($row_amenities->title); ?>">
                        <input type="checkbox" name="amenities[]" value="<?php echo e($row_amenities->id); ?>" class="form-control amenities_array" id="map-search-amenities-<?php echo e($row_amenities->id); ?>" ng-checked="<?php echo e((in_array($row_amenities->id, $amenities_selected)) ? 'true' : 'false'); ?>">
                        <?php echo e($row_amenities->title); ?>

                      </label>
                    </div>
                    <?php endif; ?>
                    <?php  $amen_inc++  ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
              <div class="col-sm-1 mrg-top-10">
                  <i style="cursor: pointer;" data-toggle="collapse" data-target="#amenities-collapse" class="fa fa-plus"></i>
              </div>
            </div>
    		
    		
            <div class="propery">
              <h5 class="col-sm-2" for="user_birthdate"><?php echo e(trans('messages.search.property_type')); ?></h5>
              <div class="col-sm-9 mrg-top-10">
                <?php  $pro_inc = 1  ?>
                <?php $__currentLoopData = $property_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_property_type =>$value_property_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($pro_inc <= 3): ?>
                    <div class="col-md-4 l-pad-none">
                      <label class="text-truncate" title="<?php echo e($value_property_type); ?>">
                        <input type="checkbox" name="property_type[]" value="<?php echo e($row_property_type); ?>" class="form-control" id="map-search-property_type-<?php echo e($row_property_type); ?>">
                        <?php echo e($value_property_type); ?>

                      </label>
                    </div>
                  <?php endif; ?>
                  <?php  $pro_inc++  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <div class="collapse" id="property-collapse">
                 <?php  $property_inc = 1  ?>
                 <?php $__currentLoopData = $property_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_property_type =>$value_property_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($property_inc > 3): ?>
                    <div class="col-md-4 l-pad-none">
                      <label title="<?php echo e($value_property_type); ?>">
                        <input type="checkbox" name="property_type[]" value="<?php echo e($row_property_type); ?>" class="form-control" id="map-search-property_type-<?php echo e($row_property_type); ?>">
                        <?php echo e($value_property_type); ?>

                      </label>
                    </div>
                    <?php endif; ?>
                    <?php  $property_inc++  ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
              <div class="col-sm-1 mrg-top-10">
                  <i style="cursor: pointer;" data-toggle="collapse" data-target="#property-collapse" class="fa fa-plus"></i>
              </div>
            </div>
    		</div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div id="pagination">    
      <div class="h6" style="padding-left:15px;"><span id="page-from">0</span> – <span id="page-to">0</span> of <span id="page-total">0</span> Rentals</div>
      <ul class="pager" id="pager">
        <!--<li><a href="#">Next</a></li>
        <li><a href="#">>></a></li>-->
      </ul>
    </div>
    
    <hr>
	
	<div class="col-md-7 col-sm-12 col-xs-12 display-off room_filter exPod-btnOn" style="">
    <button class="btn btn-danger filter-cancel"><?php echo e(trans('messages.search.cancel')); ?></button>
    <button class="btn btn-success filter-apply"><?php echo e(trans('messages.search.apply_filter')); ?></button>
  </div>

  </div>
  
  
  
  <div class="col-md-5 col-sm-4 col-xs-12 mb10 r-pad-none l-pad-none">
    <div id="map_view" style="width:100%; height:600px;"></div>
  </div> 
  
  
  <div class="col-md-7 col-sm-8 col-xs-12 display-off room_filter exPod-btn" style="">
    <button class="btn btn-danger filter-cancel"><?php echo e(trans('messages.search.cancel')); ?></button>
    <button class="btn btn-success filter-apply"><?php echo e(trans('messages.search.apply_filter')); ?></button>
  </div>
  <div class="col-md-5 col-sm-4 col-xs-12 mb10">
    <div>&nbsp;</div>
  </div> 

</div>

<?php $__env->startPush('scripts'); ?>
  <script type="text/javascript">
    var markers = [];

    $("#price-range").slider();
    $("#price-range").on("slideStop", function(slideEvt) {
      deleteMarkers();
      getProperties($('#map_view').locationpicker('map').map);
    });

    $('#search-pg-guest').on('change', function(){
      deleteMarkers();
      getProperties($('#map_view').locationpicker('map').map);
    });

    $("#search-pg-checkin").datepicker({
        dateFormat: "dd-mm-yy",
        minDate: 0,
        onSelect: function(e) {
            var t = $("#search-pg-checkin").datepicker("getDate");
            t.setDate(t.getDate() + 1), $("#search-pg-checkout").datepicker("option", "minDate", t), setTimeout(function() {
                $("#search-pg-checkout").datepicker("show")
            }, 20)
          getProperties($('#map_view').locationpicker('map').map);
        }
    });

    $("#search-pg-checkout").datepicker({
        dateFormat: "dd-mm-yy",
        minDate: 1,
        onClose: function() {
            var e = $("#checkin").datepicker("getDate"),
                t = $("#header-search-checkout").datepicker("getDate");
            if (e >= t) {
                var a = $("#search-pg-checkout").datepicker("option", "minDate");
                $("#search-pg-checkout").datepicker("setDate", a)
            }
        }, onSelect: function(){
          getProperties($('#map_view').locationpicker('map').map);
        }
    });

    $(document.body).on('click', '.page-data', function(e){
      e.preventDefault();
      var hr = $(this).attr('href');
      getProperties($('#map_view').locationpicker('map').map, hr);
    });

    function addMarker(map, features){
        var infowindow = new google.maps.InfoWindow();
        for (var i = 0, feature; feature = features[i]; i++) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(feature.latitude, feature.longitude),
                icon: feature.icon !== undefined ? feature.icon : undefined,
                map: map,
                title: feature.title !== undefined? feature.title : undefined,
                content: feature.content !== undefined? feature.content : undefined,
            });
            markers.push(marker);

            google.maps.event.addListener(marker, 'click', function (e) {
              //e.preventDefault();
                if(this.content){
                    infowindow.setContent(this.content);
                    infowindow.open(map, this);
                }
            });
        }
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
      for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
      }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
      setMapOnAll(null);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
      clearMarkers();
      markers = [];
    }

    function getProperties(map, url=''){
      p = map;
      var a = p.getZoom(),
          t = p.getBounds(),
          o = t.getSouthWest().lat(),
          i = t.getSouthWest().lng(),
          s = t.getNorthEast().lat(),
          r = t.getNorthEast().lng(),
          l = t.getCenter().lat(),
          n = t.getCenter().lng();

      var range = $('#price-range').attr('data-value');
      range = range.split(',');

      var map_details = a + "~" + t + "~" + o + "~" + i + "~" + s + "~" + r + "~" + l + "~" + n;
      var location = $('#location').val();
      var min_price = range[0];
      var max_price = range[1];
      var amenities = getCheckedValueArray('amenities');
      var property_type = getCheckedValueArray('property_type');
      var space_type = getCheckedValueArray('space_type');
      var beds = $('#map-search-min-beds').val();
      var bathrooms = $('#map-search-min-bathrooms').val();
      var bedrooms = $('#map-search-min-bedrooms').val();
      var checkin = $('#search-pg-checkin').val();
      var checkout = $('#search-pg-checkout').val();
      var guest = $('#search-pg-guest').val();
      //var map_details = map_details;
      var dataURL = '<?php echo e(url("search/result")); ?>';
      if(url != '') dataURL = url;
    
      if($('#more_filters').css('display') != 'none'){
        $.ajax({
          url: dataURL,
          data: {
            'location': location,
            'min_price': min_price,
            'max_price': max_price, 
            'amenities': amenities,
            'property_type': property_type,
            'space_type': space_type,
            'beds': beds,
            'bathrooms': bathrooms,
            'bedrooms': bedrooms,
            'checkin': checkin, 
            'checkout': checkout, 
            'guest': guest, 
            'map_details': map_details
          },
          type: 'post',
          //async: false,
          dataType: 'json',
          beforeSend: function (){
            $('#properties_show').html("");
            show_loader();
          },
          success: function (result) {
            $('#page-total').html(result.total);
            $('#page-from').html(result.from);
            $('#page-to').html(result.to);

            var pager = '';
            if(result.prev_page_url) pager +=  '<li><a class="page-data" href="'+result.prev_page_url+'">Previous</a></li>';
            if(result.current_page) pager +=  '<li><a href="#">'+result.current_page+'</a></li>';
            if(result.next_page_url) pager +=  '<li><a class="page-data" href="'+result.next_page_url+'">Next</a></li>';
            $('#pager').html(pager);

            var properties = result.data;
            var room_point = [];
            var room_div = "";
            for (var key in properties) {
              if (properties.hasOwnProperty(key)) {
                room_point[key] = {
                  latitude: properties[key].property_address.latitude,
                  longitude: properties[key].property_address.longitude,
                  title: properties[key].name,
                  //content: '<h5>'+properties[key].name+'</h5>'+'<p>'+properties[key].summary+'</p>'
                  content: '<a href="#" class="media-cover">'
                              +'<img style="max-height:150px;max-width:200px;" src="'+'<?php echo e(url("images")); ?>/'+properties[key].photo_name+'" alt="">'
                            +'</a>'
                            +'<div style="max-height:150px;max-width:200px;">'
                              +'<div class="col-xs-12" style="padding:2px 0px;">'
                                 +'<div class="location-title"><h5 style="margin-bottom:0px;">'+properties[key].name+'</h5></div>'
                                 +'<div class="text-muted">'+properties[key].property_description.summary.substring(0,50)+' ...<a href="'+APP_URL+'/properties/'+properties[key].id+'?checkin='+checkin+'&checkout='+checkout+'&guests='+guest+'" class="media-cover">more>></a>'+'</div>'
                               +'</div>'
                            +'</div>'
                };
                var active_star = Math.floor(properties[key].overall_rating/25);
                var review = '';
                if(active_star){ 
                  review = '<div class="star-rating"> <div class="foreground"> ';
                  for(var i=0; i < active_star; i++){
                    review += '<i class="icon icon-star icon-beach"></i> ';
                  }
                  review +=  '</div> <div class="background"><i class="icon icon-star icon-light-gray"></i> <i class="icon icon-star icon-light-gray"></i> <i class="icon icon-star icon-light-gray"></i> <i class="icon icon-star icon-light-gray"></i> <i class="icon icon-star icon-light-gray"></i> </div> </div>';
                } 
                reviews_count = '';
                if(properties[key].reviews_count == 1) reviews_count = properties[key].reviews_count+' Review';
                else if(properties[key].reviews_count > 0) reviews_count = properties[key].reviews_count+' Reviews';
                
                review_sec = '';
                if(properties[key].reviews_count != 0)
                  review_sec = ' . '+review+' . '+reviews_count;
                else
                  review_sec = '';
                room_div += '<div class="col-md-6 col-sm-6 col-xs-12 mb10">'
                              +'<div style="min-height:200px;background-color:#999999;">'
                                +'<a target="listing_'+properties[key].id+'" href="'+APP_URL+'/properties/'+properties[key].id+'?checkin='+checkin+'&checkout='+checkout+'&guests='+guest+'" class="media-cover">'
                                    +'<img style="height:200px;" src="'+properties[key].cover_photo+'" alt="">'
                                +'</a>'
                              +'</div>'
                              +'<div>'
                                +'<div class="media-left">'
                                  +'<div class="media-user">'
                                    +'<div class="doller-sign-bg">'+properties[key].property_price.currency.symbol+' '+properties[key].property_price.price+'</div>'
                                  +'</div>'
                                +'</div>'
                                +'<div class="media-user">'
                                  +'<a target="_blank" href="'+APP_URL+'/users/show/'+properties[key].host_id+'">'
                                    +'<div class="media-user-img"><img src="'+properties[key].users.profile_src+'" alt="" width="100%"></div>'
                                  +"</a>"
                              +'</div>'
                              +'<div class="col-xs-12 mb20">'
                                  +'<a target="listing_'+properties[key].id+'" href="'+APP_URL+'/properties/'+properties[key].id+'?checkin='+checkin+'&checkout='+checkout+'&guests='+guest+'" class="media-cover">'
                                    +'<div class="location-title">'+properties[key].name+'</div>'
                                  +"</a>"
                                  +properties[key].space_type_name+review_sec
                                +'</div>'
                              +'</div>'
                            +'</div>';
              }
            }

            if(room_div != '') $('#properties_show').html(room_div);
            else $('#properties_show').html('<h2 class="text-center">No Results Found</h2>');
           
            //deleteMarkers();
            addMarker(map, room_point);
           
          },
          error: function (request, error) {
            // This callback function will trigger on unsuccessful action
            console.log(error);
          },
          complete: function(){
            hide_loader();
          }
        });
      }
    }

    $('.space_type').on('click', function(){
      deleteMarkers();
      getProperties($('#map_view').locationpicker('map').map);
      $('.room_filter').addClass('display-off');
      $('#more_filters').show();
    });

    $('#more_filters').on('click', function(){
      $('#more_filters').hide();
      //console.log($('#more_filters').css('display'));
      $('#pagination').hide();
      $('#properties_show').html("");
      $('.room_filter').removeClass('display-off');
      var width = $( window ).width();
      if(width < 980) $('.exPod-btnOn').show();
    });

    $('.filter-cancel').on('click', function(){
      $('.room_filter').addClass('display-off');
      $('#more_filters').show();
      $('#pagination').show();
      $('.exPod-btnOn').hide();
      getProperties($('#map_view').locationpicker('map').map);
    });

    $('.filter-apply').on('click', function(){
      $('.room_filter').addClass('display-off');
      $('#more_filters').show();
      $('#pagination').show();
      $('.exPod-btnOn').hide();
      deleteMarkers();
      getProperties($('#map_view').locationpicker('map').map);
    });

    function getCheckedValueArray(field_name){
      var array_Value = '';
      /*var i=0;
      $('input[name="'+field_name+'[]"]').each(function() { 
        if($(this).prop( "checked" ))
         array_Value[i++] = $(this).val(); 
      });*/
      array_Value = $('input[name="'+field_name+'[]"]:checked').map(function() {
        return this.value;
      })
      .get()
      .join(',');

      return array_Value;
    }

    $('#map_view').locationpicker({
        location: {
            latitude: <?php echo e("$lat"); ?>,
            longitude: <?php echo e("$long"); ?>

        },
        radius: 0,
        zoom: 13,
        addressFormat: "",
        markerVisible: false,
        markerInCenter: true,
        inputBinding: {
            latitudeInput: $('#latitude'),
            longitudeInput: $('#longitude'),
            locationNameInput: $('#address_line_1')
        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            getProperties($(this).locationpicker('map').map);
        },

        oninitialized: function (component) {
            var addressComponents = $(component).locationpicker('map').location.addressComponents;
            //updateControls(addressComponents);
        }
    });

    $( window ).resize(function() {
      var width = $( window ).width();
      if(width > 980) $('.exPod-btnOn').hide();
    });
    
    function show_loader(){
      $('#loader').removeClass('display-off');
      $('#pagination').hide();
    }
    
    function hide_loader(){
      $('#loader').addClass('display-off');
      $('#pagination').show();
    }
  </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>