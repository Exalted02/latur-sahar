@extends('layouts.app')
@section('content')
<!-- Page Wrapper -->
<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area-2 gray">
 <div class="container">
	<div class="row">
	   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  <div class="small-breadcrumb">
			 <div class="header-page">
				<h1>{{ __('view_grievance') }}</h1>
			 </div>
		  </div>
	   </div>
	</div>
 </div>
</div>
<!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
	<!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
	<section class="section-padding no-top gray">
		<!-- Main Container -->
		<div class="container">
			<div class="row">
				<div class="grid-style-2">
					<span id="show-list-data">
				    </span>
				</div>
			</div>
			<div class="row">
				<div class="load-more-grievance" id="showload" onclick="list_grievance()">{{ __('load_more') }}</div>
					<input type="hidden"  id="moreload">
			</div>
		</div>
	</section>
</div>
	<!-- /Page Content -->
@include('modal.user-modal')
@include('modal.common')
@endsection 
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
	list_grievance();
	$(document).on('click', '.delete-grievance', function(){
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'Cancel'
		}).then((result) => {
			if (result.isConfirmed) {
				
				let URL = $(this).data('url');
				let id = $(this).data('id');
				let moreload = $('#moreload').val();
				$.ajax({
					url: URL,
					type: "POST",
					data: {
						id : id,
						moreload:moreload,
						_token: "{{ csrf_token() }}"
					},
					dataType: 'json',
					success: function(response) {
						alert(response.html);
						//$('#moreload').val(response.loadmore)
						//list_grievance(response.loadmore)
						$('#moreload').val(response.loadmore);
						$('#show-list-data').append(response.html);
						
						 Swal.fire({
							title: 'Deleted!',
							text: 'Your record has been deleted.',
							icon: 'success',
							timer: 1500,
							showConfirmButton: false
						});
						
						/*setTimeout(() => {
							window.location.href = "{{ route('grievance') }}";
						}, "100");*/
						
					},
					error: function(xhr) {
						console.error(xhr.responseText);
					}
				});

			   
			}
		});
		
	})
});
function list_grievance()
{
	//let moreload = '';
	let moreload = $('#moreload').val();
	//alert(moreload);
	$.ajax({
		url: "{{ route('get-list-grievance') }}",
		type: "POST",
		data: {
			moreload : moreload,
			_token: "{{ csrf_token() }}"
		},
		dataType: 'json',
		success: function(response) {
			//alert(response.html);
			//alert(response.loadmore);
			if(response.remain>0)
			{
				$('#showload').show();
			}
			else
			{
				$('#showload').hide();
			}
			
			$('#moreload').val(response.loadmore);
			$('#show-list-data').append(response.html);
		},
		error: function(xhr) {
			console.error(xhr.responseText);
		}
	});
}
</script>
@endsection
