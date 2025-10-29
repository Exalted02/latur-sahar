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
							<a href="{{ route('dashboard',['tab' => 1]) }}">
							<div class="col-md-3 col-sm-3 col-xs-12 margin-bottom-10">
							   <div class="dashboard-card background-info">
								  <h2>{{ $total_geievance ?? ''}}</h2>
								  <small>{{ __('total_grievance') }}</small>
							   </div>
							</div></a>
							
							<a href="{{ route('dashboard',['tab' => 2]) }}">
							<div class="col-md-3 col-sm-3 col-xs-12 margin-bottom-10">
							   <div class="dashboard-card background-warning">
								  <h2>{{ $pending_grievance ?? ''}}</h2>
								  <small>{{ __('pending_grievance') }}</small>
							   </div>
							</div></a>
							
							<a href="{{ route('dashboard',['tab' => 3]) }}">
							<div class="col-md-3 col-sm-3 col-xs-12 margin-bottom-10">
							   <div class="dashboard-card background-success">
								  <h2>{{ $solved_grievance ?? ''}}</h2>
								  <small>{{ __('solved_grievance') }}</small>
							   </div>
							</div></a>
							
							<a href="{{ route('dashboard',['tab' => 4]) }}">
							<div class="col-md-3 col-sm-3 col-xs-12 margin-bottom-10">
							   <div class="dashboard-card background-danger">
								  <h2>{{ $alert_grievance ?? ''}}</h2>
								  <small>{{ __('alert_grievance') }}</small>
							   </div>
							</div></a>
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
															<th>{{ __('received_date') }}</th>
															<th>{{ __('grievance_description') }}</th>
															<th>{{ __('status') }}</th>
														</tr>
													</thead>
													<tbody>
													@foreach($grievances as  $grievance)
														<tr class="viewgrievance" data-href="{{ route('view-grievance', ['id' => $grievance->id]) }}" style="cursor:pointer">
															<td><a href="{{ route('view-grievance', ['id' => $grievance->id]) }}">#{{ $grievance->registration_no ?? '' }}</a></td>
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
@endsection 
@section('scripts')
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
</script>
<script>
$(document).ready(function() {
	$(document).on('click', '.viewgrievance', function(){
		window.location.href = $(this).data('href');
	});
});
</script>
@endsection

