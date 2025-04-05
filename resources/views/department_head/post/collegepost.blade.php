<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Department Head Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="Department Head, dashboard, responsive, bootstrap, template, html, css">

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
        @include('department_head.body.sidebar')

        <div class="page-wrapper" style="margin-top: 0; padding: 0;">
            <h1 style="text-align: center; position: fixed; width: 100%; background: #070d19; z-index: 100; padding: 10px 0; color: white;">
                {{ $profileData->collage }} College Post
            </h1>

            <div class="posting-place" style="margin-top: 70px; width: 100%;">
                @foreach($post as $key => $post)
                @if ($profileData->collage == 'informatics')
                <div class="post-container" style="display: flex; gap: 20px; margin-bottom: 20px;">
                    <div class="single-post">
                        <h5>{{ $post->heading }}</h5>
                        <div class="image-container">
                            <img src="{{ asset('upload/collegeposts/' . $post->photo) }}" class="post-image" alt="Post Image">
                        </div>
                        <div class="description">
                            <div class="description-text" style="overflow-y: auto; max-height: 150px;">
                                <p class="short-description" id="short-description-{{ $post->id }}">{{ Str::limit($post->description, 100, '...') }}</p>
                                <p class="full-description" id="full-description-{{ $post->id }}" style="display: none;">{{ $post->description }}</p>
                            </div>
                            <button class="read-more-btn" data-id="{{ $post->id }}">Read More</button>
                        </div>
                        <button class="toggle-button" data-id="{{ $post->id }}">Comments and Likes</button>
                    </div>
                    <div class="more-content" data-id="{{ $post->id }}">
                        <livewire:comments :model="$post" />
                    </div>
                </div>
                @elseif ($profileData->collage == 'engineering')
                <p>College: Engineering</p>
                @else
                <p>College: {{ $profileData->collage ?? 'Unknown' }}</p>
                @endif
                @endforeach
            </div>

            <div class="action-buttons">
                <form action="{{ route('departmenthead.addcollegepost') }}" method="GET" class="forms-sample" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-success">New Post</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Styles -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .posting-place {
            background: linear-gradient(to right, rgb(19, 35, 70), #070d19);
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .single-post {
            background-color: #070d18;
            padding: 20px;
            border-radius: 10px;
            flex: 1;
            color: white;
        }

        .post-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .toggle-button,
        .read-more-btn {
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .toggle-button:hover,
        .read-more-btn:hover {
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
            overflow-y: auto;
            max-height: 500px;
        }

        .description p {
            margin: 5px 0;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Read More functionality
            document.querySelectorAll('.read-more-btn').forEach(button => {
                button.addEventListener('click', () => {
                    const id = button.dataset.id;
                    const shortDescription = document.getElementById(`short-description-${id}`);
                    const fullDescription = document.getElementById(`full-description-${id}`);

                    if (fullDescription.style.display === 'none' || fullDescription.style.display === '') {
                        shortDescription.style.display = 'none';
                        fullDescription.style.display = 'block';
                        button.textContent = 'Show Less';
                    } else {
                        shortDescription.style.display = 'block';
                        fullDescription.style.display = 'none';
                        button.textContent = 'Read More';
                    }
                });
            });

            // Comments and Likes toggle functionality
            document.querySelectorAll('.toggle-button').forEach(button => {
                button.addEventListener('click', () => {
                    const id = button.dataset.id;
                    const moreContent = document.querySelector(`.more-content[data-id="${id}"]`);

                    if (moreContent.style.display === 'none' || moreContent.style.display === '') {
                        moreContent.style.display = 'block';
                        button.textContent = 'Show Less';
                    } else {
                        moreContent.style.display = 'none';
                        button.textContent = 'Comments and Likes';
                    }
                });
            });

            // Toastr notifications
            @if(Session::has('message'))
            toastr["{{ Session::get('alert-type', 'info') }}"]("{{ Session::get('message') }}");
            @endif
        });
    </script>
</body>

</html>
