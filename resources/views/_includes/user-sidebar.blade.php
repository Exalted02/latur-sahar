
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
				<li><a href="{{route('dashboard', ['tab' => 1])}}" class="{{ (request()->routeIs('dashboard')) ? 'active' : '' }}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{ __('dashboard') }}</a></li>
				<li><a href="{{route('my-account')}}" class="{{ (request()->routeIs('my-account')) ? 'active' : '' }}"><i class="fa fa-user" aria-hidden="true"></i> {{ __('my_account') }}</a></li>
				<li><a href="{{route('change-password')}}" class="{{ (request()->routeIs('change-password')) ? 'active' : '' }}"><i class="fa fa-key" aria-hidden="true"></i> {{ __('change_password') }}</a></li>
				<li><a href="{{route('submit-grievance')}}" class="{{ (request()->routeIs('submit-grievance')) ? 'active' : '' }}"><i class="fa fa-address-card-o" aria-hidden="true"></i> {{ __('submit_grievance') }}</a></li>
				<li><a href="{{route('view-status')}}" class="{{ (request()->routeIs('view-status')) ? 'active' : '' }}"><i class="fa fa-eye" aria-hidden="true"></i> {{ __('view_grievance') }}</a></li>
				
				{{--<li><a href="{{route('grievance')}}" class="{{ (request()->routeIs('grievance')) ? 'active' : '' }}"><i class="fa fa-triangle-exclamation" aria-hidden="true"></i> {{ __('List grievance') }}</a></li>--}}
								
				<li><a href="{{ route('logout') }}" class="text-danger logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
			</ul>
		</div>
	</div>
</div>
