<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Student;
use App\Models\ReturnBook;
use App\Models\IssueBook;
use App\Http\Requests\ReturnCreateRequest;
use Illuminate\Http\Request;

class ReturnBookController extends Controller
{
    public function returnBook(ReturnCreateRequest $request)
    {
        $issued_book = IssueBook::where('status','borrowed')->where('id', $request->issueId)->first();
        $book = Book::where('id',$issued_book['book_id'])->first();
        $book_qty = $book['qty'];
        $current_qty = $issued_book['qty'];
        $return_qty = $request->inputQty;
        if($current_qty >= $return_qty)
        {
            $sum_tbk_qty = $book_qty + $return_qty;
            $t_qty = $current_qty - $return_qty;
            
            //update book barrow qty
            $bk_qty_up = IssueBook::findOrFail($request->issueId);
            $bk_qty_up->qty = $t_qty;
            $bk_qty_up->update();

            //update book qty
            $bk_t_up = Book::findOrFail($issued_book['book_id']);
            $bk_t_up->qty = $sum_tbk_qty;
            $bk_t_up->update();

            //update status
            $bk_status_up = IssueBook::where('status','borrowed')->where('id', $request->issueId)->first();
            if($bk_status_up['qty']==0){
                $bk_status_up->status = 'return';
                $bk_status_up->update();
            }

            $validate = $request->validated();
            $return_book = ReturnBook::create([
                'issue_id' => $request->issueId,
                'return_on' => $request->returnOn,
                'qty' => $validate['inputQty'],
                'fines' => $validate['fines'],
                'remarks' => $validate['remarks'],
            ]);
            return redirect(route('issue.book.list'))->with('message', 'Successfully Return!');
        }
        else
        {
            return back()->with('message', 'Invalid input quantity. The return quantity must less than or equal to the quantity books!');
        }
    }
    
    public function returnedList()
    {
        $returnBook = ReturnBook::join('issue_books', 'issue_books.id', '=', 'return_books.issue_id')
        ->join('students', 'students.id', '=', 'issue_books.student_id')
        ->join('books', 'books.id', '=', 'issue_books.book_id')
        ->select(
            'return_books.id as id',
            'students.student_id as student_id',
            'students.fullname as fullname',
            'books.book_id as book_id',
            'books.title as title',
            'books.author as author',
            'issue_books.issue_date',
            'issue_books.return_date',
            'return_books.qty',
            'return_books.return_on',
            'return_books.fines',
            'return_books.remarks',
        )
        ->get();
        return view('admin-returned-book',compact('returnBook'), ['metaTitle'=>'Return History | BNHS - Library Management']);
    }

}
