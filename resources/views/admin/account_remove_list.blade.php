@extends('admin.layouts.app')
@section('content')
@php
    use Illuminate\Support\Str;
@endphp
<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Page Content -->
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col-md-4">
					<h3 class="page-title">Account Remove</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">Dashboard</li>
						<li class="breadcrumb-item active">Account Remove</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th>Email</th>
								<th>Reason</th>
								<th>Created date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						@foreach($lists as $list)
						
							<tr>
								<td>{{ $list->email ?? ''}}</td>
								<td class="show-region" data-region="{{ $list->region }}" style="cursor:pointer">{{ Str::words($list->region ?? '', 8, '...') }}</td>
								<td>
								<td>{{ date('d-m-Y', strtotime($list->created_at)) ?? ''}}</td>
								@if($list->status ==1)
									<div class="dropdown action-label">
										<a class="btn btn-white btn-sm badge-outline-success dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fa-regular fa-circle-dot text-success"></i> {{ __('approve') }}
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item update-status" href="javascript:void(0);" data-id="{{ $list->id }}" data-url="{{ route('admin.remove-account-update-status') }}"><i class="fa-regular fa-circle-dot text-success"></i> {{ __('approve') }}</a>
											<a class="dropdown-item update-status" href="javascript:void(0);" data-id="{{ $list->id }}" data-url="{{ route('admin.remove-account-update-status') }}"><i class="fa-regular fa-circle-dot text-info"></i> {{ __('pending') }}</a>
											<a class="dropdown-item delete-remove-account" href="javascript:void(0);" data-id="{{ $list->id }}" data-url="{{ route('admin.remove-account-delete') }}"><i class="fa-regular fa-circle-dot text-danger"></i> {{ __('delete') }}</a>
										</div>
									</div>
								 @elseif($list->status ==2)
									<div class="dropdown action-label">
										<a class="btn btn-white btn-sm badge-outline-info dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fa-regular fa-circle-dot text-info"></i> Pending
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item update-status" href="javascript:void(0);" data-id="{{ $list->id }}" data-url="{{ route('admin.remove-account-update-status') }}"><i class="fa-regular fa-circle-dot text-success"></i> Aapprove</a>
											<a class="dropdown-item update-status" href="javascript:void(0);" data-id="{{ $list->id }}" data-url="{{ route('admin.remove-account-update-status') }}"><i class="fa-regular fa-circle-dot text-info"></i> Pending</a>
											<a class="dropdown-item delete-remove-account" href="javascript:void(0);" data-id="{{ $list->id }}" data-url="{{ route('admin.remove-account-delete') }}"><i class="fa-regular fa-circle-dot text-danger"></i> Delete</a>
										</div>
									</div>
								@else
									<div class="dropdown action-label">
										<a class="btn btn-white btn-sm badge-outline-danger dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fa-regular fa-circle-dot text-danger"></i> Delete
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item update-status" href="javascript:void(0);" data-id="{{ $list->id }}" data-url="{{ route('remove-account-update-status') }}"><i class="fa-regular fa-circle-dot text-success"></i> Aapprove</a>
											<a class="dropdown-item update-status" href="javascript:void(0);" data-id="{{ $list->id }}" data-url="{{ route('remove-account-update-status') }}"><i class="fa-regular fa-circle-dot text-info"></i> Pending</a>
											<a class="dropdown-item delete-remove-account" href="javascript:void(0);" data-id="{{ $list->id }}" data-url="{{ route('remove-account-delete') }}"><i class="fa-regular fa-circle-dot text-danger"></i> Delete</a>
										</div>
									</div>
								@endif
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Reason Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <span id="region_data"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
      </div>
    </div>
  </div>
</div>

@include('modal.common')
@endsection 
@section('scripts')

<script>
$(document).ready(function() {
   $(document).on('click','.update-status', function(){
	   var id = $(this).data('id');
	   var URL = $(this).data('url');
	    //alert(id); alert(URL);
		$.ajax({
			url: URL,
			type: "POST",
			data: {id:id, _token: csrfToken},
			dataType: 'json',
			success: function(response) {
				//alert(response);
				setTimeout(() => {
					window.location.reload();
				}, "1000");
			},
		});
   }); 
   
    $(document).on('click','.delete-remove-account', function(){
	   var id = $(this).data('id');
	   var URL = $(this).data('url');
	    //alert(id); alert(URL);
		$.ajax({
			url: URL,
			type: "POST",
			data: {id:id, _token: csrfToken},
			dataType: 'json',
			success: function(response) {
				//alert(response);
				setTimeout(() => {
					window.location.reload();
				}, "1000");
			},
		});
   });
   
   $(document).on('click','.show-region', function(){
	   var region = $(this).data('region');
	    $('#region_data').html(region);
		$('#exampleModal').modal('show');
		
   });
   
   
});
	
	
</script>
@endsection
