
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Department head Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="department head, dashboard, responsive, bootstrap, template, html, css">

    <title>Department Head Panel | Wollo University Inter-Office Communication</title>

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
        @include('investigator.body.sidebar')

        <div class="page-wrapper" style="margin-top: 0; padding: 0;">
            <div class="align-items-start" style="width: 100%;">
                <div class="posting_place">
                @foreach($post as $key=>$post)
                @if ($profileData->department == 'IT')
<div class="card mb-4 shadow-sm post-container">
    <!-- Post Header with Author Info -->
    <div class="card-header bg-transparent d-flex align-items-center">
        <a href="{{ route('departmenthead.profile') }}" class="d-flex align-items-center text-decoration-none">
            <img class="rounded-circle me-3 shadow-sm" 
                 style="width: 45px; height: 45px; object-fit: cover;"
                 src="{{ (!empty($post->posted_by_photo)) ? url('upload/departmentposts/'.$post->posted_by_photo) : url('upload/no_image.jpg') }}" 
                 alt="{{ $post->posted_by_name }}'s profile picture">
            <div>
                <h6 class="mb-0 fw-bold text-white">{{ $post->posted_by_name }}</h6>
                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
            </div>
        </a>
    </div>

    <!-- Post Content -->
    <div class="card-body">
        <div class="row">
            <!-- Main Post Content -->
            <div class="col-lg-8">
                <h4 class="card-title fw-bold mb-3 text-primary">{{ $post->heading }}</h4>
                
                @if($post->photo)
                <div class="post-image mb-4">
                    <img src="{{ asset('upload/departmentposts/' . $post->photo) }}" 
                         class="img-fluid rounded-3 shadow-sm" 
                         alt="Post image"
                         style="max-height: 500px; object-fit: cover;">
                </div>
                @endif

                <div class="post-content mb-4">
                    <p class="card-text text-secondary" style="line-height: 1.8;">
                        {{ $post->description }}
                    </p>
                </div>

                <!-- Engagement Metrics -->
                <div class="d-flex gap-3 mb-4">
                    <button class="btn btn-outline-primary toggle-comments" data-id="{{ $post->id }}">
                        <i class="far fa-comment me-2"></i>Show Comments
                    </button>
                    <div class="d-flex align-items-center text-muted">
                        <i class="far fa-thumbs-up me-1"></i> {{ $post->like }}
                    </div>
                    <div class="d-flex align-items-center text-muted">
                        <i class="far fa-thumbs-down me-1"></i> {{ $post->dislike }}
                    </div>
   
                </form>

                </div>
            </div>

            <!-- Comments Section -->
            <div class="col-lg-4 comments-section" data-id="{{ $post->id }}" 
                 style="display: none; max-height: 500px;">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-3">
                        <h6 class="card-subtitle mb-3 text-muted">
                            <i class="fas fa-comments me-2"></i>Comments
                        </h6>
                        <livewire:comments :model="$post" />
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endif
@endforeach

<style>
    .post-container {
        transition: transform 0.2s ease;
    }
    
    .post-container:hover {
        transform: translateY(-3px);
    }
    
    .post-image {
        overflow: hidden;
        border-radius: 10px;
    }
    
    .toggle-comments {
        transition: all 0.3s ease;
    }
    
    .toggle-comments[aria-expanded="true"] {
        background-color: #0d6efd;
        color: white;
    }
    
    .comments-section {
        opacity: 0;
        transition: opacity 0.3s ease, max-height 0.3s ease;
    }
    
    .comments-section.show {
        opacity: 1;
        display: block !important;
    }
</style>

<script>
document.querySelectorAll('.toggle-comments').forEach(button => {
    button.addEventListener('click', function() {
        const commentsSection = document.querySelector(`.comments-section[data-id="${this.dataset.id}"]`);
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        
        // Toggle comments section
        commentsSection.classList.toggle('show');
        this.setAttribute('aria-expanded', !isExpanded);
        
        // Update button text and icon
        const icon = this.querySelector('i');
        if (!isExpanded) {
            this.innerHTML = `<i class="far fa-comment me-2"></i>Hide Comments`;
            icon.classList.replace('fa-comment', 'fa-comment-slash');
        } else {
            this.innerHTML = `<i class="far fa-comment me-2"></i>Show Comments`;
            icon.classList.replace('fa-comment-slash', 'fa-comment');
        }
    });
});
</script>
                </div>

            </div>

            <div class="action-buttons"> 
                <form action="{{route('departmenthead.adddepartmentpost')}}" class="forms-sample" enctype='multipart/form-data'>
                    <button style="font-size:20px;font-weight:bold" type="submit" class="btn btn-success">New Post</button>
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
            bottom: 20px;
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
                    button.textContent = 'Show Less';  // Changing button text
                    button.style.bottom = '0px';  // Adjusting the button position
                } else {
                    moreContent.style.display = 'none';  // Hiding the content
                    button.textContent = 'Comments and Likes';  // Resetting button text
                }
            });
        });

        // Handling toastr notifications
        @if(Session::has('message'))
            const type = "{{ Session::get('alert-type', 'info') }}";  // Getting the alert type
            const message = "{{ Session::get('message') }}";  // Getting the message content

            // Displaying the toastr notification based on the type
            if (type === 'info') toastr.info(message);
            if (type === 'success') toastr.success(message);
            if (type === 'warning') toastr.warning(message);
            if (type === 'error') toastr.error(message);
        @endif
    });
</script>

</body>

</html>

