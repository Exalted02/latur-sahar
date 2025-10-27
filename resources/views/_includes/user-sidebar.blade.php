
<div class="col-md-4 col-md-pull-8- col-lg-3 col-sx-12">
		<!-- Sidebar Widgets -->
	<div class="blog-sidebar mt_0">
		<!-- Archives --> 
		<div class="widget">
			{{--<div class="widget-heading profile_img_box">
					<img alt="Profile picture" src="{{$userDetails->profile_picture!='' ? url('images/').'/'.$userDetails->username.'/avatar/'.$userDetails->profile_picture : url('images/noimage.png')}}" class="img-responsive profile_sidebar_img radius_5">
				<h3 class="user_sidebar_name"><a href="javascript:void(0);">{{$userDetails->name ? $userDetails->name  : 'NA'}}</a></h3>
			</div>
			<div class="astrodivider"><div class="astrodividermask"></div></div>--}}
			<ul class="profile_user_li">
				<li><a href="" class="active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit profile</a></li>
				{{--<li><a href="{{route('active-ad')}}" class="{{ (request()->routeIs('active-ad', 'post-ad-details-edit', 'post-edit-gallery', 'post-ad-vehicle-details-edit')) ? 'active' : '' }} "><i class="fa fa-bullhorn" aria-hidden="true"></i> {{ __('left_sidebar_my_ads') }}</a></li>
				<li><a href="{{route('new-post-ad')}}" class="{{ (request()->routeIs('post-ad-category', 'post-ad-vehicle-details', 'post-ad-details', 'post-ad-user-details')) ? 'active' : '' }} "><i class="fa fa-upload" aria-hidden="true"></i> {{ __('left_sidebar_post_your_ads') }}</a></li>
				<li><a href="{{route('plans')}}" class="{{ (request()->routeIs('plans','plans.show')) ? 'active' : '' }}"><i class="fa fa-tag" aria-hidden="true"></i> {{ __('left_sidebar_subscriptions') }}</a></li>
				<li><a href="{{route('monitoring')}}" class="{{ (request()->routeIs('monitoring','monitoring-user')) ? 'active' : '' }}"><i class="fa fa-eye" aria-hidden="true"></i> {{ __('left_sidebar_monitoring') }}</a></li>
				<li><a href="{{route('wishlist')}}" class="{{ (request()->routeIs('wishlist')) ? 'active' : '' }}"><i class="fa fa-heart" aria-hidden="true"></i> {{ __('left_sidebar_wishlist') }}</a></li>--}}
				
				<li><a href="{{ route('logout') }}" class=""><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
			</ul>
		</div>
	</div>
</div>
