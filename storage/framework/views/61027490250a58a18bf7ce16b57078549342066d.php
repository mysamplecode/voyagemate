<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" style="z-index:1060;">
    <div class="modal-dialog" >
      <!-- Modal content-->
      <div class="modal-content" style="width:100%;height:100%">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo e(trans('messages.utility.sign_in_required')); ?></h4>
        </div>
        <div class="modal-body">
          <p><?php echo e(trans('messages.utility.please')); ?> <a style="color:#e7358d;" target="_blank" href="<?php echo e(url('login')); ?>"><b><?php echo e(trans('messages.utility.sign_in')); ?></b></a> <?php echo e(trans('messages.utility.before_performing')); ?>.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('messages.utility.close')); ?></button>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="reportModal" role="dialog" style="z-index:1060;">
    <div class="modal-dialog" >
      <!-- Modal content-->
      <div class="modal-content" style="width:100%;height:100%">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo e(trans('messages.utility.report_this_photo')); ?></h4>
        </div>
        <div class="modal-body">
          <div id="report_status" class="alert text-center" style="margin-bottom:0px;background-color:#f10077;color:white;padding:5px;display:none;" role="alert"></div>
          <p><?php echo e(trans('messages.utility.report_message')); ?></p>
          <textarea id="report_message" class="form-control"></textarea>
          <input type="hidden" id="report_photo_id">	
        </div>
        <div class="modal-footer">
        	<button type="button" id="report" class="btn btn-primary"><?php echo e(trans('messages.utility.submit')); ?></button>
        </div>
      </div>
    </div>
</div>

<div class="clearfix"></div>
<footer class="footer-innercolor" style="min-height:150px;"> 
    <div class="container">
	  	<div class="col-md-4 col-sm-4 col-xs-6 footer-font">
	     	<ul class="nav nav-pills nav-stacked">
				<?php $__currentLoopData = $footer_first; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $first): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><a href="<?php echo e(url($first->slug)); ?>"><?php echo e($first->title); ?></a></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
	  	</div>
	  	<div class="col-md-4 col-sm-4 col-xs-6 footer-font">
	     	<ul class="nav nav-pills nav-stacked">
				<?php $__currentLoopData = $footer_second; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $second): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><a href="<?php echo e(url($second->slug)); ?>"><?php echo e($second->title); ?></a></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
	  	</div>
	  	<div class="col-md-4 col-sm-4 col-xs-12 footer-font">
		    <select class="form-control footer-select" id='language_footer' name="language">
		        <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        	<?php  $lang = (Session::get('language')) ? Session::get('language') : $default_language[0]->value  ?>
		            <option value='<?php echo e($value); ?>' <?php echo e(($lang ==  $value)?'selected':''); ?>><?php echo e($name); ?></option>
		        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </select>
	  	</div>
		<div class="clearfix"></div>
	</div>
</footer>
<div class="mg-copyright">
	<div class="container">
		<div class="col-md-6">
			<div class="copyright">@ PhotoCrowd.Inc</div>
		</div>
		<div class="col-md-6">
			<ul class="list-layout list-inline pull-right">
				<?php for($i=0; $i<count($join_us); $i++): ?>
                  <li>
                    <a href="<?php echo e($join_us[$i]->value); ?>" class="link-contrast footer-icon-container" target="_blank">
                      <i class="fa pad-top-4 fa-<?php echo e(str_replace('_','-',$join_us[$i]->name)); ?>"></i> 
                    </a>        
                  </li>
                <?php endfor; ?>
				<!--<li><a target="_blank" href="#"><i class="fa fa-facebook pad-top-4" aria-hidden="true"></i></a></li>
				<li><a target="_blank" href="#"><i class="fa fa-google-plus pad-top-4" aria-hidden="true"></i></a></li>
				<li><a target="_blank" href="#"><i class="fa fa-twitter pad-top-4"></i></a></li>
				<li><a target="_blank" href="#"><i class="fa fa-linkedin pad-top-4"></i></a></li>
				<li><a target="_blank" href="#"><i class="fa fa-pinterest-p pad-top-4" aria-hidden="true"></i></a></li>
				<li><a target="_blank" href="#"><i class="fa fa-youtube-play pad-top-4" aria-hidden="true"></i></a></li>
				<li><a target="_blank" href="#"><i class="fa fa-instagram pad-top-4" aria-hidden="true"></i></a></li>-->
			</ul>
		</div>
	</div>
</div>