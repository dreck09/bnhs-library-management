<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Student;
use App\Models\NotReturn;
use App\Models\IssueBook;
use App\Http\Requests\NotReturnRequest;
use Illuminate\Http\Request;

class NotReturnController extends Controller
{
    public function bookNotReturn(NotReturnRequest $request)
    {
        $issued_book = IssueBook::where('status','borrowed')->where('id', $request->issueId)->first();
        $current_qty = $issued_book['qty'];
        $return_qty = $request->input_qty;
        if($current_qty >= $return_qty)
        {
            $t_qty = $current_qty - $return_qty;
            
            //update book barrow qty
            $bk_qty_up = IssueBook::findOrFail($request->issueId);
            $bk_qty_up->qty = $t_qty;
            $bk_qty_up->update();

            //update status
            $bk_status_up = IssueBook::where('status','borrowed')->where('id', $request->issueId)->first();
            if($bk_status_up['qty']==0){
                $bk_status_up->status = 'notreturn';
                $bk_status_up->update();
            }

            $validate = $request->validated();
            $not_return_book = NotReturn::create([
                'issue_id' => $request->issueId,
                'report_on' => $request->reportOn,
                'qty' => $validate['input_qty'],
                'fines' => $validate['input_fines'],
                'remarks' => $validate['input_remarks'],
            ]);
            return redirect(route('not-return.book.list'))->with('message', 'Added Not Return Books!');
        }
        else
        {
            return back()->with('error', 'Invalid input quantity. The return quantity must less than or equal to the quantity books!');
        }
    }
    
    public function bookNotReturnList()
    {
        $notReturnBook = NotReturn::join('issue_books', 'issue_books.id', '=', 'not_returns.issue_id')
        ->join('students', 'students.id', '=', 'issue_books.student_id')
        ->join('books', 'books.id', '=', 'issue_books.book_id')
        ->select(
            'not_returns.id as id',
            'students.student_id as student_id',
            'students.fullname as fullname',
            'books.book_id as book_id',
            'books.title as title',
            'books.author as author',
            'issue_books.issue_date',
            'issue_books.return_date',
            'not_returns.qty',
            'not_returns.report_on',
            'not_returns.fines',
            'not_returns.remarks',
        )
        ->get();
        return view('admin-not-return-book',compact('notReturnBook'), ['metaTitle'=>'Not Returned History']);
    }
}
