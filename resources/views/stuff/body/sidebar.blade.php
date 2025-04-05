<nav class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
            Wollo <span style="color: rgb(255, 255, 0);font-size: 20px;">University</span>
            </a>
            <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
        </div>
        <div class="sidebar-body">

        @php
                $id = Auth::user()->id;
                $profileData =App\Models\User::find($id);
                if($profileData->gender=='male'){
                    $gender ='Mr.';
                }elseif($profileData->gender=='female'){
                    $gender ='Ms.';
                }
        @endphp

            <ul class="nav">
            <ul class="navbar-nav">
                
                @php
                        $id = Auth::user()->id;
                        $profileData =App\Models\User::find($id);
                @endphp
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div style="position: relative; display: inline-block;">
    <img class="wd-40 ht-40 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_image/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
    @if(empty($profileData->photo))
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-weight: bold; pointer-events: none; text-transform: uppercase;">
        {{ substr($profileData->name, 0, 1) }}
    </div>
    @endif
</div>
                                </a>
                                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                        <div class="mb-3">
                                        <div style="position: relative; display: inline-block;">
    <img class="wd-70 ht-70 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_image/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
    @if(empty($profileData->photo))
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white;font-size:35px; font-weight: bold; pointer-events: none; text-transform: uppercase;">
        {{ substr($profileData->name, 0, 1) }}
    </div>
    @endif
</div>
                                        </div>
                            <div class="text-center">
                                <p class="tx-16 fw-bolder">{{$profileData->name}}</p>
                                <p class="tx-12 text-muted">{{$profileData->email}}</</p>
                            </div>
                        </div>
        <ul class="list-unstyled p-1">
            <li class="dropdown-item py-2">
                <a href="{{route('stuff.profile')}}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="user"></i>
                <span>Profile</span>
                </a>
            </li>
            <li class="dropdown-item py-2">
                <a href="{{route('stuff.change.password')}}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="edit"></i>
                <span>Change Password</span>
                </a>
            </li>

            <li class="dropdown-item py-2">
                <a href="{{route('stuff.logout')}}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="log-out"></i>
                <span>Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</li>
</ul>

            <!-- <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{route('stuff.dashboard')}}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
                </a>
            </li> -->
            <li class="nav-item nav-category"> Roles </li>
            <li class="nav-item active">
            <a href="{{route('common.posts.post')}}" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            <path d="M4 4h16v16H4z"></path> <!-- Outer square -->
            <line x1="6" y1="8" x2="18" y2="8"></line> <!-- Top text line -->
            <line x1="6" y1="12" x2="18" y2="12"></line> <!-- Middle text line -->
            <line x1="6" y1="16" x2="14" y2="16"></line> <!-- Bottom shorter text line -->
            </svg>
              <span class="link-title">Posts</span>
            </a>
          </li>

          <li class="nav-item active">
            <a href="{{route('common.posts.collegepost')}}" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            <path d="M4 4h16v16H4z"></path> <!-- Outer square -->
            <line x1="6" y1="8" x2="18" y2="8"></line> <!-- Top text line -->
            <line x1="6" y1="12" x2="18" y2="12"></line> <!-- Middle text line -->
            <line x1="6" y1="16" x2="14" y2="16"></line> <!-- Bottom shorter text line -->
            </svg>
              <span class="link-title">{{$profileData->collage}} College Posts</span>
            </a>
          </li>

          <li class="nav-item active">
            <a href="{{route('common.posts.departmentpost')}}" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            <path d="M4 4h16v16H4z"></path> <!-- Outer square -->
            <line x1="6" y1="8" x2="18" y2="8"></line> <!-- Top text line -->
            <line x1="6" y1="12" x2="18" y2="12"></line> <!-- Middle text line -->
            <line x1="6" y1="16" x2="14" y2="16"></line> <!-- Bottom shorter text line -->
            </svg>
              <span class="link-title">{{$profileData->department}} Department Posts</span>
            </a>
          </li>

            <li class="nav-item active">
            <a href="{{route('chat.index')}}" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
              <span class="link-title">Chat</span>
            </a>
          </li>

            <!-- <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Property type</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="#" class="nav-link">All Type</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/email/read.html" class="nav-link">Add type</a>
                    </li>
               
                </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="pages/apps/calendar.html" class="nav-link">
                <i class="link-icon" data-feather="calendar"></i>
                <span class="link-title">Calendar</span>
                </a>
            </li>
            <li class="nav-item nav-category">Components</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                <i class="link-icon" data-feather="feather"></i>
                <span class="link-title">UI Kit</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                    </li>
                    
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                <i class="link-icon" data-feather="anchor"></i>
                <span class="link-title">Advanced UI</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                    </li>
  
                </ul>
                </div>
            </li>
             -->

            <li class="nav-item nav-category">Guidlines about the system</li>
            <li class="nav-item">
                <a href="#" target="_blank" class="nav-link">
                <i class="link-icon" data-feather="hash"></i>
                <span class="link-title">Documentation</span>
                </a>
            </li>
            </ul>
        </div>
        </nav>