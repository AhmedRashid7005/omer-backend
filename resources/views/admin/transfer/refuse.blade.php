@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Refuse Transfer Confirmation')
@section('content')


    <form action="{{route('SendRefusedMessage')}}" method="post" enctype='multipart/form-data' id="packageUpdate" >
					@csrf
				<?php
					form_hidden("id", $data->id);
					form_hidden("user_id", $user->id);
					form_input("num", $data->operation_number);
                    form_input("User", $user->name);
					form_input("suit", $user->suit);
					form_textarea("Message");
					?>
					<div class="row">		
                    <button class="btn btn-success" type="submit" style="margin-left:40%;width:100px">send</button>
					</div>
				</form>


@endsection