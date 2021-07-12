@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Send Notification')
@section('content')

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

				<form action="{{route('sendNotificationClient')}}" method="post">
                    @csrf
                        <?php

                        form_select("mail_type", $mail_type, "new");
                        form_input("subject");
                        form_textarea_html("body", false, false);
                        form_submit();

                        ?>            
                </form>

			</div>
		</section>
	</div>
</div>


@endsection

@push("script")

<script type="text/javascript">
	
	$(document).ready(function(){

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

	});

</script>

@endpush