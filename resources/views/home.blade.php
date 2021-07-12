@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
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
                            <td>{{Auth()->user()->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{Auth()->user()->email}}</td>
                        </tr>
                        <tr>
                            <td>Package</td>
                            <td>{{Auth()->user()->mem_package}}</td>
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
                                <span id="affiliateLinktocopy">{{route("subscriptionPlansAr")."?affiliate_link=".Auth()->user()->affiliate_link}}</span>
                                <button id="ar_copy" class="btn btn-info" data-clipboard-text="{{route('subscriptionPlansAr').'?affiliate_link='.Auth()->user()->affiliate_link}}">Copy</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Link Validity</td>
                            <td>
                                @if($affiliateGroup)
                                {{$affiliateGroup->valid_time_limit}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Affiliate Commision Chart</td>
                            <td>
                                @if($prices)
                                {{-- add by arafat --}}
                                <ul style="margin-left: -30px;">
                                    @foreach($prices as $k => $v)
                                    <?php
                                    $div_design++;
                                    ?>
                                        @if($div_design % 3 == 0)
                                         <div style="margin-top: 20px;"></div>
                                        <div style="border: 2px solid #0c2461; padding: 20px 20px 20px 20px;">
                                        @endif

                                            @if(strpos($k, 'guest_discount_') !== false)
                                               <li style="white-space: nowrap;">
                                                Guest Discount When using your link or Code :{{$v}}
                                                </li>
                                            @else
                                            <li style="white-space: nowrap;">{{str_replace("client_commision_","Your Commission, When Registering the Guest in the ", $k)." Plan : ".$v}}</li>
                                            @endif
                                        @if($div_design % 4 == 0)
                                            <?php
                                            $div_design = 2;
                                            ?>
                                        </div>
                                        @endif

                                    @endforeach
                                </ul>
                                {{-- end add by arafat --}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Me as A guest When I register (<strong>Using Affiliate</strong>) Discount</td>
                            <td>{{Auth()->user()->me_as_a_guest_discount}}</td>
                        </tr>
                        <tr>
                            <td>My total Affilaite Commission</td>
                            <td>{{Auth()->user()->total_client_commission}}</td>
                        </tr>
                        <tr>
                            <td>My Total Affiliate User Number</td>
                            <td>{{Auth()->user()->total_affiliate_num}}</td>
                        </tr>
                        <tr>
                            <td>Affiliate User Details</td>
                            <td>
                                @if($individualPackgetotalAffiliate)
                                    <ul>
                                    @foreach($individualPackgetotalAffiliate as $k => $v)
                                        <li>Total Affiliate To the <strong>{{$k}}</strong> Plan : <strong>{{$v}}</strong> </li>
                                    @endforeach
                                    </ul>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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