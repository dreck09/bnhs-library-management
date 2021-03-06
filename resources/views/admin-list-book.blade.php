@extends('layouts.master') @section('content')


  <div class="row">
 
    <div class="col-12">
    @if(session('message'))
    <div class="alert alert-success alert-dismissible">
        {{ session('message') }}
    </div>
  @endif
      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title"><i class="fas fa-book"></i> List of Books</h3>
          <a href="{{ route('add.book') }}" class="btn btn-success float-right"><i class="nav-icon fas fa-plus"></i> Add Book</a>
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
                <th>Author</th>
                <th>Year Published</th>
                <th>Quantity</th>
                <th>Categories</th>
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
                <td>{{$data->year_published}}</td>
                <td>{{$data->qty}}</td>
                <td>{{$data->categories}}</td>
                <td>
                  <form action="{{route('book.archive', $data->id)}}" method="post">
                  @csrf
                  @method('PUT')
                    <button type="submit" class="btn btn-primary .btn-sm">
                      <i class="fas fa-archive"></i>
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
@endsection