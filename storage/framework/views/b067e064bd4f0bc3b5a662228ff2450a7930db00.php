<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'List Affiliate Person'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-info col-md-12 text-center" style="margin-bottom: 50px;"> Affiliate Person Module List </h3>


    <div>
        <div class="col-md-3 margin-bottom">
            <a href="<?php echo e(route("createAffiliateByPerson")); ?>"><button class="btn btn-primary">Add Affiliate By Person</button></a>
        </div>

        <div class="table-responsive">

        <table class="table table-bordered table-striped mb-0 datatable-arafat  " id="datatable-tabletools">
          <thead>
            <th>Affiliate Person Name</th>
            <th>Affiliate Person Email</th>
            <th>Affiliate Person Identity</th>
            <th>Affiliate Link</th>
            <th>Price</th>
            <th>Valid time</th>
            <th>My total Affilaite Commission</th>
            <th>My Total Affiliate User Number</th>
            <th>Created At</th>
            <th>Actions</th>
          </thead>

          <tbody>
            <?php if($affiliatePersons): ?>
                <?php $__currentLoopData = $affiliatePersons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affiliatePerson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $price = json_decode( $affiliatePerson->price, true );
                    $div_design = 2;

                    $copyData = "Affiliate Person Name : ".$affiliatePerson->name." \nAffiliate Person Email: ".$affiliatePerson->email."\nAffiliate Person Identity: ".$affiliatePerson->identity_num."\nAffiliate Link: ".route("subscriptionPlansAr")."?affiliate_link=".$affiliatePerson->affiliate_link."\nPrice: ";
                    ?>

                        <?php $__currentLoopData = $price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(strpos($k, 'guest_discount_') !== false): ?>
                                    <?php $copyData .= "\nGuest Discount When using your link or Code : ".$v ?>
                                    <?php else: ?>
                                        <?php $copyData .= str_replace("client_commision_","\nYour Commission, When Registering the Guest in the ", $k)." Plan : ".$v ?>
                                    <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php
                           $copyData .=  "\nValid time : ".$affiliatePerson->valid_time_limit;
                           $copyData .= "\nCreated At: ".$affiliatePerson->created_at->diffForHumans();

                           //echo "<br/>";
                           //echo $copyData;
                           //echo "<br/>";

                        ?>

                    <tr>
                        <td><?php echo e($affiliatePerson->name); ?></td>
                        <td><?php echo e($affiliatePerson->email); ?></td>
                        <td>
                            <?php echo e($affiliatePerson->identity_num); ?>

                            <span class="btn btn-info ar_copy" data-clipboard-text="<?php echo e($affiliatePerson->identity_num); ?>">Copy</span>
                        </td>
                        <td>
                            <?php echo e(route("subscriptionPlansAr").'?affiliate_link='.$affiliatePerson->affiliate_link); ?>

                            <span class="btn btn-info ar_copy" data-clipboard-text="<?php echo e(route('subscriptionPlansAr').'?affiliate_link='.$affiliatePerson->affiliate_link); ?>">Copy</span>
                        </td>
                        <td>

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
                                               <li>
                                                Guest Discount When using your link or Code :<?php echo e($v); ?>

                                                </li>
                                            <?php else: ?>
                                            <li><?php echo e(str_replace("client_commision_","Your Commission, When Registering the Guest in the ", $k)." Plan : ".$v); ?></li>
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
                        <td><?php echo e($affiliatePerson->valid_time_limit); ?></td>
                        <td><?php echo e($affiliatePerson->total_client_commission); ?></td>
                        <td><?php echo e($affiliatePerson->total_affiliate_num); ?></td>
                        <td><?php echo e($affiliatePerson->created_at->diffForHumans()); ?></td>
                        <td>
                            <a href="<?php echo e(route('affiliatePersonEdit',$affiliatePerson->id)); ?>"><button class="btn btn-info">Edit</button></a>
                            <a href="<?php echo e(route('affiliatePersonDestroy',$affiliatePerson->id)); ?>" onclick="return confirm('Are you Sure You wanna Delete This Record ?')"><button class="btn btn-danger">Delete</button></a>
                            <span class="btn btn-success ar_copy" data-clipboard-text="<?php echo e($copyData); ?>">Copy</span>
                            <a href="<?php echo e(route('sendMail',$affiliatePerson->id)); ?>"><button class="btn btn-warning">Send Mail</button></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </tbody>
        </table>

    </div>
    </div>
<?php $__env->stopSection(); ?>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script>
   jQuery(document).ready(function($){
    $(".ar_copy").click(function(e){
        console.log(e);
        var clipboard = new ClipboardJS(this);
        var that = this;
        clipboard.on('success', function(e) {
            // console.log(e);
            $(that).html("Copied");
        });

        clipboard.on('error', function(e) {
            // console.log(e);
        });
    });
});
</script>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>