@extends('layouts.master') @section('content')



<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('message') }}
                </div>
            @elseif (session('delete-message'))
                <div class="alert alert-danger alert-dismissible">
                    {{ session('delete-message') }}
                </div>
            @elseif (session('update_message'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('update_message') }}
                </div>
            @endif
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Book</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('book.store')}}" method="post">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Title">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="InputDescription">Description</label>
                            <input type="text" name="description" class="form-control" id="InputDescription" placeholder="Description">
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="InputAuthor">Author</label>
                            <input type="text" name="author" class="form-control" id="InputAuthor" placeholder="Author">
                            @error('author')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="InputCategories">Categories</label>
                            <select name="categories" id="InputCategories" class="form-control">
                                <option value="Math">Math</option>
                                <option value="English">Englis</option>
                                <option value="Science">Science</option>
                            </select>
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection