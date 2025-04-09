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

        @php
                $id = Auth::user()->id;
                $profileData =App\Models\User::find($id);
                if($profileData->gender=='male'){
                    $gender ='Mr.';
                }elseif($profileData->gender=='female'){
                    $gender ='Ms.';
                }
        @endphp

            <ul class="nav">
            <ul class="navbar-nav">
                
                @php
                        $id = Auth::user()->id;
                        $profileData =App\Models\User::find($id);
                @endphp
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div style="position: relative; display: inline-block;">
    <img class="wd-40 ht-40 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_image/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
    @if(empty($profileData->photo))
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-weight: bold; pointer-events: none; text-transform: uppercase;">
        {{ substr($profileData->name, 0, 1) }}
    </div>
    @endif
</div>
                                </a>
                                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                        <div class="mb-3">
                                        <div style="position: relative; display: inline-block;">
    <img class="wd-70 ht-70 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_image/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
    @if(empty($profileData->photo))
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white;font-size:35px; font-weight: bold; pointer-events: none; text-transform: uppercase;">
        {{ substr($profileData->name, 0, 1) }}
    </div>
    @endif
</div>
                                        </div>
                            <div class="text-center">
                                <p class="tx-16 fw-bolder">{{$profileData->name}}</p>
                                <p class="tx-12 text-muted">{{$profileData->email}}</</p>
                            </div>
                        </div>
        <ul class="list-unstyled p-1">
            <li class="dropdown-item py-2">
                <a href="{{route('police.profile')}}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="user"></i>
                <span>Profile</span>
                </a>
            </li>
            <li class="dropdown-item py-2">
                <a href="{{route('police.change.password')}}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="edit"></i>
                <span>Change Password</span>
                </a>
            </li>

            <li class="dropdown-item py-2">
                <a href="{{route('police.logout')}}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="log-out"></i>
                <span>Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</li>
</ul>


        </div>
        </nav>