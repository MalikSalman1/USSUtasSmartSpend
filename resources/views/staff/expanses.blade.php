@extends('staff.layouts.main')
@section('content')
<div class="container">

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Reason of Rejection</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="display: flex;align-items:center;justify-content:center;font-size:larger">X</button>
        </div>
        <div class="modal-body">
          
           
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Reason</label>
                <textarea class="form-control" id="comments" rows="3" name="comments" disabled></textarea>
                </div>

            <div class="demo-inline-spacing">
            </div>

        </div>
        
      
      </div>
    </div>
  </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Expanse</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="display: flex;align-items:center;justify-content:center;font-size:larger">X</button>
        </div>
        <div class="modal-body">
          <form action="{{route('staff.expanse.update')}}" method="POST">
            <input type="hidden" name="id" id="editid">
            @csrf
            <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="editname" name="name" placeholder="Enter name of Expanse">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="editamount" name="amount" placeholder="Enter amount of Expanse">
                </div>
            <div class="demo-inline-spacing">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="Submit" class="btn btn-primary" >Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>


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
            <h2 class="text-center">Create new Expanses</h2>
            <form action="{{route('staff.expanse.store')}}" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Enter name of Expanse">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input required type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount of Expanse">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <input required type="file" class="form-control" id="file" name="file">
                </div>
                @csrf
                <div class="text-center">
                    <button type="submit" class="btn btn-primary text-center">Create Now</button>
                </div>

                <hr>
            </form>
        </div>
    </div>

    <div class="row">
        <h3 class="text-center">Expanses List</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Expanse Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expanses as $expanse)
                <tr>
                    <input type="hidden" value="{{$expanse->id}}">
                    <input type="hidden" value="{{$expanse->comments}}">
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$expanse->name}}</td>
                    <td>{{$expanse->amount}}</td>
                    <td>
                        @if($expanse->status == 0)
                        <span class="badge bg-danger">Rejected</span>
                        @elseif($expanse->status == 1)
                        <span class="badge bg-success">Accepted</span>
                        @else
                        <span class="badge bg-warning">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if($expanse->status == 0)
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal2">Rejection Reason</button>
                        @endif
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                        <a href="{{route('staff.expanse.delete', $expanse->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        <a href="{{route('staff.expanse.download', $expanse->file)}}" class="btn btn-success btn-sm">Download</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </div>
</div>
<script>
    $(document).ready(function() {
        // edit modal
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.closest('tr').find('input').val();
            var name = button.closest('tr').find('td').eq(0).text();
            var amount = button.closest('tr').find('td').eq(1).text();
            var modal = $(this)
            modal.find('.modal-title').text('Edit Expanse')
            modal.find('.modal-body #editid').val(id)
            modal.find('.modal-body #editname').val(name)
            modal.find('.modal-body #editamount').val(amount)
        })
    });
    $(document).ready(function(){
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var comments = button.closest('tr').find('input').eq(1).val();
            var modal = $(this)
            modal.find('.modal-body #comments').val(comments)
        })
    });
</script>
@endsection