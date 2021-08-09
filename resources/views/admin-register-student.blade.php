@extends('layouts.master') @section('content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Register Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="bookid">Student ID:</label>
                    <input type="text" class="form-control" id="bookid" placeholder="Enter Book ID">
                  </div>
                  <div class="form-group">
                    <label for="issueto">Name Of Student:</label>
                    <input type="text" class="form-control" id="issueto" placeholder="ex: John B. Doe">
                  </div>
                  <div class="form-group">
                    <label for="return">Gender:</label>
                    <input type="text" class="form-control" id="issueto" placeholder="ex: Male">
                  </div>
                  <div class="form-group">
                    <label for="borrowed">Grade & Section:</label>
                    <input type="text" class="form-control" id="return" placeholder="ex: 8 - Peace">
                  </div>
                  <div class="form-group">
                    <label for="borrowed">Phone Number:</label>
                    <input type="text" class="form-control" id="return" placeholder="ex: 09120293837">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  
                  <button type="submit" class="btn btn-primary">Add Student</button>
                </div>
              </form>
            </div>


</div>

@endsection