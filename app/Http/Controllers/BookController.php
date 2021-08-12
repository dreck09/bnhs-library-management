<?php

namespace App\Http\Controllers;
use Carbon;
use App\Models\Book;
use App\Models\Student;
use App\Models\IssueBook;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\IssueRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::get();
        return view('admin-list-book',compact('books'), ['metaTitle'=>'Admin Book List | BNHS - Library Management']);
    }

    public function store(BookCreateRequest $request)
    {
        $validate = $request->validated();
        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/books_image',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.png';
        }
        $book = Book::create([
            'book_id' => $validate['book_id'],
            'title' => $validate['title'],
            'description' => $validate['description'],
            'author' => $validate['author'],
            'categories' => $validate['categories'],
            'image' => $fileNameToStore,
        ]);
        return back()->with('message', 'Successfully Book Added!');
    }

    public function edit($id)
    {
        $book = Book::findorfail($id);
        return view('admin-edit-book',compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->categories = $request->categories;
        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/books_image',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }
        $book->image = $fileNameToStore;
        $book->update();
        return back()->with('message', 'Successfully Updated!');
    }

    public function destroy($id)
    {
        $book = Book::findorfail($id);
        $book->delete();
        return back()->with('message', 'Successfully Updated!');
    }

    public function issuedBook(IssueRequest $request)
    {
        $book_id = Book::where('book_id',$request->book_id)->get();
        foreach($book_id as $data){
            $book = $data;
        }
        $student_id = Student::where('student_id',$request->student_id)->get();
        foreach($student_id as $data){
            $student = $data;
        }
        $validate = $request->validated();
        $issue_book = IssueBook::create([
            'book_id' => $book->id,
            'student_id' => $student->id,
            'issue_date' => $validate['issue_date'],
            'return_date' => $validate['return_date'],
        ]);
        return back()->with('message', 'Successfully Borrow Added!');
    }

    public function issuedList()
    {
        $timeNow = Carbon\Carbon::now();
        // $issue_books = IssueBook::with('book')->get();
        // foreach($issue_books as $dtmp){
        //     $issue_book_temp = $dtmp;
        //     $books = Book::where('id', $issue_book_temp->book_id)->get();
        //     $students = Student::where('id',$issue_book_temp->student_id)->get();
        // }
        // foreach($books as $dtmp){
        //     $book_data[] = $dtmp;
        // }
        // foreach($students as $dtmp){
        //     $student_data[] = $dtmp;
        // }
        // $book = Book::with('issue_book')->get();
        // $student = Student::with('issue_book')->get();
        // // 
        // foreach($issue_book as $dtmp){
        //     $issue_books = $dtmp;
        // }
        // foreach($book as $dtmp){
        //     $books[] = $dtmp;
        // }
        // foreach($student as $dtmp){
        //     $students[] = $dtmp;
        // }
        $issue_books = IssueBook::join('students', 'students.id', '=', 'issue_books.student_id')
        ->join('books', 'books.id', '=', 'issue_books.book_id')
        ->select(
            'students.student_id as student_id',
            'students.fullname as fullname',
            'books.book_id as book_id',
            'books.title as title',
            'books.author as author',
            'issue_books.issue_date',
            'issue_books.return_date'
        )
        ->groupBy('students.student_id', 'students.fullname', 'books.book_id', 'books.title', 'books.author', 'issue_books.issue_date', 'issue_books.return_date')
        ->get();
        // foreach($issue_book as $data){
        //     dd($data->book_id);
        // }
        return view('admin-barrow-book',compact('issue_books'), ['metaTitle'=>'Borrow History | BNHS - Library Management']);
    }
    public function allBooks()
    {
        $books = Book::get();
        return view('home-book',compact('books'),['metaTitle'=>'Available Books']);
    }
    public function returnedList()
    {
        $returnBook = ReturnedBook::join('students', 'students.id', '=', 'issue_books.student_id')
        ->join('books', 'books.id', '=', 'issue_books.book_id')
        ->select(
            'students.student_id as student_id',
            'students.fullname as fullname',
            'books.book_id as book_id',
            'books.title as title',
            'books.author as author',
            'issue_books.issue_date',
            'issue_books.return_date'
        )
        ->groupBy('students.student_id', 'students.fullname', 'books.book_id', 'books.title', 'books.author', 'issue_books.issue_date', 'issue_books.return_date')
        ->get();
        return view('admin-return-book',compact('returnBook'), ['metaTitle'=>'Return History | BNHS - Library Management']);
            
    }

}
