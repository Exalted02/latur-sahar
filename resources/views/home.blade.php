@extends('layouts.app')
@section('content')
	<!-- Base MasterSlider style sheet -->
      <link rel="stylesheet" href="{{ url('front-assets/js/masterslider/style/masterslider.css') }}" />
      <link rel="stylesheet" href="{{ url('front-assets/js/masterslider/skins/default/style.css') }}" />
      <link rel="stylesheet" href="{{ url('front-assets/js/masterslider/style/style.css') }}" />
	<!-- Master Slider -->
      <div class="master-slider ms-skin-default" id="masterslider">
         <!-- slide 1 -->
         <div class="ms-slide slide-1"  data-delay="5">
            <!-- slide background --> 
            <img src="{{ url('front-assets/js/masterslider/style/blank.gif') }}" data-src="{{ url('front-assets/images/slider/slider1.jpg') }}" alt="Slide1 background"/>
         </div>
         <!-- end of slide --> 
         <!-- slide 2 -->
         <div class="ms-slide slide-3" data-delay="5">
            <!-- slide background --> 
            <img src="{{ url('front-assets/js/masterslider/style/blank.gif') }}" data-src="{{ url('front-assets/images/slider/slider2.jpg') }}" alt="Slide1 background"/> 
         </div>
         <!-- end of slide --> 
         <div class="ms-slide slide-2" data-delay="4">
            <div class="ms-overlay-layers"></div>
            <!-- slide background --> 
            <img src="{{ url('front-assets/js/masterslider/style/blank.gif') }}" data-src="{{ url('front-assets/images/slider/slider3.jpg') }}" alt="Slide1 background"/> 
            
         </div>
         <!-- slide 2 -->
         <!-- end of slide --> 
      </div>
      <!-- end Master Slider -->
	  <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
      <!-- =-=-=-=-=-=-= About CarSpot =-=-=-=-=-=-= -->
         <section class="custom-padding about-us">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <div class="title">
                        <h3>About <span class="heading-color">Latur Sahar </span> Municipality</h3>
                     </div>
                     <div class="content">
                        <p class="service-summary">About Latur Sahar Municipality (Latur City Municipal Corporation)</p>
                        <p>Latur City Municipal Corporation (LCMC) is the civic urban body responsible for the city of Latur in Maharashtra. It manages essential infrastructure like roads, water supply, drainage, sanitation, and street lighting for the residents.</p>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <img  class="wow slideInRight center-block img-responsive" data-wow-delay="0ms" data-wow-duration="3000ms" alt="" src="{{ url('front-assets/images/gtr.png') }}" >
                  </div>
               </div>
            </div>
         </section>
      <!-- =-=-=-=-=-=-= About CarSpot End =-=-=-=-=-=-= -->
	  <section class="section-padding-120 our-services">
            <!--Image One-->
            <div class="background-1"></div>
            <!--Image Two-->
            <div class="background-2"></div>
            <img class="img-responsive wow slideInRight custom-img" data-wow-delay="0ms" data-wow-duration="2000ms" src="{{ url('front-assets/images/sell-1.png') }}" alt="">
            <div class="container">
               <div class="row clearfix">
                  <!--Left Column-->
                  <div class="left-column col-lg-4 col-md-4 col-md-12">
                     <div class="inner-box">
                        <h2>Our Services</h2>
                        <div class="text">Latur City Municipal Corporation (LCMC) provides essential public services to ensure a clean, safe, and well-planned city. Our main services include water supply, sanitation, road maintenance, solid waste management, public lighting, and health facilities for all citizens.</div>
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
                                       <i class="flaticon-car-wash-1"></i>
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
                                       <i class="flaticon-car-wash-1"></i>
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
                                       <i class="flaticon-car-wash-1"></i>
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
                                       <i class="flaticon-car-wash-1"></i>
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
	  
	  
	  <section class="custom-padding">

						<!-- =-=-=-=-=-=-= App Download Section =-=-=-=-=-=-= -->   
         <div class="app-download-section  style-2">
            <!-- app-download-section-wrapper -->
            <div class="app-download-section-wrapper">
               <!-- app-download-section-container -->
               <div class="app-download-section-container">
                  <!-- container -->
                  <div class="container">
                     <!-- row -->
                     <div class="row">
                        <div class="col-md-6 col-sm-6">
                           <div class="mobile-image-content"> <img src="images/hand.png" alt=""> </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                           <div class="app-text-section">
                              <h5>Download our app</h5>
                              <h3>Get Our App For Your Mobile</h3>
                              <ul>
                                 <li>Find nearby cars in your network with Scholar</li>
                                 <li>Browse real hirers reviews to know why choose Scholar</li>
                                 <li>Rent a car so easy with a tap !</li>
                                 <li>Rent a car so easy with a tap !</li>
                              </ul>
                              <div class="app-download-btn">
                                 <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                       <!-- Windows Store -->
                                       <a href="#" title="Windows Store" class="btn app-download-button">
                                       <span class="app-store-btn">
                                       <i class="fa fa-windows"></i>
                                       <span>
                                       <span>Download From</span>
                                       <span>Windows Store </span>
                                       </span>
                                       </span>
                                       </a>
                                       <!-- /Windows Store -->
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                       <!-- Windows Store -->
                                       <a href="#" title="Windows Store" class="btn app-download-button"> <span class="app-store-btn">
                                       <i class="fa fa-apple"></i>
                                       <span>
                                       <span>Download From</span> <span>Apple Store </span> </span>
                                       </span>
                                       </a>
                                       <!-- /Windows Store -->
                                    </div>
                                    <!-- Windows Store -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /row -->
                  </div>
                  <!-- /container -->
               </div>
               <!-- /app-download-section-container -->
            </div>
            <!-- /download-section-wrapper -->
         </div>
         <!-- =-=-=-=-=-=-= App Download Section End =-=-=-=-=-=-= -->
					
			
	  </section>
    <!-- Page Wrapper -->
    <div class="page-wrapper">
    
        <!-- Page Content -->
        <div class="content container-fluid pb-0">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome to home!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Home</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->

@endsection 
@section('scripts')
<!-- MasterSlider --> 
      <script src="{{ url('front-assets/js/masterslider/masterslider.min.js') }}"></script> 
      <script type="text/javascript">	
         (function($) {
           "use strict";	
         
         
         	    var slider = new MasterSlider();
         
         	    // adds Arrows navigation control to the slider.
         	    slider.control('arrows');
         	  
         	     slider.setup('masterslider' , {
         	         width:1400,    // slider standard width
         	         height:560,   // slider standard height
         	         layout:'fullwidth',
         	         loop:true,
         	         preload:0,
         fillMode:'fill',
         	         instantStartLayers:true,
         	         autoplay:true,
         view:"basic"
         
         	    });
         // add scroll parallax effect
         
         })(jQuery);
      </script>
@endsection

