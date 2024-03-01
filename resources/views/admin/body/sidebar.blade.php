<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   @if (Session::get('adminId'))
   <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <img src="{{ asset('/') }}backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Dashboard</span>
  </a>
   @endif


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     @if (Session::get('adminId'))
     @php
         $admin = App\Models\Admin::where('id',Session::get('adminId'))->first();
     @endphp
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/') }}backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ $admin->name }}</a>
        </div>
      </div>
     @endif



      <!-- SidebarSearch Form -->


<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->


      <li class="nav-item {{ (request()->is('admin/class*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('admin/class*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Class
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.all.class') }}" class="nav-link {{ (request()->is('admin/class/all')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>All Class</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item {{ (request()->is('admin/section*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('admin/section*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Section
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.all.section') }}" class="nav-link {{ (request()->is('admin/section/all')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>All Section</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item {{ (request()->is('admin/session*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('admin/session*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Session
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.all.session') }}" class="nav-link {{ (request()->is('admin/session/all')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>All Session</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item {{ (request()->is('admin/designation*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('admin/designation*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Designation
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.all.designation') }}" class="nav-link {{ (request()->is('admin/designation/all')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>All Designation</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item {{ (request()->is('admin/student*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('admin/student*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Student
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.all.student') }}" class="nav-link {{ (request()->is('admin/student/all')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>All Student</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item {{ (request()->is('admin/attendence*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('admin/attendence*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Attendence
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.student.attendence') }}" class="nav-link {{ (request()->is('admin/attendence/student')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>Student Attendence</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.student.attendence.report') }}" class="nav-link {{ (request()->is('admin/attendence/student/report')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>Student Attendence Report</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item {{ (request()->is('admin/subject*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('admin/subject*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Subject
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.all.subject') }}" class="nav-link {{ (request()->is('admin/subject/all')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>Subject List</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item {{ (request()->is('admin/exam*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('admin/exam*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Exam
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.all.exam') }}" class="nav-link {{ (request()->is('admin/exam/all')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>Exam List</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item {{ (request()->is('admin/mark*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('admin/mark*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Mark
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.mark.assign') }}" class="nav-link {{ (request()->is('admin/mark/assign')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>Mark Assign</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item {{ (request()->is('admin/result*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('admin/result*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Result
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.result.view') }}" class="nav-link {{ (request()->is('admin/result/view')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>Get Result</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.result.modify') }}" class="nav-link {{ (request()->is('admin/result/modify')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>Modify Result</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item {{ (request()->is('admin/admission*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('admin/admission*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Admission
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.admission.student') }}" class="nav-link {{ (request()->is('admin/admission/student')) ? 'active' : '' }}" data-turbolinks-action="replace">
              <i class="far fa-circle nav-icon"></i>
              <p>Application List</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Setting
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.logout') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </li>


    </ul>
  </nav>


      <!-- Sidebar Menu -->

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
