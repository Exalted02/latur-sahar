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
					<h3 class="page-title">{{ __('Grievance') }}</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('dashboard') }}</a></li>
						<li class="breadcrumb-item active">{{ __('Grievance') }}</li>
					</ul>
				</div>
				<div class="col-md-8 float-end ms-auto">
					<div class="d-flex title-head">
						
						{{--<a href="#" class="btn add-btn add_grievance" data-bs-toggle="modal" data-bs-target="#add_grievance"><i class="la la-plus-circle"></i> {{ __('Add grievance') }}</a>--}}
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Search Filter -->
		
		 <hr>
		 <!-- /Search Filter -->
		 

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th>{{ __('Name') }}</th>
								<th class="text-center">{{ __('Mobile') }}</th>
								<th>{{ __('Department') }}</th>
								<th>{{ __('Grievance type') }}</th>
								<th class="text-center">{{ __('Pincode') }}</th>
								<th class="text-center">{{ __('Image') }}</th>
								<th class="text-center">{{ __('Created date') }}</th>
								<th class="text-center">{{ __('status') }}</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($grievances as $val)
						
							<tr>
								<td>{{ $val->name ?? ''}}</td>
								<td class="text-center">{{ $val->mobile_no ?? ''}}</td>
								<td>{{ $val->get_department->name ?? ''}}</td>
								<td>{{ $val->get_grievance_type->name ?? ''}}</td>
								<td class="text-center">{{ $val->pincode ?? ''}}</td>
								<td class="text-center"><img src="{{ url('uploads/greivance_image/'. $val->grievance_image[0]->images ) }}" height="70" width="70"></td>
								<td class="text-center">{{ date('d-m-Y', strtotime($val->created_at)) ?? ''}}</td>
								<td class="text-center">
								@if($val->status ==1)
									<span class="badge badge-soft-danger">Pending</span>
								 @elseif($val->status ==2)
								 <span class="badge badge-soft-warning">Resubmit</span>
								  @else
								  <span class="badge badge-soft-success">Solved</span>
								 @endif
								</td>
									
								
								<td class="text-center">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
										{{--<a class="dropdown-item edit-grievance" href="javascript:void(0);" data-id="{{ $val->id ??''}}" data-url="{{ route('admin.edit-grievance') }}"><i class="fa-solid fa-pencil m-r-5"></i> {{ __('edit') }}</a>--}}
										
										  <a class="dropdown-item edit-grievance" href="{{ route('admin.view-frontend-grievance', ['id'=> $val->id]) }}"><i class="fa-solid fa-eye text-primary m-r-5"></i> {{ __('view') }}</a>
											  {{--<a class="dropdown-item delete-grievance" href="javascript:void(0);" data-id="{{ $val->id ?? '' }}" data-url="{{ route('admin.frontend-grievance-del') }}"><i class="fa-regular fa-trash-can m-r-5"></i> {{ __('delete') }}</a>--}}
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
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
<link rel="stylesheet" href="http://localhost:8000/admin-assets/css/dataTables.bootstrap4.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ url('front-assets/js/report-calender.js') }}"></script>
<script src="{{ url('admin-assets/js/select2.min.js') }}"></script>
<script src="http://localhost:8000/admin-assets/js/jquery.dataTables.min.js"></script>
<script src="http://localhost:8000/admin-assets/js/dataTables.bootstrap4.min.js"></script>
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
