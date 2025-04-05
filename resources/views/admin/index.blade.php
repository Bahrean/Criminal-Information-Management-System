@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    @php
        $id = Auth::user()->id;
        $profileData = App\Models\User::find($id);
        $gender = $profileData->gender === 'male' ? 'Mr.' : ($profileData->gender === 'female' ? 'Ms.' : '');
    @endphp

    <div class="d-flex flex-column align-items-start gap-3">
        <div class="welcome-section text-center mb-4">
            <h3 class="mb-2">
                Welcome to Admin Dashboard, {{$gender}} 
                <span style="color: yellow; font-size: 30px;">{{$profileData->name}}</span>
            </h3>
            
        </div>

        <div class="actions-section" style="width: 100%;">
            <div class="card p-4 shadow">
                <h5 class="card-title text-center mb-4">Quick Actions</h5>
                <div class="row g-4">
                    <div class="col-md-4">
                    <form action="{{ route('admin.addmember') }}" method="GET">
                        <button 
                            type="submit" 
                            class="btn btn-primary btn-lg w-100 p-4 shadow-sm" 
                            style="height: 150px; font-size: 1.25rem;">
                            Add New Member
                        </button>
                    </form>

                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('admin.showmember') }}" method="GET">
                            @csrf
                            <button 
                                type="submit" 
                                class="btn btn-secondary btn-lg w-100 p-4 shadow-sm" 
                                style="height: 150px; font-size: 1.25rem;">
                                Edit Member Profile
                            </button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('admin.showmember') }}" method="GET">
                            @csrf
                            <button 
                                type="submit" 
                                class="btn btn-danger btn-lg w-100 p-4 shadow-sm" 
                                style="height: 150px; font-size: 1.25rem;">
                                Delete Member
                            </button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('admin.showmember') }}" method="GET">
                            @csrf
                            <button 
                                type="submit" 
                                class="btn btn-warning btn-lg w-100 p-4 shadow-sm" 
                                style="height: 150px; font-size: 1.25rem;">
                                Activate/Deactivate Member
                            </button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('admin.showmember') }}" method="GET">
                            <button 
                                type="submit" 
                                class="btn btn-success btn-lg w-100 p-4 shadow-sm" 
                                style="height: 150px; font-size: 1.25rem;">
                                Show All Members
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
