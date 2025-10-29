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
                        {!! __('about_us_heading') !!}
                     </div>
                     <div class="content">
                        <p class="service-summary">{{ __('about_us_home_heading') }}</p>
                        <p>{{ __('about_us_short_content') }}</p>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <img  class="wow slideInRight center-block img-responsive" data-wow-delay="0ms" data-wow-duration="3000ms" alt="" src="{{ url('front-assets/images/about.jpg') }}" >
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
						   
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
	  </div>
	  <!-- =-=-=-=-=-=-= Pricing =-=-=-=-=-=-= -->
         <section class="custom-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row pricing style-3">
                        <div class="col-sm-6 col-lg-4 col-md-4">
							<div class="block">
								<h3>{{ __('home_page_box_register_login_title') }}</h3>
								<span class="type">{{ __('home_page_box_register_login_text') }}</span>
							</div>
                           <div class="selection">
                              <a href="{{ route('register') }}" class="btn btn-block btn-theme">{{ __('home_page_box_register_login_title') }} <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                           </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-md-4">
                           <div class="block featured">
                              <h3>{{ __('home_page_box_view_status_title') }}</h3>
                              <span class="type">{{ __('home_page_box_view_status_text') }}</span>
                           </div>
                           <div class="selection">
                              <a href="{{ route('view-status')}}" class="btn btn-block btn-theme">{{ __('home_page_box_view_status_title') }} <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                           </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-md-4">
                           <div class="block">
                              <h3>{{ __('home_page_box_contact_us_title') }}</h3>
                              <span class="type">{{ __('home_page_box_contact_us_text') }}</span>
                           </div>
                           <div class="selection">
                              <a href="{{ route('contact-us')}}" class="btn btn-block btn-theme">{{ __('home_page_box_contact_us_title') }} <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Pricing End =-=-=-=-=-=-= -->
	  

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

