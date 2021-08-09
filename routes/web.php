<?php
use App\Http\Controllers\BookController;
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

//Admin Function
Route::prefix('admin')->group(function(){
    Route::post('book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('book/list', [BookController::class, 'index'])->name('admin-list-book');
    Route::delete('book/{id}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('book/edit/{id}',[BookController::class, 'edit'])->name('book.edit');
    Route::put('book/update/{id}',[BookController::class, 'update'])->name('book.update');
});
