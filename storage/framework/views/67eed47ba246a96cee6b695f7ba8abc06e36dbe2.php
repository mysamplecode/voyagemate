<?php $__env->startSection('emails.main'); ?>
  <h3 style="text-align:center;font-weight: bold;">Vrent</h3>
  <p>Hi <?php echo e(@$first_name); ?>,</p>
  <h1>
    Respond to <?php echo e(@$result['users']['first_name']); ?>’s Inquiry
  </h1>
  <p>
    <?php echo e(@$result['total_night']); ?> night<?php echo e((@$result['total_night'] > 1) ? 's' : ''); ?> at <?php echo e(@$result['properties']['name']); ?>

  </p>
  <p>
    <?php echo e(@$result['messages']['message']); ?>

  </p>
  <p>
    Property Name: <?php echo e(@$result['properties']['name']); ?>

  </p>
  <p>
    Number of Guest: <?php echo e(@$result['guest']); ?> guest<?php echo e((@$result['guest'] > 1) ? 's' :''); ?>

  </p>
  <p>
    Number of Night: <?php echo e(@$result['nights']); ?> night<?php echo e((@$result['nights'] > 1) ? 's' :''); ?>

  </p>
  <p>
    Checkin Time: <?php echo date('l', strtotime(@$result['start_date'])); ?> <?php echo e(@$result['enddate_md']); ?>

  </p>
  <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
    <tbody>
      <tr>
        <td align="center">
          <table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td> <a href="<?php echo e(@$url.('bookings/'.@$result['id'])); ?>" target="_blank">Accept / Decline</a> </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('emails.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>