@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
@php
  $role = (auth()->guard('admin')->user()->role == 1);
  $destination = (auth()->guard('admin')->user()->destination == 1);
  $transportation = (auth()->guard('admin')->user()->transportation == 1);
  $packages = (auth()->guard('admin')->user()->packages == 1);
  $booking = (auth()->guard('admin')->user()->booking == 1);
@endphp
<aside class="main-sidebar">
  <section class="sidebar">	
      <div class="user-profile">
			  <div class="ulogo">
				  <a href="{{ route('dashboard') }}">
					 <div class="d-flex align-items-center justify-content-center">		
						  <h3><b>Samburakat Explore</b> Admin</h3>
					 </div>
				  </a>
			  </div>
      </div>
      
      <ul class="sidebar-menu" data-widget="tree">  
		  
		    <li class="{{ ($route == 'dashboard') ? 'active' : '' }}">
            <a href="{{ url('admin/dashboard') }}">
              <i data-feather="pie-chart"></i>
              <span>Dashboard</span>
            </a>
        </li>  
        
        @if ($role == true)
          <li class="treeview {{ ($prefix == '/role-admin' || $prefix == '/role-users') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="message-circle"></i>
              <span>Role</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'role.admin.all') ? 'active' : '' }}"><a href="{{ route('role.admin.all') }}"><i class="ti-more"></i>Admin</a></li>
              <li class="{{ ($route == 'role.users.all') ? 'active' : '' }}"><a href="{{ route('role.users.all') }}"><i class="ti-more"></i>Users</a></li>
            </ul>
          </li>   
        @else
        @endif

        @if ($destination == true)
          <li class="treeview {{ ($prefix == '/destination-type' || $prefix == '/destination') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="message-circle"></i>
              <span>Destination</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'destination-type.all') ? 'active' : '' }}"><a href="{{ route('destination-type.all') }}"><i class="ti-more"></i>Destination Type</a></li>
              <li class="{{ ($route == 'destination.all') ? 'active' : '' }}"><a href="{{ route('destination.all') }}"><i class="ti-more"></i>Destination</a></li>
            </ul>
          </li>
        @else
        @endif   

        @if ($transportation == true)
          <li class="treeview {{ ($prefix == '/owner' || $prefix == '/transportation') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="message-circle"></i>
              <span>Transportation</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'owner.all') ? 'active' : '' }}"><a href="{{ route('owner.all') }}"><i class="ti-more"></i>Owner</a></li>
              <li class="{{ ($route == 'transportation.all') ? 'active' : '' }}"><a href="{{ route('transportation.all') }}"><i class="ti-more"></i>Transportation</a></li>
            </ul>
          </li>  
        @else 
        @endif

        @if ($packages == true)
          <li class="treeview {{ ($prefix == '/packages' || $prefix == '/destination-packages') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="message-circle"></i>
              <span>Packages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'packages.all') ? 'active' : '' }}"><a href="{{ route('packages.all') }}"><i class="ti-more"></i>Packages</a></li>
              <li class="{{ ($route == 'destination-packages.all') ? 'active' : '' }}"><a href="{{ route('destination-packages.all') }}"><i class="ti-more"></i>Destination Packages</a></li>
            </ul>
          </li>   
        @else
        @endif
        
        @if ($booking == true)
          <li class="treeview {{ ($prefix == '/booking') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="message-circle"></i>
              <span>Booking</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'booking.pending') ? 'active' : '' }}"><a href="{{ route('booking.pending') }}"><i class="ti-more"></i>Pending</a></li>
              <li class="{{ ($route == 'booking.success') ? 'active' : '' }}"><a href="{{ route('booking.success') }}"><i class="ti-more"></i>Success</a></li>
            </ul>
          </li>   
        @else    
        @endif

      </ul>
  </section>
</aside>