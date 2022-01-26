@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @if (session()->has('success'))
        <div class="alert alert-dismissible fade show alert-success" role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Manage Profile</h2>
            </div>
            <div class="card-body">
                <form action="{{route('user.profile.update')}}" method="post" class="form-pill" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="form-group">
                        @if(Auth::user()->profile_photo_path != null)
                            <img style="width:80px;height:80px" src="{{asset(Auth::user()->profile_photo_path)}}" alt="{{Auth::user()->name}}" class="img img-thumbnail rounded">
                            <br>
                        @endif
                        <label for="image">Profile Photo</label>
                        <input type="file" id="image" name="image" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{Auth::user()->name}}" required>
                        @error('name')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{Auth::user()->email}}" required>
                        @error('email')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
