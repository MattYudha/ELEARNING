@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Profile</h3>
    </div>
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="form-group">
                <label>Current Avatar</label>
                <div class="mb-2">
                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="img-circle elevation-2" style="width: 100px; height: 100px; object-fit: cover;">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" alt="Avatar" class="img-circle elevation-2" style="width: 100px; height: 100px;">
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="avatar">Upload New Avatar</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="avatar" name="avatar">
                        <label class="custom-file-label" for="avatar">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ $user->nm_user ?? $user->name }}" required>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Custom file input label update
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endpush
