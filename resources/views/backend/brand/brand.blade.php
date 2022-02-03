@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>All Brands</h2>
            </div>
            <div class="card-body">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Brand Image</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $key => $brand)
                        <tr>
                            <td scope="row">{{$key+1}}</td>
                            <td>
                                <img src="{{asset($brand->image)}}" class="img-thumbnail" style="height:35px;">
                            </td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('admin.brand.edit',$brand->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('admin.brand.delete',$brand->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">Brand data not found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{$brands->links()}}
    </div>
    <div class="col-lg-4">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Brand</h2>
            </div>
            <div class="card-body">
                <form action="{{route('admin.brand.create')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="name">Brand Name</label>
                        <input type="name" class="form-control" id="name" name="name" placeholder="Enter Brand Name">
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
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                        <button type="reset" class="btn btn-secondary btn-default">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
