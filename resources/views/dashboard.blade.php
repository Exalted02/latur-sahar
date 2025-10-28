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
								  <h2>15</h2>
								  <small>Total grievance</small>
							   </div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
							   <div class="dashboard-card background-warning">
								  <h2>11</h2>
								  <small>Pending grievance</small>
							   </div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
							   <div class="dashboard-card background-success">
								  <h2>04</h2>
								  <small>Solved grievance</small>
							   </div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
							   <div class="dashboard-card background-danger">
								  <h2>02</h2>
								  <small>Alert grievance</small>
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
															<th>Name</th>
															<th>Position</th>
															<th>Office</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Tiger Nixon</td>
															<td>System Architect</td>
															<td>Edinburgh</td>
															<td>61</td>
														</tr>
														<tr>
															<td>Garrett Winters</td>
															<td>Accountant</td>
															<td>Tokyo</td>
															<td>63</td>
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

