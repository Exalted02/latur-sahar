@extends('layouts.app')
@section('content')
	<!-- Page Wrapper -->
<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
<div style="background-image: url('{{ asset('front-assets/inner-bg.jpg') }}');
	background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
	;">
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
	<section class="section-padding no-top">
		<!-- Main Container -->
		<div class="container">
			<div class="row">
				<!-- Middle Content Area -->
				<div class="col-md-12 col-xs-12 col-sm-12">
					<!-- Row -->
					<div class="profile-section margin-bottom-20">
						<div class="profile-edit">
							<div class="clearfix"></div>
							<div class="margin-bottom-20">{!! __('about_us_heading') !!}</div>
							<p>{{ __('about_us_short_content') }}</p>	
							
							<div class="review-excerpt">
								<div class="pro-cons">
									<div class="pro-section">
                                       <img src="{{ asset('front-assets/images/like.png') }}" alt="">
                                       {!! __('about_us_short_long_content1') !!}
                                    </div>
                                </div>
                            </div>
							<div class="review-excerpt">
								<div class="pro-cons">
									<div class="pro-section">
                                       <img src="{{ asset('front-assets/images/like.png') }}" alt="">
                                       {!! __('about_us_short_long_content2') !!}
                                    </div>
                                </div>
                            </div>
							<div class="review-excerpt">
								<div class="pro-cons">
									<div class="pro-section">
                                       <img src="{{ asset('front-assets/images/like.png') }}" alt="">
                                       {!! __('about_us_short_long_content3') !!}
                                    </div>
                                </div>
                            </div>
							<div class="review-excerpt">
								<div class="pro-cons">
									<div class="pro-section">
                                       <img src="{{ asset('front-assets/images/like.png') }}" alt="">
                                       {!! __('about_us_short_long_content4') !!}
                                    </div>
                                </div>
                            </div>
							<div class="review-excerpt">
								<div class="pro-cons">
									<div class="pro-section">
                                       <img src="{{ asset('front-assets/images/like.png') }}" alt="">
                                       {!! __('about_us_short_long_content5') !!}
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

