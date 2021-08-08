<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/books', function(){
    return view('books');
});



// Admin Routes

Route::get('/adminaddbooks', function(){
    return view('admin-addbook');
})->name('adminaddbooks');


Route::get('/adminlistbooks', function(){
    return view('admin-listbooks');
})->name('adminlistbooks');