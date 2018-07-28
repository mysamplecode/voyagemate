<?php $__env->startSection('main'); ?>
<div class="controls" style="min-height:400px;">
	<div class="col-md-12" style="padding-left:30px;padding-right:30px">
		<div class="col-lg-1" style="float: none;margin:0 auto;padding-top:20px;padding-bottom:20px"><button class="btn btn-pinkbg" data-toggle="modal" data-target="#withdrawModal"><?php echo e(trans('messages.withdraw.withdraw_balance')); ?></button></div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>
						<h5><?php echo e(trans('messages.withdraw.date_of_request')); ?></h5>
					</th>
					<th>
						<h5><?php echo e(trans('messages.withdraw.status')); ?></h5>
					</th>
					<th>
						<h5><?php echo e(trans('messages.withdraw.amount')); ?></h5>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td>
						<h5><?php echo e(date('d F Y',strtotime($result->created_at))); ?></h5>
					</td>
					<td>
						<h5><?php echo e($result->status); ?></h5>
					</td>
					<td>
						<h5><?php echo e(Session::get('symbol').' '.$result->amount); ?></h5>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
</able>
	
</div><!--controls end-->	
<div class="container">
	<div class="clearfix"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="withdrawModal" role="dialog" style="z-index:1060;">
    <div class="modal-dialog" >
      <!-- Modal content-->
      <div class="modal-content" style="width:100%;height:100%">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo e(trans('messages.withdraw.do_withdraw_request')); ?></h4>
        </div>
        <div class="modal-body">
          <h4 style="text-align:center;color:red" id="error-message"></h4>
          <p>Your balance is <?php echo e(Session::get('symbol').@$total); ?></p>
          <?php if(isset($details['paypal_email']) && $details['paypal_email'] != ''): ?>
          <div class="form-group">
		    <label for="email"><?php echo e(trans('messages.withdraw.withdraw_amount')); ?></label>
		    <input type="text" class="form-control" name="amount" id="amount">
		  </div>
		  <?php else: ?>
		  	<p><?php echo e(trans('messages.withdraw.please_provide')); ?> <a style="color:#e7358d;" target="_blank" href="<?php echo e(url('settings/payment')); ?>"><b><?php echo e(trans('messages.withdraw.payment_account')); ?></b></a> <?php echo e(trans('messages.withdraw.information_withdraw')); ?>.</p>
		  <?php endif; ?>
        </div>
        <div class="modal-footer">
        	<button type="button" class="btn btn-pinkbg" id="withdraw_submit"><?php echo e(trans('messages.utility.submit')); ?></button>
        	<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('messages.utility.close')); ?></button>
        </div>
      </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
 <script type="text/javascript">	
	$(document).on('click', '#withdraw_submit', function(){
		var dataURL = APP_URL+'/withdraws';
		var amount = $('#amount').val();
	   	if(amount == '0' || amount =="") $('#error-message').html('Inappropriate amount request');
        else{
        	$.ajax({
			    url: dataURL,
			    data: {
			    	'amount': amount,
			    },
			    type: 'post',
			    async: false,
			    dataType: 'json',
			    success: function (res) {
			    	if(res.success){
			    		window.location.href = "<?php echo e(url('withdraws')); ?>";
			    	}else{
			    		$('#error-message').html(res.message);
			    	}
			    },
			    error: function (request, error) {
			      
			    }
			});  
        }
	});
 </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>