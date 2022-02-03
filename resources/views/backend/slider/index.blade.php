@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>All Slider</h2> &nbsp;<a class="btn btn-primary btn-sm" href="{{route('admin.slider.create')}}">add new</a>
            </div>
            <div class="card-body">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Slider Image</th>
                            <th width="10%">Slider Title</th>
                            <th width="25%">Slider Description</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $key => $slider)
                        <tr>
                            <td scope="row">{{$key+1}}</td>
                            <td>
                                <img src="{{asset($slider->image)}}" class="img-thumbnail" style="width:150px;">
                            </td>
                            <td>{{$slider->title}}</td>
                            <td>{{$slider->description}}</td>
                            <td>
                                <a href="{{route('admin.slider.edit',$slider->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('admin.slider.delete',$slider->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">Slider data not found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
