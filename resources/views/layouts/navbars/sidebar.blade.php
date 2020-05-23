<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
           
            
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
                    <a class="nav-link" href="{{ route('attendance') }}">
                        <i class="fas fa-briefcase text-primary"></i> {{ __('Missing Attendance') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('trainingSchedule') }}">
                        <i class="fas fa-calendar-alt text-primary"></i> {{ __('Training schedule') }}
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('expenseClaim') }}">
                        <i class="fas fa-calculator text-primary"></i> {{ __('Expense claims') }}
                    </a>
                </li>
          
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('advance_payment')}}">
                        <i class="far fa-clock text-primary"></i> {{ __('Advance payments') }}
                    </a>
                </li>
                
              
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leave') }}">
                        <i class="fas fa-briefcase text-primary"></i> {{ __('Leave') }}
                    </a>
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dailyAttendance') }}">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('Attendance records') }}
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
                    <a class="nav-link" href="{{ route('recruitment') }}">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('Recruitment') }}
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('skill_rating') }}">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('rate your employees') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dailyAttendance') }}">
                        <i class="fas fa-user-plus text-primary"></i> {{ __('Attendance records') }}
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
                    <a class="nav-link" href="{{ route('help') }}">
                        <i class="ni ni-support-16"></i> Help !
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>