<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Student;
use App\Models\NotReturn;
use App\Models\IssueBook;
use App\Models\ReturnBook;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function viewAdminDashboard()
    {
        $books = Book::get();
        $students = Student::get();
        $t_books = Book::sum('qty');
        $return_books = ReturnBook::sum('qty');
        $not_r_books = NotReturn::sum('qty');
        $issue_books = IssueBook::sum('qty');
        $countIssueBook = $issue_books;
        $countTotalBook = $books->count();
        $countAvailableBook = $t_books;
        $countNotReturnBook = $not_r_books;
        $countReturnBook = $return_books;
        $countStudent = $students->count();
        return view('admin-dashboard',
            compact('countTotalBook','countStudent','countIssueBook','countAvailableBook','countNotReturnBook','countReturnBook'),
            ['metaTitle'=>'Admin Dashboard']);
    }
    public function addBooks()
    {
        $category = BookCategory::get();
        return view('admin-add-book',compact('category'),['metaTitle'=>'Admin Add Books']);
    }
    public function addIssueBook()
    {
        return view('admin-issue-book', ['metaTitle'=>'Admin Issue Books']);
    }
    public function registerStudent()
    {
        return view('admin-register-student', ['metaTitle'=>'Admin Register Student']);
    }
}
