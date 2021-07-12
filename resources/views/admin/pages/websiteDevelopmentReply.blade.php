@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Website Development Reply')
@section('content')

<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>
				<h2 class="card-title"><strong>Website Development Reply</strong></h2>
			</header>
			<div class="card-body">

				@if($websiteDevelopment)

				<form action="{{route('websiteDevelopmentReplyPost')}}" method="post">
                    @csrf
                        <?php

                        form_hidden("website_development_id", $websiteDevelopment->id);
                        form_input("subject", $websiteDevelopment->topic." Reply");
                        form_textarea_html("body", false, false);
                        form_submit();

                        ?>            
                </form>

                @endif

			</div>
		</section>
	</div>
</div>


@endsection