<?php $__env->startSection('title', 'Password Forget Code Verify'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush("css"); ?>
    <style>
        .footer{
            margin-top: 200px !important;
        }
    </style>
<?php $__env->stopPush(); ?>


    <div class="col-md-12" style="position: relative; top: 160px;">
        <div class="alert alert-info" role="alert">
            <?php echo e(__('A fresh verification link and a verification code has been sent to your email address. You can Verify Using That Link Or use the Code Here we Send')); ?>

        </div>

        <?php echo $__env->make("template.flash", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="col-md-6">
            <form action="<?php echo e(route('forgetPassVerifyPageProcess')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group" dir="rtl">
                    <span style="float: right;"><strong>البريد الإلكتروني :</strong></span>
                    <input type="email" value="<?php echo e(Session::get("customerEmail")); ?>" readonly class="form-control" name="email" id="email">
                </div>
                <div class="form-group" dir="rtl">
                    <span style="float: right;"><strong>رمز التحقق :</strong></span>
                    <input type="text" name="verification_code" value="" class="form-control" id="verification_code">
                </div>

                <div class="form-group">
                    <input type="submit" name="Verify" value="التحقق" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.ar_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>