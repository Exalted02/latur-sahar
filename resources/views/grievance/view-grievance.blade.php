@extends('layouts.app')
@section('content')
@php 

$check_dept = '';
$check_user = '';
if($grievance)
{
	if($grievance->department == auth()->user()->department)
	{
		$check_dept = 1;
	}
	
	if($grievance->user_id == auth()->user()->id)
	{
		$check_user = 1;
	}
	
}

@endphp
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
			@if($grievance->status == 1)
				<div class="btn btn-warning singleprice-tag" style="--tag-color: #FEB800;">{{ __('pending') }}</div>
			@elseif($grievance->status == 2)
			    <div class="btn btn-info singleprice-tag" style="--tag-color: #17A2B8;">{{ __('resubmit') }}</div>
			@elseif($grievance->status == 3)
				<div class="btn btn-success singleprice-tag" style="--tag-color: #28A745;">{{ __('solved') }}</div>
			@endif
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
					    @foreach($grievance->grievance_image as $images)
						  <li><a href="{{ url('uploads/greivance_image/'. $images->images )}}" data-fancybox="group"><img alt="" src="{{ url('uploads/greivance_image/'. $images->images )}}" /></a></li>
						@endforeach
						  
						  {{--<li><a href="images/single-page/2.jpg" data-fancybox="group"><img alt="" src="images/single-page/2.jpg" /></a></li>
						  <li><a href="images/single-page/3.jpg" data-fancybox="group"><img alt="" src="images/single-page/3.jpg" /></a></li>
						  <li><a href="images/single-page/4.jpg" data-fancybox="group"><img alt="" src="images/single-page/4.jpg" /></a></li>
						  <li><a href="images/single-page/5.jpg" data-fancybox="group"><img alt="" src="images/single-page/5.jpg" /></a></li>
						  <li><a href="images/single-page/6.jpg" data-fancybox="group"><img alt="" src="images/single-page/6.jpg" /></a></li>--}}
					   </ul>
					</div>
					<div id="carousel" class="flexslider">
					   <ul class="slides">
					    @foreach($grievance->grievance_image as $images)
						  <li><img alt="" src="{{ url('uploads/greivance_image/'. $images->images )}}"></li>
						@endforeach
						  {{--<li><img alt="" src="images/single-page/2_thumb.jpg"></li>
						  <li><img alt="" src="images/single-page/3_thumb.jpg"> </li>
						  <li><img alt="" src="images/single-page/4_thumb.jpg"></li>
						  <li><img alt="" src="images/single-page/5_thumb.jpg"></li>
						  <li><img alt="" src="images/single-page/6_thumb.jpg"></li>--}}
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
						  {{ $grievance->issue_description ?? '' }}.
						  </p>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('name') }}</strong> :</span> {{ $grievance->name ?? '' }}
						  </div>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('mobile') }}</strong> :</span> {{ $grievance->mobile_no ?? '' }}
						  </div>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('ward_prabhag') }}</strong> :</span> {{ $grievance->ward_prabhag ?? '' }}
						  </div>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('department') }}</strong>:</span> {{ $grievance->get_department->name ?? '' }}
						  </div>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('grievance_type') }}</strong> :</span> {{ $grievance->get_grievance_type->name ?? '' }}
						  </div>
						  <div class="col-sm-12 col-md-12 col-xs-12 no-padding">
							 <span><strong>{{ __('address') }}</strong> :</span> {{ $grievance->address ?? '' }}
						  </div>
						  <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
							 <span><strong>{{ __('pin_code') }}</strong> :</span> {{ $grievance->pincode ?? '' }}
						  </div>
					   </div>
					   <div class="clearfix"></div>
					</div>	
				</div>
				 <!-- Single Ad End --> 
				{{--<div class="alert-box-container margin-top-30">
					<div class="well">
					   <h3>{{ __('rating') }}</h3>
					   <form>
						  <form id="rating-form" action="" method="POST">
							@csrf
							<div class="row align-items-center">
								<div class="col-md-9 col-xs-12 col-sm-12 text-center text-md-start">
									<div class="rating-stars">
										<input type="radio" name="rating" id="star5" value="5"><label for="star5" title="5 stars">&#9733;</label>
										<input type="radio" name="rating" id="star4" value="4"><label for="star4" title="4 stars">&#9733;</label>
										<input type="radio" name="rating" id="star3" value="3"><label for="star3" title="3 stars">&#9733;</label>
										<input type="radio" name="rating" id="star2" value="2"><label for="star2" title="2 stars">&#9733;</label>
										<input type="radio" name="rating" id="star1" value="1"><label for="star1" title="1 star">&#9733;</label>
									</div>
								</div>
								<div class="col-md-3 col-xs-12 col-sm-12">
									<input class="btn btn-theme btn-block" value="Submit" type="submit"> 
								</div>
							</div>
						</form>
					   </form>
					</div>
				</div>--}}
				
				@if(auth()->user()->user_type == 1 && $grievance->status  == 3)
				<div class="alert-box-container margin-top-30">
					<div class="well">
					   <h3>{{ __('rating') }}</h3>
					   <p>{{ __('resubmit_Grievance_higher_authority') }}</p>
					   <form id="rating-form" action="{{ route('save-citizen-rating') }}" method="POST">
					   @csrf
					   <input type="hidden" value="{{ $grievance->id ?? '' }}" name="grievance_id">
						  <div class="row">
							 <div class="col-md-9 col-xs-12 col-sm-12">
								<div class="rating-stars">
									<input type="radio" name="rating" id="star5" value="5"><label for="star5" title="5 stars">&#9733;</label>
									<input type="radio" name="rating" id="star4" value="4"><label for="star4" title="4 stars">&#9733;</label>
									<input type="radio" name="rating" id="star3" value="3"><label for="star3" title="3 stars">&#9733;</label>
									<input type="radio" name="rating" id="star2" value="2"><label for="star2" title="2 stars">&#9733;</label>
									<input type="radio" name="rating" id="star1" value="1"><label for="star1" title="1 star">&#9733;</label>
								</div>
								@error('rating')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							 </div>
							 <div class="col-md-9 col-xs-12 col-sm-12 mt-2">
								<input placeholder="Enter Your Feedback" type="text" name="feedback_description" class="form-control" value="{{ $grievance->feedback_description ?? '' }}">
								@error('feedback_description')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							 </div>
							 <div class="col-md-3 col-xs-12 col-sm-12">
								<input class="btn btn-theme btn-block" value="Submit" type="submit"> 
							 </div>
						  </div>
					   </form>
					</div>
				 </div>
				 @endif
				 
				@if((auth()->user()->user_type == 2 || auth()->user()->user_type == 3) && $grievance->status != 3)
					<div class="alert-box-container margin-top-30">
					<div class="well">
					   <h3>{{ __('solved_grievance') }}</h3>
					   <p>{{ __('solved_grievance') }}</p>
					   <form>
					   @csrf
					    <input type="hidden" value="{{ $grievance->id ?? '' }}" name="grievance_id" id="grievance_id">
							<div class="row">
							   <div class="col-md-9 col-xs-12 col-sm-12">
								  <label>{{ __('status') }} <span class="text-danger">*</span></label>
								  <select class="form-control" name="select_status" id="select_status">
									 <option value="">{{ __('select_status') }}</option>
									 <option value="3">{{ __('solved') }}</option>
									 <option value=""></option>
									</select>
								  <div class="clearfix"></div>
								  <span id="error_select_status" class="text-danger position-absolute"></span>
								</div>
							</div>
							<div class="row">
							 <div class="col-md-9 col-xs-12 col-sm-12">
								<label for="lo_file"></label>
								<div class="upload-wrapper">
								  <input type="file" name="lo_file[]" id="lo_file" multiple style="display: none;" accept="image/png, image/gif, image/jpeg">
								  <label for="lo_file" class="custom-upload-label">
									<span class="upload-text">{{ __('upload_image') }}</span>
									<i class="fa fa-upload upload-icon"></i>
								  </label>
								</div>
								<span id="error_images" class="text-danger position-absolute"></span>
							 </div>
							</div>
							<div class="row margin-bottom-10">		
								<div class="col-md-12 d-flex flex-wrap gap-2" id="preview-container">
								@if(!empty($solved_image))
									@foreach($solved_image as $image)
									@php 
									$urlsExp = explode(".", $image->images);
									$extension = $urlsExp[1];
									$extension = strtolower($extension);
									//echo $extension;
									@endphp
								
									<div class="preview-image-wrapper existing-image" data-id="{{ $image->id }}">
										@if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
										<img src="{{ asset('uploads/greivance_image/'.$image->images) }}" class="preview-image" />
										<button type="button" class="remove-existing-image" data-id="{{ $image->id }}" data-image="{{ $image->images }}">&times;</button>
										@elseif(in_array($extension, ['mp4', 'webm', 'ogg']))
										<video controls src="{{ asset('uploads/greivance_image/'.$image->images) }}" class="preview-image" /></video>
										<button type="button" class="remove-existing-image" data-id="{{ $image->id }}" data-image="{{ $image->images }}">&times;</button>
										@endif
									</div>
									@endforeach
								@endif
								
								</div>
							</div>
							 <div class="row">
								 <div class="col-md-3 col-xs-12 col-sm-12">
									<input class="btn btn-theme btn-block update-grievance-status" value="Submit" type="button"> 
								 </div>
							 </div>
						  
					   </form>
					</div>
				 </div>
				@endif
				 <!-- Price Alert -->
				 {{--<div class="alert-box-container margin-top-30">
					<div class="well">
					   <h3>{{ __('resubmit_grievance') }}</h3>
					   <p>{{ __('resubmit_Grievance_higher_authority') }}</p>
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
				 </div>--}}
                     <!-- Price Alert End --> 
				 <!-- =-=-=-=-=-=-= Latest Ads End =-=-=-=-=-=-= -->
				</div>
				
				{{--<div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
						<div id="itemMap"></div>
					 </div>
				</div>--}}
				<div class="col-md-4 col-xs-12 col-sm-12">
					<div class="blog-sidebar">
						@auth
							@if(auth()->user()->user_type == 1)
							
								  @if($grievance->status == 1 && $check_user == 1)
									<div class="category-list-icon">
									  <i class="green fa fa-repeat" aria-hidden="true"></i>

									  <div class="category-list-title" style="cursor:pointer">
										 <h3 id="resubmitBtn" data-id="{{ $grievance->id }}">{{ __('resubmit_grievance') }}?<br/><p class="text-info">Click here to resubmit</p></h5>
									  </div>
								   </div>
									{{--<div class="widget">
										<div class="widget-heading">
											<div class="resubmit-button" id="resubmitBtn" data-id="{{ $grievance->id }}">{{ __('resubmit_grievance') }}</div>
										</div>
									</div>--}}
								  @elseif($grievance->status == 2  && $check_user == 1)
								   <div class="widget">
										<div class="widget-heading">
											<div class="alert alert-info text-center mt-3" role="alert">
												You have already resubmitted this grievance.
											</div>
										</div>
									</div>
								  @endif
								  
								  @if(!empty($check_user))
									<div class="widget">
										<div class="widget-heading">
											<div class="alert alert-info text-center mt-3 show-resubmit-text" role="alert" style="display:none">
													You have already resubmitted this grievance.
											</div>
										</div>
									</div>
								  @endif
							   
							@endif
							
							@if(auth()->user()->user_type == 2 && $check_dept ==1)
								<div class="widget">
									<div class="widget-heading">
										<div class="resubmit-button" id="downloadBtn" data-id="{{ $grievance->id }}">{{ __('download') }}</div>
									</div>
								</div>
							@endif
						@endauth
						<div class="widget">
							 <!-- Sidebar Widgets -->
							 <div class="sidebar">
								<div id="itemMap"></div>
							 </div>
						</div>
					</div>
				</div>	 
			</div>
		</div>
	</section>
</div>
<input type="hidden" id="view_latitude" value="{{ $grievance->latitude ?? '' }}">
<input type="hidden" id="view_longitude" value="{{ $grievance->longitude ?? '' }} ">
<input type="hidden" id="get-rating" value="{{ $grievance->feedback_rating ?? '' }}">
	<!-- /Page Content -->
@include('modal.user-modal')
@include('modal.common')
@endsection 
@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
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
    let view_latitude = $('#view_latitude').val();
    let view_longitude = $('#view_longitude').val();
	
	   var  map ="";
	   //var latlng = new google.maps.LatLng(47.550259, -122.264847);
	   var latlng = new google.maps.LatLng(view_latitude, view_longitude);
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
<script>
$(document).ready(function(){
	$(document).on('click','#resubmitBtn', function(){
		let id = $(this).data('id');
		$.ajax({
			url: "{{ route('resubmit-grievance') }}",
			type: "POST",
			data: {
				id: id,
				_token: "{{ csrf_token() }}"
			},
			dataType: 'json',
			success: function(response) {
				//alert(response.html);
				$.toast({
					heading: 'Success',
					text: "Resubmit successfully",
					showHideTransition: 'slide',
					icon: 'success',
					position: 'top-right',
					loaderBg: '#5cb85c',
					hideAfter: 3000
				});
				$('.resubmit-button').hide();
				$('.show-resubmit-text').show();
				
				
			},
			error: function(xhr) {
				console.error(xhr.responseText);
			}
		});
	});
	
	$(document).on('click','#downloadBtn', function(){
		let id = $(this).data('id');
		window.location.href = "/download-grievance-files/" + id;
	});
	/*$(document).on('click', '#downloadBtn', function() {
		let id = $(this).data('id');
		$.get(`/grievance/files/${id}`, function(response) {
			response.images.forEach(function(file) {
				let link = document.createElement('a');
				link.href = '/uploads/greivance_image/' + file;
				link.download = file;
				document.body.appendChild(link);
				link.click();
				document.body.removeChild(link);
			});
		});
	});*/
	
	$(document).on('change', 'input[name="rating"]', function() {
		const rating = $(this).val();
		console.log("Selected rating:", rating);
	});
	
	var get_rating = $('#get-rating').val();
	if(get_rating != '')
	{
		$('#star' + get_rating).click();
	}
	
	@if(session('success') == 'Inserted')
	{
		$.toast({
			heading: 'Success',
			text: "Feedback send successfully",
			showHideTransition: 'slide',
			icon: 'success',
			position: 'top-right',
			loaderBg: '#5cb85c',
			hideAfter: 3000
		});
	}
	@endif
	
	let previewContainer = $('#preview-container');
    let selectedFiles = [];
	
	$('#lo_file').on('change', function (e) {
		let files = Array.from(e.target.files);

		selectedFiles = [...selectedFiles, ...files];

		files.forEach((file, index) => {
			let reader = new FileReader();
			reader.onload = function (e) {
				let previewHtml = '';

				if (file.type.startsWith('image/')) {
					previewHtml = '<div class="preview-image-wrapper" data-index="' 
						+ (selectedFiles.length - files.length + index) 
						+ '"><img src="' + e.target.result 
						+ '" class="preview-image" /><button type="button" class="remove-image" data-index="' 
						+ (selectedFiles.length - files.length + index) 
						+ '">&times;</button></div>';
				} else if (file.type.startsWith('video/')) {
					previewHtml = '<div class="preview-image-wrapper" data-index="' 
						+ (selectedFiles.length - files.length + index) 
						+ '"><video src="' + e.target.result 
						+ '" class="preview-image" controls style="max-width: 120px; max-height: 120px;"></video><button type="button" class="remove-image" data-index="' 
						+ (selectedFiles.length - files.length + index) 
						+ '">&times;</button></div>';
				}
				previewContainer.append(previewHtml);
			};
			reader.readAsDataURL(file);
		});

		$(this).val('');
	});
	
	// Remove file from preview & array
	previewContainer.on('click', '.remove-image', function () {
		const indexToRemove = $(this).data('index');
		$(this).parent().remove();
		selectedFiles[indexToRemove] = null;
		selectedFiles = selectedFiles.filter(file => file !== null);
	});
	
	$(document).on('click', '.update-grievance-status' ,function(){
		let select_status = $('#select_status').val();
		let grievance_id = $('#grievance_id').val();
		if (select_status == '') {
			$('#error_select_status').text('Please enter pincode').fadeIn().delay(2000).fadeOut();
			return false;
		}
		
		if (selectedFiles.length === 0) {
			$('#error_images').text('Please select image').fadeIn().delay(2000).fadeOut();
			return false;
		}
		
		let formData = new FormData();
		selectedFiles.forEach(file => {
			formData.append('lo_file[]', file);
		});
		
		formData.append('grievance_id', grievance_id);
		formData.append('select_status', select_status);
		formData.append('_token',"{{ csrf_token() }}");
		
		$.ajax({
			url: "{{ route('grievance-update-status') }}",
			type: "POST",
			data: formData,
			dataType: 'json',
			contentType: false,
			processData: false, 
			success: function(response) {
				
				let textmsg = 'Status updated successfully!';
				$.toast({
					heading: 'Success',
					text: textmsg,
					showHideTransition: 'slide',
					icon: 'success',
					position: 'top-right',
					loaderBg: '#5cb85c',
					hideAfter: 2000 
				});
			},
			error: function(xhr) {
				console.error(xhr.responseText);
			}
		});
		
	});
});
</script>
@endsection
