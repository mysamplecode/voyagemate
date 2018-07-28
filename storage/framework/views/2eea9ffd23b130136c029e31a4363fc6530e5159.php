<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2016-<?php echo e(date('Y')); ?> <a href="#"><?php echo e(SITE_NAME); ?></a>.</strong> All rights
    reserved.
</footer>

<!-- Modal -->
<div class="modal fade" id="delete-warning-modal" role="dialog" style="z-index:1060;">
    <div class="modal-dialog" >
      <!-- Modal content-->
      <div class="modal-content" style="width:100%;height:100%">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirm Delete</h4>
        </div>
        <div class="modal-body">
          <p>You are about to delete one track, this procedure is irreversible.</p>
          <p>Do you want to proceed?</p>
        </div>
        <div class="modal-footer">
        	<a class="btn btn-danger" id="delete-modal-yes" href="javascript:void(0)">Yes</a>
          	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $(document).on('click', '.delete-warning', function(e){
    e.preventDefault();
    var url = $(this).attr('href');
    $('#delete-modal-yes').attr('href', url)
    $('#delete-warning-modal').modal('show');
  });
</script>
<?php $__env->stopPush(); ?>