@extends('layouts.master') 
@section('content')

<div class="row">
  <div class="col-12">
  @if(session('message'))
    <div class="alert alert-success alert-dismissible">
        {{ session('message') }}
    </div>
  @endif
    <div class="card">
      <div class="card-header bg-primary">
        <h3 class="card-title">List of Students</h3>
        <a href="#" id="deleteAllSelectedStud" class="btn btn-danger float-right">Delete Seleted Books</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th hidden="">No.</th>
              <th><input type="checkbox" id="checkAllStudent"/>&nbsp;Selection</th>
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
              <tr id="sid{{$data->id}}">
              <td hidden="">{{$data->id}}</td>
              <td><input type="checkbox" name="id" class="classCheckboxStud" value="{{$data->id}}"/>&nbsp;</td>
              <td>{{$data->student_id}}</td>
              <td>{{$data->fullname}}</td>
              <td>{{$data->gender}}</td>
              <td>{{$data->grade_section}}</td>
              <td>{{$data->cpnumber}}</td>
              <td>
              
              <form action="{{route('student.destroy', $data->id)}}" method="post">
                @csrf
                @method('DELETE')
                  <button type="submit" class="btn btn-danger .btn-sm">
                      <i class="fas fa-trash"></i>
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