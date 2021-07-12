@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Other Service Edit')
@section('content')

@push("style")
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}
	.searchForm{
		margin-left: 14px;
		margin-top: 10px;
		border: 1px solid;
	}
	.error{
		color:red;
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

				<h2 class="card-title"><strong>Other Service Update By Admin</strong></h2>
			</header>
			<div class="card-body">
				@if($data)

				<form action="{{route('otherServiceUpdate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <?php

                        form_hidden("id", $data->id);

                        form_select("subscriber_package_name_id", $subscriber_package_name_id, $data->subscriber_package_name_id);
                        
                        form_input("name", $data->name);
                        form_textarea("description", $data->description);
                        form_input("price", $data->price);

                        form_submit();
                        ?>            
                </form>

                @endif

			</div>
		</section>
	</div>
</div>

@endsection