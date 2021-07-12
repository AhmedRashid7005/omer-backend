@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Blog Create')
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

				<h2 class="card-title"><strong>Blog Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="{{route('blogStore')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <?php
                        form_select("blog_type_id", $blogTypeList);
                        form_input("code");
                        form_input("subject");
                        form_textarea_html("content");
                        form_input_file("image", true, true);
                        form_input("meta_title");
                        form_input("meta_keyword");
                        form_input("meta_description");
                        form_submit();
                        ?>
                </form>

			</div>
		</section>
	</div>
</div>
	

@endsection
