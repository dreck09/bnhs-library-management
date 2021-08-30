@extends('layouts.master') @section('content')
<div class="row">
          <div class="col-12">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('message') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">List of Barrow Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th hidden="">No.</th>
                      <th>Book-ID</th>
                      <th>Title</th>
                      <th>Authhor</th>
                      <th>Quantity</th>
                      <th>Student ID</th>
                      <th>Student Name</th>
                      <th>IssueDate</th>
                      <th>Due Date</th>
                      <th>Return or Not</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($issue_books as $data)
                    <tr>
                      <td hidden="">{{$data->id}}</td>
                      <td>{{$data->book_id}}</td>
                      <td>{{$data->title}}</td>
                      <td>{{$data->author}}</td>
                      <td>{{$data->qty}}</td>
                      <td>{{$data->student_id}}</td>
                      <td>{{$data->fullname}}</td>
                      <td>{{$data->issue_date}}</td>
                      <td>{{$data->return_date}}</td>
                      <td>
                          <a class="btn btn-success"
                            type="button" 
                            issue-id="{{$data->id}}" 
                            return-on="{{$data->return_date}}" 
                            input-qty="{{$data->qty}}" 
                            class="btn btn-primary returnBtn" 
                            data-toggle="modal" 
                            data-target="#returnModal">
                            <i class="fas fa-undo-alt"></i>
                          </a>

                          <a class="btn btn-danger" 
                            type="button" 
                            issue-id="{{$data->id}}" 
                            return-on="{{$data->return_date}}" 
                            input-qty="{{$data->qty}}"
                            data-toggle="modal" 
                            data-target="#notReturnModal">
                            <i class="fas fa-exclamation-triangle"></i>
                          </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- Modal RETURN BOOK -->
        <div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Return Book Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="{{route('add.return.book')}}" method="post" id="returnForm">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="due">Due On</label>
                    <input type="text" id="due" readonly="" class="form-control" name="dueOn" required="">
                  </div>
                  <input hidden="" id="issueId" name="issueId">
                  <div class="form-group">
                    <label for="return">Return On</label>
                    <input type="date" class="form-control" id="today" onchange="diffDate()" name="returnOn" required="">
                    <div class="text-warning" id="dateResult"></div>
                    @error('return_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                      <label for="InputQuantity">Quantity</label>
                      <input type="number" name="inputQty" class="form-control" id="InputQuantity" placeholder="Enter Quantity" required="">
                      @error('quantity')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="InputNFines">Fines</label>
                      <input type="number" name="fines" class="form-control" id="InputNFines" placeholder="Enter Fines" required="">
                      @error('author')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  
                  <div class="form-group">
                      <label for="InputNRemarks">Remarks</label>
                      <textarea type="text" name="remarks" class="form-control" id="InputNRemarks" placeholder="Enter Fines" required=""></textarea>
                      @error('author')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal NOT RETURN BOOK -->
        <div class="modal fade" id="notReturnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Not Return Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="{{route('add.not-return.book')}}" method="post" id="notReturnForm">
                @csrf            
                <div class="card-body">
                  <input hidden="" id="issueId" name="issueId">
                  <div class="form-group">
                    <label for="reportOn">Report On</label>
                    <input type="date" class="form-control" name="reportOn" required="">
                    @error('return_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                      <label for="input_qty">Quantity</label>
                      <input type="number" name="input_qty" class="form-control" id="input_qty" placeholder="Enter Quantity" required="">
                      @error('quantity')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="input_fines">Fines</label>
                      <input type="text" name="input_fines" class="form-control" id="input_fines" placeholder="Enter Fines">
                      @error('author')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  
                  <div class="form-group">
                      <label for="input_remarks">Remarks</label>
                      <textarea type="text" name="input_remarks" class="form-control" id="input_remarks" placeholder="Enter Remarks"></textarea>
                      @error('author')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('scripts')
<!-- <script>
  $(document).ready(function(){
    $('.returnBtn').on('click',function (){
        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();

        console.log(data);

        $('#issue_id').val(data[0]);
        $('#return').val(data[1]);
        $('#InputQuantity').val(data[2]);
    });
  });
</script> -->
@endsection