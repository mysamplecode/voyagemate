<?php $__env->startSection('main'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Photos
        <small>Control panel</small>
      </h1>
      <?php echo $__env->make('admin.common.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Update Photo Details</h3>
                        <!--<div style="float:right;"><a class="btn btn-success" href="<?php echo e(url('admin/display_photos')); ?>">Add Photos</a></div>-->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                            <div class="col-md-12">
                                <div class="col-md-7">
                                      <form method="post" action="<?php echo e(url('admin/display_photo').'/'.@$result->id); ?>">
                                            <div class="form-group">
                                                <div class="col-md-3" style="margin-left:-17px"><strong>Sell photo </strong></div>
                                                <div class="col-md-2">
                                                    
                                                      <input style="height:25px;width:25px;border-color:#808080;border-radius:4px;margin-bottom:10px" id="sell_photo" class="form-control" name="sell_photo"  type="checkbox" value="<?php echo e(@$result->sell_photo); ?>" <?php echo e(@$result->sell_photo == 'Yes'? 'checked':''); ?>>
                                                    
                                                </div>
                                             </div><br>
                                              <div class="clearfix"></div>

                                              <div class="form-group">
                                                <input id="price" type="number" name="price" class="form-control <?php echo e(@$result->sell_photo != 'Yes'? 'display-off':''); ?>" placeholder="" value="<?php echo e(@$result->price); ?>">
                                              </div>
                                            
                                            <div class="clearfix"></div>
                                            <div class="form-group mtop10">
                                              <label for="exampleInputEmail1">Category</label>
                                              <select name="category[]" class="form-control custom" id="details-category" multiple="multiple">
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>" <?php echo e(isset($details['categories']) && in_array($key, unserialize($details['categories']))?"selected=selected":''); ?>><?php echo e($value); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </select>
                                            </div>
                                            <hr>
                                            <div class="dot">
                                              <div class="form-group ">
                                              <label for="exampleInputEmail1">Title</label>
                                              <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo e(@$result->title); ?>">
                                              </div>
                                              <div class="form-group">
                                              <label for="exampleInputEmail1">Description</label>
                                              <textarea name="description" class="form-control" rows="5"><?php echo e(@$result->description); ?></textarea>
                                              </div>
                                              </div>
                                            <hr>
                                            <div class="clearfix"></div>
                                            <hr>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Location</label>
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
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Status</label>
                                              <div>
                                                <select name="status" class="form-control custom" id="status">
                                                    <option value="Active" <?php echo e($result->status == 'Active'?"selected=selected":''); ?>>Active</option>
                                                    <option value="Inactive" <?php echo e($result->status == 'Inactive'?"selected=selected":''); ?>>Inactive</option>
                                                </select>
                                              </div>
                                            </div>
                                            <hr>
                                            <div class="finish-b">
                                              <button type="submit" class="btn btn-primary">Update Information</button>
                                            </div>
                                      </form>
                                </div>
                                <div class="col-md-5">
                                      <img src="<?php echo e(url('public/images/uploads').'/'.@$result->user_id.'/medium/'.@$result->image); ?>" alt="" class="img-responsive"/>
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=<?php echo e($map_key); ?>&sensor=false&libraries=places'></script>
<script src="<?php echo e(url('public/front/js/locationpicker.jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('public/front/js/select2.js')); ?>"></script>

<script type="text/javascript">
  $('#details-category').select2();

  function updateControls(addressComponents) {
        if( addressComponents.stateOrProvince !== 'undefined' && addressComponents.city !== 'undefined' && addressComponents.country !== 'undefined' && addressComponents.city !== null && addressComponents.country !== null && addressComponents.city !== '' && addressComponents.country !== '' && addressComponents.stateOrProvince !== ''){
            $('#us3-address').val(addressComponents.city+', '+addressComponents.country_fullname);
        }
    }
    
    $(window).on('load change', function(){

      if ($('#sell_photo').is(':checked') == true) {
          $('#price').show();
          $('#sell_photo').css("background-image",'url(../../public/images/menu_check.png)');
      }else{
         $('#price').hide();
         $('#sell_photo').css("background-image",'');
      }
    });

    $('#us3').locationpicker({
      //alert($('#us3-lat').val());
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
            //alert(addressComponents);
            updateControls(addressComponents);
        }
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
     $('li.select2-selection__choice').addClass('select2Custom');
     $("#details-category").on('change',function(){
        $('li.select2-selection__choice').addClass('select2Custom');
      });
  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>