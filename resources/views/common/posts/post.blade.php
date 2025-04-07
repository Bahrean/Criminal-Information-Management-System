<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="admin, dashboard, responsive, bootstrap, template, html, css">

    <title>Admin Panel | Criminal Information Inter-Office Communication</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}">
</head>

<body>
    @php
        $id = Auth::user()->id;
        $profileData = App\Models\User::find($id);
    @endphp


    <div class="main-wrapper">
    @if($profileData->role=='admin')
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                Crime<span style="color: rgb(255, 255, 0);font-size: 20px;">Information</span>
                </a>
                <div class="sidebar-toggler not-">
                <span></span>
                <span></span>
                <span></span>
            </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Additional roles</li>

                </li>

                <!-- <li class="nav-item ">
                <a href="{{route('admin.posts')}}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                <path d="M4 4h16v16H4z"></path> 
                <line x1="6" y1="8" x2="18" y2="8"></line>
                <line x1="6" y1="12" x2="18" y2="12"></line> 
                <line x1="6" y1="16" x2="14" y2="16"></line>
                </svg>
                <span class="link-title">Posts</span>
                </a>
            </li> -->

            <li class="nav-item ">
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
            <li class="nav-item ">
                <a href="{{route('common.posts.collegepost')}}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                <path d="M4 4h16v16H4z"></path> <!-- Outer square -->
                <line x1="6" y1="8" x2="18" y2="8"></line> <!-- Top text line -->
                <line x1="6" y1="12" x2="18" y2="12"></line> <!-- Middle text line -->
                <line x1="6" y1="16" x2="14" y2="16"></line> <!-- Bottom shorter text line -->
                </svg>
                <span class="link-title">College Posts</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="{{route('common.posts.departmentpost')}}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                <path d="M4 4h16v16H4z"></path> <!-- Outer square -->
                <line x1="6" y1="8" x2="18" y2="8"></line> <!-- Top text line -->
                <line x1="6" y1="12" x2="18" y2="12"></line> <!-- Middle text line -->
                <line x1="6" y1="16" x2="14" y2="16"></line> <!-- Bottom shorter text line -->
                </svg>
                <span class="link-title">Department Posts</span>
                </a>
            </li>

                <!-- <li class="nav-item ">
                <a href="{{route('admin.chat')}}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                <span class="link-title">Chat</span>
                </a>
            </li> -->

            <li class="nav-item ">
                <a href="{{route('chat.index')}}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                <span class="link-title">Chat2</span>
                </a>
            </li>
            <li class="nav-item ">
                    <a href="{{route('admin.addmember')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users link-icon">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        </svg>
                        <span class="link-title">Add New member</span>
                    </a>
                </li>

            <li class="nav-item ">
                    <a href="{{route('admin.showmember')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users link-icon">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        </svg>
                        <span class="link-title">Show all members</span>
                    </a>
                </li>

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
        @elseif($profileData->role=='collage_registral') 
        <nav class="sidebar">
@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
@endphp
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
            Crime<span style="color: rgb(255, 255, 0);font-size: 20px;">Information</span>
            </a>
            <div class="sidebar-toggler not-">
            <span></span>
            <span></span>
            <span></span>
        </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{route('collageregistral.dashboard')}}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Addition role</li>
            <li class="nav-item ">
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

          <li class="nav-item ">
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

          <li class="nav-item ">
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

            <li class="nav-item ">
            <a href="{{route('chat.index')}}" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
              <span class="link-title">Chat</span>
            </a>
          </li>
 

          <li class="nav-item ">
                <a href="{{route('collageregistral.showmembers')}}" class="nav-link">
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
        
        @elseif($profileData->role=='.investigation_leader')
            <nav class="sidebar">
            @php
                $id = Auth::user()->id;
                $profileData = App\Models\User::find($id);
            @endphp
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                Crime<span style="color: rgb(255, 255, 0);font-size: 20px;">Information</span>
                </a>
                <div class="sidebar-toggler not-">
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
                <li class="nav-item ">
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
            
            <li class="nav-item ">
                <a href="{{route('chat.index')}}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                <span class="link-title">Chat</span>
                </a>
            </li>
        
            <li class="nav-item ">
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

            <li class="nav-item ">
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

            <li class="nav-item ">
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

        @elseif($profileData->role=='investigator')
            <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                Crime<span style="color: rgb(255, 255, 0);font-size: 20px;">Information</span>
                </a>
                <div class="sidebar-toggler not-">
                <span></span>
                <span></span>
                <span></span>
            </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="{{route('departmenthead.dashboard')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Addition role</li>
                <li class="nav-item ">
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

            <li class="nav-item ">
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

            <li class="nav-item ">
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

                <li class="nav-item ">
                <a href="{{route('chat.index')}}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                <span class="link-title">Chat</span>
                </a>
            </li>

            <li class="nav-item ">
                    <a href="{{route('departmenthead.showmembers')}}" class="nav-link">
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

        @elseif($profileData->role=='stuff')
            
            <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                Crime<span style="color: rgb(255, 255, 0);font-size: 20px;">Information</span>
                </a>
                <div class="sidebar-toggler not-">
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
                <li class="nav-item ">
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

            <li class="nav-item ">
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

            <li class="nav-item ">
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

                <li class="nav-item ">
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
        @else
            <div>
                <h2>
                    Hello student
                </h2>
            </div>
        @endif
        <div class="page-wrapper" style="margin-top: 0; padding: 0;">
            <div class="align-items-start" style="width: 100%;">
                <div class="posting_place">
                    @foreach($post as $key=>$post)
                    
                        <div style="display:flex;flex-direction:row;gap:10px">
                            <div class="single_post"  style="width: 60%;margin:5px 0px 0px 45px;padding:5px 0px 10px 40px ">
                            <div class="post-container">
                                <div>
                                    <h2 class="post-heading">{{ $post->heading }}</h2>
                                    
                                </div>
                                
                                <div class="image-container">
                                    <img src="{{ asset('upload/posts/' . $post->photo) }}" class="wd-70" alt="Post Image">
                                </div>
                                <div class="description">
                                    <p class="post-description">{{ $post->description }}</p>
                                </div>
                            </div>
                            <style>
                                .post-container {
                                max-width: 100%;
                                overflow: hidden;
                                word-wrap: break-word;
                            }

                            .post-heading {
                                font-size: 30px;
                                font-weight: bold;
                                white-space: normal;
                                overflow-wrap: break-word;
                                max-width: 97%;
                                
                            }

                            .post-description {
                                font-size: 14px;
                            
                                overflow-wrap: break-word;
                                word-wrap: break-word;
                                white-space: normal;
                                max-width: 97%;
                            }

                            .image-container img {
                                max-width: 100%;
                                height: auto;
                                display: block;
                            }

                            </style>
                                <div style="display:flex;flex-direction:row;justify-content:space-between">
                                    <p style="margin-top:20px;">{{ $post->updated_at }}</p>
                                    <div style="display:flex;flex-direction:row;justify-content:end;gap:20px;bottom:20px">
                                        @if($profileData->name==$post->posted_by_name)
                                            <form action="{{route('common.editpost', $post->id)}}">
                                                <button type="submit" class="btn btn-primary">Edit Post</button>
                                            </form>
                                        @endif
                                        @if($profileData->name==$post->posted_by_name ||$profileData->role=='admin')
                                            <form action="{{route('common.deletepost', $post->id)}}">
                                                <button type="submit" class="btn btn-danger">Delete Post</button>
                                            </form>
                                        @endif
                                    </div>


                                </div>

                                
                            </div>
                            <style>
.feedback-container {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-top: 10px;
}

.feedback-btn {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 8px 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: transform 0.2s, background 0.3s;
}

.like-btn {
    background: #e3f2fd;
    color: #0d47a1;
}

.dislike-btn {
    background: #ffebee;
    color: #b71c1c;
}

.feedback-btn:hover {
    transform: scale(1.05);
}

.feedback-btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.emoji {
    font-size: 18px;
}

.count {
    font-weight: bold;
    transition: color 0.3s, transform 0.3s;
}

.like-count-animate {
    color: #0d47a1;
    transform: scale(1.3);
}

.dislike-count-animate {
    color: #b71c1c;
    transform: scale(1.3);
}
</style>

<div class="feedback-container">
    <button class="feedback-btn like-btn" id="likeBtn-{{ $post->id }}" onclick="handleLike('{{ $post->id }}')">
        <span class="emoji">👍</span>
        <span class="label">Likes</span>
        <span class="count" id="likeCount-{{ $post->id }}">{{ $post->like }}</span>
    </button>
    <button class="feedback-btn dislike-btn" id="dislikeBtn-{{ $post->id }}" onclick="handleDislike('{{ $post->id }}')">
        <span class="emoji">👎</span>
        <span class="label">Dislike</span>
        <span class="count" id="dislikeCount-{{ $post->id }}">{{ $post->dislike }}</span>
    </button>
</div>

<script>
async function updateCount(postId, action) {
    try {
        // Disable buttons to prevent spam clicks
        document.getElementById(`likeBtn-${postId}`).disabled = true;
        document.getElementById(`dislikeBtn-${postId}`).disabled = true;

        const response = await fetch(`/posts/${postId}/${action}`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        });

        const data = await response.json();
        
        if (data.success) {
            let countElement = document.getElementById(`${action}Count-${postId}`);
            
            // Add animation effect
            countElement.textContent = data[action];
            countElement.classList.add(action === 'like' ? 'like-count-animate' : 'dislike-count-animate');

            setTimeout(() => countElement.classList.remove('like-count-animate', 'dislike-count-animate'), 500);
        }
    } catch (error) {
        console.error('Error:', error);
    } finally {
        // Re-enable buttons after update
        setTimeout(() => {
            document.getElementById(`likeBtn-${postId}`).disabled = false;
            document.getElementById(`dislikeBtn-${postId}`).disabled = false;
        }, 500);
    }
}

function handleLike(postId) {
    updateCount(postId, 'like');
}

function handleDislike(postId) {
    updateCount(postId, 'dislike');
}
</script>


                        </div>


                        <form class="mb-0">
                            <a href="#">
                                
                                                                                            <div style="position: relative; display: inline-block;">
    <img class="wd-40 ht-40 rounded-circle" src="{{ (!empty($post->posted_by_photo)) ? url('upload/admin_image/'.$post->posted_by_photo) : url('upload/no_image.jpg') }}" alt="profile">
    @if(empty($post->posted_by_photo))
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-weight: bold; pointer-events: none; text-transform: uppercase;">
        {{ substr($post->posted_by_name, 0, 1) }}
    </div>
    @endif
</div>
                            </a>
                            <span class="tx-16 fw-bolder">{{ $post->posted_by_name }}</span>
                        </form>

                    @endforeach
                </div>

            </div>

            <div class="action-buttons"> 
            @if($profileData->role!='stuff')
                <form action="{{route('common.addpost')}}" class="forms-sample" enctype='multipart/form-data'>
                    <button type="submit" class="btn btn-success" style="font-size:20px;font-weight:bold">New Post</button>
                </form>
            @endif

            </div>
        </div>
    </div>

    <!-- Styles -->
    <style>
        .wd-70 {
            display: flex; /* Enable flexbox for the container */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            flex-direction: column;
            width: 85%; /* Set image width to 70% of the screen */
            max-height: 300px;/* Maintain aspect ratio */
        }
        .posting_place {
            margin: 0;
            background: linear-gradient(to right, rgb(19, 35, 70), #070d19);
            /* overflow-y: auto;
            max-height: 560px; */
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .single_post {
            background-color: #070d18;
            max-height: 560px; 
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .toggle-button {
            
         
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .toggle-button:hover {
            background-color: #0056b3;
        }

        .action-buttons {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }

        .more-content {
            display: none;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .description {
            margin: 10px 0 30px;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Adding event listeners to all elements with the class 'toggle-button'
        document.querySelectorAll('.toggle-button').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;  // Getting the data-id attribute
                const moreContent = document.querySelector(`.more-content[data-id="${id}"]`);  // Selecting the matching .more-content element

                // Toggling the display property
                if (moreContent.style.display === 'none' || moreContent.style.display === '') {
                    moreContent.style.display = 'block';  // Showing the content
                    button.textContent = 'Hide comments and like';  // Changing button text
                    button.style.bottom = '0px';  // Adjusting the button position
                } else {
                    moreContent.style.display = 'none';  // Hiding the content
                    button.textContent = 'Comments and like';  // Resetting button text
                }
            });
        });

        // Handling toastr notifications
        @if(Session::has('message'))
            const type = "{{ Session::get('alert-type', 'Information') }}";  // Getting the alert type
            const message = "{{ Session::get('message') }}";  // Getting the message content

            // Displaying the toastr notification based on the type
            if (type === 'Information') toastr.Information(message);
            if (type === 'success') toastr.success(message);
            if (type === 'warning') toastr.warning(message);
            if (type === 'error') toastr.error(message);
        @endif
    });
</script>

</body>

</html>