@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-8">
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
                <h2>Manage Contact Profile</h2>
            </div>
            <div class="card-body">
                <form action="{{route('admin.contact.profileupdate')}}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="address">Contact Address</label>
                        <textarea class="form-control" id="address" rows="3" name="address">@if(isset($contact->address)){{$contact->address}}@endif</textarea>
                        @error('address')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Contact Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Contact email" value="@if(isset($contact->email)){{$contact->email}}@endif">
                        @error('email')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Contact Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Contact phone" value="@if(isset($contact->phone)){{$contact->phone}}@endif">
                        <input type="hidden" name="id" value="@if(isset($contact->id)){{$contact->id}}@endif">
                        @error('phone')
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
