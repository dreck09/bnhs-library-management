@extends('layouts.master') 
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
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
            <form action="{{route('book.update', $book->id)}}" method="post" enctype="multipart/form-data">
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
                        <label for="InputYearPublished">Year Published</label>
                        <input type="text" name="published" class="form-control" id="InputYearPublished" placeholder="Enter Year Published" value="{{$book->year_published}}">
                        @error('published')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="InputAuthor">Quantity</label>
                        <input type="text" name="quantity" class="form-control" id="InputAuthor" placeholder="Enter Quantity" value="{{$book->qty}}">
                        @error('quantity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                    <label>Select Categories</label>
                    <select name="categories" id="InputCategories" class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                        @foreach($category as $data)
                        <option value="{{$data->category_title}}">{{$data->category_title}}</option>
                        @endforeach
                    </select>
                    @error('categories')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                            <input class="form-control" type="file" name="image" value="{{$book->image}}">
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

@endsection