@extends('layouts.master') @section('content')


<div class="container">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Book</h3>

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
                      <th>ID</th>
                      <th>Title</th>
                      <th>Autor</th>
                      <th>Categories</th>
                      <th>Description</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>Title of Book</td>
                      <td>Santidope</td>
                      <td>Math</td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td>
                          <button class="btn btn-danger .btn-sm">
                              <i class="fas fa-trash"></i>
                          </button>
                          <button class="btn btn-success .btn-sm">
                              <i class="fas fa-pencil-alt"></i>
                          </button>
                      </td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Title of Book</td>
                      <td>Santidope</td>
                      <td>Science</td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td>
                          <button class="btn btn-danger .btn-sm">
                              <i class="fas fa-trash"></i>
                          </button>
                          <button class="btn btn-success .btn-sm">
                              <i class="fas fa-pencil-alt"></i>
                          </button>
                      </td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Title of Book</td>
                      <td>Santidope</td>
                      <td>Math</t>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td>
                          <button class="btn btn-danger .btn-sm">
                              <i class="fas fa-trash"></i>
                          </button>
                          <button class="btn btn-success .btn-sm">
                              <i class="fas fa-pencil-alt"></i>
                          </button>
                      </td>
                    </tr>
                 
                    <tr>
                      <td>175</td>
                      <td>Title of Book</td>
                      <td>Santidope</td>
                      <td>English</td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td>
                          <button class="btn btn-danger .btn-sm">
                              <i class="fas fa-trash"></i>
                          </button>
                          <button class="btn btn-success .btn-sm">
                              <i class="fas fa-pencil-alt"></i>
                          </button>
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