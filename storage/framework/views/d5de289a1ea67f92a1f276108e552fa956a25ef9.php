
<?php $__env->startSection('main'); ?>
  <div class="content-wrapper">
      <section class="content-header">
              <h1>
              Photos
              <small>Photos</small>
            </h1>
            <ol class="breadcrumb">
        <li><a href="<?php echo e(url('/')); ?>/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
      </section>
      <section class="content">
      <div class="row">
        <div class="col-md-3 settings_bar_gap">
          <?php echo $__env->make('admin.common.property_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="col-md-9">
          <div class="box box-info">
          <div class="box-body">        
          
          <form enctype='multipart/form-data' method="post" action="<?php echo e(url('admin/listing/'.$result->id.'/'.$step)); ?>" class='signup-form login-form' accept-charset='UTF-8'>
            <div class="col-md-12">
              <div class="col-md-6">
                <input class="field" id="photo_file" name="photos[]" type="file" multiple="">
              </div>
              <div class="col-md-6">
                <button type="submit" class="btn btn-large btn-primary next-section-button">
                  <?php echo e(trans('messages.listing_description.upload')); ?>

                </button>
              </div>
            </div>
            <br>
            <br>
          </form>

          <div class="row">
            <div id="photo-list-div" class="col-md-12 l-pad-none min-height-div">
              <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 margin-top10" id="photo-div-<?php echo e($photo->id); ?>">
                  <div class="room-image-container200" style="background-image:url(<?php echo e(url('public/images/property/'.$photo->property_id.'/'.$photo->photo)); ?>);">
                    <a class="photo-delete" href="javascript:void(0)" data-rel="<?php echo e($photo->id); ?>"><p class="photo-delete-icon"><i class="fa fa-trash-o"></i></p></a>
                  </div>
                  <div class="margin-top5">
                    <textarea data-rel="<?php echo e($photo->id); ?>" class="form-control photo-highlights" placeholder="What are the highlights of this photo?"><?php echo e(@$photo->message); ?></textarea>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-md-12">
              <span class="text-danger display-off" id='photo'>This field is required 
            </div>
          </div>
          <div class="row">
            <br>

          <div class="col-md-12">
            <div class="col-md-10 col-sm-6 col-xs-6 l-pad-none text-left">
                <a data-prevent-default="" href="<?php echo e(url('admin/listing/'.$result->id.'/amenities')); ?>" class="btn btn-large btn-primary"><?php echo e(trans('messages.listing_description.back')); ?></a>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6 text-right">
              <a href="<?php echo e(url('admin/listing/'.$result->id.'/pricing')); ?>" class="btn btn-large btn-primary next-section-button">
               <?php echo e(trans('messages.listing_basic.next')); ?> 
              </a>
            </div>
          </div>
          </div>
          </div>
          </div>

        </div>
      </div>
      </section>
  </div>
<?php $__env->startPush('scripts'); ?>
  <script type="text/javascript">
    var gl_photo_id = 0;
    $(document).on('submit', '#photo-form', function(e){
      e.preventDefault();
      $('#photo').hide();
      var dataURL = '<?php echo e(url("add_photos/$result->id")); ?>';
      var form_data = new FormData(this);
      var photo_file = $('#photo_file').val();
      if(photo_file != ''){
       // page_loader_start();
        $.ajax({
          url: dataURL,
          data: form_data,
          type: 'post',
          async: false,
          dataType: 'json',
          processData: false,
          contentType: false,
          success: function (result) {
            if(result.status){
              var photo_url = '<?php echo e(url("images/rooms/$result->id")); ?>'+'/'+result.photo_name;
              var photo_div = '<div class="col-md-4 margin-top10" id="photo-div-'+result.photo_id+'">'
                                +'<div class="room-image-container200" style="background-image:url('+photo_url+');">'
                                +'<a class="photo-delete" href="#" data-rel="'+result.photo_id+'"><p class="photo-delete-icon"><i class="fa fa-trash-o"></i></p></a>'
                                +'</div>'
                                +'<div class="margin-top5">'
                                  +'<textarea data-rel="'+result.photo_id+'" class="form-control photo-highlights" placeholder="'+"<?php echo e(trans('messages.lys.highlights_photo')); ?>"+'"></textarea>'
                                +'</div>'
                              +'</div>';
              $('#photo-list-div').append(photo_div);
            }
            else
              $('#photo').show();

          },
          error: function (request, error) {
            // This callback function will trigger on unsuccessful action
            show_error_message('Det har oppstått nettverksfeil vennligst prøv igjen');
          }
        });
        $('#photo_file').val('');
        page_loader_stop();
      }
    });
    $(document).on('click', '.photo-delete', function(e){
      e.preventDefault();
      gl_photo_id = $(this).attr('data-rel');
      var con = bootbox.confirm('Are you sure you want to delete this?', location_image_upload);
    });
    $(document).on('focusout', '.photo-highlights', function(e){
      var dataURL = '<?php echo e(url("admin/listing/$result->id/photo_message")); ?>';
      var photo_id = $(this).attr('data-rel');
      var messages = $(this).val();
      $.ajax({
          url: dataURL,
          data: {'photo_id':photo_id, 'messages':messages},
          type: 'post',
          async: false,
          dataType: 'json',
          success: function (result) {

          },
          error: function (request, error) {
            // This callback function will trigger on unsuccessful action
            show_error_message('Det har oppstått nettverksfeil vennligst prøv igjen');
          }
        });
    })
    
    function location_image_upload(result){
      if(result){
        var dataURL = '<?php echo e(url("admin/listing/$result->id/photo_delete")); ?>';
        var photo_id = gl_photo_id;

        //page_loader_start();
        $.ajax({
          url: dataURL,
          data: {'photo_id':photo_id},
          type: 'post',
          async: false,
          dataType: 'json',
          success: function (result) {
            if(result.success){
              $('#photo-div-'+photo_id).remove();
            }
          },
          error: function (request, error) {
            // This callback function will trigger on unsuccessful action
            console.log(error);
          }
        });
        //page_loader_stop();
      }
    }
  </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>