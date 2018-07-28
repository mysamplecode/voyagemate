

<?php $__env->startSection('main'); ?>
  
    <div id="mega-slider" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <?php  $i = 0  ?>
          <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="item <?php echo e($i==0?'active':''); ?>">
            <img src="<?php echo e(url('public/front/images/banners/'.$banner->image)); ?>" alt="...">
            <div class="carousel-caption">
              <h2><?php echo e($banner->heading); ?></h2>
              <p><?php echo e($banner->subheading); ?></p>
            </div>
          </div>
          <?php  $i = 1  ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#mega-slider" role="button" data-slide="prev">
      </a>
      <a class="right carousel-control" href="#mega-slider" role="button" data-slide="next">
      </a>
    </div>
    <div class="mg-bn-forms-up">
      <div class="mg-book-now2 mg-book-now">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="mg-bn-forms">
                <form id="front-search-form" method="post" action="<?php echo e(url('search')); ?>">
                  <div class="row">
                    <div class="col-md-4 col-xs-6 input-mb">
                      <div class="input-group date mg-check-in col-xs-12">
                        <input class="form-control" id="front-search-field" placeholder="<?php echo e(trans('messages.home.where_want_to_go')); ?>" autocomplete="off" name="location" type="text" required>
                      </div>
                    </div>
                    <div class="col-md-2 col-xs-6 input-mb">
                      <div class="input-group date mg-check-in">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input class="form-control" name="checkin" id="front-search-checkin" placeholder="Checkin" autocomplete="off" type="text" readonly="readonly" required>
                      </div>
                    </div>
                    <div class="col-md-2 col-xs-6">
                      <div class="input-group date mg-check-out">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input class="form-control" name="checkout" id="front-search-checkout" placeholder="Checkout" type="text" readonly="readonly" required>
                      </div>
                    </div>
                    <div class="col-md-2 col-xs-6">
                      <div class="input-group date mg-check-out">
                        <select id="front-search-guests" class="form-control black-select">
                          <option value="1">1 <?php echo e(trans('messages.home.guest')); ?></option>
                          <?php for($i=1;$i<=16;$i++): ?>
                            <option value="<?php echo e($i); ?>"> <?php echo e(($i == '16') ? $i.'+ '.'Guests' : $i.' '.'Guests'); ?> </option>
                          <?php endfor; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 col-xs-12 front-search">
                      <button type="submit" class="btn btn-main btn-block"><?php echo e(trans('messages.home.search')); ?></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
         </div>
      </div>
    </div>
    <div class="container">
      <div class="row margin-top40">
        <?php for($i=0;$i<= $city_count-1;$i++): ?>
        <div class="col-md-4" style="margin-bottom:15px;">
          <div class="ex-image-container" style="background-image:url(<?php echo e(@$starting_cities[$i]->image_url); ?>);">
            <a href="<?php echo e(URL::to('/')); ?>/search?location=<?php echo e($starting_cities[$i]->name); ?>&source=ds">
              <div class="ex-container">
                <div class="ex-center-content">
                    <div class="h2">
                      <strong>
                       <?php echo e($starting_cities[$i]->name); ?>

                      </strong>
                    </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>