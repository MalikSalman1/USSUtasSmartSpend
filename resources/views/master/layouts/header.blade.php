<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">Loggedin: {{Auth()->user()->name}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('master.home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('master.departments')}}">Departments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('master.userrequests')}}">User Requests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('master.profile')}}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/logout')}}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<body >