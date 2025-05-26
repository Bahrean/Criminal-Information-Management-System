@extends('investigator.investigator_dashboard')
@section('investigator')

<style>
    .form-label{
        color:white;
        font-weight:bold;
        font-size:15px;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content" style="margin-top:28px;">

<div class="row profile-body">
  <!-- left wrapper start -->

  <!-- left wrapper end -->
  <!-- middle wrapper start -->
  <div class="col-md-10 col-xl-10 middle-wrapper">
    <div class="row">
    <div class="card">
    <div class="card-body">
    <h4 class="card-title text-success mb-4" style="font-size: 1.75rem; font-weight: 600;">
        <i class="fas fa-user-plus me-2"></i>Send Investigation Report to Investigator Leader
    </h4>

    <form class="forms-sample" method="POST" action="{{route('investigator.sentinvestigationreporttoleader')}}" enctype='multipart/form-data' novalidate>
        @csrf
        <div class="row g-4">
            <!-- Error Summary -->
            @if($errors->any())
            <div class="col-12">
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <!-- Left Column -->
            <div class="col-md-8">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" 
                        id="full_name" name="full_name" placeholder=" " value="{{ old('full_name') }}" autofocus>
                    <label for="full_name"><i class="fas fa-user me-2"></i>Full Name</label>
                    @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="age" class="form-control @error('age') is-invalid @enderror" 
                           id="age" name="age" placeholder=" " value="{{ old('age') }}">
                    <label for="age"><i class="fas fa-envelope me-2"></i>Age</label>
                    @error('age')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-venus-mars me-2"></i>Gender</label>
                    <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                        <option value="" selected disabled>Select Gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-camera me-2"></i>Suspect Photo</label>
                    <div class="custom-file">
                        <input type="file" class="form-control @error('personal_photo') is-invalid @enderror" 
                               id="personal_photo" name="personal_photo" accept="image/*">
                        <label class="custom-file-label" for="personal_photo">Choose file</label>
                        @error('personal_photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <small class="form-text text-muted">Max size: 2MB (JPEG, PNG)</small>
                </div>



                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('interview') is-invalid @enderror" 
                           id="interview" name="interview" placeholder=" " value="{{ old('interview') }}">
                    <label for="interview"><i class="fas fa-at me-2"></i>Interview</label>
                    @error('interview')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-camera me-2"></i>DNA Evidence</label>
                    <div class="custom-file">
                        <input type="file" class="form-control @error('dna_evidence') is-invalid @enderror" 
                               id="dna_evidence" name="dna_evidence" accept="image/*">
                        <label class="custom-file-label" for="dna_evidence">Choose file</label>
                        @error('dna_evidence')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <small class="form-text text-muted">Max size: 2MB (JPEG, PNG)</small>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-camera me-2"></i>Forensic Evidence</label>
                    <div class="custom-file">
                        <input type="file" class="form-control @error('forensic_evidence') is-invalid @enderror" 
                               id="forensic_evidence" name="forensic_evidence" accept="image/*">
                        <label class="custom-file-label" for="forensic_evidence">Choose file</label>
                        @error('forensic_evidence')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <small class="form-text text-muted">Max size: 2MB (JPEG, PNG)</small>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-camera me-2"></i>Clinical Report</label>
                    <div class="custom-file">
                        <input type="file" class="form-control @error('clinical_report') is-invalid @enderror" 
                               id="clinical_report" name="clinical_report" accept="image/*">
                        <label class="custom-file-label" for="clinical_report">Choose file</label>
                        @error('clinical_report')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <small class="form-text text-muted">Max size: 2MB (JPEG, PNG)</small>
                </div>






            </div>

            <!-- Right Column -->
    
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button type="submit" class="btn btn-success btn-lg px-4">
                <i class="fas fa-user-plus me-2"></i>Send To Investigator Leader
            </button>
        </div>
    </form>
</div>

<script>


    // Dynamic Department Update


    // Password Toggle
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.querySelector('#password + button i');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }

    // File Input Label Update
    document.getElementById('photo').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'Choose file';
        document.querySelector('.custom-file-label').textContent = fileName;
    });
</script>

<style>
    .form-floating label {
        padding-left: 2.5rem;
    }
    .form-floating i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }
    .custom-file-label {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .btn-success {
        background: linear-gradient(135deg, #28a745 0%, #218838 100%);
        transition: transform 0.2s;
    }
    .btn-success:hover {
        transform: translateY(-2px);
    }
</style>
    
    </div>
  </div>
  <!-- middle wrapper end -->
  <!-- right wrapper start -->

  <!-- right wrapper end -->
</div>

    </div>


@endsection