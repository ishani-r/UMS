<div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="{{ asset('university-assets/app-assets/img/sidebar-bg/01.jpg') }}" data-scroll-to-active="true">
   <div class="sidebar-header">
      <div class="logo clearfix"><a class="logo-text float-left text-decoration-none" href="{{ route('university.main') }}">
            <div class="logo-img"><img src="{{asset('university-assets\app-assets\img\university-logo.jpg')}}" style="width: 40px;" class="rounded" /></div>{{Auth::user('university')->name}}

         </a><a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i class="ft-x"></i></a></div>
   </div>
   <div class="sidebar-content main-menu-content">
      <div class="nav-container">
         <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <!-- Dashboard -->
            <li class="{{ request()->is('*dashboard*') ? 'active' : '' }}"><a href="{{ route('university.main') }}" class="text-decoration-none"><i class="ft-home"></i><span class="menu-title" data-i18n="Chat">Dashboard</span></a>
               <!-- <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1">2</span></a>
               <ul class="menu-content">
                  <li class="active"><a href="{{ route('university.main') }}"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Dashboard 1">Dashboard 1</span></a>
                  </li>
                  <li><a href="dashboard2.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Dashboard 2">Dashboard 2</span></a>
                  </li>
               </ul>
            </li> -->
               <!-- Store -->
               <!-- <li class="has-sub nav-item"><a href="javascript:;"><i class="fa fa-shopping-basket"></i><span class="menu-title" data-i18n="Tables">Store</span></a>
                    <ul class="menu-content">
                        <li"><a href="#"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Basic">List Store</span></a>
                        </li>
                    </ul>
                </li> -->
               @can('view-college')
            <li class="{{ request()->is('*college*') ? 'active' : '' }}">
               <a href="{{ route('university.college.index')}}" class="text-decoration-none">
                  <i class='fas fa-school' style='font-size:17px'></i>
                  <span class="menu-title" data-i18n="Email">College</span>
               </a>
            </li>
            @endcan
            @can('view-course')
            <li class="{{ request()->is('*course*') ? 'active' : '' }}">
               <a href="{{ route('university.course.index')}}" class="text-decoration-none">
                  <i class='fas fa-book-reader' style='font-size:24px'></i>
                  <span class="menu-title" data-i18n="Email">Course</span>
               </a>
            </li>
            @endcan
            @can('view-subject')
            <li class="{{ request()->is('*list-subject*') ? 'active' : '' }}">
               <a href="{{ route('university.list_subject')}}" class="text-decoration-none">
                  <i class="fa fa-list" aria-hidden="true"></i>
                  <span class="menu-title" data-i18n="Email">Subject</span>
               </a>
            </li>
            @endcan
            <li class="{{ request()->is('*common-setting*') ? 'active' : '' }}">
               <a href="{{ route('university.common_setting')}}" class="text-decoration-none">
                  <i class="fa fa-tasks" aria-hidden="true"></i>
                  <span class="menu-title" data-i18n="Email">Common Setting</span>
               </a>
            </li>
            @can('view-meritround')
            <li class="{{ request()->is('*meritround*') ? 'active' : '' }}">
               <a href="{{ route('university.meritround.index')}}" class="text-decoration-none">
                  <i class="fa fa-tasks" aria-hidden="true"></i>
                  <span class="menu-title" data-i18n="Email">Marite Round</span>
               </a>
            </li>
            @endcan
            <li class="{{ request()->is('*student*') ? 'active' : '' }}">
               <a href="{{ route('university.student.index')}}" class="text-decoration-none">
                  <i class="fa fa-tasks" aria-hidden="true"></i>
                  <span class="menu-title" data-i18n="Email">Student Admission</span>
               </a>
            </li>
         </ul>
      </div>
   </div>
   <div class="sidebar-background"></div>
</div>