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
          <h3 class="card-title">Register Student</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('student.add')}}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="sid">Student ID:</label>
              <input type="text" name="student_id" class="form-control" id="sid" placeholder="Enter Student ID">
              @error('student_id')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="name">Name Of Student:</label>
              <input type="text" name="fullname" class="form-control" id="name" placeholder="ex: John B. Doe">
              @error('fullname')
                <div class="text-danger">{{ $message }}</div>
              @enderror  
            </div>
            <div class="form-group">
              <label for="gender">Gender:</label>
              <select class="form-control" name="gender" id="gender">
                <option value="">---Select Gender---</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              @error('gender')
                <div class="text-danger">{{ $message }}</div>
              @enderror 
            </div>
            <div class="form-group">
              <label for="grade">Grade & Section:</label>
              <input type="text" name="grade_section" class="form-control" id="grade" placeholder="ex: 8 - Peace">
              @error('grade_section')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="no">Phone Number:</label>
              <input type="text" name="cpnumber" class="form-control" id="no" maxlength="11" placeholder="ex: 09120293837">
              @error('cpnumber')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="address">Address: ( House no./Street/Brgy/Town/City )</label>
              <input type="text" name="address" class="form-control" id="address" maxlength="11" placeholder="Enter Address">
              @error('cpnumber')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <a href="{{ route('student.list') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
          </div>
        </form>
      </div>
  </div>
</div>

@endsection