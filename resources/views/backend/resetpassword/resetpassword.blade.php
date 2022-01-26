@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @if (session()->has('warning'))
        <div class="alert alert-dismissible fade show alert-danger" role="alert">
            {{session('warning')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Change Password</h2>
            </div>
            <div class="card-body">
                <form action="{{route('user.password.update')}}" method="post" class="form-pill">@csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="current password" required>
                        @error('current_password')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="new password" required>
                        @error('password')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="confirm password" required>
                        @error('password_confirmation')
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
