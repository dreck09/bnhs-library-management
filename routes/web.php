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
    return view('home');
});

Route::get('/admin-add-book', function () {
    return view('admin-add-book');
})->name('admin-add-book');

Route::get('/admin-list-book', function () {
    return view('admin-list-book');
})->name('admin-list-book');


// Route::get('/books', function(){
//     return view('books');
// });



// Admin Routes

// Route::get('/adminaddbooks', function(){
//     return view('admin-addbook');
// })->name('adminaddbooks');


// Route::get('/adminlistbooks', function(){
//     return view('admin-listbooks');
// })->name('adminlistbooks');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
