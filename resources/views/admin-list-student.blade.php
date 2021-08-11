@extends('layouts.master') @section('content')


<div class="container">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Students</h3>

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
                      <th>Student ID</th>
                      <th>Name Of Student</th>
                      <th>Gender</th>
                      <th>Grade & Section</th>
                      <th>Phone Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1231</td>
                      <td>Student1</td>
                      <td>Male</td>
                      <td>8-Pale</td>
                      <td>0921133311</td>
                      <td>
                        <form action="" method="post">
                          <button type="submit" class="btn btn-danger .btn-sm">
                              <i class="fas fa-trash"></i>
                          </button>
                          <a href="#" class="btn btn-success .btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
</div>


@endsection