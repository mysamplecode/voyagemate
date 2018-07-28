<body>
	<div class="desk">
		<nav class="navbar navbar-default navbar-headtop">
		  <div class="container" >
			<div class="headpod">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  
				  <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img style="max-width:200px;" src="<?php echo e(@$logo); ?>" alt="logo"></a>	
				</div>
			
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="overflow-x: hidden;padding-top:10px;">
				  	<form class="navbar-form navbar-left">
			  			<div class="hd-search-left">
			  				<i class="fa fa-search fa-2x" style="padding-top:5px;" aria-hidden="true"></i> 
			  			</div>
			  			<div class="hd-search-right">
							<!--<div class="form-group">-->
							 <input id="search-field" type="text" class="form-control" placeholder="<?php echo e(trans('messages.header.looking_for_stock_photos')); ?>">
							<!--</div>-->
						</div>
					</form>
					<ul class="nav navbar-nav navbar-right hd-search">
						<?php if(Auth::check()): ?>
							<li class="<?php echo e((Route::current()->uri() == 'dashboard' ) ? 'active' : ''); ?>"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(trans('messages.header.feeds')); ?></a></li>
							<li class="<?php echo e((Route::current()->uri() == '/' || Route::current()->uri() == 'newest' ) ? 'active' : ''); ?> dropdown user">
						        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo e(trans('messages.header.explore')); ?>

						        <span class="caret"></span></a>
						        <ul class="dropdown-menu">
						          <li><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('messages.header.best_photos')); ?></a></li>
						          <li><a href="<?php echo e(url('newest')); ?>"><?php echo e(trans('messages.header.newest_photos')); ?></a></li>
						        </ul>
						    </li>
							<!--<li><a href="#">Help</a></li>-->
							<li class="<?php echo e((Route::current()->uri() == 'uploads' ) ? 'active' : ''); ?>"><a href="<?php echo e(url('uploads')); ?>"><?php echo e(trans('messages.header.upload')); ?></a></li>
							<!--<li><a href="#"><i class="fa fa-envelope-o iconpod" aria-hidden="true"></i></a></li>-->
							<?php 
								$count_notification = \Auth::user()->notifications->where('status', 'unread')->count();
							 ?>
							<li class="<?php echo e((Route::current()->uri() == 'notification') ? 'active' : ''); ?>"><a href="<?php echo e(url('notification')); ?>"><i class="fa fa-bell-o iconpod" aria-hidden="true"></i><?php if($count_notification && Route::current()->uri() != 'notification'): ?><span class="icon-lavel"><?php echo e($count_notification); ?></span><?php endif; ?></a></li>
							<li class="dropdown user">
						        <!--<a class="dropdown-toggle" data-toggle="dropdown" href="#"><img class="media-photo-badge" src="<?php echo e(\Auth::user()->profile_src); ?>" style="width:30px;" />-->
						        <a class="media-photo-badge" data-toggle="dropdown" href="#" style="padding-top:5px;">
						        	<div class="">
						        		<img class="img-responsive inblk" src="<?php echo e(\Auth::user()->profile_src); ?>"/>
						        		<span class="caret"></span>
						        	</div>
						    	</a>
						        <ul class="dropdown-menu">
						          <li><a href="<?php echo e(url('profile')); ?>"><b class="pinkColor"><?php echo e(ucfirst(\Auth::user()->name)); ?></b><p><?php echo e(trans('messages.header.view_profile')); ?></p></a></li>
						          <li><a href="<?php echo e(url('manage-photos')); ?>"><?php echo e(trans('messages.header.manage_photos')); ?></a></li>
						          <li><a href="<?php echo e(url('earning')); ?>"><?php echo e(trans('messages.header.earning')); ?></a></li>
						          <li><a href="<?php echo e(url('purchase')); ?>"><?php echo e(trans('messages.header.purchase')); ?></a></li>
						          <li><a href="<?php echo e(url('settings')); ?>"><?php echo e(trans('messages.header.settings')); ?></a></li>
						          <li><a href="<?php echo e(url('logout')); ?>"><?php echo e(trans('messages.header.logout')); ?></a></li>
						        </ul>
						    </li>
							<!--<li><a href="#"></a>
							  <ul class="mx-pod">
								<li><a href="#">Upload</a></li>
								<li><a href="#"><i class="fa fa-envelope-o iconpod" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-bell-o iconpod" aria-hidden="true"></i></a></li>
								<li class="user"><a href="#"><img src="img/photo02.jpg" class="" /></a></li>
							  </ul>
							</li>-->
						<?php else: ?>
							<li><a href="<?php echo e(url('login')); ?>"><?php echo e(trans('messages.header.signin')); ?></a></li>
							<li><a href="<?php echo e(url('register')); ?>"><?php echo e(trans('messages.header.join')); ?></a></li>
						<?php endif; ?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!--headpod end-->
		  </div><!-- /.container -->
		</nav>
	</div>
	<?php if(Session::has('message')): ?>
	  <div class="alert <?php echo e(Session::get('alert-class')); ?> text-center" style="margin-bottom:0px;" role="alert">
	    <?php echo e(Session::get('message')); ?>

	    <a href="#" style="float:right;" class="alert-close" data-dismiss="alert">&times;</a>
	  </div>
	<?php endif; ?>