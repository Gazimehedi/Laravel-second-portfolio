@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Service</h2>
            </div>
            <div class="card-body">
                <form action="{{route('admin.service.insert')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="icon">Service Icon (icofont class)</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="example 'bx bx-layer'">
                        @error('icon')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Service Title</label>
                        <input type="text" class="form-control" id="name" name="title" placeholder="Enter Service Title">
                        @error('title')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Service Description</label>
                        <textarea class="form-control" id="desc" rows="3" name="description"></textarea>
                    </div>
                    @error('description')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
