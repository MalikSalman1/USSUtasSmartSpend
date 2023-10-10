@extends('staff.layouts.main')
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
                            <h5>Approved Expanses</h5>
                            <h1>{{$approved_expanses}}</h1>
                        </div>
                        <div class="col-md-6 text-center">
                            <h5>Waiting Expanses</h5>
                            <h1>{{$waiting_expanses}}</h1>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection