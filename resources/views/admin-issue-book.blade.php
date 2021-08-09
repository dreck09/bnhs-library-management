@extends('layouts.master') @section('content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
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
                  
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Quit</button>
                  <button type="submit" class="btn btn-success">Issue</button>
                </div>
              </form>
            </div>

@endsection