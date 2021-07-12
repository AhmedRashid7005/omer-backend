@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Notification Module')
@section('content')

@push("style")
<style>
	table th {
	   text-align: center; 
	}

	.table-center {
	   margin: auto;
	   width: 50% !important; 
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

				<h2 class="card-title"><strong>Send Notification to Client</strong></h2>
			</header>
			<div class="card-body">

                        <?php
                        $default = false;
                        if( Session::has('notificaton_default_select') ){
                        	$default = Session::get("notificaton_default_select");
                        }
                        form_select("notification_send_to", $subscriberPackageNames, $default);

                        ?>

			</div>
		</section>

		{{-- for subscription package only --}}

			<section class="card" id="forSubscriptionPackage" style="display: none;">
				<header class="card-header">
					<div class="card-actions">
						<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
						<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
					</div>
					<h2 class="card-title"><strong>Send Notification to Client</strong></h2>
				</header>
				<div class="card-body">

					<form action="{{route('sendNotificationProcess')}}" method="post">
	                    @csrf
	                        <?php
	                        form_hidden("notification_send_to_is", 0);
	                        form_select("mail_type", $mail_type, "new");
	                        form_input("subject");
	                        form_textarea_html("body", false, false);
	                        form_submit();

	                        ?>            
	                </form>

				</div>
			</section>

		{{-- end for subscription package only --}}


		{{-- section for person only --}}
		<section class="card" id="section_person" style="display: none;">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<h2 class="card-title"><strong>Send Notification to Client <?php  if( isset($request) ) echo $request->old('name'); ?> </strong></h2>
			</header>
			<div class="card-body">

				<div style="border: 2px solid green; margin-bottom: 20px; padding: 20px 20px 20px 20px;">
					<h3 class="text-success text-center"><strong>Search Client</strong></h3>

					@if( Session::has("search_name") || Session::has("search_email") || Session::has("search_suit") || Session::has("search_mobile_number") )

						<h3 class="text-danger">You are Searching with Below Data</h3>

						<table class="table table-no-more table-bordered table-striped mb-0">
							<tr>
								<td>Name: <strong>{{ Session::get("search_name") }}</strong></td>
								<td>Email: <strong>{{ Session::get("search_email") }}</strong></td>
							</tr>
							<tr>
								<td>Suit: <strong>{{ Session::get("search_suit") }}</strong></td>
								<td>Mobile Number: <strong>{{ Session::get("search_mobile_number") }} </strong></td>
							</tr>
						</table>

					@endif

					<table class="table table-responsive text-center table-center">
						<form action="{{route('sendNotificationPost')}}" method="post">
						@csrf
						<tr>
							<td>
								<label for="name"><strong>Name:</strong></label>
								<input type="text" name="name" placeholder="Name">
							</td>
							<td>
								<label for="email"><strong>Client Email:</strong></label>
								<input type="email" name="email" placeholder="Email">
							</td>
						</tr>
						<tr>
							<td>
								<label for="suit_number"><strong>Suit No:</strong></label>
								<input type="text" name="suit" placeholder="Suit Number">
							</td>
							<td>
								<label for="mobile_number"><strong>Mobile Num:</strong></label>
								<input type="text" name="mobile_number" placeholder="Mobile Number">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" class="btn btn-primary" name="Search" value="Search" style="margin-top: 20px;">
							</td>
						</tr>
					</form>
					</table>
				</div>
			</div>
		</section>
		{{-- end section for person only --}}


		@if(isset($res))

		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>
				<h2 class="card-title"><strong>Selet One Or More Client</strong></h2>
			</header>


			<div class="card-body">
				<table class="table table-no-more table-bordered table-striped mb-0">
					<form action="{{route('processPostNotification')}}" method="post" id="SendMailForm">
						@csrf
					<tr>
						<td colspan="6">
							<input type="checkbox" name="select_all" id="select_all">
							<label for="select_all"> Select All </label>
						</td>
					</tr>
					
					@foreach($res as $k => $v)

						<tr>
							<td>
								<input type="checkbox" name="client_ids[]" value="{{$v->id}}" class="mark_as_checked">
							</td>
							<td>
								{{$v->name}}
							</td>
							<td>
								{{$v->suit}}
							</td>
							<td>
								{{$v->email}}
							</td>
							<td>
								{{$v->mem_package}}
							</td>
							<td>
								<a href="{{route('adminClientDetails',$v->id)}}"><span class="btn btn-info">Details</span></a>
							</td>
						</tr>

					@endforeach

					<tr>
						<td colspan="6">
							<span id="SendMail" class="form-control btn btn-primary col-md-2">Send Notifiation</span>
						</td>
					</tr>
					</form>

				</table>
			</div>

		@endif


	</div>
</div>


@endsection

@push("script")

<script type="text/javascript">
	
	$(document).ready(function(){

		// if we set person as dafult

		if( $("#notification_send_to").val() == "person" ){
			$("#forSubscriptionPackage").hide();
			$("#section_person").show();
		}

		// end if we set person as dafult

		$(document).on("change", "#notification_send_to", function(){

			var sendTo = $(this).val();

			if(sendTo == "person"){
				
				$("#forSubscriptionPackage").hide();
				$("#section_person").show();

			}else{
				$("#notification_send_to_is").val(sendTo);
				$("#forSubscriptionPackage").show();
				$("#section_person").hide();
			}
		});


		$(document).on("change", "#select_all", function(){

			if( $(this).is(":checked") ){
				$(".mark_as_checked").prop("checked", "checked");
			}else{
				$(".mark_as_checked").prop("checked", false);
			}
		});

		// Now Check and Send ..

		$(document).on("click", "#SendMail", function(){

			if( $(".mark_as_checked").is(":checked") ){
				$("#SendMailForm").submit();
			}else{
				alert("For Sending Notification Please Check At Least One Client");
			}

		});


		// for subscription package name only

		$(document).on("change", "#mail_type", function(){

			function cleanField(){
				$("#subject").val("");
				$(".summernote").summernote('code', '<p><br></p>');
			}

			if($(this).val()){
				var tem_id = $(this).val();
				if( tem_id != "new" ){
					$.ajax({
			               url: "{{route('getMailTemplateById')}}"+"/"+tem_id,
			               method: "get",
			               data: { "_token" : "{{ csrf_token() }}"},
			               success: function(res){
			                  // This email is already in use
			                  if(res == 0){
			                   cleanField();
			                  }else{
			                  	var data = JSON.parse(res);
			                   $("#subject").val(data.subject);
			                   $(".summernote").summernote('code', '<p>'+data.body+'<br></p>');
			                  }
			               }
			           });
				}else{
					cleanField();
				}
			}else{
				cleanField();
			}
			
		});

		// end for subscription package name only

	});

</script>

@endpush