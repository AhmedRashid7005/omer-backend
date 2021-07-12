@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Calculator Add')
@section('content')

@push("style")
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}
</style>
@endpush


<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<a href="{{route('calculatorList',[$moduleName,$for])}}"><button class="btn btn-info"><i class="fas fa-list" aria-hidden="true"></i> {{$title}} List</button></a>
				<hr>

				<h2 class="card-title"><strong>{{$title}} Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="{{route('calculatorStore')}}" method="post">
                    @csrf
                        <?php
                        
                        global $amount_type;

                        form_hidden("module_name", $moduleName);
                        form_hidden("module_for", $for);
                        form_select("subscriber_package_name_id", $subscriberPackageList);

                        # Only for  Cash Back
                        if( $moduleName == "cash_back" ){

                              $cash_back_pay_via = array(
                                    "cash" => "cash",
                                    "mada" => "mada",
                                    "stc pay" => "stc pay",
                                    "credit cards" => "credit cards",
                                    "paypal" => "paypal",
                                    "recharge card" => "recharge card",
                                    "bank transfer" => "bank transfer",
                              );

                              form_select("module_for", $cash_back_pay_via, false, true, "Pay via");

                        }
                        # End Only for Cash Back

                        if($for == "import" && $moduleName == "commission_fess"){
                        	
                        	$from = array(
                        		"Saudi" => "Saudi",
                        		"Bangladesh" => "Bangladesh",
                        	);

                        	global $country_full_array;

                        	form_select("from", $from);
                        	form_select("to", $country_full_array);
                        }else{
                        	form_input("from");
                        	form_input("to");
                        }
                        


                        form_select("amount_type", $amount_type);
                        form_input("amount");
                        form_submit();

                        ?>            
                </form>

			</div>
		</section>
	</div>
</div>
	

@endsection
