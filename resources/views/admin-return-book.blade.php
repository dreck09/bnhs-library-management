@extends('layouts.master') @section('content')
<div class="row">
          <div class="col-12">
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
                      <th>Student ID</th>
                      <th>Student Name</th>
                      <th>IssueDate</th>
                      <th>Due Date</th>
                      <th>ReturnOn</th>
                      <th>Fine</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($book_data as $d1)
                    @foreach($student_data as $d2)
                    @foreach($issue_books as $d3)
                    <tr>
                      <td>{{$d1->book_id}}</td>
                      <td>{{$d1->title}}</td>
                      <td>{{$d1->author}}</td>
                      <td>{{$d2->student_id}}</td>
                      <td>{{$d2->fullname}}</td>
                      <td>{{$d3->issue_date}}</td>
                      <td>{{$d3->return_date}}</td>
                      <td>{{$timeNow->toDateTimeString()}}</td>
                      <td><select name="" id=""></select></td>
                      <td><Button class="btn btn-success">Return</Button></td>
                    </tr>
                    @endforeach
                    @endforeach
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