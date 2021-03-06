@extends('layouts.master') @section('content')

<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible">
            {{ session('error') }}
        </div>
    @endif
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Issue Books</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('add.issue.book')}}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="bookid">Book No.</label>
              <input type="text" class="form-control" name="book_id" id="bookid" placeholder="Enter Book Number">
              @error('book_id')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="issueto">Issue To</label>
              <input type="text" class="form-control" name="student_id" id="issueto" placeholder="Enter Student ID">
              @error('student_id')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label for="InputAuthor">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="InputAuthor" placeholder="Enter Quantity">
                @error('quantity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
              <label for="borrowed">Borrowed Date</label>
              <input type="date" class="form-control" name="issue_date" id="return" placeholder="">
              @error('issue_date')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="return">Date Of Return</label>
              <input type="date" class="form-control" name="return_date" id="return" placeholder="">
              @error('return_date')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <a href="{{ route('book.list') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Issue</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection