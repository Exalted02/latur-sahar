@extends('admin.layouts.app')
@section('content')

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
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('dashboard') }}</a></li>
						<li class="breadcrumb-item active">{{ __('Grievance') }}</li>
					</ul>
				</div>
				<div class="col-md-8 float-end ms-auto">
					<div class="d-flex title-head">
						{{--<div class="view-icons">
							<a href="{{ route('user.product-code') }}" class="grid-view btn btn-link"><i class="las la-redo-alt"></i></a>
							<a href="#" class="list-view btn btn-link" id="collapse-header"><i class="las la-expand-arrows-alt"></i></a>
							<a href="javascript:void(0);" class="list-view btn btn-link" id="filter_search"><i class="las la-filter"></i></a>
						</div>
						<div class="form-sort m-r-5">
							<a href="javascript:void(0);" class="list-view btn btn-link" data-bs-toggle="modal" data-bs-target="#export"><i class="fa-solid fa-file-export"></i>{{ __('export') }}</a>
						</div>
						<div class="form-sort">
							<a href="javascript:void(0);" class="list-view btn btn-link" data-bs-toggle="modal" data-bs-target="#import"><i class="fa-solid fa-file-import"></i>{{ __('import') }}</a>
						</div>--}}
						<a href="#" class="btn add-btn add_grievance" data-bs-toggle="modal" data-bs-target="#add_grievance"><i class="la la-plus-circle"></i> {{ __('Add grievance') }}</a>
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
							{{--<th class="no-sort"></th>--}}
							
								{{--<th>{{ __('sl_no') }}</th>--}}
								<th>{{ __('Department') }}</th>
								<th>{{ __('Name') }}</th>
								<th>{{ __('Created date') }}</th>
								<th>{{ __('status') }}</th>
								<th class="text-end">Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($grievances as $val)
							@php 
								$department_name = App\Models\Department::where('id', $val->department)->first()->name;
							@endphp
							<tr>
								<td class="contact-details">{{ $department_name ?? ''}}</td>
								<td class="contact-details">{{ $val->name ?? ''}}</td>
								<td>{{ date('d-m-Y', strtotime($val->created_at)) ?? ''}}</td>
								<td>
								@if($val->status ==1)
									<div class="dropdown action-label">
										<a class="btn btn-white btn-sm badge-outline-success dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fa-regular fa-circle-dot text-success"></i> {{ __('active') }}
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item update-status" href="javascript:void(0);" data-id="{{ $val->id }}" data-url="{{ route('admin.grievance-update-status') }}"><i class="fa-regular fa-circle-dot text-success"></i> {{ __('active') }}</a>
											<a class="dropdown-item update-status" href="javascript:void(0);" data-id="{{ $val->id }}" data-url="{{ route('admin.grievance-update-status') }}"><i class="fa-regular fa-circle-dot text-danger"></i> {{ __('inactive') }}</a>
										</div>
									</div>
								 @else
									<div class="dropdown action-label">
										<a class="btn btn-white btn-sm badge-outline-danger dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fa-regular fa-circle-dot text-danger"></i> {{ __('inactive') }}
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item update-status" href="javascript:void(0);" data-id="{{ $val->id }}" data-url="{{ route('admin.grievance-update-status') }}"><i class="fa-regular fa-circle-dot text-success"></i> {{ __('active') }}</a>
											<a class="dropdown-item update-status" href="javascript:void(0);" data-id="{{ $val->id }}" data-url="{{ route('admin.grievance-update-status') }}"><i class="fa-regular fa-circle-dot text-danger"></i> {{ __('inactive') }}</a>
										</div>
									</div> 
								 
								 @endif
								</td>
									
								
								<td class="text-end">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item edit-grievance" href="javascript:void(0);" data-id="{{ $val->id ??''}}" data-url="{{ route('admin.edit-grievance') }}"><i class="fa-solid fa-pencil m-r-5"></i> {{ __('edit') }}</a>
											<a class="dropdown-item delete-grievance" href="javascript:void(0);" data-id="{{ $val->id ?? '' }}" data-url="{{ route('admin.getDeleteGrievance') }}"><i class="fa-regular fa-trash-can m-r-5"></i> {{ __('delete') }}</a>
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
@include('admin.modal.grievance-modal')
@include('modal.common')
@endsection 
@section('scripts')
<link rel="stylesheet" href="{{ url('admin-assets/css/select2.min.css') }}">
<script src="{{ url('admin-assets/js/page/grievance_type.js') }}"></script>
<script src="{{ url('front-assets/js/report-calender.js') }}"></script>
<script src="{{ url('admin-assets/js/select2.min.js') }}"></script>
<script>
$(document).ready(function() {
	
	$(document).on('click',".reset-button", function(){
		window.location.href = "/product-code";
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
