<!-- Adminsidebar open -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{ 'admin/dashboard'==request()->path()?'active':' ' }}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{ 'admin/*'==request()->path()?'active':' ' }}">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">All Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{ 'admin/admins'==request()->path()?'active':' ' }}"><a class="nav-link" href="{{ route('admins.index') }}">All Admins</a></li>
            <li class="nav-item {{ 'admin/users'==request()->path()?'active':' ' }}"><a class="nav-link" href="{{ route('users.index') }}">All Normal Users</a></li>
          </ul>
        </div>
      </li>
      @can('is-admin')
        <li class="nav-item {{ 'admin/roles'==request()->path()?'active':' ' }}">
          <a class="nav-link" href="{{ route('roles.index') }}">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Roles</span>
          </a>
        </li>
      @endcan
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('adminblogpost.index') }}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Blog Posts</span>
        </a>
      </li> --}}
      <li class="nav-item {{ 'admin/mixxes'==request()->path()?'active':' ' }}">
        <a class="nav-link" href="{{ route('mixxes.index') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Mixtapes</span>
        </a>
      </li>
      <li class="nav-item {{ 'admin/events'==request()->path()?'active':' ' }}">
        <a class="nav-link" href="{{ route('events.index') }}">
          <i class=" mdi mdi-calendar-clock menu-icon"></i>
          <span class="menu-title">Events</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Merchadise</span>
        </a>
      </li>
      <li class="nav-item {{ 'admin/*'==request()->path()?'active':' ' }}">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Blog Posts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{ 'admin/blogost'==request()->path()?'active':' ' }}"> <a class="nav-link" href="{{ route('blogpost.index') }}"> All Blogposts </a></li>
            <li class="nav-item {{ 'admin/blogcategory'==request()->path()?'active':' ' }}"> <a class="nav-link" href="{{ route('blogcategory.index') }}"> All Post Categories</a></li>
            <li class="nav-item {{ 'admin/blogtags'==request()->path()?'active':' ' }}"> <a class="nav-link" href="{{ route('blogtags.index') }}"> All Post Tags </a></li>
            <li class="nav-item {{ 'admin/postcomments'==request()->path()?'active':' ' }}"> <a class="nav-link" href="{{ url('admin/postcomments') }}"> All Post Comments </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Admin Settings</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- Adminsidebar close -->