<?php $__env->startSection('title', 'Personal Shopper'); ?>
<?php $__env->startSection('content'); ?>

<style>
    .center {
      margin: auto;
      width: 50%;
      border: 3px solid green;
      padding: 10px;
    }
</style>

<div class="center" style="margin-top: 200px;">
    <div class="col-md-12">
        <legend>Search Form</legend>
        <h3 class="text-center text-primary">
            Search are allowed for celebrities and clients
        </h3>
        <p class="error text-danger col-md-12"></p>
        <form action="<?php echo e(route('affiliatePersonPageSearch')); ?>" method="post" id="search_form">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="id">Unique Id</label>
                <input type="text" class="form-control" name="unique_id" id="search_id">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="search_name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="search_email">
            </div>
            <div class="form-group">
                <button type="button" class="form-control btn btn-info" id="search_person" value="search">search</button>
            </div>
        </form>

    </div>
</div>

<div class="col-md-12">
    <?php if(Session::has("msg")): ?>
    <h3 class="text-warning text-center margin-bottom">
        <?php echo e(Session::get("msg")); ?>

    </h3>
    <?php endif; ?>
</div>
<?php if($affiliatePersons): ?>
<?php $clear_both = 1; ?>
<?php $__currentLoopData = $affiliatePersons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_is => $affiliatePerson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php  
    $clear_both++; 
?>
<?php if($clear_both % 2 == 0): ?>
<div class="col-md-6" style="clear:both;float:left; margin-top: 20px;">
<?php else: ?>
<div class="col-md-6" style="float:left; margin-top: 20px;">
<?php endif; ?>

    <div class="card text-dark bg-warning">
        <div class="card-header">Name: <strong><?php echo e($affiliatePerson->name); ?></strong> </div>
        <?php
        $prices = json_decode( $affiliatePerson->price );
        $div_design = 2;
        ?>
        <div class="card-body text-dark">
            <table class="table text-dark table-bordered">
                <tr>
                    <td>Affiliate Link</td>
                    <td style="cursor: pointer;">
                        <span class="affiliateLinktocopy"><?php echo e(route("subscriptionPlansAr")."?affiliate_link=".$affiliatePerson->affiliate_link); ?></span>
                        <span class="btn btn-info ar_copy" data-clipboard-text="<?php echo e(route('subscriptionPlansAr').'?affiliate_link='.$affiliatePerson->affiliate_link); ?>">Copy</span>
                    </td>
                </tr>
                <tr>
                    <td>Link Validity</td>
                    <td>
                        <?php echo e($affiliatePerson->valid_time_limit); ?>

                    </td>
                </tr>
                <tr>
                    <td>Affiliate Commision Chart</td>
                    <td>
                        <?php if($prices): ?>
                        <ul>
                            <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $div_design++;
                            ?>
                            <?php if($div_design % 3 == 0): ?>
                            <div style="margin-top: 20px;"></div>
                            <div style="border: 2px solid #0c2461; padding: 20px 20px 20px 20px;">
                                <?php endif; ?>

                                <?php if(strpos($key, 'guest_discount_') !== false): ?>
                                <li>
                                    Guest Discount When using your link or Code :<?php echo e($val); ?>

                                </li>
                                <?php else: ?>
                                <li><?php echo e(str_replace("client_commision_","Your Commission, When Registering the Guest in the ", $key)." Plan : ".$val); ?></li>
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
                    <td>My total Affilaite Commission</td>
                    <td>
                        <?php echo e($affiliatePerson->total_client_commission); ?>

                    </td>
                </tr>
                <tr>
                    <td>My Total Affiliate User Number</td>
                    <td>
                        <?php echo e($affiliatePerson->total_affiliate_num); ?>

                    </td>
                </tr>
                <tr>
                    <td>Affiliate User Details</td>
                    <td>
                        <?php if($AffiGuestTotalIndiviPackage[$key_is]): ?>
                        <ul>
                            <?php $__currentLoopData = $AffiGuestTotalIndiviPackage[$key_is]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pName => $pVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>Total Affiliate To the <strong><?php echo e($pName); ?></strong> Plan : <strong><?php echo e($pVal); ?></strong> </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

</div>

<div style="clear: both;"></div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="<?php echo e(URL::asset('public/affiliateByArafatAssets/js/clipboard.min.js')); ?>"></script>
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

// form validation ...
$(document).on("click", "#search_person", function(e){

    e.preventDefault();
    if( (!$("#search_id").val()) && (!$("#search_name").val()) && (!$("#search_email").val()) ){

        $(".error").html("Please Enter Value For At least One Input Then Search");
    }else{
        $(".error").remove();
        $("#search_form").submit();
    }
})

});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.ar_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>