@extends('layouts.app')
@section('content')
<!-- Page Wrapper -->
<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area-2 gray">
 <div class="container">
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		  <div class="small-breadcrumb">
			 <div class="header-page">
				<h1>{{ __('view_grievance') }}</h1>
			 </div>
		  </div>
		</div>
		<div class="col-md-3 col-sm-4 detail_price col-xs-12">
			<div class="singleprice-tag">Pending</div>
		</div>
	</div>
 </div>
</div>
<!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
	<!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
	<section class="section-padding no-top gray">
		<!-- Main Container -->
		<div class="container">
			<div class="row">
				<!-- Middle Content Area -->
				<div class="col-md-8 col-xs-12 col-sm-12">
				 <!-- Single Ad -->
				 <div class="singlepage-detail ">
					<div id="single-slider" class="flexslider">
					   <ul class="slides" style="display: flex;">
						  <li><a href="images/single-page/1.jpg" data-fancybox="group"><img alt="" src="images/single-page/1.jpg" /></a></li>
						  <li><a href="images/single-page/2.jpg" data-fancybox="group"><img alt="" src="images/single-page/2.jpg" /></a></li>
						  <li><a href="images/single-page/3.jpg" data-fancybox="group"><img alt="" src="images/single-page/3.jpg" /></a></li>
						  <li><a href="images/single-page/4.jpg" data-fancybox="group"><img alt="" src="images/single-page/4.jpg" /></a></li>
						  <li><a href="images/single-page/5.jpg" data-fancybox="group"><img alt="" src="images/single-page/5.jpg" /></a></li>
						  <li><a href="images/single-page/6.jpg" data-fancybox="group"><img alt="" src="images/single-page/6.jpg" /></a></li>
					   </ul>
					</div>
					<div id="carousel" class="flexslider">
					   <ul class="slides">
						  <li><img alt="" src="images/single-page/1_thumb.jpg"></li>
						  <li><img alt="" src="images/single-page/2_thumb.jpg"></li>
						  <li><img alt="" src="images/single-page/3_thumb.jpg"> </li>
						  <li><img alt="" src="images/single-page/4_thumb.jpg"></li>
						  <li><img alt="" src="images/single-page/5_thumb.jpg"></li>
						  <li><img alt="" src="images/single-page/6_thumb.jpg"></li>
					   </ul>
					</div>
					<div class="content-box-grid">
					   <!-- Heading Area -->
					   <div class="short-features">						
						  <div class="heading-panel">
							 <h3 class="main-title text-left">
								{{ __('issue_description') }} 
							 </h3>
						  </div>
						  <p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						  </p>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('name') }}</strong> :</span> Name here
						  </div>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('mobile') }}</strong> :</span> 9565896325
						  </div>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('ward_prabhag') }}</strong> :</span> Test
						  </div>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('department') }}</strong>:</span> Test
						  </div>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('grievance_type') }}</strong> :</span> Test
						  </div>
						  <div class="col-sm-12 col-md-12 col-xs-12 no-padding">
							 <span><strong>{{ __('address') }}</strong> :</span> ABC street, Kol-700070
						  </div>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('pin_code') }}</strong> :</span> Test
						  </div>
					   </div>
					   <div class="clearfix"></div>
					</div>					
				 </div>
				 <!-- Single Ad End --> 
				 
                     <!-- Price Alert -->
                     <div class="alert-box-container margin-top-30">
                        <div class="well">
                           <h3>Resubmit Grievance</h3>
                           <p>Resubmit Grievance to Higher Authority</p>
                           <form>
                              <div class="row">
                                 <div class="col-md-9 col-xs-12 col-sm-12">
                                    <input placeholder="Enter Your Email " type="text" class="form-control"> 
                                 </div>
                                 <div class="col-md-3 col-xs-12 col-sm-12">
                                    <input class="btn btn-theme btn-block" value="Submit" type="submit"> 
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <!-- Price Alert End --> 
				 <!-- =-=-=-=-=-=-= Latest Ads End =-=-=-=-=-=-= -->
				</div>
				<div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
						<div id="itemMap"></div>
					 </div>
				</div>	 
			</div>
		</div>
	</section>
</div>
	<!-- /Page Content -->
@include('modal.user-modal')
@include('modal.common')
@endsection 
@section('scripts')
<!-- For This Page Only -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key="></script>
<script type="text/javascript">
 (function($) {
	"use strict";
 /* ======= Show Number ======= */
	   $('.number').click(function() {
		$(this).find('span').text( $(this).data('last') );
	   });
 
 /* ======= Ad Location ======= */
	   var  map ="";
	   var latlng = new google.maps.LatLng(47.550259, -122.264847);
	   var myOptions = {
		   zoom: 13,
		   center: latlng,
			scrollwheel: false,
		   mapTypeId: google.maps.MapTypeId.ROADMAP,
		   size: new google.maps.Size(480,240)
	   }
	   map = new google.maps.Map(document.getElementById("itemMap"), myOptions);
	   var marker = new google.maps.Marker({
		   map: map,
		   position: latlng
	   });
 })(jQuery);
</script>
@endsection
