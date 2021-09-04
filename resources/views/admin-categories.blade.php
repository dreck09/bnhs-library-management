@extends('layouts.master') @section('content')

<div class="container-fluid">
      <div class="d-flex">
        <div class="">
            @if(session('message'))
                <div class="text-danger p-2">
                    {{ session('message') }}
                </div>
            @endif
            <div class="form-group">
                <a type="button" class="btn btn-success"
                  data-toggle="modal" 
                  data-target="#categoriesModal">Add Book Categories</a>
            </div>
        </div>
        <div class="ml-auto">
          <div class="input-group">
              <input type="search" class="form-control form-control-md" placeholder="Type your keywords here">
              <div class="input-group-append">
                  <button type="submit" class="btn btn-md btn-default">
                      <i class="fa fa-search"></i>
                  </button>
              </div>
          </div>
        </div>
      </div>
      
      <!-- /.row -->
      <div class="row">
      @foreach($category as $data)
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>0</h3>
              <p>{{$data->category_title}}</p>
            </div>
            <div class="icon">
              <i class="fas fa-book"></i>
            </div>
            <div class="d-flex small-box-footer">
              <div class="ml-auto">
                <form action="{{route('category.destroy', $data->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <a href="#" class="btn btn-primary">
                    <i class="far fa-eye"></i>
                  </a>
                  <a  category-name="{{$data->category_title}}" 
                      id="{{$data->id}}" 
                      class="btn btn-primary" 
                      data-toggle="modal" 
                      data-target="#editModal">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- ./col -->
      @endforeach  

      </div>
      <!-- /.row -->
</div>

<!-- Modal BOOK CATEGORIES -->
<div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">Add Book Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('category.store')}}" method="post">
        @csrf
        <div class="card-body">
          <div class="form-group">
              <label for="InputCategories">Book Categories</label>
              <input type="text" name="categories" class="form-control" id="InputCategories" placeholder="Enter Name of Categories" required="" />
          </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Add</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit BOOK CATEGORIES -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Edit Book Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('category.update')}}" method="post" id="editCatForm"  enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="card-body">
          <div class="form-group">
              <input hidden="" name="id" />
              <label for="UpdateCategories">Book Categories</label>
              <input type="text" name="categories" class="form-control" id="UpdateCategories" placeholder="Enter Name of Categories" required=""></input>
          </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

@endsection