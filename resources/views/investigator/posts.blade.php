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

    <nav class="sidebar">
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
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Additional roles</li>

            </li>

            <!-- <li class="nav-item active">
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

          <li class="nav-item active">
            <a href="{{route('admin.posts2')}}" class="nav-link">
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
            <a href="{{route('admin.collageposts')}}" class="nav-link">
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

          <li class="nav-item active">
            <a href="{{route('admin.departmentposts')}}" class="nav-link">
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

            <!-- <li class="nav-item active">
            <a href="{{route('admin.chat')}}" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
              <span class="link-title">Chat</span>
            </a>
          </li> -->

          <li class="nav-item active">
            <a href="{{route('chat.index')}}" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
              <span class="link-title">Chat2</span>
            </a>
          </li>
  

          <li class="nav-item active">
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

        <div class="page-wrapper" style="margin-top: 0; padding: 0;">
            <div class="align-items-start" style="width: 100%;">
                <div class="posting_place">
                    @foreach($post as $key=>$post)
                    
                        <div style="display:flex;flex-direction:row;gap:10px">
                            <div class="single_post"  style="width: 60%;margin:5px 0px 0px 45px;padding:5px 0px 10px 40px ">
                                <div>
                                    <h2>{{ $post->heading }}</h2>
                                    <div  class="image-container">
                                   
                                    <img src="{{ asset('upload/posts/' . $post->photo) }}" class="wd-70" alt="...">
                                    </div>
                                    <div class="description">
                                        <p>{{ $post->description }}</p>
                                    </div>
                                    <button class="toggle-button" data-id="{{ $post->id }}">Comments and Likes</button>
                                    
                                </div>

                                @if($profileData->name == $post->posted_by_name)
                                    <div style="display:flex;flex-direction:row;justify-content:space-between">
                                        <p style="margin-top:20px;">{{ $post->updated_at }}</p>
                                        <div style="display:flex;flex-direction:row;justify-content:end;gap:20px;bottom:20px">
                                            <form action="{{route('admin.editpost', $post->id)}}">
                                                <button type="submit" class="btn btn-primary">Edit Post</button>
                                            </form>
                                            <form action="{{route('admin.deletepost', $post->id)}}">
                                                <button type="submit" class="btn btn-danger">Delete Post</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif

                                
                            </div>
                            <div class="more-content" data-id="{{ $post->id }}" style="overflow-y: auto;max-height: 500px;">
                                <livewire:comments :model="$post" />
                            </div>

                        </div>


                        <form class="mb-0">
                            <a href="{{ route('admin.profile') }}">
                                
                                <img style="width:40px;height:40px" src="{{(!empty($post->posted_by_photo))?url('upload/admin_image/'.$post->posted_by_photo) : url('upload/no_image.jpg') }}" alt="Profile picture" class="rounded-circle">
                            </a>
                            <span class="tx-16 fw-bolder">{{ $post->posted_by_name }}</span>
                        </form>

                    @endforeach
                </div>

            </div>

            <div class="action-buttons"> 
                <form action="{{route('departmenthead.addpost')}}" class="forms-sample" enctype='multipart/form-data'>
                    <button type="submit" class="btn btn-success" style="font-size:20px;font-weight:bold">New Post</button>
                </form>
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
            margin: 10px 0;
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
                    button.textContent = 'Hide comments and likes';  // Changing button text
                    button.style.bottom = '0px';  // Adjusting the button position
                } else {
                    moreContent.style.display = 'none';  // Hiding the content
                    button.textContent = 'Comments and Likes';  // Resetting button text
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
