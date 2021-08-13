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
                      <th>Book No.</th>
                      <th>Title</th>
                      <th>Autor</th>
                      <th>Quantity</th>
                      <th>Categories</th>
                      <th>Description</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($books as $data)
                    <tr>
                      <td>{{$data->book_id}}</td>
                      <td>{{$data->title}}</td>
                      <td>{{$data->author}}</td>
                      <td>{{$data->qty}}</td>
                      <td>{{$data->categories}}</td>
                      <td>{{$data->image}}</td>
                      <td>
                        <form action="{{route('book.destroy', $data->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                          <button type="submit" class="btn btn-danger .btn-sm">
                              <i class="fas fa-trash"></i>
                          </button>
                          <a href="{{route('book.edit',$data->id)}}" class="btn btn-success .btn-sm">
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
</div>


@endsection