<?php $__env->startSection('main'); ?>
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
          <?php echo e(trans('messages.users_media.profile_photo')); ?>

        </div>
        <div class="panel-footer">
          <div class="panel">
            <div class="panel-body">
              <div class="col-lg-4 text-center">
                <div data-picture-id="91711885" class="profile_pic_container picture-main space-sm-2 space-md-2">
                  <div class="media-photo profile-pic-background">
                    <img width="225" height="225" title="<?php echo e(Auth::user()->first_name); ?>" src="<?php echo e(\Auth::user()->profile_src); ?>" alt="<?php echo e(@$result->first_name); ?>">
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <ul class="list-layout picture-tiles clearfix ui-sortable"></ul>
                <p>
                 <?php echo e(trans('messages.users_media.photo_data')); ?> .
                </p>
                <div class="row row-condensed">
                  <div class="col-md-12">
                    <span class="btn btn-block btn-large file-input-container">
                        <?php echo e(trans('messages.users_media.file_upload')); ?>

                      <form name="ajax_upload" method="post" id="ajax_upload" enctype="multipart/form-data" action="<?php echo e(url('/')); ?>/users/profile/media" accept-charset="UTF-8">
                          <input type="file" name="photos[]" id="profile_image">
                      </form>              
                      <iframe style="display:none;" name="upload_frame" id="upload_frame"></iframe>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $('#profile_image').on('change', function(){
    $('#ajax_upload').submit();
  });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>