<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(__('You are logged in!')); ?>

                    <?php
                       //dump(Auth()->user());
                        $prices = false;
                        if($affiliateGroup){
                            $prices = json_decode($affiliateGroup->price);
                            $div_design = 2;
                        }
                    ?>

                    <table class="table table-hover">
                        <tr>
                            <td>Name</td>
                            <td><?php echo e(Auth()->user()->name); ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo e(Auth()->user()->email); ?></td>
                        </tr>
                        <tr>
                            <td>Package</td>
                            <td><?php echo e(Auth()->user()->mem_package); ?></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center" style="margin-top: 20px;">
        <div class="col-md-8">
            <div class="card text-dark bg-warning">
                <div class="card-header">Affiliate Module</div>

                <div class="card-body text-dark">
                    <table class="table text-dark table-bordered">
                        <tr>
                            <td>Affiliate Link</td>
                            <td style="cursor: pointer;">
                                <span id="affiliateLinktocopy"><?php echo e(route("subscriptionPlansAr")."?affiliate_link=".Auth()->user()->affiliate_link); ?></span>
                                <button id="ar_copy" class="btn btn-info" data-clipboard-text="<?php echo e(route('subscriptionPlansAr').'?affiliate_link='.Auth()->user()->affiliate_link); ?>">Copy</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Link Validity</td>
                            <td>
                                <?php if($affiliateGroup): ?>
                                <?php echo e($affiliateGroup->valid_time_limit); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Affiliate Commision Chart</td>
                            <td>
                                <?php if($prices): ?>
                                
                                <ul style="margin-left: -30px;">
                                    <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        </tr>
                        <tr>
                            <td>Me as A guest When I register (<strong>Using Affiliate</strong>) Discount</td>
                            <td><?php echo e(Auth()->user()->me_as_a_guest_discount); ?></td>
                        </tr>
                        <tr>
                            <td>My total Affilaite Commission</td>
                            <td><?php echo e(Auth()->user()->total_client_commission); ?></td>
                        </tr>
                        <tr>
                            <td>My Total Affiliate User Number</td>
                            <td><?php echo e(Auth()->user()->total_affiliate_num); ?></td>
                        </tr>
                        <tr>
                            <td>Affiliate User Details</td>
                            <td>
                                <?php if($individualPackgetotalAffiliate): ?>
                                    <ul>
                                    <?php $__currentLoopData = $individualPackgetotalAffiliate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>Total Affiliate To the <strong><?php echo e($k); ?></strong> Plan : <strong><?php echo e($v); ?></strong> </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script>
   jQuery(document).ready(function($){
    var clipboard = new ClipboardJS('.btn');

    clipboard.on('success', function(e) {
        $("#ar_copy").html("Copied");
    });

    clipboard.on('error', function(e) {
        // console.log(e);
    });
});
</script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>