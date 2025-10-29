@extends('admin.layouts.app')

@section('content')
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="content-page-header">
				<h5>Dashboard</h5>
			</div>	
		</div>
		<!-- /Page Header -->
		
				
		<div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa-solid fa-cubes"></i></span>
						<div class="dash-widget-info">
							<h3>{{ $tot_grievance ?? ''}}</h3>
							<span>Total grievance</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa-solid fa-dollar-sign"></i></span>
						<div class="dash-widget-info">
							<h3>{{ $pending_grievance ?? ''}}</h3>
							<span>Pending grievance</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa-regular fa-gem"></i></span>
						<div class="dash-widget-info">
							<h3>{{ $solved_grievance ?? ''}}</h3>
							<span>Solved grievance</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa-solid fa-user"></i></span>
						<div class="dash-widget-info">
							<h3>{{ $alert_grievance ?? '' }}</h3>
							<span>Alert grievance</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')

@endsection