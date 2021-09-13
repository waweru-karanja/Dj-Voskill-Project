<!-- Admin Navbar-->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
      <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
        <a class="navbar-brand brand-logo" href="{{ url('admin/admins') }}"><img src="{{ asset('dist/backend/adminimages/DjVoskillLogo.jpg') }}" type="image" alt="logo" style="width: 100px; height:60px;"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('admin/admins') }}"><img src="{{ asset('dist/backend/adminimages/DjVoskillLogo.jpg') }}" type="image" alt="logo"/></a>
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-sort-variant"></span>
        </button>
      </div>  
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <div class="panel panel-default">
        <div class="panel-body">
          <!-- Single button -->
          <div class="btn-group pull-right top-head-dropdown">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Notification <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li>
                <a href="#" class="top-text-block">
                  <div class="top-text-heading">You have <b>3 new themes</b> trending</div>
                  <div class="top-text-light">15 minutes ago</div>
                </a> 
              </li>
              <li>
                <a href="#" class="top-text-block">
                  <div class="top-text-heading">New asset recommendations in <b>Gaming Laptop</b></div>
                  <div class="top-text-light">2 hours ago</div>
                </a> 
              </li>
              <li>
                <a href="#" class="top-text-block">
                  <div class="top-text-heading">New asset recommendations in <b>5 themes</b></div>
                  <div class="top-text-light">4 hours ago</div>
                </a> 
              </li>
              <li>
                <a href="#" class="top-text-block">
                  <div class="top-text-heading">Assets specifications modified in themes</div>
                  <div class="top-text-light">4 hours ago</div>
                </a> 
              </li>
              <li>
                <a href="#" class="top-text-block">
                  <div class="top-text-heading">We crawled <b>www.dell.com</b> successfully</div>
                  <div class="top-text-light">5 hours ago</div>
                </a> 
              </li>
              <li>
                <a href="#" class="top-text-block">
                  <div class="top-text-heading">Next crawl scheduled on <b>10 Oct 2016</b></div>
                  <div class="top-text-light">6 hours ago</div>
                </a> 
              </li>
              <li>
                <a href="#" class="top-text-block">
                  <div class="top-text-heading">You have an update for <b>www.dell.com</b></div>
                  <div class="top-text-light">7 hours ago</div>
                </a> 
              </li>
              <li>
                <a href="#" class="top-text-block">
                  <div class="top-text-heading"><b>"Gaming Laptop"</b> is now trending</div>
                  <div class="top-text-light">7 hours ago</div>
                </a> 
              </li>
              <li>
                <a href="#" class="top-text-block">
                  <div class="top-text-heading">New asset recommendations in <b>Gaming Laptop</b></div>
                  <div class="top-text-light">7 hours ago</div>
                </a> 
              </li>
             <li>
              <div class="loader-topbar"></div>
             </li>
            </ul>
          </div>
        </div>
      </div>
      <ul class="navbar-nav navbar-nav-right">

        <!-- All Notifications -->
        
        {{-- <li class="nav-item dropdown no-arrow mx-1">
          {{-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">{{ auth()->user()->unreadNotifications->count() }}</span>
          </a> 
          <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="mdi mdi-bell mx-0"></i>
            @auth
              <a href="#">
                <span class="count">{{ auth()->user()->unreadNotifications->count() }}</span>
              </a>
            @endauth
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
              aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                  All Notifications
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                      <div class="icon-circle bg-primary">
                          <i class="fas fa-file-alt text-white"></i>
                      </div>
                  </div>
                  <div>
                      <div class="small text-gray-500">December 12, 2019</div>
                      <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Show All Notifications</a>
          </div>
      </li> --}}

        <li class="nav-item dropdown mr-4">
          <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="mdi mdi-bell mx-0"></i>
            @auth
              <a href="#">
                <span class="count">{{ auth()->user()->unreadNotifications->count() }}</span>
              </a>
            @endauth
          </a>
          
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
            <h4 class="mb-0 font-weight-normal float-left dropdown-header text-center">Notifications</h4>
            @if (auth()->user()->unreadnotifications->count()>0)
              @foreach ( auth()->user()->unreadnotifications->take(3) as $notification )
                <div class="px-3">
                  <a class="dropdown-item">
                    <div class="small text-gray-500">{{ Carbon\Carbon::parse($notification->data['bookingstatus']['updated_at'])->diffForHumans() }}</div>
                    <span class="font-weight-bold">kindly request payment from the following booking<strong><a href="{{ route('requestdeposit',$notification->data['bookingstatus']['id']) }}">{{ ($notification->data['bookingstatus']['full_name']) }}</a></strong> </span>
                  </a>
                </div>  
              @endforeach 
            @else
              @foreach ( auth()->user()->notifications->take(3) as $notification )
                <div class="px-3">
                  <a class="dropdown-item">
                    <div class="small text-gray-500">{{ Carbon\Carbon::parse($notification->data['bookingstatus']['updated_at'])->diffForHumans() }}</div>
                    <span class="font-weight-bold">kindly request payment from the following booking<strong><a href="{{ route('requestdeposit',$notification->data['bookingstatus']['id']) }}">{{ ($notification->data['bookingstatus']['full_name']) }}</a></strong> </span>
                  </a>
                </div>  
              @endforeach 
            @endif
            
            <div class="dropdown-footer text-center">
              <h4><a href="{{ route('mynotifications') }}">View all</a></h4>
            </div>
          </div>
        </li>
        
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="/usersimages/{{ Auth::user()->avatar }}" alt="profile"/>
            <span class="nav-profile-name">{{ Auth::user()->name }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            {{-- <a class="dropdown-item" href="#">
              <i class="mdi mdi-settings text-primary"></i>
              Settings
            </a> --}}
            <a class="dropdown-item" href="{{ route('userprofile.show',Auth::user()->id)}}">
              <i class="mdi mdi-settings text-primary"></i>
              My Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="mdi mdi-logout text-primary"></i>Logout
              </a>
            </form>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <!-- Admin Navbar Close -->