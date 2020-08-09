 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-navy elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('imgs/pro6logo.png')}}" alt="project6" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Project6</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <a href="{{ route('home')}}" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt text-danger"></i>
                   <p>
                     Dashboard
                   </p>
                 </a>
               </li>

               <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>
                    Appointment Demo
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.clients')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-cog text-warning"></i>
                        <p>
                          Client
                        </p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('employee.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users text-info"></i>
                        <p>
                          Employees
                        </p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('workinghours.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-hourglass text-danger"></i>
                        <p>
                         Working Hours
                        </p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('appointments.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt text-primary"></i>
                        <p>
                        Appointments
                        </p>
                      </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    <p>
                      Hospital App
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                 <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('hospital.dashboard')}}" class="nav-link">
                            <i class="fas fa-tachometer-alt text-info"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('departments.index')}}" class="nav-link">
                            <i class="fas fa-users text-info"></i>
                            <p>
                                Departments
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('doctor.index') }}" class="nav-link">
                            <i class="fas fa-users text-info"></i>
                            <p>
                                Doctors
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users text-info"></i>
                            <p>
                               Nurses
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users text-info"></i>
                            <p>
                                Patients
                            </p>
                        </a>
                    </li>
                </ul>
              </li>



               <li class="nav-item">
               <a href="{{ route('petition.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-balance-scale text-primary"></i>
                  <p>
                    Petitions
                  </p>
                </a>
              </li>



           <li class="nav-item">
            <a href="{{ route('ticket.create')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt text-primary"></i>
              <p>
              Tickets
              </p>
            </a>
          </li>




          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt text-secondary"></i>
              <p>
                Logout
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
