@extends('investigator.investigator_dashboard')
@section('investigator')

<div class="page-content">

    @php
        $id = Auth::user()->id;
        $profileData =App\Models\User::find($id);
        $gender = $profileData->gender === 'male' ? 'Mr.' : ($profileData->gender === 'female' ? 'Ms.' : '');
    @endphp

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to  {{$gender}} <span style="color: rgb(255, 255, 0);font-size: 25px;">{{$profileData->name}}</span></h4>
        </div>

    </div> <!-- row -->
    <div class="actions-section" style="width: 100%;">
            <div class="card p-4 shadow">
                <h5 class="card-title text-center mb-4">Quick Actions</h5>
                <div class="row g-4">
                    
                   
                    <div class="col-md-4">
                        <form action="#" method="GET">
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


@endsection