@extends('master.layouts.main')
@section('content')
<div class="container mt-5">
<div class="row">
        <h3 class="text-center">User Requests</h3>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Department</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($users->count() == 0)
                <tr>
                    <td colspan="6" class="text-center">No user requests found</td>
                </tr>
                @endif
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->emp_id}}</td>
                    <td>{{$user->department->name}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a href="{{route('master.userrequests.accept',$user->id)}}" class="btn btn-success">Accept</a>
                        <a href="{{route('master.userrequests.reject',$user->id)}}" class="btn btn-danger">Reject</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </div>
</div>
@endsection