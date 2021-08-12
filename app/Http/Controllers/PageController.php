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
        $issue_books = IssueBook::get();
        $countIssueBook = $issue_books->count();
        $countBook = $books->count();
        $countStudent = $students->count();
        return view('admin-dashboard',
            compact('countBook','countStudent','countIssueBook'),
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
