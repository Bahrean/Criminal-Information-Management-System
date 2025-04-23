@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
@endphp   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}">
</head>
<body class="overflow-hidden">

    <div class="main-wrapper">
        <!-- Sidebar -->
        @if($profileData->role == 'admin')
            @include('admin.body.sidebar')
        @elseif($profileData->role == 'investigation_leader')
            @include('investigation_leader.body.sidebar')
        @elseif($profileData->role == 'register_office')
            @include('collagedean.body.sidebar')
        @elseif($profileData->role == 'investigator')
            @include('investigator.body.sidebar')
        @elseif($profileData->role == 'police')
            @include('police.body.sidebar')
        @else
            <div>
                <h1>Incorrect sidebar</h1>
            </div>
        @endif
        
        <!-- Page Content Wrapper -->
        <div class="page-wrapper">
            <!-- Header -->
            @if($profileData->role == 'admin')
                @include('admin.body.header')
            @elseif($profileData->role == 'investigation_leader')
                @include('investigation_leader.body.header')
            @elseif($profileData->role == 'register_office')
                @include('register_office.body.header')
            @elseif($profileData->role == 'investigator')
                @include('investigator.body.header')
            @elseif($profileData->role == 'police')
                @include('police.body.header')
            @else
                <div>
                    <h1>Incorrect header</h1>
                </div>
            @endif

            <!-- Main Content -->
            <div class="content-wrapper">
                <div class="page-content" style="padding: 25px 15px;">
                    <!-- Members Table Section -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h6 class="card-title text-center" style="color: yellow; font-size: 20px;">
                                        <i class="fas fa-users"></i> All Members
                                    </h6>

                                    <div class="table-responsive">
                                        <table id="dataTableExample" class="table table-bordered table-striped">
                                            <thead>
                                                <tr style="background-color: #003f00;">
                                                    <th style="font-size: 17px; color: white; font-weight: bold;">ID</th>
                                                    <th style="font-size: 17px; color: white; font-weight: bold;">Name</th>
                                                    <th style="font-size: 17px; color: white; font-weight: bold;">Email</th>
                                                    <th style="font-size: 17px; color: white; font-weight: bold;">Gender</th>
                                                    <th style="font-size: 17px; color: white; font-weight: bold;">Photo</th>
                                                    <th style="font-size: 17px; color: white; font-weight: bold;">Report(text)</th>
                                                    <th style="font-size: 17px; color: white; font-weight: bold;">Phone</th>
                                                    <th style="font-size: 17px; color: white; font-weight: bold;">Address</th>
                                                    <th style="font-size: 17px; color: white; font-weight: bold;">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($types as $key => $items)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $items->name }}</td>
                                                        <td>{{ $items->email }}</td>
                                                        <td>{{ $items->gender }}</td>
                                                        <td>
                                                            <img class="wd-100 rounded-circle" 
                                                                 src="{{ !empty($items->photo) ? url('upload/common_image/' . $items->photo) : url('upload/no_image.jpg') }}" 
                                                                 alt="profile" 
                                                                 style="width: 50px; height: 50px;">
                                                        </td>
                                                        <td>{{ $items->repotext }}</td>
                                                        <td>{{ $items->phone }}</td>
                                                        <td>{{ $items->address }}</td>
                                                        <td>
                                                            <form action="{{ route('common.statuschange', $items->id) }}" method="POST">
                                                                @csrf
                                                                @if($items->status === 'inactive')
                                                                    <button class="btn btn-danger" type="submit">{{ $items->status }}</button>
                                                                @elseif($items->status === 'active')
                                                                    <button class="btn btn-outline-success" type="submit">{{ $items->status }}</button>
                                                                @endif
                                                            </form>  
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts should be added here -->
</body>
</html>