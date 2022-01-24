@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-12">
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
                <h2>All Service</h2> &nbsp;<a class="btn btn-primary btn-sm" href="{{route('admin.service.create')}}">add new</a>
            </div>
            <div class="card-body">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Service Icon</th>
                            <th width="10%">Service Title</th>
                            <th width="25%">Service Description</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $key => $service)
                        <tr>
                            <td scope="row">{{$key+1}}</td>
                            <td style="font-size: 30px;font-weight:bold;"><i class="{{$service->icon}}"></i></td>
                            <td>{{$service->title}}</td>
                            <td>{{$service->description}}</td>
                            <td>
                                <a href="{{route('admin.service.edit',$service->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('admin.service.delete',$service->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">Service data not found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
