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
          <h3 class="card-title">Archived Books</h3>
          <a href="#" id="deleteAllSelected" class="btn btn-danger float-right">Delete Seleted Books</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th hidden="">No.</th>
                <th><input type="checkbox" id="checkAll"/>&nbsp;Selection</th>
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
              <tr id="bid{{$data->id}}">
                <td hidden="">{{$data->id}}</td>
                <td><input type="checkbox" name="id" class="classCheckbox" value="{{$data->id}}"/>&nbsp;</td>
                <td><img src="/storage/books_image/{{$data->image}}" height="100"/></td>
                <td>{{$data->book_id}}</td>
                <td>{{$data->title}}</td>
                <td>{{$data->author}}</td>
                <td>{{$data->year_published}}</td>
                <td>{{$data->qty}}</td>
                <td>{{$data->categories}}</td>
                <td>
                  <form action="{{route('book.destroy', $data->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                    <button type="submit" class="btn btn-danger .btn-sm">
                      <i class="fas fa-trash"></i>
                    </button>
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