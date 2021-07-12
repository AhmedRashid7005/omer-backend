@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Recharge Card List')
@section('content')

@push("style")
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}

	@media print {
	    body * {
	       visibility: hidden;
	    }
	    #print_all, #print_all * {
	       visibility: visible;
	    }
	    #print_all {
	       /*position: absolute;*/
	       left: 0;
	       top: 0;
	    }
	}
</style>
@endpush

<div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px">
	<a href="{{route('rechargeCardList')}}"><button class="btn btn-info">Recharge Card List</button></a>
</div>

<button class="btn btn warning">
	<span class="btn btn-warning ar_copy" data-clipboard-text="{{$clipBoardText}}">Copy All</span>
</button>

<button id="print_me">Print All</button>

@if($resArr)
	
	<div id="print_all">

	@foreach($resArr as $arr_key => $arr_val)
		
		<div class="col-md-6">
			<?php

				details_table_view(false, $arr_val);

			?>
		</div>
		

	@endforeach

	</div>

@endif
	

@endsection

@push("script")

<script type="text/javascript">
	
	$(document).ready(function(){

		// for clip board
		$(".ar_copy").click(function(e){
		    console.log(e);
		    var clipboard = new ClipboardJS(this);
		    var that = this;
		    clipboard.on('success', function(e) {
		        // console.log(e);
		        $(that).html("Copied");
		    });

		    clipboard.on('error', function(e) {
		        // console.log(e);
		    });
		});
		// end for clip board


		$(document).on("click", "#print_me", function(){

			window.print();

		});

	});

</script>

@endpush