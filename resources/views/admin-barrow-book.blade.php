@extends('layouts.master') @section('content')
<div class="row">
          <div class="col-12">
          @if(session('message'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Barrow Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Book-ID</th>
                      <th>Title</th>
                      <th>Authhor</th>
                      <th>Quantity</th>
                      <th>Student ID</th>
                      <th>Student Name</th>
                      <th>IssueDate</th>
                      <th>Due Date</th>
                      <th>Return or Not</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($issue_books as $data)
                    <tr>
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
                            type="button" class="btn btn-primary" 
                            data-toggle="modal" data-target="#returnModal">
                            <i class="fas fa-undo-alt"></i></a>
                          <a class="btn btn-danger" 
                            type="button" data-toggle="modal" 
                            data-target="#notreturnModal">
                            <i class="fas fa-exclamation-triangle"></i></a>
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
        <!-- Modal1 -->
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
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="return">Return On:</label>
                    <input type="date" class="form-control" name="return_on" id="return" placeholder="">
                    @error('return_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                      <label for="InputAuthor">Quantity</label>
                      <input type="text" name="quantity" class="form-control" id="InputAuthor" placeholder="Enter Quantity">
                      @error('quantity')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="InputAuthor">Fines</label>
                      <input type="text" name="fines" class="form-control" id="InputAuthor" placeholder="Enter Author">
                      @error('author')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  
                  <div class="form-group">
                      <label for="InputAuthor">Remarks</label>
                      <textarea type="text" name="remarks" class="form-control" id="InputAuthor" placeholder="Enter Author"></textarea>
                      @error('author')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal2 -->
        <div class="modal fade" id="notreturnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Not Return Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="return">Return On:</label>
                    <input type="date" class="form-control" name="return_on" id="return" placeholder="">
                    @error('return_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                      <label for="InputAuthor">Quantity</label>
                      <input type="text" name="quantity" class="form-control" id="InputAuthor" placeholder="Enter Quantity">
                      @error('quantity')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="InputAuthor">Fines</label>
                      <input type="text" name="fines" class="form-control" id="InputAuthor" placeholder="Enter Author">
                      @error('author')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  
                  <div class="form-group">
                      <label for="InputAuthor">Remarks</label>
                      <textarea type="text" name="remarks" class="form-control" id="InputAuthor" placeholder="Enter Author"></textarea>
                      @error('author')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
@endsection