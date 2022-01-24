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
                <h2>All Portfolio</h2> &nbsp;<a class="btn btn-primary btn-sm" href="{{route('admin.portfolio.create')}}">add new</a>
            </div>
            <div class="card-body">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="12%">Portfolio Image</th>
                            <th width="25%">Portfolio Title</th>
                            <th width="10%">Project Date</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($portfolios as $key => $portfolio)
                        <tr>
                            <td scope="row">{{$key+1}}</td>
                            <td>
                                <img src="{{asset($portfolio->image)}}" class="img-thumbnail" style="width:170px;">
                            </td>
                            <td>{{$portfolio->title}}</td>
                            {{-- date('d-M-Y', strtotime($portfolio->project_date)) --}}
                            <td>{{\Carbon\Carbon::parse($portfolio->project_date)->format('d-M-Y')}}</td>
                            <td>
                                <a href="{{route('admin.portfolio.edit',$portfolio->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('admin.portfolio.delete',$portfolio->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">Portfolio data not found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
