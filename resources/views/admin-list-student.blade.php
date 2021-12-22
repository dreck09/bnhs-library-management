@extends('layouts.master') @section('content')


<div class="row">
    @if(session('message'))
      <div class="alert alert-success alert-dismissible">
          {{ session('message') }}
      </div>
    @endif
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-primary">
              <h3 class="card-title">List of Students</h3>
              <a href="{{ route('register.student') }}" class="btn btn-success float-right"><i class="fas fa-user-plus"></i> Add Student</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th hidden="">No.</th>
                    <th>Student ID</th>
                    <th>Name Of Student</th>
                    <th>Gender</th>
                    <th>Grade & Section</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($student as $data)
                  <tr>
                    <td hidden="">{{$data->id}}</td>
                    <td>{{$data->student_id}}</td>
                    <td>{{$data->fullname}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->grade_section}}</td>
                    <td>{{$data->cpnumber}}</td>
                    <td>
                    
                    <form action="{{route('student.archive', $data->id)}}" method="post">
                      @csrf
                      @method('PUT')
                        <button type="submit" class="btn btn-primary .btn-sm">
                          <i class="fas fa-archive"></i>
                        </button>
                        
                        <a href="{{route('student.edit',$data->id)}}" class="btn btn-success .btn-sm">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                      </form>
                    </td>
                    @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>


@endsection