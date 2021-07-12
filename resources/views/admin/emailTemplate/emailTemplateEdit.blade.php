@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Email Template Update')
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

			{{-- 	<a href="{{route("subscribePackageList")}}"><button class="btn btn-success">Subscriber Package List</button></a>
				<hr> --}}

				<h2 class="card-title"><strong>Email Template Update By Admin</strong></h2>
			</header>
			<div class="card-body">

				@if($emailTemplate)

				<form action="{{route('emailTemplateUpdate')}}" method="post">
                    @csrf
                        <?php
                        form_hidden("id", $emailTemplate->id);
                        form_input("name", $emailTemplate->name);
                        form_input("subject", $emailTemplate->subject);
                        form_textarea_html("body", $emailTemplate->body, false);
                        form_submit();
                        
                        ?>            
                </form>

                @endif

			</div>
		</section>
	</div>
</div>
	

@endsection
