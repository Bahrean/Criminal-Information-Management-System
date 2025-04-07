@extends('admin.admin_dashboard')
@section('admin')

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
                                    <th style="font-size: 17px; color: white; font-weight: bold;">phone</th>
                                    
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Address</th>
                                   
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
                                                 src="{{ !empty($items->photo) ? url('upload/admin_image/' . $items->photo) : url('upload/no_image.jpg') }}" 
                                                 alt="profile" 
                                                 style="width: 50px; height: 50px;">
                                        </td>
                                        <td>{{ $items->repotext }}</td>

                                       
                                
                                        <td>{{ $items->phone }}</td>
                                        <td>{{ $items->address }}</td>
                                        <td>
                                            <form action="{{route('admin.statuschange',$items->id)}}" method="POST">
                                            @csrf
                                                @if($items->status==='inactive')
                                                    <input class="btn btn-danger" type="submit" value="{{$items->status}}">
                                                @endif
                                                @if($items->status==='active')
                                                    <input class="btn btn-outline-success" type="submit" value="{{$items->status}}">
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

@endsection
