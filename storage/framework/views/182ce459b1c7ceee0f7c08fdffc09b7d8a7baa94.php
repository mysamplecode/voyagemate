<?php $__env->startSection('main'); ?>
<div class="container margin-top30" style="min-height:500px;">
  <div class="col-md-3">
    <div class="gal-pic">
      <img src="<?php echo e($result->profile_src); ?>" title="<?php echo e($result->first_name); ?>" class="img-responsive" alt="<?php echo e($result->first_name); ?>" width="300" height="150">
    </div>
    <?php if($result['school'] || $result['work']): ?>
    <div class="panel panel-default margin-top20">
      <div class="panel-heading"><?php echo e(trans('messages.users_show.about_me')); ?></div>
      <div class="panel-body">
        <div class="doc">
          <p class=""><strong><?php echo e(trans('messages.users_show.school')); ?></strong> &nbsp; <?php echo e($result['school']); ?></p>
          <p class=""><strong><?php echo e(trans('messages.users_show.work')); ?></strong> &nbsp; <?php echo e($result['work']); ?></p>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <!--<div class="panel panel-default">
      <div class="panel-heading">Varification</div>
      <div class="panel-body row">
        <div class="col-xs-3">
          <img src="img/step-tick.png">
        </div>
        <div class="col-xs-9 margin-top10">Linkedin Validate</div>
      </div>
    </div>-->
  </div>
  <div class="col-md-9">
    <div class="doc2">
      <h1><?php echo e(trans('messages.users_show.hey')); ?><?php echo e(ucfirst($result->first_name)); ?>!</h1>
      <h6><strong><?php echo e(trans('messages.users_show.member_since')); ?> <?php echo e($result->account_since); ?></strong></h6>
      <?php if(isset($details['live'])): ?>
        <a href="<?php echo e(url('search?location='.$details['live'])); ?>"><?php echo e($details['live']); ?></a>·
      <?php endif; ?>
      <p><?php echo e($result->about); ?></p>
    </div>
    <div class="doc2">
      <?php if($reviews_count > 0): ?>
      <div class="col-md-3 col-sm-4 mb20">
        <a href="#" rel="nofollow" class="link-reset" id="profile-review-count">
          <div class="text-center text-wrap">
            <div class="badge-pill h3">
              <span class="badge-pill-count"><?php echo e($reviews_count); ?></span>
            </div>
            <div class="row-space-top-1"><?php echo e(trans('messages.users_show.review')); ?></div>
          </div>
        </a>
        <span></span>
      </div>
      <?php endif; ?>
    </div>    
    <div class="clearfix"></div>
    
    <?php if($reviews_count > 0): ?>
    <div class="profile-review">
      <div class="doc"><span class="h3" id="profile-review-title"><strong><?php echo e(trans('messages.users_show.review')); ?></strong></span> (<?php echo e($reviews_count); ?>) </div>
      
      <?php if($reviews_from_hosts->count() > 0): ?>
      <h4><?php echo e(trans('messages.users_show.review_host')); ?></h4>
        <?php $__currentLoopData = $reviews_from_hosts->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_host): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
        <div class="row margin-top20 mb25">
          <div class="col-md-3 text-center">
            <div class="media-photo-badge">
              <a href="#" ><img alt="User Profile Image" class="" src="<?php echo e($row_host->users_from->profile_picture->src); ?>" title="<?php echo e($row_host->users_from->first_name); ?>"></a>
              <p><?php echo e($row_host->users_from->first_name); ?></p>
            </div>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-6">
                  <p class="h5"><?php echo e($row_host->comments); ?></p> 
                  <p><?php echo e($row_host->date_fy); ?></p>  
              </div>  
            </div> 
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      <?php endif; ?>

      <?php if($reviews_from_guests->count() > 0): ?>
      <h4><?php echo e(trans('messages.users_show.review_guest')); ?></h4>
        <?php $__currentLoopData = $reviews_from_guests->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_guest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <div class="row margin-top20 mb25">
          <div class="col-md-3 text-center">
            <a href="<?php echo e(url('/')); ?>/users/show/<?php echo e($row_guest->user_from); ?>">
              <div class="media-photo-badge">
                <img alt="User Profile Image" class="" src="<?php echo e($row_guest->users_from->profile_picture->src); ?>" title="<?php echo e($row_guest->users_from->first_name); ?>">
                <p><?php echo e($row_guest->users_from->first_name); ?></p>
              </div>
            </a>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-6">
                  <p class="h5"><?php echo e($row_guest->comments); ?></p> 
                  <p><?php echo e($row_guest->date_fy); ?></p>  
              </div>  
            </div> 
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
</div>
<div class="clearfix"></div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $("#profile-review-count").on('click', function(e){
      //e.stopPropagation();
      e.preventDefault()
      $('html,body').animate({
          scrollTop: $("#profile-review-title").offset().top},
          'slow');
  });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>