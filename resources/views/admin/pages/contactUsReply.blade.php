@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Contact Us Reply')
@section('content')

<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>
				<h2 class="card-title"><strong>Contact Us Reply</strong></h2>
			</header>
			<div class="card-body">

				@if($contactUs)

				<form action="{{route('contactUsReplyPost')}}" method="post">
                    @csrf
                        <?php

                        form_hidden("contact_us_id", $contactUs->id);
                        form_input("subject", $contactUs->subject." Reply");
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