@extends('template.ar_template')
@section('title', 'Reset Password')
@section('content')

@push("css")
    <style>
        .footer{
            margin-top: 200px !important;
        }
    </style>
@endpush


    <div class="col-md-12" style="position: relative; top: 160px;">
        <div class="alert alert-info" role="alert">
            {{ __('إعادة تعيين كلمة المرور') }}
        </div>

        @include("template.flash")

        <div class="col-md-6">
            <form action="{{route('forgetPassResetProcess')}}" method="post">
                @csrf
                <div class="form-group" dir="rtl">
                    <span style="float: right;"><strong>كلمه المرور :</strong></span>
                    <input type="password" value="" class="form-control" name="password" id="password" min="6" required="true">
                    <div class="passwordError" style='color:red; display:none;' dir="rtl">يجب أن تكون كلمة المرور ثمانية أحرف واحد العليا حالة واحدة، حالة أقل واحد، ورقم واحد على الأقل</div>
                </div>
                <div class="form-group" dir="rtl">
                    <span style="float: right;"><strong>تأكيد كلمة المرور :</strong></span>
                    <input type="password" name="confirm_pass" value="" class="form-control" id="confirm_pass" min="6" required="true">
                    <div style="color:red; display:none;" id="confirm_pass_error">كلمة المرور غير متطابقة</div>
                </div>

                <div class="form-group">
                    <input type="submit" name="Reset" value="Reset" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>


@endsection

@push("script")
<script>
$(document).ready(function(){
    // arafat password Validation strat
    $(document).on("blur", "#password", function(){
        // Password should 8 character, 1 upper, 1 lower 1 number
        if(this.value.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/)){
          $(".passwordError").hide();
        }else{
          $(".passwordError").show();

        }
    });
    // arafat password validation end
    $(document).on("blur", "#confirm_pass", function(){
        var pass = $("#password").val();
        var confirmPass = $("#confirm_pass").val();

        if(pass != confirmPass){
            $("#confirm_pass_error").show();
            $("#confirm_pass").val("");
        }else{
            $("#confirm_pass_error").hide();
        }
    });
});
</script>
@endpush