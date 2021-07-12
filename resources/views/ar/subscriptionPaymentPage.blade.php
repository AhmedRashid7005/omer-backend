@extends('template.ar_template')
@section('title', 'Subscription Payment Page')
@section('content')

@push("css")
    <style>
        .footer{
            margin-top: 200px !important;
        }
    </style>
@endpush


    <div class="col-md-12" style="margin-top:170px; margin-bottom: 350px;">
        <div class="alert alert-danger text-center" role="danger">
            <a href="{{route('startFromBeganing')}}"><button class="btn btn-danger">Start From Beganing Again</button></a>
        </div>
        <div class="alert alert-success" role="alert">
            {{ __('Subscription Payment Page') }}
        </div>
        @include("template.flash")

        <div class="col-md-5" style="float: left;">
            <div class="card text-white bg-secondary mb-12">
               <div class="card-header">Account Information</div>
               <div class="card-body">
                  <h4 class="card-title">Name: {{$customer->first_name." ".$customer->last_name}} </h4>
                  <p class="card-text">Email: {{$customer->email}}</p>
                  <p class="card-text">Subscribe Package: {{$customer->mem_package}}</p>
                  <p class="card-text">Package Fee: {{$customer->mem_fee}}</p>
                  <p class="card-text">Email Verification: Email is Verified</p>
                  <p class="card-text">Is billing and Shipping is same: Yes</p>
                  <p class="card-text">Is Agreed on Term and Conditions: Yes</p>
                  <p class="card-text"></p>
                  <p class="card-text"></p>
               </div>
            </div>
        </div>
        <div class="col-md-5" style="float: left;">
           <div class="card bg-light mb-12">
              <div class="card-header">Billing Information</div>
              <div class="card-body">
                 <h4 class="card-title">Name: {{$customer->first_name." ".$customer->last_name}} </h4>
                 <p class="card-text">Billing Address 1: {{$customer->bill_add_1}}</p>
                 <p class="card-text">Billing Address 2:{{$customer->bill_add_2}}</p>
                 <p class="card-text">Billing Country:{{$customer->bill_country}}</p>
                 <p class="card-text">Billing Region:{{$customer->bill_region}}</p>
                 <p class="card-text">Billing City:{{$customer->bill_city}}</p>
                 <p class="card-text">Billing Phone:{{$customer->bill_phone}}</p>
                 <p class="card-text">Billing Postal Code:{{$customer->bill_postal_code}}</p>
                 <p class="card-text">Billing Another Number:{{$customer->bill_another_number}}</p>
              </div>
           </div>
        </div>
    </div>

    <div class="col-md-12" style="margin-top: 500px; margin-bottom: 100px;">
        <div class="card border-primary mb-12 col-md-8">
          <div class="card-header">Order Summary</div>
          <div class="card-body">
            <h4 class="card-title">Subscribe Plan Name: {{$customer->mem_package}}</h4>
            <p class="card-text">One Time Setup Fee: $0.00</p>
            <p class="card-text"><hr></p>
            <p class="card-text">Membership Fee: ${{$customer->mem_fee}}</p>
            <p class="card-text"><hr></p>
            <p class="card-text">Total: ${{$customer->mem_fee}}</p>
            <p class="card-text"><hr></p>

          </div>
        </div>
    </div>

   <div class="col-md-12" style="">
       <div class="col-md-6">

           <form action="{{route('subscriptionPaymentRedirect')}}" method="post">
               @csrf
               <div class="form-group">
                   <span><strong>Select Your Desire Payment Option:</strong></span>
                   <select name="payment_option" class="form-control" id="payment_option" required>
                       <option value="">--Select One--</option>
                       <option value="mada_pay">Mada Pay</option>
                       <option value="credit_debit_card">Credit Or Debit Card</option>
                       <option value="paypal">Paypal</option>
                   </select>

               </div>

               <div class="form-group">
                   <input type="submit" name="Process" value="process" class="form-control btn btn-primary">
               </div>
           </form>

       </div>

   </div>

@endsection