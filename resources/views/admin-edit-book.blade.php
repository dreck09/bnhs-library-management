@extends('layouts.master') @section('content')



<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('message') }}
                </div>
            @endif
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Book</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('book.update', $book->id)}}" method="post">
                @csrf
                @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Title" value="{{$book->title}}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="InputDescription">Description</label>
                            <input type="text" name="description" class="form-control" id="InputDescription" placeholder="Description" value="{{$book->description}}">
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="InputAuthor">Author</label>
                            <input type="text" name="author" class="form-control" id="InputAuthor" placeholder="Author" value="{{$book->author}}">
                            @error('author')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="InputCategories">Categories</label>
                            <input type="text" name="categories" class="form-control" id="InputCategories" placeholder="Categories" value="{{$book->categories}}">
                            @error('categories')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <input class="form-control" placeholder="Excerpt" type="file" name="image">
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection