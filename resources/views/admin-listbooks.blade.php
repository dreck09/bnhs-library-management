@extends('layout.admin') @section('title', 'List Books') @section('content')

<div class="book-list">
    <h1 class="text-center">List of Books</h1>
<table class="table">
  <thead>
    <tr>
     
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Categories</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td>Book 1</td>
      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
      <td>Math</td>
    </tr>
    <tr>
      
      <td>Book 2</td>
      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
      <td>Math</td>
    </tr>
    <tr>
   
      <td>Book 3</td>
      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
      <td>Math</td>
    </tr>
    
  </tbody>
</table>
</div>
@endsection