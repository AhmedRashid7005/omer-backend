@extends('template.ar_template')
@section('title', 'Password Forget Code Verify')
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
            {{ __('A fresh verification link and a verification code has been sent to your email address. You can Verify Using That Link Or use the Code Here we Send') }}
        </div>

        @include("template.flash")

        <div class="col-md-6">
            <form action="{{route('forgetPassVerifyPageProcess')}}" method="post">
                @csrf
                <div class="form-group" dir="rtl">
                    <span style="float: right;"><strong>البريد الإلكتروني :</strong></span>
                    <input type="email" value="{{Session::get("customerEmail")}}" readonly class="form-control" name="email" id="email">
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


@endsection