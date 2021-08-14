<?php

namespace App\Http\Controllers;
use Carbon;
use App\Models\Book;
use App\Models\Student;
use App\Models\IssueBook;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\IssueRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function allBooksSearch()
    {
        $search = $_GET['query'];
        $books = Book::where("book_id","like","%".$search."%")
            ->orWhere("title","like","%".$search."%")
            ->orWhere("author","like","%".$search."%")
            ->orWhere("categories","like","%".$search."%")
            ->orWhere("description","like","%".$search."%")->paginate(6);
        if($books->isEmpty())
        {
            return view('home-book',compact('books'),['metaTitle'=>'Search Books']);
        }else{
            return view('home-book',compact('books'),['metaTitle'=>'Search Books']);
        }
    }

    public function allBooks()
    {
        $books = Book::latest()->paginate(6);
        return view('home-book',compact('books'),['metaTitle'=>'Available Books']);
    }

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
            'qty' => $validate['quantity'],
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
        $book->qty = $request->quantity;
        $book->categories = $request->categories;
        if($request->hasFile('image'))
        {
            $location = 'public/books_image'.$book->image;
            if(File::exists($location))
            {
                File::delete($location);
            }
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/books_image',$fileNameToStore);
            $book->image = $fileNameToStore;
        }
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
        $books = Book::where('book_id',$request->book_id)->get();
        foreach($books as $data){
            $book = $data;
        }
        $students = Student::where('student_id',$request->student_id)->get();
        if($students->isEmpty() | $books->isEmpty())
        {
            return back()->with('message', 'Please input valid Student ID or Book ID..');
        }else{
            foreach($students as $data){
                $student = $data;
            }
            $current_qty = $book->qty;
            $issue_qty = $request->quantity;
            if($current_qty >= $issue_qty){
                $t_qty = $current_qty - $issue_qty;

                $bk_qty_up = Book::findOrFail($book->id);
                $bk_qty_up->qty = $t_qty;
                $bk_qty_up->update();

                $validate = $request->validated();

                $issue_book = IssueBook::create([
                    'book_id' => $book->id,
                    'student_id' => $student->id,
                    'qty' => $validate['quantity'],
                    'status' => 'borrowed',
                    'issue_date' => $validate['issue_date'],
                    'return_date' => $validate['return_date'],
                ]);
                return redirect(route('issue.book.list'))->with('message', 'Successfully Borrow Added!');
            }
            else
            {
                return back()->with('message', 'Invalid input quantity. The issue quantity must less than or equal to the quantity books!');
            }
        }
    }

    public function issuedList()
    {
        $timeNow = Carbon\Carbon::now();
        $issue_books = IssueBook::where('status','borrowed')
        ->join('students', 'students.id', '=', 'issue_books.student_id')
        ->join('books', 'books.id', '=', 'issue_books.book_id')
        ->select(
            'issue_books.id',
            'students.student_id as student_id',
            'students.fullname as fullname',
            'books.book_id as book_id',
            'books.title as title',
            'books.author as author',
            'issue_books.qty',
            'issue_books.issue_date',
            'issue_books.return_date',
        )
        ->groupBy('students.student_id','issue_books.id','students.fullname', 'books.book_id', 'books.title', 'books.author', 'issue_books.issue_date', 'issue_books.return_date', 'issue_books.qty')
        ->get();

        return view('admin-barrow-book',compact('issue_books','timeNow'), ['metaTitle'=>'Borrow History | BNHS - Library Management']);
    }

    public function returnedStore()
    {
        $current_qty = $book->qty;
        $issue_qty = $request->quantity;
        if($current_qty >= $issue_qty){
            $t_qty = $current_qty - $issue_qty;

            $bk_qty_up = IssueBook::findOrFail($id);
            $bk_qty_up->qty = $t_qty;
            $bk_qty_up->update();

            $validate = $request->validated();

            $issue_book = ReturnBook::create([
                'book_id' => $book->id,
                'student_id' => $student->id,
                'qty' => $validate['quantity'],
                'status' => 'borrowed',
                'issue_date' => $validate['issue_date'],
                'return_date' => $validate['return_date'],
            ]);
            return redirect(route('issue.book.list'))->with('message', 'Successfully Borrow Added!');
        }
    }
    

    public function returnedList()
    {
        $returnBook = ReturnedBook::where('status','return')
        ->join('return_books', 'issue_books.id', '=', 'return_books.issue_id')
        ->join('students', 'students.id', '=', 'issue_books.student_id')
        ->join('books', 'books.id', '=', 'issue_books.book_id')
        ->select(
            'students.student_id as student_id',
            'students.fullname as fullname',
            'books.book_id as book_id',
            'books.title as title',
            'books.author as author',
            'issue_books.issue_date',
            'issue_books.return_date',
            'return_books.return_on',
            'return_books.lapse_date',
            'return_books.fines',
            'return_books.remarks',
        )
        ->groupBy('students.student_id', 'students.fullname', 'books.book_id', 'books.title', 'books.author', 'issue_books.issue_date', 'issue_books.return_date')
        ->get();

        return view('admin-return-book',compact('returnBook'), ['metaTitle'=>'Return History | BNHS - Library Management']);
    }

}
