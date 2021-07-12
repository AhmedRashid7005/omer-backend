@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Affiliate Group')
@section('content')


@section('content')
<h3 class="text-info col-md-12 text-center" style="margin-bottom: 50px;"> Affiliate Group Module List </h3>


    <div>
        <div class="col-md-3 margin-bottom">
            <a href="{{route("createAffiliateByGroup")}}"><button class="btn btn-primary">Add Affiliate By Group</button></a>
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
            @if($affiliateGroups)
                @foreach($affiliateGroups as $affiliateGroup)
                    <tr>
                        <td>{{$affiliateGroup->affiliateType->name}}</td>
                        <td>
                            <?php
                                $price = json_decode( $affiliateGroup->price );
                                //dump($price);
                                $div_design = 2;
                            ?>
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
                            @endif
                        </td>
                        <td>{{$affiliateGroup->valid_time_limit}}</td>
                        <td>{{$affiliateGroup->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('AffiliateGroupEdit',$affiliateGroup->id)}}"><button class="btn btn-info">Edit</button></a>
                            <a href="{{route('AffiliateGroupDestroy',$affiliateGroup->id)}}" onclick="return confirm('Are you Sure You wanna Delete This Record ?')"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            @endif
          </tbody>
        </table>
    </div>
@endsection
