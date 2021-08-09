<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Http\Requests\BookCreateRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::get();
        return view('admin-list-book',compact('books'));
    }

    public function create()
    {
        //
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
            $fileNameToStore = 'noimage.jpg';
        }
        $book = Book::create([
            'title' => $validate['title'],
            'description' => $validate['description'],
            'author' => $validate['author'],
            'categories' => $validate['categories'],
            'image' => $fileNameToStore,
        ]);
        return back()->with('message', 'Successfully Added!');
    }

    public function show($id)
    {
        //
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
        return back()->with('message', 'Successfully Updated!');;
    }
}
