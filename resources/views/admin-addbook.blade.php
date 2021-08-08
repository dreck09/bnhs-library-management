@extends('layout.admin') @section('title', 'Add Book') @section('content')

<div class="admin-content">
    <h2 class="text-center">Add Book</h2>
    <form action="">

        <div class="form-wrapper">
            <span>Title:</span>
            <input type="text" name="bookTitle" id="">
        </div>

        <div class="form-wrapper">
            <span>Description:</span>
            <input type="text" name="bookDesc" id="">
        </div>
        <div class="form-wrapper">
            <span>Categories:</span>
            <select name="" id="">
                <option value="">Math</option>
                <option value="">English</option>
                <option value="">Science</option>
            </select>
        </div>
        <div class="form-wrapper">
            <span>Image:</span>
            <input type="file" name="bookDesc" id="">
        </div>

        <div class="button-container">
            <button type="Submit" class="btn">
                Add Book
            </button>
        </div>
    </form>
</div>


@endsection