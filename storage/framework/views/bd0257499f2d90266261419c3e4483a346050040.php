<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Create Affiliate Person'); ?>
<?php $__env->startSection('content'); ?>


<?php $__env->startSection('content'); ?>
<h3 class="text-info col-md-12 text-center" style="margin-bottom: 50px;"> Affiliate Create Module Using Person</h3>
    <div class="offset-md-3 col-md-6 margin-bottom">
        <div style="border: 1px solid black; padding: 10px 10px 10px 10px;">
            <legend>Create Affiliate by Famous Person</legend>
            <form action="<?php echo e(route('storeAffiliateByPerson')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <label for="affiliate_person_name"><strong>Affiliate Person Name</strong></label>
                  <input type="text" name="affiliate_person_name" id="affiliate_person_name" class="form-control" required="">
               </div>

                <div class="form-group">
                  <label for="affiliate_person_email"><strong>Affiliate Person Email (Optional)</strong></label>
                  <input type="text" name="affiliate_person_email" id="affiliate_person_email" class="form-control">
               </div>

               <?php if($affiliateTypes): ?>
                <?php $__currentLoopData = $affiliateTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affiliateType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div style="margin-top: 20px;"></div>
                  <div style="border: 2px solid #0c2461; padding: 20px 20px 20px 20px; ">
                        <div class="form-group">
                          <label for="client_commision_<?php echo e($affiliateType->name); ?>"><strong>Your Commission, When Registering the Guest in the <?php echo e($affiliateType->name); ?> Plan</strong></label>
                          <input type="text" class="form-control" name="client_commision_<?php echo e($affiliateType->name); ?>" required="">
                         </div>

                         <div class="form-group">
                           <label for="guest_discount_<?php echo e($affiliateType->name); ?>"><strong>
                               Guest Discount When using your link or Code
                           </strong></label>
                           <input type="text" class="form-control" name="guest_discount_<?php echo e($affiliateType->name); ?>" required>
                          </div>
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
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>