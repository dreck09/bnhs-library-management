@extends('layouts.master') @section('content')
<div class="row">
          <div class="col-12">
          @if(session('message'))
              <div class="alert alert-success alert-dismissible">
                  {{ session('message') }}
              </div>
            @endif
            <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title">List of Returned Books</h3>
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
                      <th>Returned On</th>
                      <th>Fines</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($returnBook as $data)
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
                      <td>{{$data->return_on}}</td>
                      <td>{{$data->fines}}</td>
                      <td>{{$data->remarks}}</td>
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
@endsection