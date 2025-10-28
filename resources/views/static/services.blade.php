@extends('layouts.app')
@section('content')
	<!-- Page Wrapper -->

<!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->
	<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
	<div class="main-content-area clearfix">
		<!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
		<section class="section-padding-120 our-services">
				<!--Image One-->
				<div class="background-1"></div>
				<!--Image Two-->
				<div class="background-2"></div>
				
				<div class="container">
				   <div class="row clearfix">
					  <!--Left Column-->
					  <div class="left-column col-lg-4 col-md-4 col-md-12">
						 <div class="inner-box">
							<h2>{{ __('our_services') }}</h2>
							<div class="text margin-bottom-20">{{ __('our_services_short_content') }}</div>
							
							<h2>{{ __('our_promise') }}</h2>
							<div class="text">{{ __('our_promise_short_content') }}</div>
						 </div>
					  </div>
					  <!--Transparent Column-->
					  <div class="service-column col-lg-8 col-md-12">
						 <div class="inner-box wow fadeInRight animated" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="row clearfix">
							   <!--Icon Column-->
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <div class="services-grid-3">
									 <div class="content-area">
										{!! __('our_services_long_content1') !!}
										<div class="service-icon">
										   <i class="fa fa-tint" aria-hidden="true"></i>
										</div>
									 </div>
								  </div>
							   </div>
							   <!--Icon Column-->
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <div class="services-grid-3">
									 <div class="content-area">
										{!! __('our_services_long_content2') !!}
										<div class="service-icon">
										   <i class="fa fa-trash-o" aria-hidden="true"></i>
										</div>
									 </div>
								  </div>
							   </div>
							   <!--Icon Column-->
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <div class="services-grid-3">
									 <div class="content-area">
										{!! __('our_services_long_content3') !!}
										<div class="service-icon">
										   <i class="flaticon-vehicle-4"></i>
										</div>
									 </div>
								  </div>
							   </div>
							   <!--Icon Column-->
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <div class="services-grid-3">
									 <div class="content-area">
										{!! __('our_services_long_content4') !!}
										<div class="service-icon">
										   <i class="fa fa-book" aria-hidden="true"></i>
										</div>
									 </div>
								  </div>
							   </div>
							   <!--Icon Column-->
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <div class="services-grid-3">
									 <div class="content-area">
										{!! __('our_services_long_content5') !!}
										<div class="service-icon">
										   <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
										</div>
									 </div>
								  </div>
							   </div>
							   <!--Icon Column-->
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <div class="services-grid-3">
									 <div class="content-area">
										{!! __('our_services_long_content6') !!}
										<div class="service-icon">
										   <i class="fa fa-hospital-o" aria-hidden="true"></i>
										</div>
									 </div>
								  </div>
							   </div>
							   <!--Icon Column-->
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <div class="services-grid-3">
									 <div class="content-area">
										{!! __('our_services_long_content7') !!}
										<div class="service-icon">
										   <i class="fa fa-tree" aria-hidden="true"></i>
										</div>
									 </div>
								  </div>
							   </div>
							   <!--Icon Column-->
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <div class="services-grid-3">
									 <div class="content-area">
										{!! __('our_services_long_content8') !!}
										<div class="service-icon">
										   <i class="fa fa-star" aria-hidden="true"></i>
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


	<!-- /Page Content -->
	  

@endsection 
@section('scripts')
@endsection

