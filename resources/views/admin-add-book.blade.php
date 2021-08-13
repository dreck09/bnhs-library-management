@extends('layouts.master') @section('content')



<div class="container-fluid">
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
                <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputTitle">Book No.</label>
                            <input type="text" name="book_id" class="form-control" id="InputTitle" placeholder="Book Number">
                            @error('book_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="InputTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Enter Title">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="InputDescription">Description</label>
                            <textarea type="text" name="description" class="form-control" id="InputDescription" placeholder="Enter Description" maxlength="200"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="InputAuthor">Author</label>
                            <input type="text" name="author" class="form-control" id="InputAuthor" placeholder="Enter Author">
                            @error('author')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="InputAuthor">Quantity</label>
                            <input type="text" name="quantity" class="form-control" id="InputAuthor" placeholder="Enter Quantity">
                            @error('quantity')
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
                                <input class="form-control" type="file" name="image">
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