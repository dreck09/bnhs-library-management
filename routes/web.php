<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/available/book/list', [BookController::class, 'allBooks'])->name('home-book');
Auth::routes();

Route::middleware('auth')->group(function () { 
    //Admin Function
    Route::prefix('admin')->group(function(){
        //Static Pages
        Route::get('dashboard', [PageController::class, 'viewAdminDashboard'])->name('dashboard');
        Route::get('add/book', [PageController::class, 'addBooks'])->name('add.book');
        Route::get('issue/book', [PageController::class, 'addIssueBook'])->name('issue.book');
        Route::get('register/student', [PageController::class, 'registerStudent'])->name('register.student');
        //Book Route
        Route::post('book/store', [BookController::class, 'store'])->name('book.store');
        Route::get('book/list', [BookController::class, 'index'])->name('book.list');
        Route::delete('book/{id}', [BookController::class, 'destroy'])->name('book.destroy');
        Route::get('book/edit/{id}',[BookController::class, 'edit'])->name('book.edit');
        Route::put('book/update/{id}',[BookController::class, 'update'])->name('book.update');
        //Issue Book Student
        Route::post('book/student/issue',[BookController::class, 'issuedBook'])->name('add.issue.book');
        Route::get('book/student/issue/list', [BookController::class, 'issuedList'])->name('issue.book.list');
        //Return Book
        Route::get('book/student/return/list', [BookController::class, 'returnedList'])->name('return.book.list');
        //Student Route
        Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
        Route::get('student/list', [StudentController::class, 'index'])->name('student.list');
        Route::delete('student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
        Route::get('student/edit/{id}',[StudentController::class, 'edit'])->name('student.edit');
        Route::put('student/update/{id}',[StudentController::class, 'update'])->name('student.update');
    });
});
