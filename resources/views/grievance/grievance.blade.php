@extends('layouts.app')
@section('content')
<!-- Page Wrapper -->
<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area-2 gray">
 <div class="container">
	<div class="row">
	   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  <div class="small-breadcrumb">
			 <div class="header-page">
				<h1>{{ __('view_grievance') }}</h1>
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
	<section class="section-padding no-top gray">
		<!-- Main Container -->
		<div class="container">
			<div class="row">
				<div class="grid-style-2">
				   <div class="posts-masonry">
						@php
						$i = 1;
						@endphp
						@foreach ($grievances as $grievance)
						<div class="col-md-3 col-sm-3 col-xs-12 clearfix">
						 <div class="category-grid-box-1">
							<div class="image">
							   <img alt="" src="{{ url('uploads/greivance_image/'. $grievance->grievance_image[0]->images )}}" class="img-responsive">
							   <div class="price-tag">
								  <div class="price"><span>{{ $grievance->status==1 ? 'Pending' : ($grievance->status==2 ? 'Resubmit' : 'Solved')}}</span></div>
							   </div>
							</div>
							<div class="short-description-1 clearfix">
								<h3 class="list-title"><a title="" href="single-page-listing.html">{{ $grievance->get_department->name ?? '' }} , {{ $grievance->get_grievance_type->name ?? '' }}</a></h3>
								<P class="list-desc">{{ $grievance->issue_description ?? '' }}.</P>
							</div>
							<div class="ad-info-1">
								<ul class="pull-right">
									<li> <a href="{{ url('edit-grievance', ['id'=> $grievance->id]) }}"><i class="fa-solid fa-pen"></i></a> </li>
									<li> <a href="{{ route('view-grievance', ['id'=> $grievance->id]) }}"><i class="fa-solid fa-eye"></i></a></li>
								</ul>
							</div>
						 </div>
						</div>
						@endforeach
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
<script src="{{ url('front-assets/js/page/user.js') }}"></script>
@endsection
