@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Blog Edit')
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

				<h2 class="card-title"><strong>Blog Edit By Admin</strong></h2>
			</header>
			<div class="card-body">
				@if($blog)

				<form action="{{route('blogUpdate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <?php
                        form_hidden("id", $blog->id);
                        form_select("blog_type_id", $blogTypeList, $blog->blog_type_id);
                        form_input("code", $blog->code);
                        form_input("subject", $blog->subject);
                        form_textarea_html("content", $blog->content);
                        form_input_file("image", false, true);
                        form_input("meta_title", $blog->meta_title);
                        form_input("meta_keyword", $blog->meta_keyword);
                        form_input("meta_description", $blog->meta_description);
                        form_submit();
                        ?>
                </form>

                @endif

			</div>
		</section>
	</div>
</div>
	

@endsection
