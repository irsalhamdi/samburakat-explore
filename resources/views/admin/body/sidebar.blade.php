@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <section class="sidebar">	
		
      <div class="user-profile">
			  <div class="ulogo">
				  <a href="index.html">
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
		
        <li class="treeview {{ ($prefix == '/role') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Role</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'role.admin') ? 'active' : '' }}"><a href="{{ route('role.admin') }}"><i class="ti-more"></i>Admin</a></li>
            <li class="{{ ($route == 'role.users') ? 'active' : '' }}"><a href="{{ route('role.users') }}"><i class="ti-more"></i>Users</a></li>
          </ul>
        </li>   

        <li class="treeview {{ ($prefix == '/destination-type') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Destination Type</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'destination-type.all') ? 'active' : '' }}"><a href="{{ route('destination-type.all') }}"><i class="ti-more"></i>All Destination Type</a></li>
          </ul>
        </li>   
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
          </ul>
        </li>

      </ul>

</aside>