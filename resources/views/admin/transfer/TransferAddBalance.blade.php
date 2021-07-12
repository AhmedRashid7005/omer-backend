@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Transfer Confirmation')
@section('content')


    <form action="{{route('Add-Balance-To-User-After-Transfer')}}" method="post" enctype='multipart/form-data' id="packageUpdate" >
					@csrf
				<?php
					form_hidden("id", $res->id);
					form_hidden("user_id", $user->id);
					form_input("num", $num);
                    form_input("User", $user->name);
					form_input("suit", $user->suit);
					form_input("amount");
					form_input("ConfimAmount");
					?>
					<div class="row">		
                    <button class="btn btn-success" type="submit" style="margin-left:40%;width:100px">send</button>
					</div>
				</form>


@endsection