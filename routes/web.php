<?php
use App\Http\Controllers\{
    BookCategoryController,
    BookController,
    PageController,
    StudentController,
    IssueBookController,
    ReturnBookController,
    NotReturnController,
    HomeController,
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/available/book/list', [BookController::class, 'allBooks'])->name('home-book');
Route::get('/available/book/search', [BookController::class, 'allBooksSearch'])->name('home-book-search');
Auth::routes();

Route::middleware('auth')->group(function () { 
    //Admin Function
    Route::prefix('admin')->group(function(){
        //Static Pages
        Route::get('/', [PageController::class, 'viewAdminDashboard'])->name('dashboard');
        Route::get('add/book', [PageController::class, 'addBooks'])->name('add.book');
        Route::get('issue/book', [PageController::class, 'addIssueBook'])->name('issue.book');
        Route::get('register/student', [PageController::class, 'registerStudent'])->name('register.student');
        //Book Category
        Route::get('book/categories', [BookCategoryController::class, 'viewBookCategories'])->name('categories');
        Route::get('book/categories/search', [BookCategoryController::class, 'searchBookCategories'])->name('categories.search');
        Route::get('book/list/category/{name}', [BookCategoryController::class, 'show'])->name('category.show');
        Route::post('category/store',[BookCategoryController::class,'store'])->name('category.store');
        Route::put('category/update',[BookCategoryController::class,'update'])->name('category.update');
        Route::delete('category/delete',[BookCategoryController::class,'destroy'])->name('category.destroy');
        //Book Route
        Route::post('book/store', [BookController::class, 'store'])->name('book.store');
        Route::get('book/list', [BookController::class, 'index'])->name('book.list');
        Route::delete('book/{id}', [BookController::class, 'destroy'])->name('book.destroy');
        Route::get('book/edit/{id}',[BookController::class, 'edit'])->name('book.edit');
        Route::put('book/update/{id}',[BookController::class, 'update'])->name('book.update');
        //Issue Book Student
        Route::post('book/student/issue',[IssueBookController::class, 'issuedBook'])->name('add.issue.book');
        Route::get('book/student/issue/list', [IssueBookController::class, 'issuedList'])->name('issue.book.list');
        //Return Book
        Route::post('book/student/return',[ReturnBookController::class, 'returnBook'])->name('add.return.book');
        Route::get('book/student/return/list', [ReturnBookController::class, 'returnedList'])->name('return.book.list');
        //Not Return Book
        Route::post('book/student/not-return',[NotReturnController::class, 'bookNotReturn'])->name('add.not-return.book');
        Route::get('book/student/not-return/list', [NotReturnController::class, 'bookNotReturnList'])->name('not-return.book.list');
        //Student Route
        Route::post('student/store', [StudentController::class, 'store'])->name('student.add');
        Route::get('student/list', [StudentController::class, 'index'])->name('student.list');
        Route::delete('student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
        Route::get('student/edit/{id}',[StudentController::class, 'edit'])->name('student.edit');
        Route::put('student/update/{id}',[StudentController::class, 'update'])->name('student.update');
    });
});
