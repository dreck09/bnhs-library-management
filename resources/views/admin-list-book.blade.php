@extends('layouts.master') @section('content')


<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">List of Book</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th hidden="">No.</th>
                <th>Book Image</th>
                <th>Book No.</th>
                <th>Title</th>
                <th>Autor</th>
                <th>Quantity</th>
                <th>Categories</th>
                <th>Image Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($books as $data)
              <tr>
                <td hidden="">{{$data->id}}</td>
                <td><img src="/storage/books_image/{{$data->image}}" height="100"/></td>
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
              </tr>
              @endforeach
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