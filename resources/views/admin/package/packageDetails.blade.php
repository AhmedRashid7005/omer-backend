@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Package Details')
@section('content')

	<a href="{{route('packageList')}}"><button class="btn btn-success">Package List</button></a>
	@if($package)
	<a href="{{route('packageProductAdd')}}"><button class="btn btn-success"><i class="fas fa-plus" aria-hidden="true"></i> Add Product To Package</button></a>
	@endif
	
	<hr>


	@if($package)
	<?php

		$title = "Package Data Details";

		details_table_view($title, $package);

	?>

	@endif


	<!-- Client Details Data -->

	@if( $userData )

	<div class="row packageDetailsShow">
		<div class="col">
			<section class="card">
				<header class="card-header">
					<div class="card-actions">
						<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
						<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
					</div>

					<h2 class="card-title"><strong>Client Details</strong></h2>
				</header>
				<div class="card-body">
					
					<?php

						echo $userData;

					?>
					
				</div>
			</section>
		</div>
	</div>

	@endif
	<!-- end Clients Details Data -->

	<!-- Package Products Data -->

	@if( $packageProducts )

	<?php

		$title = "Package Product List";

		$tableHead = array(
			"Package id",
			"Product Name",
			"Description",
			"Quantity",
			"Price",
			"Note",
			"Creaated At",
			"Updated At",
		);

		table_view( $title, $tableHead, $packageProducts, false, route("packageProductEdit"), route("packageProductDelete"));

	?>

	@endif
	<!-- end Package Product details -->



@endsection