@extends('layouts.master') @section('content')
<div class="row">
          <div class="col-12">
          @if(session('message'))
              <div class="alert alert-danger alert-dismissible">
                  {{ session('message') }}
              </div>
            @endif
            <div class="card">
              <div class="card-header bg-danger">
                <h3 class="card-title">List of Not Return Books</h3>
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
                      <th>Report On</th>
                      <th>Fines</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($notReturnBook as $data)
                    <tr>
                      <td hidden="">{{$data->id}}</td>
                      <td>{{$data->book_id}}</td>
                      <td>{{$data->title}}</td>
                      <td>{{$data->author}}</td>
                      <td>{{$data->qty}}</td>
                      <td>{{$data->student_id}}</td>
                      <td>{{$data->fullname}}</td>
                      <td>{{Carbon\Carbon::parse($data->issue_date)->format('M d Y')}}</td>
                      <td>{{Carbon\Carbon::parse($data->return_date)->format('M d Y')}}</td>
                      <td>{{Carbon\Carbon::parse($data->report_on)->format('M d Y')}}</td>
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