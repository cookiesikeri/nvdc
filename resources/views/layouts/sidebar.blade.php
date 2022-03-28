<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="image">
        <img src="{{asset('img/download.png')}}" class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <a href="{{route('cms.index')}}"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{ Request::is('admin/cms') ? 'active' : '' }}">
        <a href="{{route('cms.index')}}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview {{ Request::is('cms/sliders')  || Request::is('cms/clients') ||  Request::is('cms/home-intro') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-home"></i>
          <span>Home Components</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('cms.homeintro')}}"><i class="fa fa-angle-double-right"></i>Home Intro</a></li>
          <li><a href="{{route('cms.sliders')}}"><i class="fa fa-angle-double-right"></i>Sliders</a></li>
          <li><a href="{{route('cms.clients')}}"><i class="fa fa-angle-double-right"></i>Clients</a></li>
        </ul>
      </li>
      <li  class="{{ Request::is('cms/donations') ? 'active' : '' }}">
        <a href="{{route('cms.donations')}}">
          <i class="fa fa-cubes"></i> <span>Donations</span>
        </a>
      </li>
      <li class="treeview {{ Request::is('cms/volunteers')  ||  Request::is('cms/pending-volunteers') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-handshake-o"></i>
          <span>Volunteers</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('cms.volunteers')}}"><i class="fa fa-angle-double-right"></i>Active Volunteers</a></li>
          <li><a href="{{route('cms.pendingvolunteers')}}"><i class="fa fa-angle-double-right"></i>Pending Volunteers</a></li>
        </ul>
      </li>
      <li class="treeview {{ Request::is('cms/feedbacks')  || Request::is('cms/pending-feedbacks') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Feedbacks</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('cms.feedbacks')}}"><i class="fa fa-angle-double-right"></i>Active Feedbacks</a></li>
          <li><a href="{{route('cms.pendingfeedbacks')}}"><i class="fa fa-angle-double-right"></i>Pending Feedbacks</a></li>
        </ul>
      </li>
      <li class="{{ Request::is('cms/programs') ? 'active' : '' }}">
        <a href="{{route('cms.programs')}}">
          <i class="fa fa-feed"></i> <span>Programs</span>
        </a>
      </li>
      <li class="{{ Request::is('cms/projects') ? 'active' : '' }}">
        <a href="{{route('cms.projects')}}">
          <i class="fa fa-rocket"></i> <span>Projects</span>
        </a>
      </li>
      <li class="{{ Request::is('cms/ready-to-vote-images') ? 'active' : '' }}">
        <a href="{{route('cms.rtvimages')}}">
          <i class="fa fa-camera"></i> <span>Ready To Vote Images</span>
        </a>
      </li>

      <li class="{{ Request::is('cms/sitesettings') ? 'active' : '' }}">
        <a href="{{route('cms.settings')}}">
          <i class="fa fa-cog"></i> <span>Settings</span>
        </a>
      </li>
      <li class="treeview {{ Request::is('cms/contact')  || Request::is('cms/about') ||  Request::is('cms/gallery') || Request::is('cms/faqs') || Request::is('cms/privacy-policy') || Request::is('cms/Terms-of-use') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-pencil-square-o"></i>
          <span>Pages</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('cms.contact') }}"><i class="fa fa-angle-double-right"></i>Contact Us</a></li>
          <li><a href="{{route('cms.about')}}"><i class="fa fa-angle-double-right"></i>About Us</a></li>
          <li><a href="{{route('cms.gallery')}}"><i class="fa fa-angle-double-right"></i>Gallery</a></li>
          <li><a href="{{route('cms.faqs')}}"><i class="fa fa-angle-double-right"></i>FAQs</a></li>
          <li><a href="{{route('cms.privacy')}}"><i class="fa fa-angle-double-right"></i>Privacy</a></li>
          <li><a href="{{route('cms.terms')}}"><i class="fa fa-angle-double-right"></i>Terms of Use</a></li>
        </ul>
      </li>
      @if(

        \Auth::user()->role->permission->user_module == "yes")
      <li class="treeview {{ Request::is('users/index')  || Request::is('all/roles') ? 'active' : '' }}">
        <a href="#">
            <i class="fa fa-user"></i>
          <span>User Module</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('cms.users.index')}}"><i class="fa fa-angle-double-right"></i>All Users</a></li>
          <li><a href="{{route('cms.user.roles')}}"><i class="fa fa-angle-double-right"></i>All Roles</a></li>
        </ul>
      </li>
      @endif
      <li>
        <a href="{{url('/')}}">
          <i class="fa fa-globe"></i> <span>Main Website</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.logout') }}">
          <i class="fa fa-sign-out"></i> <span>Logout</span>
        </a>
      </li>
    </ul>
  </section>
