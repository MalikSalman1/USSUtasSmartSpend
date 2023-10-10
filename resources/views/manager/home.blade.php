@extends('manager.layouts.main')
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
                            <h5>Total Staff</h5>
                            <h1>{{$total_staff}}</h1>
                        </div>
                        <div class="col-md-6 text-center">
                            <h5>Total Pending Requests</h5>
                            <h1>{{$unapproved}}</h1>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection