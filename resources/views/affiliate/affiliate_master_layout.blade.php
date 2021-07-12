<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate-@yield('title')</title>
    <link href="{{ URL::asset('public/affiliateByArafatAssets/css/bootstrap.min.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('public/affiliateByArafatAssets/css/themeCustom.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('public/affiliateByArafatAssets/css/daterangepicker.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('public/affiliateByArafatAssets/css/jquery.dataTables.min.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('public/affiliateByArafatAssets/css/custom.css') }}"  rel="stylesheet">
    <script src="{{ URL::asset('public/affiliateByArafatAssets/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('public/affiliateByArafatAssets/js/clipboard.min.js') }}"></script>
</head>
<body>
    <?php
    //Session::flash('message', 'This is a message!');
    ?>
<!-- flash message -->
@if(Session::has('message'))
<div class="offset-md-1 col-md-8" style="padding-left: 60px;">
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h4 class="alert-heading text-dark text-center">{{Session::get("message")}}</h4>
<!--       <p class="mb-0">Message Goes Here ..</p> -->
    </div>
</div>
<!-- end falsh message -->
@endif
<div class="container">
    <div class="row">

        @yield("content")
    </div>
</div>


{{-- loading the js by arafat --}}
<script src="{{ URL::asset('public/affiliateByArafatAssets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('public/affiliateByArafatAssets/js/moment.min.js') }}"></script>
<script src="{{ URL::asset('public/affiliateByArafatAssets/js/daterangepicker.min.js') }}"></script>
<script src="{{ URL::asset('public/affiliateByArafatAssets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('public/affiliateByArafatAssets/js/themeCustom.js') }}"></script>
<script src="{{ URL::asset('public/affiliateByArafatAssets/js/custom.js') }}"></script>
{{-- loading the js by arafat --}}

</body>
</html>