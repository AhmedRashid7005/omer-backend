<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Edit Affiliate Group'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-info col-md-12 text-center" style="margin-bottom: 50px;"> Affiliate Edit Module Using Group</h3>
    <div class="offset-md-3 col-md-6 margin-bottom">
        <div style="border: 1px solid black; padding: 10px 10px 10px 10px;">
            <legend>Edit Affiliate by Group Name</legend>
            <form action="<?php echo e(route('updateAffiliateByGroup')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <label for="affiliate_type"><strong>Affiliate Type</strong></label>
                  <select name="affiliate_type_id" id="affiliate_type" class="form-control" required="">
                    <option value="">--Select One--</option>
                    <?php if($affiliateTypes): ?>
                        <?php $__currentLoopData = $affiliateTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affiliateType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($affiliateType->id == $affiliateGroup->affiliate_type_id): ?>
                            <option value="<?php echo e($affiliateType->id); ?>" selected><?php echo e($affiliateType->name); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($affiliateType->id); ?>"><?php echo e($affiliateType->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>
               </div>
               <?php
                   $price = json_decode( $affiliateGroup->price );
                   //dump($price);
                   $six_price = array();
                   if($price){
                      foreach($price as $p){
                        $six_price[] = $p;
                      }
                      $six_price_index = 0;
                   }
               ?>
               <?php if($affiliateTypes): ?>
                <?php $__currentLoopData = $affiliateTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affiliateType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div style="margin-top: 20px;"></div>
                    <div style="border: 2px solid #0c2461; padding: 20px 20px 20px 20px; ">

                        <div class="form-group">
                          <label for="client_commision_<?php echo e($affiliateType->name); ?>"><strong>Your Commission, When Registering the Guest in the <?php echo e($affiliateType->name); ?> Plan</strong></label>
                          <input type="text" class="form-control" name="client_commision_<?php echo e($affiliateType->name); ?>" value="<?php echo e($six_price[$six_price_index]); ?>" required="">
                         </div>
                         <?php $six_price_index++; // let's incremnet 1 ?>
                         <div class="form-group">
                           <label for="guest_discount_<?php echo e($affiliateType->name); ?>"><strong>Guest Discount When using your link or Code</strong></label>
                           <input type="text" class="form-control" name="guest_discount_<?php echo e($affiliateType->name); ?>" value="<?php echo e($six_price[$six_price_index]); ?>" required>
                          </div>
                          <?php $six_price_index++; // let's incremnet 1 ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>

               <div class="form-group form-check" id="valid_for_ever_div" style="margin-top: 20px;">
                   <label class="form-check-label">
                     <input class="form-check-input" id="valid_for_ever" type="checkbox" value="valid_for_ever" name="valid_for_ever">
                        Valid Forever
                   </label>
                </div>

                 <div class="form-group" id="valid_date_range_div">
                   <label for="valid_date_range"><strong>Valid Date Range</strong></label>
                   <input name="valid_date_range" id="valid_date_range" class="form-control date_range_picker" required>
                </div>

               <div class="form-group">
                   <input type="submit" name="submit" value="save" class="form-control col-md-3 btn btn-primary">
               </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script>
  window.addEventListener("load", function(){
     document.getElementById("valid_date_range").value = "<?php echo $affiliateGroup->valid_time_limit ?>";

     $(document).on("change", "#valid_for_ever", function(){
         if( $("#valid_for_ever").is(":checked") ){
             // remove the div
         }else{
             document.getElementById("valid_date_range").value = "<?php echo $affiliateGroup->valid_time_limit ?>";
         }
     });
  });
</script>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>