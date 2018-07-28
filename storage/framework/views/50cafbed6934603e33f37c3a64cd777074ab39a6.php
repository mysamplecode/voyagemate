<?php $__env->startSection('main'); ?>
  <div class="container margin-top40 mb30">
      <?php echo $__env->make('listing.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <form method="post" action="<?php echo e(url('listing/'.$result->id.'/'.$step)); ?>" class='signup-form login-form' accept-charset='UTF-8'>
      <div class="col-md-9">
        <?php $__currentLoopData = $amenities_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <h4><?php echo e($row_type->name); ?></h4>
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
                        <input type="checkbox" value="<?php echo e($amenity->id); ?>" name="amenities[]" data-saving="<?php echo e($row_type->id); ?>" <?php echo e(in_array($amenity->id, $property_amenities) ? 'checked' : ''); ?>>
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
        <div class="row mrg-top-25">
          <div class="col-md-6 text-left">
              <a data-prevent-default="" href="<?php echo e(url('listing/'.$result->id.'/location')); ?>" class="btn btn-large btn-primary"><?php echo e(trans('messages.listing_description.back')); ?></a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>