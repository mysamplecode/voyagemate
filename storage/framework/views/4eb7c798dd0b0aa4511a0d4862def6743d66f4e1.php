
<?php $__env->startSection('main'); ?>
  <div class="content-wrapper">
         <!-- Main content -->
  <section class="content-header">
      <h1>
          Description
          <small>Description</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="<?php echo e(url('/')); ?>/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a>
        </li>
      </ol>
  </section>

  <section class="content">
      <div class="col-md-3 settings_bar_gap">
        <?php echo $__env->make('admin.common.property_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>

      <div class="col-md-9">
      <form method="post" action="<?php echo e(url('admin/listing/'.$result->id.'/'.$step)); ?>" class='signup-form login-form' accept-charset='UTF-8'>

      <div class="box box-info">
      <div class="box-body">

          <div class="row">
            <div class="col-md-8">
              <label class="label-large"><?php echo e(trans('messages.listing_description.listing_name')); ?></label>
              <input type="text" name="name" class="form-control" value="<?php echo e($description->properties->name); ?>" placeholder="" maxlength="35">
              <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <label class="label-large"><?php echo e(trans('messages.listing_description.summary')); ?></label>
              <textarea class="form-control" name="summary" rows="6" placeholder="" maxlength="500" ng-model="summary"><?php echo e($description->summary); ?></textarea>
              <span class="text-danger"><?php echo e($errors->first('summary')); ?></span>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 text-left">
                <a data-prevent-default="" href="<?php echo e(url('admin/listing/'.$result->id.'/basics')); ?>" class="btn btn-large btn-primary"><?php echo e(trans('messages.listing_description.back')); ?></a>
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
    </section>
    <!-- /.content -->
     <div class="clearfix"></div>      
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>