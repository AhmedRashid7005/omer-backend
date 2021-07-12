@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Send Email')
@section('content')

<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>
				<h2 class="card-title"><strong>Refuse the Bank request Transfer</strong></h2>
			</header>
			<div class="card-body">

				<form action="{{route('SendNotificationRefusedBankTransferWithdraw')}}" method="post">
                    @csrf
                        <?php

                        form_hidden('transfer_id', $id);
                        form_textarea_html("reason", false, false);
                        form_submit();
                        ?>            
                </form>

			</div>
		</section>
	</div>
</div>


@endsection

@push("script")
@endpush