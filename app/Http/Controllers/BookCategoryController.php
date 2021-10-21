<?php

namespace App\Http\Controllers;
use App\Models\BookCategory;
use App\Models\Book;
use App\Models\AssignBookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function viewBookCategories()
    {
        $category = BookCategory::with('assign_book_category')->get();
        return view('admin-categories',compact('category'),['metaTitle'=>'Admin Book Categories']);
    }

    public function store(Request $request)
    {
        $category = BookCategory::where('category_title', $request->categories)->get();
        if($category->isEmpty()){
            $category = BookCategory::create([
                'category_title' => $request->categories,
            ]);
            return back();

        }else{
            return back()->with('message', 'Category is already exist!');
        }
    }

    public function update(Request $request)
    {
        $category = BookCategory::findOrFail($request->id);
        $category->category_title = $request->categories;
        $category->update();
        return back();
    }

    public function destroy(Request $request)
    {
        $del_category = BookCategory::findOrFail($request->id);
        $del_category->delete();
        return back()->with('message', 'Category has been Deleted!');
    }

    public function show($name) 
    {
        $books = Book::where('categories', $name)->get();
        return view('admin-list-category',compact('books'),['metaTitle'=>'Admin Book Categories']);
    }

    public function searchBookCategories(Request $request) 
    {
        $category = BookCategory::where("category_title","like","%".$request->search."%")->get();
        return view('admin-categories',compact('category'),['metaTitle'=>'Admin Search Category']);
    }
}
