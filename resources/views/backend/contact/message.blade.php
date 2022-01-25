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
                <h2>All Messages</h2>
            </div>
            <div class="card-body">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Name</th>
                            <th width="15%">Email</th>
                            <th width="15%">Subject</th>
                            <th width="25%">Messages</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $key => $message)
                        <tr>
                            <td scope="row">{{$key+1}}</td>
                            <td>{{$message->name}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->subject}}</td>
                            <td>{{$message->message}}</td>
                            <td>
                                <a href="{{route('admin.contect.message.delete',$message->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">Messages data not found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
