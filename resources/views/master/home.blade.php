@extends('master.layouts.main')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <!-- make simple dashboard to show expanses approved and waiting to be approved -->
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Dashboard</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h5>Total Departments</h5>
                            <h1>{{$departments}}</h1>
                        </div>
                        <div class="col-md-6 text-center">
                            <h5>Total HOD</h5>
                            <h1>{{$hods}}</h1>
                        </div>
                        <div class="col-md-6 text-center">
                            <h5>Total Managers</h5>
                            <h1>{{$managers}}</h1>
                        </div>
                        <div class="col-md-6 text-center">
                            <h5>Total Staff</h5>
                            <h1>{{$staffs}}</h1>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection