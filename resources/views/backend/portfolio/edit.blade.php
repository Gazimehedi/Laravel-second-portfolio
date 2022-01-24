@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Portfolio</h2>
            </div>
            <div class="card-body">
                <form action="{{route('admin.portfolio.update',$portfolio->id)}}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Portfolio Title</label>
                        <input type="text" class="form-control" id="name" name="title" placeholder="Enter Portfolio Title" value="{{$portfolio->title}}">
                        @error('title')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Portfolio Description</label>
                        <textarea class="form-control" id="desc" rows="3" name="description">{{$portfolio->description}}</textarea>
                    </div>
                    @error('description')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    <div class="form-group">
                        <img src="{{asset($portfolio->image)}}" class="img-fluid" style="height: 200px;">
                        <br>
                        <label for="image">Portfolio Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                        @error('image')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="client">Client</label>
                        <input type="text" class="form-control" id="client" name="client" placeholder="Enter Client" value="{{$portfolio->client}}">
                        @error('client')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category" value="{{$portfolio->category}}">
                        @error('category')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="project_url">Project Url</label>
                        <input type="text" class="form-control" id="project_url" name="project_url" placeholder="Enter Project Url" value="{{$portfolio->project_url}}">
                        @error('project_url')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="project_date">Project Date</label>
                        <input type="date" class="form-control" id="project_date" name="project_date" placeholder="Enter Project Date" value="{{$portfolio->project_date}}">
                        @error('project_date')
                            <span class="mt-2 d-block text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="project_type" >Show In</label>
                        <select name="project_type" id="project_type" class="form-control">
                            <option value="">Select Option</option>
                            <option value="app" {{$portfolio->project_type == 'app'?'selected':''}}>App</option>
                            <option value="card" {{$portfolio->project_type == 'card'?'selected':''}}>Card</option>
                            <option value="web" {{$portfolio->project_type == 'web'?'selected':''}}>Web</option>
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
