<nav class="sidebar">
@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
@endphp
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
            Crime<span style="color: rgb(255, 255, 0);font-size: 20px;">Information</span>
            </a>
            <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{route('collagedean.dashboard')}}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Additional role</li>
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
            <a href="{{route('chat.index')}}" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
              <span class="link-title">Chat</span>
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
                <a href="{{route('collegedean.showmembers')}}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users link-icon">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                        <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    </svg>
                    <span class="link-title">Show all members</span>
                </a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">All Members</span>
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
            </li> -->

            

            <li class="nav-item nav-category">Guidelines about the system</li>
            <li class="nav-item">
                <a href="#" target="_blank" class="nav-link">
                <i class="link-icon" data-feather="hash"></i>
                <span class="link-title">Documentation</span>
                </a>
            </li>
            </ul>
        </div>
        </nav>