@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Subscriber Package Name Create')
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

				<h2 class="card-title"><strong>Add Subscriber Package Name By Admin</strong></h2>
			</header>
			<div class="card-body">
				<form action="{{route('subscribePackageStore')}}" method="post">
                    @csrf
                        <?php
                        form_input("name");
                        form_input("arabic_name");
                        form_input("price_in_dolar");
                        form_input("price_in_saudi_riyal");
                        form_input("number_of_days");
                        form_input("suit_identity");
                        form_input("display_position");
                        form_submit();
                        ?>            
                </form>
			</div>
		</section>
	</div>
</div>
	

@endsection
