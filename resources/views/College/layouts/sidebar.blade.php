<div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="{{ asset('college-assets/app-assets/img/sidebar-bg/01.jpg') }}" data-scroll-to-active="true">
   <div class="sidebar-header">
      <div class="logo clearfix">
         <a class="logo-text float-left text-decoration-none" href="{{ route('college.main') }}">
            <div class="logo-img">
               <img src="{{asset('college-assets\app-assets\img\education.jpg')}}" style="width: 40px;" class="rounded" />
            </div>College
            <!-- {{Auth::user('college')->name}} -->
         </a>
         <a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;">
            <i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i>
         </a>
         <a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;">
            <i class="ft-x"></i>
         </a>
      </div>
   </div>
   <div class="sidebar-content main-menu-content">
      <div class="nav-container">
         <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <!-- Dashboard -->
            <li class="{{ request()->is('*dashboard*') ? 'active' : '' }}"><a href="{{ route('college.main') }}" class="text-decoration-none"><i class="ft-home"></i><span class="menu-title" data-i18n="Chat">Dashboard</span></a>
               <!-- <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1">2</span></a>
               <ul class="menu-content">
                  <li class="active"><a href="{{ route('college.main') }}"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Dashboard 1">Dashboard 1</span></a>
                  </li>
                  <li><a href="dashboard2.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Dashboard 2">Dashboard 2</span></a>
                  </li>
               </ul>
            </li> -->
            <li class="{{ request()->is('*college-course*') ? 'active' : '' }}">
               <a href="{{ route('college.college-course.index')}}" class="text-decoration-none">
                  <i class='fas fa-book-reader' style='font-size:24px'></i>
                  <span class="menu-title" data-i18n="Email">Course</span>
               </a>
            </li>
            <li class="{{ request()->is('*meritround*') ? 'active' : '' }}">
               <a href="{{ route('college.meritround.index')}}" class="text-decoration-none">
                  <i class="fab fa-bandcamp"></i>
                  <span class="menu-title" data-i18n="Email">Merit Round</span>
               </a>
            </li>
            <li class="{{ request()->is('*index*') ? 'active' : '' }}">
               <a href="{{ route('college.show_s_admission')}}" class="text-decoration-none">
                  <i class="fa fa-list-alt" aria-hidden="true"></i>
                  <span class="menu-title" data-i18n="Email">Students</span>
               </a>
            </li>
            <li class="{{ request()->is('*reserved*') ? 'active' : '' }}">
               <a href="{{ route('college.index_reserved')}}" class="text-decoration-none">
                  <i class="fa fa-list-alt" aria-hidden="true"></i>
                  <span class="menu-title" data-i18n="Email">Reserved Students</span>
               </a>
            </li>
         </ul>
      </div>
   </div>
   <div class="sidebar-background"></div>
</div>