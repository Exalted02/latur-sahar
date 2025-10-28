@extends('admin.layouts.app')
@section('content')
@php
//echo "<pre>";print_r($grievances);die;
@endphp
<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Page Content -->
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col-md-4">
					<h3 class="page-title">{{ __('Grievance view') }}</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('dashboard') }}</a></li>
						<li class="breadcrumb-item active">{{ __('Grievance view') }}</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Search Filter -->
		
		 <hr>
		 <!-- /Search Filter -->
		 

		<div class="row">
                    <div class="col-md-12">
                        
                        <!-- Content Starts -->
						

					<div class="tab-content">

							<!-- Additions Tab -->
							<div class="tab-pane show active" id="view_tab_customer">
							{{--<form id="frmprospectstage" action="{{ route('user.save-prospect-stage') }}">--}}
                                        
											<div class="contact-tab-wrap customer-view">
												
                                                        <div class="multiadd d-flex1 flex-wrap1">
														<div class="row">
														
                                                            <div class="col-md-3 col-lg-3 col-sm-12 mt-2">
                                                            <strong>{{ __('Name') }}</strong>
                                                                <div class="mt-1">{{ $grievance->name ?? ''}}</div>
                                                            </div>
														
														
															
															
                                                            <div class="col-md-3 col-lg-3 col-sm-12 mt-2">
                                                                <strong>{{ __('Mobile ') }}</strong>
                                                                    <div class="mt-1">{{ $grievance->mobile_no ?? ''}}</div>
                                                            </div>
															
															
															
                                                            <div class="col-md-3 col-lg-3 col-sm-12 mt-2">
                                                                <strong>{{ __('Ward prabhag') }}</strong>
                                                                    <div class="mt-1">{{ $grievance->ward_prabhag ?? ''}}</div>
                                                            </div>
															
															
															
                                                            <div class="col-md-3 col-lg-3 col-sm-12 mt-2">
                                                                <strong>{{ __('department') }}</strong>
                                                                    <div class="mt-1">{{ $grievance->get_department->name ?? ''}}</div>
                                                            </div>
															
															
															
                                                            <div class="col-md-3 col-lg-3 col-sm-12 mt-2">
                                                                <strong>{{ __('Grievance type') }}</strong>
                                                                    <div class="mt-1">{{ $grievance->get_grievance_type->name ?? ''}}</div>
                                                            </div>
															<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
                                                                <strong>{{ __('Address') }}</strong>
                                                                    <div class="mt-1">{{ $grievance->address ?? ''}}</div>
                                                            </div>
															<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
                                                                <strong>{{ __('Pincode') }}</strong>
                                                                    <div class="mt-1">{{ $grievance->pincode ?? ''}}</div>
                                                            </div>
															
														</div>
														<div class="rowline"></div>
														<div class="row col-md-12"><h4><strong>{{ __('issue_description') }}</strong></h4></div>
														<div class="row">
														 <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                                                                <strong>{{ __('Issue description') }}</strong>
																	<div class="mt-1">{{ $grievance->issue_description ?? ''}}</div>
                                                            </div>
														</div>
														
														
														<div class="rowline"></div>
															<div class="row col-md-12"><h4><strong>{{ __('Grievance images') }}</strong></h4></div>
															
															<div class="row">
															
															@foreach($grievance->grievance_image as $images)
                                                            <div class="col-md-2 col-lg-2 col-sm-12 mt-2">
															<div class="mt-1"><img src="{{ url('uploads/greivance_image/'.$images->images )}}" height="150" width="150"></div>
                                                            </div>
															@endforeach
															
															</div>
															
                                                        </div>
														{{--</div>
													</div>--}}
												</div>
                                            	
									{{--</form>--}}
								<!-- /Payroll Additions Table -->
							</div>
						</div>
                </div>
            </div>
	</div>
</div>
	<!-- /Page Content -->

@include('modal.common')
@endsection 
@section('scripts')
<link rel="stylesheet" href="{{ url('admin-assets/css/select2.min.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ url('front-assets/js/report-calender.js') }}"></script>
<script src="{{ url('admin-assets/js/select2.min.js') }}"></script>
<script>
$(document).ready(function() {
	$(document).on('click', '.delete-grievance', function(){
		
		//alert(id);alert(URL);
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
				
				let id = $(this).data('id');
				let URL = $(this).data('url');
				
				$.ajax({
					url: URL,
					type: "POST",
					data: {
						id : id,
						_token: "{{ csrf_token() }}"
					},
					dataType: 'json',
					success: function(response) {
						//alert(response.loadmore);
						//$('#moreload').val(response.loadmore)
						//list_grievance(response.loadmore)
						 Swal.fire({
							title: 'Deleted!',
							text: 'Your record has been deleted.',
							icon: 'success',
							timer: 1500,
							showConfirmButton: false
						});
						
						setTimeout(() => {
							window.location.reload();
						}, "1000");
						
					},
					error: function(xhr) {
						console.error(xhr.responseText);
					}
				});

			   
			}
		});
		
	});

	if ($.fn.DataTable.isDataTable('.datatable')) {
		$('.datatable').DataTable().destroy(); // Destroy existing instance
	}
	$('.datatable').DataTable({
		//searching: false,
		language: {
			"lengthMenu": "{{ __('Show _MENU_ entries') }}",
			"zeroRecords": "{{ __('No records found') }}",
			"info": "{{ __('Showing _START_ to _END_ of _TOTAL_ entries') }}",
			"infoEmpty": "{{ __('No entries available') }}",
			"infoFiltered": "{{ __('(filtered from _MAX_ total entries)') }}",
			"search": "{{ __('search') }}",
			"paginate": {
				"first": "{{ __('First') }}",
				"last": "{{ __('Last') }}",
				"next": "{{ __('Next') }}",
				"previous": "{{ __('Previous') }}"
			},
		}
	});
	
	
});
</script>
@endsection
