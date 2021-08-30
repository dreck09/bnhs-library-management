<?php

namespace App\Http\Controllers;
use Carbon;
use App\Models\Book;
use App\Models\Student;
use App\Models\IssueBook;
use App\Http\Requests\IssueRequest;
use Illuminate\Http\Request;

class IssueBookController extends Controller
{
    public function issuedBook(IssueRequest $request)
    {
        $books = Book::where('book_id',$request->book_id)->get();
        foreach($books as $data){
            $book = $data;
        }
        $students = Student::where('student_id',$request->student_id)->get();
        if($students->isEmpty() | $books->isEmpty())
        {
            return back()->with('error', 'Please input valid Student ID or Book Number..');
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
                return back()->with('error', 'Invalid input quantity. The issue quantity must less than or equal to the quantity books!');
            }
        }
    }

    public function issuedList()
    {
        // $timeNow = Carbon\Carbon::now();
        // $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 3:30:34');
        // $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-6 9:30:34');
        // $diff_in_days = $to->diffInDays($from);
        // print_r($diff_in_days);
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

        return view('admin-barrow-book',compact('issue_books'), ['metaTitle'=>'Borrow History']);
    }
}
