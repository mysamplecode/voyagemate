<div id="sidr" class="sidenav" style="display: none;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <p>&nbsp;</p>
  <?php if(\Auth::check()): ?>
      <form action="<?php echo e(url('/')); ?>/s" id="head-form" class="navbar-form navbar-left search-form">
          <div class="form-group sm-dropdown">
            <input type="text" name="location" id="sidenav-search-form" class="form-control" placeholder="<?php echo e(trans('messages.header.where_are_you_going')); ?>" style="width:200px;margin-bottom:1px;">
            <div id="sidenav-search-drop-down" class="sm-dropdown-content">
                <div class="col-md-12" style="padding:0px 5px;">
                    <div class="col-md-4" style="padding:0px 5px;">
                        <label class="nav-label"><?php echo e(trans('messages.home.checkin')); ?></label>
                        <input type="text" name="checkin" id="sidenav-search-checkin" class="nav-form-control" autocomplete="off" readonly="readonly">
                    </div>
                    <div class="col-md-4" style="padding:0px 5px;">
                        <label class="nav-label"><?php echo e(trans('messages.home.checkout')); ?></label>
                        <input type="text" name="checkout" id="sidenav-search-checkout" class="nav-form-control" autocomplete="off" readonly="readonly">
                    </div>
                    <div class="col-md-4" style="padding:0px 5px;">
                        <label class="nav-label"><?php echo e(trans_choice('messages.home.guest', 2)); ?></label>
                        <select class="nav-form-control" id="sidenav-search-guests" name="guests">
                            <?php for($i=1;$i<=16;$i++): ?>
                              <option value="<?php echo e($i); ?>"> <?php echo e(($i == '16') ? $i.'+ ' : $i); ?> </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                      <button class="btn ex-btn navbar-btn topbar-btn" style="width:100%;" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <?php echo e(trans('messages.header.find_place')); ?>

                      </button>
                    </div>
                </div>
            </div>
          </div>
      </form>
      <a href="<?php echo e(url('dashboard')); ?>"><?php echo e(trans('messages.header.dashboard')); ?></a>
      <a href="<?php echo e(url('properties')); ?>"><?php echo e(trans_choice('messages.header.your_listing',2)); ?></a>
      <a href="<?php echo e(url('my_bookings')); ?>"><?php echo e(trans('messages.sidenav.property_booking')); ?></a>
      <a href="<?php echo e(url('trips/active')); ?>"><?php echo e(trans('messages.sidenav.your_trip')); ?></a>
      <a href="<?php echo e(url('users/profile')); ?>"><?php echo e(trans('messages.header.edit_profile')); ?></a>
      <a href="<?php echo e(url('users/account_preferences')); ?>"><?php echo e(trans('messages.header.account')); ?></a>
      <a href="<?php echo e(url('logout')); ?>"><?php echo e(trans('messages.header.logout')); ?></a>
      <a href="<?php echo e(url('property/create')); ?>"><?php echo e(trans('messages.header.list_space')); ?></a>
  <?php else: ?>
    <a href="<?php echo e(url('signup')); ?>"><?php echo e(trans('messages.sign_up.sign_up')); ?></a>
    <a href="<?php echo e(url('login')); ?>"><?php echo e(trans('messages.header.login')); ?></a>
    <a href="<?php echo e(url('property/create')); ?>"><?php echo e(trans('messages.header.list_space')); ?></a>
  <?php endif; ?>
</div>
<footer class="mg-footer">
  <div class="mg-footer-widget">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <div class="widget">
          <h2 class="mg-widget-title">Hosting</h2>
            <ul class="list-layout">
              <?php if(isset($footer_first)): ?>
                <?php $__currentLoopData = @$footer_first; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e(url($ff->url)); ?>" class="link-contrast"><?php echo e($ff->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="widget">
            <h2 class="mg-widget-title">Company</h2>
            <ul class="list-layout">
              <?php if(isset($footer_second)): ?>
                <?php $__currentLoopData = @$footer_second; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e(url($fs->url)); ?>" class="link-contrast"><?php echo e($fs->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="widget">
            <form>
              <?php if(isset($language)): ?>
                <select class="form-control footer-select" aria-labelledby="language-selector-label" id="language_footer" name="language">
                  <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" <?php echo e((Session::get('language') == $key) ? 'selected' : ''); ?> > <?php echo e($value); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              <?php endif; ?>
              <p>
                <?php if(isset($language)): ?>
                  <select class="form-control footer-select" aria-labelledby="language-selector-label" id="currency_footer" name="language">
                    <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($key); ?>" <?php echo e((Session::get('currency') == $key) ? 'selected' : ''); ?> > <?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                <?php endif; ?>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mg-copyright">
    <div class="container">
      <div class="row">
        
        <div class="col-md-6">
          <ul class="mg-footer-nav">
            <li>© <?php echo e(@$site_name); ?>, Inc.</li>
          </ul>
        </div>
        <div class="col-md-6">
          <ul class="list-layout list-inline pull-right">
              <link href="" itemprop="url">
              <meta content="" itemprop="logo">
              <?php if(isset($join_us)): ?>
                <?php for($i=0; $i<count($join_us); $i++): ?>
                  <li>
                    <a href="<?php echo e($join_us[$i]->value); ?>" class="link-contrast footer-icon-container" target="_blank">
                      <i class="fa pad-top-4 fa-<?php echo e(str_replace('_','-',$join_us[$i]->name)); ?>"></i> 
                    </a>        
                  </li>
                <?php endfor; ?>
              <?php endif; ?>    
          </ul>
        </div>
      </div>
      
    </div>
  </div>
</footer>
<div id="alert_model" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button id="ok_id" type="button" class="btn btn-danger">Ok</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>