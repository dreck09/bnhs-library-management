@extends('layouts.master') @section('content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Return Books</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                <div class="form-group">
                    <label for="bookid">Book ID:</label>
                    <input type="text" class="form-control" id="bookid" placeholder="Enter Book Title">
                  </div>
                  <div class="form-group">
                    <label for="booktitle">Book Title:</label>
                    <input type="text" class="form-control" id="booktitle" placeholder="Enter Book Title">
                  </div>
                  <div class="form-group">
                    <label for="bookauthor">Book Author:</label>
                    <input type="text" class="form-control" id="bookauthor" placeholder="Enter Book Author">
                  </div>
                  <div class="form-group">
                    <label for="issuedate">Issue Date:</label>
                    <input type="date" class="form-control" id="bookid" placeholder="Enter Date Issue">
                  </div>
                  <div class="form-group">
                    <label for="returnon">Return on:</label>
                    <input type="date" class="form-control" id="returno" placeholder="Enter Return on">
                  </div>

                  <div class="form-group">
                    <label for="studentname">Student Name <label>
                    <input type="text" class="form-control" id="studentname" placeholder="Ex: Cheska I. Gonzales">
                  </div>
                  
                  <div class="form-group">
                    <label for="studentname">Due Date <label>
                    <input type="date" class="form-control" id="returno" placeholder="Ex: Cheska I. Gonzales">
                  </div>
                  <div class="form-group">
                    <label for="studentidno">Student ID No. <label>
                    <input type="text" class="form-control" id="studentidno" placeholder="Enter Student Number">
                  </div>
                  <div class="form-group">
                    <label for="fine">Fine <label>
                    <input type="text" class="form-control" id="fine" placeholder="Enter Fine">
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Exit</button>
                  <button type="submit" class="btn btn-success">Return Book</button>
                </div>
              </form>
            </div>

@endsection