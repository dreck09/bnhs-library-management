@extends('layouts.master') @section('content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Issue Books</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="bookid">Book ID:</label>
                    <input type="text" class="form-control" id="bookid" placeholder="Enter Book ID">
                  </div>
                  <div class="form-group">
                    <label for="issueto">Issue To:</label>
                    <input type="text" class="form-control" id="issueto" placeholder="Enter Student ID">
                  </div>
                  <div class="form-group">
                    <label for="return">Date Of Return:</label>
                    <input type="date" class="form-control" id="return" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="borrowed">Borrowed Date:</label>
                    <input type="date" class="form-control" id="return" placeholder="">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  
                  <button type="submit" class="btn btn-success">Issue</button>
                </div>
              </form>
            </div>
</div>
</div>
</div>

@endsection