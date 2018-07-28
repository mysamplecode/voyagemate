<ul class="sidenav-list">

<?php if(Route::current()->uri() == 'properties' || Route::current()->uri() == 'booking/{id}' || Route::current()->uri() == 'my_bookings'): ?>
  <li>
    <a href="<?php echo e(url('properties')); ?>" aria-selected="<?php echo e((Route::current()->uri() == 'properties') ? 'true' : 'false'); ?>" class="sidenav-item"><?php echo e(trans('messages.sidenav.your_listing')); ?></a>
  </li>
  <li>
    <a href="<?php echo e(url('my_bookings')); ?>" aria-selected="<?php echo e((Route::current()->uri() == 'my_bookings') ? 'true' : 'false'); ?>" class="sidenav-item"><?php echo e(trans('messages.sidenav.property_booking')); ?></a>
  </li>
<?php endif; ?>

<?php if(Route::current()->uri() == 'trips/active' || Route::current()->uri() == 'trips/previous'): ?>
  <li>
    <a class="sidenav-item" aria-selected="<?php echo e((Route::current()->uri() == 'trips/active') ? 'true' : 'false'); ?>" href="<?php echo e(url('/')); ?>/trips/active"><?php echo e(trans('messages.sidenav.your_trip')); ?></a>
  </li>
  <li>
    <a class="sidenav-item" aria-selected="<?php echo e((Route::current()->uri() == 'trips/previous') ? 'true' : 'false'); ?>" href="<?php echo e(url('/')); ?>/trips/previous"><?php echo e(trans('messages.sidenav.previous_trip')); ?></a>
  </li>
<?php endif; ?>

<?php if(Route::current()->uri() == 'users/profile' || Route::current()->uri() == 'users/reviews' || Route::current()->uri() == 'users/profile/media'): ?>
    <li>
      <a href="<?php echo e(url('users/profile')); ?>" aria-selected="<?php echo e((Route::current()->uri() == 'users/profile') ? 'true' : 'false'); ?>" class="sidenav-item"><?php echo e(trans('messages.sidenav.edit_profile')); ?></a>
    </li>
    <li>
      <a href="<?php echo e(url('users/profile/media')); ?>" aria-selected="<?php echo e((Route::current()->uri() == 'users/profile/media') ? 'true' : 'false'); ?>" class="sidenav-item"><?php echo e(trans('messages.sidenav.photo')); ?></a>
    </li>
<?php endif; ?>

<?php if(Route::current()->uri() == 'users/security' || Route::current()->uri() == 'users/account_preferences' || Route::current()->uri() == 'users/transaction_history'): ?>
  <li>
    <a href="<?php echo e(url('users/account_preferences')); ?>" aria-selected="<?php echo e((Route::current()->uri() == 'users/account_preferences') ? 'true' : 'false'); ?>" class="sidenav-item"><?php echo e(trans('messages.account_sidenav.account_preference')); ?></a>
  </li>

  <li>
    <a href="<?php echo e(url('users/transaction_history')); ?>" aria-selected="<?php echo e((Route::current()->uri() == 'users/transaction_history') ? 'true' : 'false'); ?>" class="sidenav-item"><?php echo e(trans('messages.account_sidenav.transaction_history')); ?></a>
  </li>

  <li>
    <a href="<?php echo e(url('users/security')); ?>" aria-selected="<?php echo e((Route::current()->uri() == 'users/security') ? 'true' : 'false'); ?>" class="sidenav-item"><?php echo e(trans('messages.account_sidenav.security')); ?></a>
  </li>
<?php endif; ?>

</ul>