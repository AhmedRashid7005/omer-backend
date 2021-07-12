@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'List Affiliate Person')
@section('content')

@section('content')
<h3 class="text-info col-md-12 text-center" style="margin-bottom: 50px;"> Affiliate Person Module List </h3>


    <div>
        <div class="col-md-3 margin-bottom">
            <a href="{{route("createAffiliateByPerson")}}"><button class="btn btn-primary">Add Affiliate By Person</button></a>
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
            @if($affiliatePersons)
                @foreach($affiliatePersons as $affiliatePerson)
                <?php
                    $price = json_decode( $affiliatePerson->price, true );
                    $div_design = 2;

                    $copyData = "Affiliate Person Name : ".$affiliatePerson->name." \nAffiliate Person Email: ".$affiliatePerson->email."\nAffiliate Person Identity: ".$affiliatePerson->identity_num."\nAffiliate Link: ".route("subscriptionPlansAr")."?affiliate_link=".$affiliatePerson->affiliate_link."\nPrice: ";
                    ?>

                        @foreach($price as $k => $v)
                                    @if(strpos($k, 'guest_discount_') !== false)
                                    <?php $copyData .= "\nGuest Discount When using your link or Code : ".$v ?>
                                    @else
                                        <?php $copyData .= str_replace("client_commision_","\nYour Commission, When Registering the Guest in the ", $k)." Plan : ".$v ?>
                                    @endif
                        @endforeach
                        <?php
                           $copyData .=  "\nValid time : ".$affiliatePerson->valid_time_limit;
                           $copyData .= "\nCreated At: ".$affiliatePerson->created_at->diffForHumans();

                           //echo "<br/>";
                           //echo $copyData;
                           //echo "<br/>";

                        ?>

                    <tr>
                        <td>{{$affiliatePerson->name}}</td>
                        <td>{{$affiliatePerson->email}}</td>
                        <td>
                            {{$affiliatePerson->identity_num}}
                            <span class="btn btn-info ar_copy" data-clipboard-text="{{$affiliatePerson->identity_num}}">Copy</span>
                        </td>
                        <td>
                            {{route("subscriptionPlansAr").'?affiliate_link='.$affiliatePerson->affiliate_link}}
                            <span class="btn btn-info ar_copy" data-clipboard-text="{{route('subscriptionPlansAr').'?affiliate_link='.$affiliatePerson->affiliate_link}}">Copy</span>
                        </td>
                        <td>

                            @if($price)
                            <ul>
                                @foreach($price as $k => $v)
                                    <?php
                                    $div_design++;
                                    ?>
                                        @if($div_design % 3 == 0)
                                        <div style="margin-top: 20px;"></div>
                                        <div style="border: 2px solid #0c2461; padding: 20px 20px 20px 20px;">
                                        @endif

                                            @if(strpos($k, 'guest_discount_') !== false)
                                               <li>
                                                Guest Discount When using your link or Code :{{$v}}
                                                </li>
                                            @else
                                            <li>{{str_replace("client_commision_","Your Commission, When Registering the Guest in the ", $k)." Plan : ".$v}}</li>
                                            @endif
                                        @if($div_design % 4 == 0)
                                            <?php
                                            $div_design = 2;
                                            ?>
                                        </div>
                                        @endif
                                @endforeach
                            </ul>
                            @endif
                        </td>
                        <td>{{$affiliatePerson->valid_time_limit}}</td>
                        <td>{{$affiliatePerson->total_client_commission}}</td>
                        <td>{{$affiliatePerson->total_affiliate_num}}</td>
                        <td>{{$affiliatePerson->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('affiliatePersonEdit',$affiliatePerson->id)}}"><button class="btn btn-info">Edit</button></a>
                            <a href="{{route('affiliatePersonDestroy',$affiliatePerson->id)}}" onclick="return confirm('Are you Sure You wanna Delete This Record ?')"><button class="btn btn-danger">Delete</button></a>
                            <span class="btn btn-success ar_copy" data-clipboard-text="{{$copyData}}">Copy</span>
                            <a href="{{route('sendMail',$affiliatePerson->id)}}"><button class="btn btn-warning">Send Mail</button></a>
                        </td>
                    </tr>
                @endforeach
            @endif
          </tbody>
        </table>

    </div>
    </div>
@endsection
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