<?php $__env->startSection('main'); ?>
  <div class="content-wrapper">
  <!-- Main content -->
  <section class="content-header">
          <h1>
          Amenities
          <small>Amenities</small>
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
    <form method="post" action="<?php echo e(url('admin/listing/'.$result->id.'/'.$step)); ?>" class='signup-form login-form' accept-charset='UTF-8'>
      <div class="box box-info">
      <div class="box-body">
      <?php $__currentLoopData = $amenities_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="row">
          <div class="col-md-12"> <h4><?php echo e($row_type->name); ?></h4></div>
      </div>
      <div class="row">
         
          <?php if($row_type->description != ''): ?>
              <p class="text-muted"><?php echo e($row_type->description); ?></p>
          <?php endif; ?>
          <div class="col-md-6">
              <ul class="list-unstyled">
                  <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($amenity->type_id == $row_type->id): ?>
                    <li>
                      <span>&nbsp;&nbsp;</span>
                      <label class="label-large label-inline amenity-label">
                      <input type="checkbox" value="<?php echo e($amenity->id); ?>" name="amenities[]" data-saving="<?php echo e($row_type->id); ?>" <?php echo e(in_array($amenity->id, $property_amenities) ? 'checked' : ''); ?>> &nbsp;&nbsp;
                      <span><?php echo e($amenity->title); ?></span>
                      </label>
                      <span>&nbsp;</span>

                      <?php if($amenity->description != ''): ?>
                      <span data-toggle="tooltip" class="icon" title="<?php echo e($amenity->description); ?>"></span>
                      <?php endif; ?>
                    </li>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <br>
      <div class="row">
        <div class="col-md-6 text-left">
            <a data-prevent-default="" href="<?php echo e(url('admin/listing/'.$result->id.'/location')); ?>" class="btn btn-large btn-primary"><?php echo e(trans('messages.listing_description.back')); ?></a>
        </div>
        <div class="col-md-6 text-right">
          <button type="submit" class="btn btn-large btn-primary next-section-button">
           <?php echo e(trans('messages.listing_basic.next')); ?> 
          </button>
        </div>
      </div>
    </div>
    </div>
    </form>
    </div> 
    </div>
    </section> 
 <div class="clearfix"></div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>