
<?php $__env->startSection('main'); ?>
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
        <div class="col-md-3 settings_bar_gap">
          <?php echo $__env->make('admin.common.property_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-9">
      <form method="post" action="<?php echo e(url('admin/listing/'.$result->id.'/'.$step)); ?>" class='signup-form login-form' accept-charset='UTF-8'>
      <div class="box box-info">
      <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <h4><?php echo e(trans('messages.listing_basic.room_bed')); ?></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label class="label-large"><?php echo e(trans('messages.listing_basic.bedroom')); ?></label>
              <select name="bedrooms" id="basics-select-bedrooms" data-saving="basics1" class="form-control">
                  <?php for($i=1;$i<=10;$i++): ?>
                    <option value="<?php echo e($i); ?>" <?php echo e(($i == $result->bedrooms) ? 'selected' : ''); ?>>
                    <?php echo e($i); ?>

                    </option>
                  <?php endfor; ?> 
              </select>
            </div>
            <div class="col-md-4">
              <label class="label-large"><?php echo e(trans('messages.listing_basic.bed')); ?></label>
              <select name="beds" id="basics-select-beds" data-saving="basics1" class="form-control">
                <?php for($i=1;$i<=16;$i++): ?>
                  <option value="<?php echo e($i); ?>" <?php echo e(($i == $result->beds) ? 'selected' : ''); ?>>
                  <?php echo e(($i == '16') ? $i.'+' : $i); ?>

                  </option>
                <?php endfor; ?> 
              </select>
            </div>
            <div class="col-md-4">
              <label class="label-large"><?php echo e(trans('messages.listing_basic.bathroom')); ?></label>
              <select name="bathrooms" id="basics-select-bathrooms" data-saving="basics1" class="form-control">
                  <?php for($i=0.5;$i<=8;$i+=0.5): ?>
                    <option class="bathrooms" value="<?php echo e($i); ?>" <?php echo e(($i == $result->bathrooms) ? 'selected' : ''); ?>>
                    <?php echo e(($i == '8') ? $i.'+' : $i); ?>

                    </option>
                  <?php endfor; ?>
              </select>
            </div>
            <div class="col-md-4">
              <label class="label-large"><?php echo e(trans('messages.listing_basic.bed_type')); ?></label>
              <select id="basics-select-bed_type" name="bed_type" data-saving="basics1" class="form-control">
                  <?php $__currentLoopData = $bed_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" <?php echo e(($key == $result->bed_type) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4><?php echo e(trans('messages.listing_basic.listing')); ?></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label class="label-large"><?php echo e(trans('messages.listing_basic.property_type')); ?></label>
              <select id="basics-select-bed_type" name="property_type" data-saving="basics1" class="form-control">
                  <?php $__currentLoopData = $property_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" <?php echo e(($key == $result->property_type) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="col-md-4">
              <label class="label-large"><?php echo e(trans('messages.listing_basic.room_type')); ?></label>
              <select id="basics-select-bed_type" name="space_type" data-saving="basics1" class="form-control">
                  <?php $__currentLoopData = $space_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" <?php echo e(($key == $result->space_type) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="col-md-4">
              <label class="label-large"><?php echo e(trans('messages.listing_basic.accommodate')); ?></label>
              <select name="accommodates" id="basics-select-accommodates" class="form-control">
                  <?php for($i=1;$i<=16;$i++): ?>
                    <option class="accommodates" value="<?php echo e($i); ?>" <?php echo e(($i == $result->accommodates) ? 'selected' : ''); ?>>
                    <?php echo e(($i == '16') ? $i.'+' : $i); ?>

                    </option>
                  <?php endfor; ?>
              </select>
            </div>
          </div>
          <div class="row">
          <br>
            <div class="col-md-12 text-right">
              <button type="submit" class="btn btn-large btn-primary next-section-button">
                <?php echo e(trans('messages.listing_basic.next')); ?>

              </button>
            </div>
          </div>
        </div>
        </div>
        </div>
      </form>
      </div>
    </div>
    </section>
    <!-- /.content --> 
 <div class="clearfix"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>