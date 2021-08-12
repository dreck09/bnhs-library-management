<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
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

Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
})->name('admin-dashboard');

Route::get('/addmin-issue-book', function(){
    return view('admin-issue-book');
})->name('admin-issue-book');

Route::get('/register-student', function(){
    return view('admin-register-student');
})->name('registerstudent');

//Available book home page routes
Route::get('/available-book', function(){
    return view('home-book');
})->name("availablebook");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Function
Route::prefix('admin')->group(function(){
    //Book Route
    Route::post('book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('book/list', [BookController::class, 'index'])->name('admin-list-book');
    Route::delete('book/{id}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('book/edit/{id}',[BookController::class, 'edit'])->name('book.edit');
    Route::put('book/update/{id}',[BookController::class, 'update'])->name('book.update');
    //Issue Book Student
    Route::post('book/student/issue',[BookController::class, 'issuedBook'])->name('book-student.issue');
    Route::get('book/student/issue/list', [BookController::class, 'issuedList'])->name('admin-return-book');
    //Student Route
    Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('student/list', [StudentController::class, 'index'])->name('admin-list-student');
    Route::delete('student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('student/edit/{id}',[StudentController::class, 'edit'])->name('student.edit');
    Route::put('student/update/{id}',[StudentController::class, 'update'])->name('student.update');
});
