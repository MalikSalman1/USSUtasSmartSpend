<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body >
    <div class="container mt-5">
        <!-- all errors -->
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Errors!</strong>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h2 class="text-center">SignUp - UTAS Smart Spend</h2>
        <form action="{{route('signup')}}" method="POST" class="container my-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="eg: John Abraham">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Employee Id</label>
                <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="eg: 123456">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Department</label>
                <select class="form-select" name="department_id" aria-label="Default select example">
                    <option selected disabled>Select Department</option>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Role</label>
                <select class="form-select" name="role" aria-label="Default select example">
                    <option selected disabled>Select Role</option>
                    <option value="staff">Staff</option>
                    <option value="manager">Manager</option>
                    <option value="hod">HOD</option>
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
                <a href="{{url('login')}}" class="btn btn-primary">Login</a>
            </div>
           
                
           
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>