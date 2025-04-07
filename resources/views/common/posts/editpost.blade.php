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
                





            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="row profile-body">
        <!-- Middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Post</h6>

                        <form class="forms-sample" method="POST" action="{{ route('common.updatepost') }}" enctype="multipart/form-data">
                            @csrf	
                            <input type="hidden" name="id" value="{{ $types->id }}">

                            <div class="mb-3">
                                <label class="form-label">Heading</label>
                                <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" placeholder="heading" value="{{ old('heading', $types->heading) }}">
                                @error('heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" placeholder="Photo" id="image">
                                @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="description" value="{{ old('description', $types->description) }}">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
 
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Middle wrapper end -->
    </div>
</div>








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


