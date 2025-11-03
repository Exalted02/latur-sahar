@extends('layouts.app')
@section('content')
@php 
use Carbon\Carbon;
@endphp
    <div class="main-content-area clearfix">
		<section class="section-padding no-top gray">
			<div class="container">
				<div class="row mt_50">
					@include('_includes/user-sidebar')
					<div class="col-md-8 col-md-push-4- col-lg-9 col-xs-12">
						<div class="row">
							
							@if($errors->any())
								<div class="col-md-8 col-sm-3 col-xs-12 margin-bottom-10">
								<div class="text-danger">
									@foreach($errors->all() as $error)
										<div>{{ $error }}</div>
									@endforeach
								</div>
								</div>
							@endif
						</div>
						<div class="filter-filelds" id="filter_inputs">
							<form name="frm" action="{{ route('report') }}" method="post">
							@csrf
							<div class="row filter-row">
								<div class="col-lg-4 col-md-4 p-r-0">
									<div class="input-block">
										<select name="src_ward_prabhag"  id="src_ward_prabhag" class="select">
											<option value="">{{ __('select_ward_prabhag') }}</option>
											@foreach($wardprabhag as $prabhag)
											<option value="{{ $prabhag->id ?? ''}}"  {{ isset($src_ward_prabhag) && $src_ward_prabhag == $prabhag->id ? 'selected' : '' }}>{{ $prabhag->name ?? ''}}</option>
											@endforeach
									   </select>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 p-r-0">
									<div class="input-block">
										<select name="src_status" class="select" id="src_status">
											<option value="">{{ __('select_status') }}</option>
											<option value="1" {{ isset($src_status) && $src_status == 1 ? 'selected' : '' }}>{{ __('pending') }}</option>
											<option value="3" {{ isset($src_status) && $src_status == 3 ? 'selected' : '' }}>{{ __('solved') }}</option>
											<option value="all"  {{ isset($src_status) && $src_status == 'all' ? 'selected' : '' }}>{{ __('all') }}</option>
									   </select>
									</div>
								</div>
								
								<div class="col-xl-4  col-md-4  p-r-0">  
									<div class="input-block">
									<input type="text" class="form-control date-range date_range_src" name="date_range_src_ward_prabhag" id="src_ward_prabhag_date_range" placeholder="{{ __('from_to_date')}}" value="{{ isset($date_range_src_ward_prabhag) ? $date_range_src_ward_prabhag : '' }}">
									</div>
								</div>
								
								<div class="col-xl-5 col-md-5 p-r-0">
									<div class="d-flex flex-wrap gap-2 align-items-center">
										<button type="submit" class="search-button">
											<i class="fa fa-search me-2"></i>{{ __('search') }}
										</button>
										<button type="button" class="search-button download-report">
											<i class="fa fa-download me-2"></i>{{ __('download') }}
										</button>
									</div>
								</div>

								
								{{--<div class="col-xl-2 col-md-2 p-r-0">
									<div class="input-block"><button type="submit" class="search-button"><i class="fa fa-search"></i>{{ __('search') }}</button>
									</div>
								</div>
								<div class="col-xl-3 col-md-3 p-r-0">
									<div class="input-block">
										<button type="button" class="search-button download-report"><i class="fa fa-download"></i> {{ __('download') }}</button>
									</div>
								</div>--}}
							
							</div>
							</form>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="post-ad-form postdetails mt_15">
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="datatable table table-stripped mb-0">
													<thead>
														<tr>
															<th>{{ __('registration_no') }}</th>
															<th>{{ __('department') }}</th>
															<th>{{ __('received_date') }}</th>
															<th>{{ __('grievance_description') }}</th>
															<th>{{ __('status') }}</th>
															
														</tr>
													</thead>
													<tbody>
													@foreach($grievances as  $grievance)
														<tr class="viewgrievance" data-href="{{ route('view-grievance', ['id' => $grievance->id]) }}" style="cursor:pointer">
															<td><a href="{{ route('view-grievance', ['id' => $grievance->id]) }}">#{{ $grievance->registration_no ?? '' }}</a></td>
															<td>{{ $grievance->get_department->name ?? '' }}</td>
															<td>{{ Carbon::parse($grievance->created_at)->format('d/m/y') }}</td>
															<td>{{ \Illuminate\Support\Str::words($grievance->issue_description, 15, '...') }}</td>
															<td class="{{ $grievance->status==1 ? 'text-danger' : ($grievance->status==2 ? 'text-info' : 'text-success') }}">{{ $grievance->status==1 ? 'Pending' : ($grievance->status==2 ? 'Resubmit' : 'Solved') }}</td>
															
														</tr>
													@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
	<form id="frm-download-report" action="{{ route('download-report')}}" method="post">
		@csrf
		<input type="hidden" id="download_ward_prabhag" name="download_ward_prabhag" value="{{ isset($src_ward_prabhag) ? $src_ward_prabhag : ''}}">
		<input type="hidden" id="download_status" name="download_status" value="{{ isset($src_status) ? $src_status : ''}}">
		<input type="hidden" id="download_date_range_src" name="download_date_range_src" value="{{ isset($date_range_src_ward_prabhag) ? $date_range_src_ward_prabhag : '' }}">
	</form>
@endsection 
@section('scripts')
<script src="{{ url('front-assets/js/report-calender.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
	if($('.datatable').length > 0) {
		$('.datatable').DataTable({
			"bFilter": true,
			"pageLength": 50,
			"language": {
				paginate: {
					next: ' <i class=" fa fa-angle-double-right"></i>',
					previous: '<i class="fa fa-angle-double-left"></i> '
				},
			 },
		});
		
	}
	$(document).ready(function() {
		/*$(document).on('click', '.viewgrievance', function(){
			window.location.href = $(this).data('href');
		});*/
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
					//alert(URL);alert(id);
					//let moreload = $('#moreload').val();
					$.ajax({
						url: URL,
						type: "POST",
						data: {
							id : id,
							//moreload:moreload,
							_token: "{{ csrf_token() }}"
						},
						dataType: 'json',
						success: function(response) {
							//alert(response.html);
							//$('#moreload').val(response.loadmore);
							//$('#show-list-data').append(response.html);
							
							 Swal.fire({
								title: 'Deleted!',
								text: 'Your record has been deleted.',
								icon: 'success',
								timer: 1500,
								showConfirmButton: false
							});
							
							redirect = "{{ route('dashboard', ':tab') }}";
							setTimeout(() => {
								window.location.href = redirect.replace(':tab', 1);
							}, "100");
						},
						error: function(xhr) {
							console.error(xhr.responseText);
						}
					});
				}
			});
		});
		
		$(document).on('change','#src_ward_prabhag', function(){
			let id = $(this).val();
			$('#download_ward_prabhag').val(id)
		});
		
		$(document).on('change','#src_status', function(){
			let id = $(this).val();
			$('#download_status').val(id)
		});
		
		$(document).on('click', '.download-report', function(){
			
			$('#frm-download-report').submit();
			//redirect = "{{ route('download-report') }}";
			//window.location.href = redirect;
		});
		
		
		
	});
</script>
@endsection

