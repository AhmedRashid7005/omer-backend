@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Create Affiliate Group')
@section('content')

@section('content')
<h3 class="text-info col-md-12 text-center" style="margin-bottom: 50px;"> Affiliate Create Module Using Group</h3>
    <div class="offset-md-3 col-md-6 margin-bottom">
        <div style="border: 1px solid black; padding: 10px 10px 10px 10px;">
            <legend>Create Affiliate by Group Name</legend>
            <form action="{{route('storeAffiliateByGroup')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="affiliate_type"><strong>Affiliate Type</strong></label>
                  <select name="affiliate_type_id" id="affiliate_type" class="form-control" required="">
                    <option value="">--Select One--</option>
                    @if($affiliateTypes)
                        @foreach($affiliateTypes as $affiliateType)
                            <option value="{{$affiliateType->id}}">{{$affiliateType->name}}</option>
                        @endforeach
                    @endif
                  </select>
               </div>

               @if($affiliateTypes)
                @foreach($affiliateTypes as $affiliateType)

                    <div style="margin-top: 20px;"></div>
                    <div style="border: 2px solid #0c2461; padding: 20px 20px 20px 20px; ">
                      <div class="form-group">
                        <label for="client_commision_{{$affiliateType->name}}"><strong> Your Commission, When Registering the Guest in the {{$affiliateType->name}} Plan</strong></label>
                        <input type="text" class="form-control" name="client_commision_{{$affiliateType->name}}" required="">
                       </div>

                       <div class="form-group">
                         <label for="guest_discount_{{$affiliateType->name}}"><strong>
                           Guest Discount When using your link or Code
                         </strong></label>
                         <input type="text" class="form-control" name="guest_discount_{{$affiliateType->name}}" required>
                        </div>
                    </div>

                @endforeach
               @endif

               <div class="form-group form-check" id="valid_for_ever_div" style="margin-top: 20px;">
                   <label class="form-check-label">
                     <input class="form-check-input" id="valid_for_ever" type="checkbox" value="valid_for_ever" name="valid_for_ever">
                        Valid Forever
                   </label>
                </div>

                 <div class="form-group" id="valid_date_range_div">
                   <label for="valid_date_range"><strong>Valid Date Range</strong></label>
                   <input name="valid_date_range" id="valid_date_range" class="form-control date_range_picker" required>
                </div>

               <div class="form-group">
                   <input type="submit" name="submit" value="save" class="form-control col-md-3 btn btn-primary">
               </div>
            </form>
        </div>
    </div>
@endsection