<!-- arafat flash message start -->
<?php if(Session::has("message")): ?>
<div class="alert alert-dismissible alert-<?php echo e(Session::get('class', 'success')); ?> text-center">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>
      <?php echo Session::get('message'); ?>

  </strong>
</div>
<?php endif; ?>
<?php
    Session::forget("message");
?>
<!-- end arafat flash message -->