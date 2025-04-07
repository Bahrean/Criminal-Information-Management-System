@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
@endphp   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, admin, dashboard, responsive, html, css, bootstrap 5, ui kit, web">
    <title>Admin Panel | Wollo University Communication</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/demo2/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.css')}}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}">
</head>
<body class="overflow-hidden">

    <div class="main-wrapper">
        <!-- Sidebar -->
        @if($profileData->role =='admin')
        @include('admin.body.sidebar')

        @elseif($profileData->role =='collage_registral')
            @include('collage_registral.body.sidebar')

        @elseif($profileData->role =='collage_dean')
            @include('collagedean.body.sidebar')

        @elseif($profileData->role =='investigator')
            @include('investigator.body.sidebar')

        @elseif($profileData->role =='stuff')
            @include('stuff.body.sidebar')
        @else
            <div>
                <h1>not correcct sidebar</h1>
            </div>
        @endif
        <!-- Page Content Wrapper -->
        <div class="page-wrapper">
            <!-- Header -->
            @if($profileData->role =='admin')
            @include('admin.body.header')

            @elseif($profileData->role =='collage_registral')
            @include('collage_registral.body.header')

            @elseif($profileData->role =='collage_dean')
                @include('collagedean.body.header')

            @elseif($profileData->role =='investigator')
                @include('investigator.body.header')

            @elseif($profileData->role =='stuff')
                @include('stuff.body.header')
            @else
                <div>
                    <h1>not correcct header</h1>
                </div>
            @endif

            <!-- Main Content -->
            <div class="content-wrapper">
                






            <style>
    .form-label {
        color: white;
        font-weight: bold;
        font-size: 15px;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content" style="margin-top: 28px;">
    <div class="row profile-body">
        <!-- Middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                <div class="card-body shadow-lg rounded-3">


    <h4 style="font-size:25px" class="card-title mb-5 text-success fw-bold">
        <i class="fas fa-plus-circle me-2 "></i>Create New Post
    </h4>

    <form class="forms-sample" method="POST" action="{{ route('common.collegepost.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Post Content Section -->
        <div class="card mb-4 border-success">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Post Content</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label for="heading" class="form-label fw-bold text-muted">Post Title</label>
                    <input type="text" 
                           class="form-control form-control-lg rounded-3 @error('heading') is-invalid @enderror" 
                           name="heading" 
                           id="heading" 
                           placeholder="Write heading here"
                           aria-describedby="headingHelp">
                    
                    @error('heading')
                        <div class="invalid-feedback fs-6">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fw-bold text-muted">Detailed Description</label>
                    <textarea class="form-control rounded-3 @error('description') is-invalid @enderror" 
                              name="description" 
                              id="description" 
                              rows="5"
                              placeholder="Write description here..."
                              style="resize: vertical;"></textarea>
                    @error('description')
                        <div class="invalid-feedback fs-6">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Media Section -->
        <div class="card mb-4 border-success">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-image me-2"></i>Choose Image</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label fw-bold text-muted">Select file to add image</label>
                    <div class="file-upload-wrapper">
                        <input type="file" 
                               class="form-control visually-hidden" 
                               name="photo" 
                               id="image"
                               onchange="previewImage(event)">
                        <label for="image" class="file-upload-label btn btn-outline-success w-100 py-3">
                            <i class="fas fa-cloud-upload-alt me-2"></i>Choose File...
                        </label>
                        <div class="mt-3 image-preview-container" id="imagePreview" style="display: none;">
                            <img id="preview" class="img-thumbnail rounded-3" style="max-width: 300px;">
                            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="clearImage()">
                                <i class="fas fa-times me-1"></i>Remove
                            </button>
                        </div>
                        @error('photo')
                            <div class="text-danger mt-2 fs-6">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden Author Information -->
        <div class="mb-3">
            <label for="posted_by_name" class="form-label"></label>
            <input type="hidden" class="form-control @error('posted_by_name') is-invalid @enderror" 
                    name="posted_by_name" id="posted_by_name" value="{{ $profileData->name }}" readonly>
            @error('posted_by_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="posted_by_email" class="form-label"></label>
            <input type="hidden" class="form-control @error('posted_by_email') is-invalid @enderror" 
                    name="posted_by_email" id="posted_by_email" value="{{ $profileData->email }}" readonly>
            @error('posted_by_email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="posted_by_photo" class="form-label"></label>
            <input type="hidden" 
                name="posted_by_photo" 
                id="posted_by_photo" 
                value="{{ $profileData->photo }}">
    
        </div>
 
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button type="reset" class="btn btn-secondary btn-lg px-4 rounded-3">
                <i class="fas fa-undo me-2"></i>Reset
            </button>
            <button type="submit" class="btn btn-success btn-lg px-4 rounded-3">
                <i class="fas fa-plus-circle me-2"></i>Publish Post
            </button>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('imagePreview');
    
    reader.onload = function() {
        preview.src = reader.result;
        previewContainer.style.display = 'block';
    }
    
    reader.readAsDataURL(event.target.files[0]);
}

function clearImage() {
    document.getElementById('image').value = '';
    document.getElementById('preview').src = '';
    document.getElementById('imagePreview').style.display = 'none';
}
</script>

<style>
.file-upload-label {
    cursor: pointer;
    transition: all 0.3s ease;
}

.file-upload-label:hover {
    background-color: #198754;
    color: white !important;
}

.image-preview-container {
    position: relative;
    padding: 15px;
    border: 2px dashed #ddd;
    border-radius: 8px;
}

.card-header {
    padding: 1rem 1.5rem;
}

.form-control:focus {
    border-color: #198754;
    box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
}
</style>
                </div>
            </div>
        </div>
        <!-- Middle wrapper end -->
    </div>
</div>

<script type="text/javascript">
      $(document).ready(function () {
        $('#image').change(function (e) {
          var reader =new FileReader();
          reader.onload =function(e){
            $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
        });
      });
    </script>





            </div>

            <!-- Footer -->
            @if($profileData->role =='admin')
                @include('admin.body.footer')

            @elseif($profileData->role =='collage_registral')
                @include('collage_registral.body.footer')

            @elseif($profileData->role =='collage_dean')
                @include('collagedean.body.footer')

            @elseif($profileData->role =='investigator')
                @include('investigator.body.footer')

            @elseif($profileData->role =='stuff')
                @include('stuff.body.footer')
            @else
                <div>
                    <h1>not correcct footer</h1>
                </div>
            @endif
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/template.js')}}"></script>

    <!-- Plugin JS -->
    <script src="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('backend/assets/js/data-table.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('backend/assets/js/dashboard-dark.js')}}"></script>
    <script src="{{asset('backend/assets/js/code/code.js')}}"></script>
    <script src="{{asset('backend/assets/js/code/validate.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr Notification -->
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
</body>
</html>
