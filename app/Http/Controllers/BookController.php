<?php

namespace App\Http\Controllers;
use Carbon;
use App\Models\Book;
use App\Models\Student;
use App\Models\IssueBook;
use App\Models\BookCategory;
use App\Models\AssignBookCategory;
use App\Http\Requests\BookCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function allBooksSearch(Request $request)
    {
        $search = $request->get('query');
        $books = Book::where("book_id","like","%".$search."%")
            ->orWhere("title","like","%".$search."%")
            ->orWhere("author","like","%".$search."%")
            ->orWhere("categories","like","%".$search."%")
            ->orWhere("description","like","%".$search."%")->paginate(9);

        return view('home-book',compact('books'),['metaTitle'=>'Search Books']);
    }

    public function allBooks()
    {
        $books = Book::latest()->paginate(9);
        return view('home-book',compact('books'),['metaTitle'=>'Available Books']);
    }

    public function index()
    {
        $books = Book::where('is_available','normal')->get();
        return view('admin-list-book',compact('books'), ['metaTitle'=>'Admin Book List']);
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
            'year_published' => $validate['published'],
            'qty' => $validate['quantity'],
            'categories' => $validate['categories'],
            'image' => $fileNameToStore,
        ]);
        $book_cat = BookCategory::where('category_title',$request->categories)->get();
        foreach($book_cat as $data){
            AssignBookCategory::create([
                'book_id' => $book->id,
                'book_category_id' => $data->id,
            ]);
        }
        return back()->with('message', 'Successfully Book Added!');
    }

    public function edit($id)
    {
        $category = BookCategory::get();
        $book = Book::findorfail($id);
        return view('admin-edit-book',compact('book','category'),['metaTitle'=>'Edit Book Information']);
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

        $book_del = AssignBookCategory::where('book_id',$id)->delete();

        $book_cat = BookCategory::where('category_title',$request->categories)->get();
        foreach($book_cat as $data){
            AssignBookCategory::create([
                'book_id' => $book->id,
                'book_category_id' => $data->id,
            ]);
        }

        return back()->with('message', 'Successfully Updated!');
    }

    public function archive($id)
    {
        $book = Book::findorfail($id);
        $book->is_available = "archived";
        $book->update();
        if($book){
            return back()->with('message', 'Book Archived!');
        }
    }

    public function archiveList()
    {
        $books = Book::where('is_available','archived')->get();
        return view('admin-archive-book',compact('books'), ['metaTitle'=>'Admin Archived Book List']);
    }

    public function destroy($id)
    {
        $book = Book::findorfail($id);
        $book->delete();
        return back()->with('message', 'Successfully Updated!');
    }

    public function deleteSelected(Request $request)
    {
        $bid = $request->id;
        $book = Book::whereIn('id',$bid)->delete();
        return back()->with('message', 'Successfully Deleted!');
    }
}
