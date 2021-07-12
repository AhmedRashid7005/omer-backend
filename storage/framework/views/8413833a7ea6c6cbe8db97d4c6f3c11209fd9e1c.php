<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Affiliate Group'); ?>
<?php $__env->startSection('content'); ?>


<?php $__env->startSection('content'); ?>
<h3 class="text-info col-md-12 text-center" style="margin-bottom: 50px;"> Affiliate Group Module List </h3>


    <div>
        <div class="col-md-3 margin-bottom">
            <a href="<?php echo e(route("createAffiliateByGroup")); ?>"><button class="btn btn-primary">Add Affiliate By Group</button></a>
        </div>

        <table class="table table-bordered table-striped mb-0 datatable-arafat" id="datatable-tabletools">
          <thead>
            <th>Affiliate Type</th>
            <th>Price</th>
            <th>Valid time</th>
            <th>Created At</th>
            <th>Actions</th>
          </thead>

          <tbody>
            <?php if($affiliateGroups): ?>
                <?php $__currentLoopData = $affiliateGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affiliateGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($affiliateGroup->affiliateType->name); ?></td>
                        <td>
                            <?php
                                $price = json_decode( $affiliateGroup->price );
                                //dump($price);
                                $div_design = 2;
                            ?>
                            <?php if($price): ?>
                            <ul>
                                <?php $__currentLoopData = $price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $div_design++;
                                ?>
                                    <?php if($div_design % 3 == 0): ?>
                                     <div style="margin-top: 20px;"></div>
                                    <div style="border: 2px solid #0c2461; padding: 20px 20px 20px 20px;">
                                    <?php endif; ?>

                                        <?php if(strpos($k, 'guest_discount_') !== false): ?>
                                           <li style="white-space: nowrap;">
                                            Guest Discount When using your link or Code :<?php echo e($v); ?>

                                            </li>
                                        <?php else: ?>
                                        <li style="white-space: nowrap;"><?php echo e(str_replace("client_commision_","Your Commission, When Registering the Guest in the ", $k)." Plan : ".$v); ?></li>
                                        <?php endif; ?>
                                    <?php if($div_design % 4 == 0): ?>
                                        <?php
                                        $div_design = 2;
                                        ?>
                                    </div>
                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($affiliateGroup->valid_time_limit); ?></td>
                        <td><?php echo e($affiliateGroup->created_at->diffForHumans()); ?></td>
                        <td>
                            <a href="<?php echo e(route('AffiliateGroupEdit',$affiliateGroup->id)); ?>"><button class="btn btn-info">Edit</button></a>
                            <a href="<?php echo e(route('AffiliateGroupDestroy',$affiliateGroup->id)); ?>" onclick="return confirm('Are you Sure You wanna Delete This Record ?')"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>