@extends('layouts.app')
@section('content')
	<!-- Page Wrapper -->
<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
<div>
<div class="page-header-area-2 gray1">
 <div class="container">
	<div class="row">
	   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  <div class="small-breadcrumb">
			 <div class="header-page">
				<h1>{{ __('about_us') }}</h1>
			 </div>
		  </div>
	   </div>
	</div>
 </div>
</div>
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
                        <div class="text">{{ __('our_services_short_content') }}</div>
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
                                    <h1>01.</h1>
                                    <a href="">
                                       <h4>Water Supply</h4>
                                    </a>
                                    <p>We ensure regular and safe drinking water distribution to all households, businesses, and public areas within Latur city.</p>
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
                                    <h1>02.</h1>
                                    <a href="">
                                       <h4>Solid Waste Management</h4>
                                    </a>
                                    <p>Daily garbage collection, street cleaning, and scientific waste disposal are managed to keep the city clean and healthy.</p>
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
                                    <h1>03.</h1>
                                    <a href="">
                                       <h4>Roads & Infrastructure</h4>
                                    </a>
                                    <p>LCMC is responsible for construction, repair, and maintenance of city roads, footpaths, bridges, and drainage systems to improve urban mobility.</p>
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
                                    <h1>04.</h1>
                                    <a href="">
                                       <h4>Education</h4>
                                    </a>
                                    <p>The corporation runs and maintains municipal primary schools to provide quality education to every child in the city.</p>
                                    <div class="service-icon">
                                       <i class="fa fa-book" aria-hidden="true"></i>
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
</div>

	<!-- /Page Content -->
	  

@endsection 
@section('scripts')
@endsection

