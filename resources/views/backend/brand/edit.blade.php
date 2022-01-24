@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Brand</h2>
            </div>
            <div class="card-body">
                <form action="{{route('admin.brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Brand Name</label>
                        <input type="name" class="form-control" id="name" name="name" placeholder="Enter Brand Name" value="{{$brand->name}}">
                        @error('name')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Brand Logo</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                        @error('image')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <img src="{{asset($brand->image)}}" class="img-thumbnail" style="height: 80px">
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
