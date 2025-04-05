@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="row profile-body">
        <!-- Middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Post</h6>

                        <form class="forms-sample" method="POST" action="{{ route('admin.updatepost') }}" enctype="multipart/form-data">
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

@endsection
