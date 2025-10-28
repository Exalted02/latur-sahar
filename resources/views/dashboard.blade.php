@extends('layouts.app')
@section('content')
    <div class="main-content-area clearfix">
		<section class="section-padding no-top gray">
			<div class="container">
				<div class="row mt_50">
					@include('_includes/user-sidebar')
					<div class="col-md-8 col-md-push-4- col-lg-9 col-sx-12">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-12">
							   <div class="dashboard-card background-info">
								  <h2>{{ $total_geievance ?? ''}}</h2>
								  <small>{{ __('total_grievance') }}</small>
							   </div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
							   <div class="dashboard-card background-warning">
								  <h2>{{ $pending_grievance ?? ''}}</h2>
								  <small>{{ __('pending_grievance') }}</small>
							   </div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
							   <div class="dashboard-card background-success">
								  <h2>{{ $solved_grievance ?? ''}}</h2>
								  <small>{{ __('solved_grievance') }}</small>
							   </div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
							   <div class="dashboard-card background-danger">
								  <h2>{{ $alert_grievance ?? ''}}</h2>
								  <small>{{ __('alert_grievance') }}</small>
							   </div>
							</div>
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
															<th>{{ __('action') }}</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Tiger Nixon</td>
															<td>System Architect</td>
															<td>Edinburgh</td>
															<td>61</td>
															<td>61</td>
														</tr>
														
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
@endsection

