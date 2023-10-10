@extends('manager.layouts.main')
@section('content')
<div class="container mt-5">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Reason of Rejection</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="display: flex;align-items:center;justify-content:center;font-size:larger">X</button>
        </div>
        <div class="modal-body">
          <form action="{{route('manager.expanse.reject')}}" method="POST">
            <input type="hidden" name="id" id="editid">
            @csrf
           <!-- text area -->
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Reason</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comments"></textarea>
                </div>

            <div class="demo-inline-spacing">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="Submit" class="btn btn-primary" >Reject</button>
        </div>
        </form>
      </div>
    </div>
  </div>
    <div class="row">
        <h3 class="text-center">Expanses List</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name of Staff</th>
                    <th scope="col">Name of Expanse</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($expanses->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">No expanses found</td>
                </tr>
                @endif
                @foreach($expanses as $expanse)
                <tr>
                    <input type="hidden" value="{{$expanse->id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$expanse->staff_name}}</td>
                    <td>{{$expanse->name}}</td>
                    <td>{{$expanse->amount}}</td>
                     <!-- Accept or reject  -->
                    <td>
                        <!-- make a to accept or reject -->
                        <a href="{{route('manager.expanse.accept', $expanse->id)}}" class="btn btn-success btn-sm">Accept</a>
                        <!-- popup modal -->
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Reject</button>
                        <!-- download -->
                        <a href="{{route('manager.expanse.download', $expanse->file)}}" class="btn btn-success btn-sm">Download</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btn-danger').click(function() {
            var id = $(this).closest('tr').find('input').val();
            $('#editid').val(id);
        });
    });
</script>
@endsection