<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Hi ') }} {{ auth()->user()->name }} {{ __(' !') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i class="far fa-address-card text-primary"></i> {{ __('Profile') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-briefcase text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('attendance.index') }}">
                        <i class="fas fa-briefcase text-primary"></i> {{ __('Missing Attendance') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-calendar-alt text-primary"></i> {{ __('Training schedule') }}
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-calculator text-primary"></i> {{ __('Expense claim') }}
                    </a>
                </li>
          
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('advance_requests_ajax_crud.index')}}">
                        <i class="far fa-clock text-primary"></i> {{ __('Advance payment request') }}
                    </a>
                </li>
                
              
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-three" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-1">
                        <i class="far fa-calendar-minus text-primary"></i>
                        <span class="nav-link-text">{{ __('Leave') }}</span>
                    </a>

                    <div class="collapse" id="navbar-three">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                            
                            <a class="nav-link"  href="#">
                            <i class="fas fa-pen text-primary"></i>
                            <span class="nav-link-text"> {{ __('Entry') }}</span>
                                </a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                <i class="fas fa-check text-primary"></i>
                            <span class="nav-link-text"> 
                                    {{ __('Approval') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                <i class="fas fa-history text-primary"></i>
                            <span class="nav-link-text"> 
                                    {{ __('History') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-four" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-1">
                        <i class="fas fa-money-bill-wave text-primary"></i>
                        <span class="nav-link-text">{{ __('Salary') }}</span>
                    </a>

                    <div class="collapse" id="navbar-four">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                            
                            <a class="nav-link"  href="#">
                            <i class="fas fa-hand-holding-usd text-primary"></i>
                            <span class="nav-link-text"> {{ __('Increments') }}</span>
                                </a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                <i class="fas fa-file-invoice-dollar text-primary"></i>
                            <span class="nav-link-text"> 
                                    {{ __('Monthly pay slips') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @can('isAdmin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.create') }}">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('Add Employee') }}
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('View Employees') }}
                    </a>
                </li>
                @endcan
              @can('isManager')
               <li class="nav-item">
                    <a class="nav-link" href="#navbar-five" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-1">
                        <i class="fas fa-money-bill-wave text-primary"></i>
                        <span class="nav-link-text">{{ __('Mange Branch') }}</span>
                    </a>

                    <div class="collapse" id="navbar-five">
                      <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('Recruitment') }}
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('View Employees') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('rate your employees') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('Manage salary') }}
                    </a>
                </li>
              <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('View Leave request') }}
                    </a>
                </li>
                       <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('View OT request') }}
                    </a>
                </li>
                       <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('View Expense claim request') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('Attendance summary') }}
                    </a>
                </li>
                       <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('Manage Employee calenders') }}
                    </a>
                </li>
                    </ul>   
            </div>
               </li>
            @endcan
                
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-support-16"></i> Help !
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>