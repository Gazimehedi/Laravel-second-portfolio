@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Slider</h2>
            </div>
            <div class="card-body">
                <form action="{{route('admin.slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Slider Title</label>
                        <input type="text" class="form-control" id="name" name="title" placeholder="Enter Slider Title" value="{{$slider->title}}">
                        @error('title')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Slider Description</label>
                        <textarea class="form-control" id="desc" rows="3" name="description">{{$slider->description}}</textarea>
                    </div>
                    @error('description')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    <div class="form-group">
                        <img src="{{asset($slider->image)}}" class="img-fluid"><br><br>
                        <label for="image">Slider Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                        @error('image')
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
