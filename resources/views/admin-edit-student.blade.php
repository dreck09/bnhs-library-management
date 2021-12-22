@extends('layouts.master') @section('content')

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    @if(session('message'))
      <div class="alert alert-success alert-dismissible">
          {{ session('message') }}
      </div>
    @endif
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Student</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{route('student.update', $student->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="bookid">Student ID:</label>
            <input type="text" name="student_id" class="form-control" id="bookid" placeholder="Enter Student ID" value="{{$student->student_id}}">
            @error('student_id')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="issueto">Name Of Student:</label>
            <input type="text" name="fullname" class="form-control" id="issueto" placeholder="ex: John B. Doe" value="{{$student->fullname}}">
            @error('fullname')
              <div class="text-danger">{{ $message }}</div>
            @enderror  
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Gender:</label>
            <select class="form-control" name="gender" value="{{$student->gender}}" id="exampleFormControlSelect1">
              <option value="">---Select Gender---</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            @error('gender')
              <div class="text-danger">{{ $message }}</div>
            @enderror 
          </div>
          <div class="form-group">
            <label for="borrowed">Grade & Section:</label>
            <input type="text" name="grade_section" class="form-control" id="return" placeholder="ex: 8 - Peace" value="{{$student->grade_section}}">
            @error('grade_section')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="borrowed">Phone Number:</label>
            <input type="text" name="cpnumber" class="form-control" id="return" placeholder="ex: 09120293837" value="{{$student->cpnumber}}">
            @error('cpnumber')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Update Student</button>
        </div>
      </form>
    </div>
</div>
</div>
@endsection