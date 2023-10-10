@extends('master.layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <hr>
            <!-- if session has success -->
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{session()->get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <!-- list all the errors -->
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Errors!</strong>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h2 class="text-center">Create new Department</h2>
            <form action="{{route('master.departments.store')}}" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Department Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Department Name">
                </div>
                <!-- submit btn -->
                @csrf
                <div class="text-center">
                    <button type="submit" class="btn btn-primary text-center">Create Now</button>
                </div>

                <hr>
            </form>
        </div>
    </div>

    <div class="row">
        <h3 class="text-center">Departments List</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($departments) == 0)
                <tr>
                    <td colspan="3" class="text-center">No Departments Found</td>
                </tr>
                @endif
                @foreach($departments as $department)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$department->name}}</td>
                    <td>
                        <a href="{{route('master.departments.delete', $department->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </div>
</div>
@endsection