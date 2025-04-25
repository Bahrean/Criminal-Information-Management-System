@extends('register_office.register_office_dashboard')
@section('register_office')

<div class="page-content" style="padding: 25px 15px;">

    <!-- Breadcrumb Navigation -->
    <nav class="page-breadcrumb mb-4">

    </nav>

    <!-- Members Table Section -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow">
                <div class="card-body">
                    <h6 class="card-title text-center" style="color: yellow; font-size: 20px;">
                        <i class="fas fa-users"></i> All Criminals Information
                    </h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #003f00;">
                                    <th style="font-size: 17px; color: white; font-weight: bold;">ID</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">first Name</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Middle Name</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Last Name</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Nick Name</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Gender</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Photo</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Nationality</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Family Name</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Relationship</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">ContactInformation</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $key => $items)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>      
                                        <td>{{ $items->fname }}</td>
                                        <td>{{ $items->mname }}</td>
                                        <td>{{ $items->lname }}</td>
                                        <td>{{ $items->nickname }}</td>
                                        <td>{{ $items->gender }}</td>
                                        
                                        <td>
                                            <img class="wd-100 rounded-circle" 
                                                 src="{{ !empty($items->photo) ? url('upload/admin_image/' . $items->photo) : url('upload/no_image.jpg') }}" 
                                                 alt="profile" 
                                                 style="width: 50px; height: 50px;">
                                        </td>
                                        <td>{{ $items->nationality }}</td>  
                                        <td>{{ $items->familyname }}</td>
                                        <td>{{ $items->relationship }}</td>
                                        <td>{{ $items->contactinfo }}</td>
        
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

@endsection
