<?php

namespace App\Http\Controllers\Library_System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Publisher;
use App\Models\Models\Category;
use App\Models\Models\Book;


class BookController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $publisher = Publisher::all();
        $books = Book::all();
        return view('books.index',compact('books','publisher','category'));

    }

    public function create()
    {
        $category_data    =    Category::all();
        $publisher_data   =    Publisher::all();
        $books            =     Book::all();
        return view('books.create',compact('books','publisher_data','category_data'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'book_name'            => 'required',
            'book_author'          => 'required',
            'ISBN'                 => 'required',
            'key_words'            => 'required',

        ]);


        $book = new Book();

        $book->book_name           =strip_tags($request->book_name);
        $book->book_author         =strip_tags($request->book_author);
        $book->ISBN                =strip_tags($request->ISBN);
        $book->key_words           =strip_tags($request->key_words);
        $book->Description         =strip_tags($request->Description);
        $book->barcode             =strip_tags($request->barcode);
        $book->publisher_id        = $request->publisher_id;
        $book->category_id         =$request->category_id;


        $book->save();

        return redirect()->route('create_books')->with('success', 'Book created successfully.');

    }

    public function edit($id)
    {
        $book_data = Book::findOrfail($id);
        $category_data    =    Category::all();
        $publisher_data   =    Publisher::all();
        return view('books.edit',compact('book_data','category_data','publisher_data'));

    }


    public function update(Request $request, $id)
    {
        $book= Book::findOrfail($id);

        $request->validate([
            'book_name'            => 'required',
            'book_author'          => 'required',
            'ISBN'                 => 'required',
            'key_words'            => 'required',

        ]);

        $book->update($request->all());

        return redirect()->route('create_books')->with('success',('Book Updated successfully'));

    }


    public function searchBooks(Request $request)
    {
        $search = $request->search;
        $search_book_data = Book::select('books.id as id',
            'books.book_name',
            'books.book_author',
            'books.Description',
            'books.ISBN',
            'books.barcode',
            'books.key_words',
            'books.publisher_id as publisher_name',
            'books.category_id as  Caregory',
            )

            ->join('categories','categories.id','books.category_id')
            ->join('publishers','publishers.id','books.publisher_id')
            ->where('books.book_name','like','%'.$search.'%')
            ->orWhere('books.book_author','like','%'.$search.'%')
            ->orWhere('books.Description','like','%'.$search.'%')
            ->orWhere('books.ISBN','like','%'.$search.'%')
            ->orWhere('books.barcode','like','%'.$search.'%')
            ->orWhere('books.key_words','like','%'.$search.'%')
            ->orWhere('categories.name','like','%'.$search.'%')
            ->orWhere('publishers.name','like','%'.$search.'%')

            ;


        return view('books.search',compact('search_book_data'));




    }

}
