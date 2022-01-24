@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Portfolio</h2>
            </div>
            <div class="card-body">
                <form action="{{route('admin.portfolio.insert')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="name">Portfolio Title</label>
                        <input type="text" class="form-control" id="name" name="title" placeholder="Enter Portfolio Title" value="{{old('title')}}">
                        @error('title')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Portfolio Description</label>
                        <textarea class="form-control" id="desc" rows="3" name="description">{{old('description')}}</textarea>
                    </div>
                    @error('description')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    <div class="form-group">
                        <label for="image">Portfolio Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                        @error('image')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="client">Client</label>
                        <input type="text" class="form-control" id="client" name="client" placeholder="Enter Client" value="{{old('client')}}">
                        @error('client')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category" value="{{old('category')}}">
                        @error('category')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="project_url">Project Url</label>
                        <input type="text" class="form-control" id="project_url" name="project_url" placeholder="Enter Project Url" value="{{old('project_url')}}">
                        @error('project_url')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="project_date">Project Date</label>
                        <input type="date" class="form-control" id="project_date" name="project_date" placeholder="Enter Project Date" value="{{old('project_date')}}">
                        @error('project_date')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="project_type" >Show In</label>
                        <select name="project_type" id="project_type" class="form-control">
                            <option value="">Select Option</option>
                            <option value="app">App</option>
                            <option value="card">Card</option>
                            <option value="web">Web</option>
                        </select>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
