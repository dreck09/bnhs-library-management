<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Student;
use App\Models\IssueBook;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function viewAdminDashboard()
    {
        $books = Book::get();
        $students = Student::get();
        $t_books = Book::sum('qty');
        $issue_books = IssueBook::sum('qty');
        $countIssueBook = $issue_books;
        $countTotalBook = $books->count();
        $countAvailableBook = $t_books;
        $countStudent = $students->count();
        return view('admin-dashboard',
            compact('countTotalBook','countStudent','countIssueBook','countAvailableBook'),
            ['metaTitle'=>'Admin Dashboard | BNHS - Library Management']);
    }
    public function addBooks()
    {
        return view('admin-add-book', ['metaTitle'=>'Admin Add Books | BNHS - Library Management']);
    }
    public function addIssueBook()
    {
        return view('admin-issue-book', ['metaTitle'=>'Admin Issue Books | BNHS - Library Management']);
    }
    public function registerStudent()
    {
        return view('admin-register-student', ['metaTitle'=>'Admin Register Student | BNHS - Library Management']);
    }
}
