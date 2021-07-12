@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Review Details')
@section('content')


    <form action="{{route('Add-Balance-To-User-After-Review')}}" method="post" enctype='multipart/form-data' id="packageUpdate" >
					@csrf
				<?php
					form_hidden("id", $user->id);
					form_hidden("num", $num);
                    form_input("User", $user->name);
					form_input("suit", $user->suit);
					form_input("amount");
					?>

					<div class="row">		
                    <button class="btn btn-success" type="submit" style="margin-left:40%;width:100px">send</button>
					</div>
				</form>


@endsection