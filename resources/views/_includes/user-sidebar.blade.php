
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
				<li><a href="{{route('dashboard', ['tab' => 1])}}" class="{{ (request()->routeIs('dashboard')) ? 'active' : '' }}"><i class="fa fa-user" aria-hidden="true"></i> Dashboard</a></li>
				
				<li><a href="{{route('grievance')}}" class="{{ (request()->routeIs('grievance')) ? 'active' : '' }}"><i class="fa fa-triangle-exclamation" aria-hidden="true"></i> {{ __('List grievance') }}</a></li>
								
				<li><a href="{{ route('logout') }}" class=""><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
			</ul>
		</div>
	</div>
</div>
