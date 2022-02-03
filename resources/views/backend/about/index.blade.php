@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Manage About</h2>
            </div>
            <div class="card-body">
                <form action="{{route('admin.about.update')}}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">About Title</label>
                        <input type="text" class="form-control" id="name" name="title" placeholder="Enter About Title" value="@if(isset($about->title)){{$about->title}}@endif">
                        <input type="hidden" name="id" value="@if(isset($about->id)){{$about->id}}@endif">
                        @error('title')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Sort Description</label>
                        <textarea class="form-control" id="desc" rows="3" name="sort_desc">@if(isset($about->sort_desc)){{$about->sort_desc}}@endif</textarea>
                    </div>
                    @error('description')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="desc">Long Description</label>
                        <textarea class="form-control" id="desc" rows="3" name="long_desc">@if(isset($about->long_desc)){{$about->long_desc}}@endif</textarea>
                    </div>
                    @error('description')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
