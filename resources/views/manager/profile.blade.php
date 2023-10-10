@extends('manager.layouts.main')
@section('content')
<div class="container mt-4">
    <h3>Profile Menu</h3>
    <div class="row">
    <form action="{{route('manager.profile')}}" method="POST" class="container my-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Department</label>
                <select class="form-select" name="department_id" aria-label="Default select example">
                    @foreach($departments as $department)
                    @if($department->id == Auth()->user()->department_id)
                    <option value="{{$department->id}}" selected>{{$department->name}}</option>
                    @else
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
           
                
           
        </form>
    </div>
</div>
@endsection