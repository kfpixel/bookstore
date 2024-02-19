<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller{

    public function getAll(){

        $books = Book::all();

        return response()->json($books);

    }

    public function get(int $id){

        $book = Book::find($id);

        if(!$book)
            return response()->json(['error' => "Book with id $id not found."], 404);

        return response()->json($book);

    }

    public function add(Request $request){

        $validatedData = $request->validate([
            'author' => 'required',
            'title' => 'required',
            'isbn' => 'required|unique:books,isbn',
            'price' => 'required'
        ]);

        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->save();

        return response()->json($book);

    }

    public function edit(int $id, Request $request){

        $validatedData = $request->validate([
            'author' => 'required',
            'title' => 'required',
            'isbn' => 'required|unique:books,isbn,'.$id,
            'price' => 'required'
        ]);

        $book = Book::find($id);

        if(!$book)
            return response()->json(['error' => "Book with id $id not found."], 404);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->save();

        return response()->json($book);

    }

    public function remove(int $id){

        $book = Book::find($id);
        
        if(!$book)
            return response()->json(['error' => "Book with id $id not found."], 404);

        $book->delete();

        return response()->json($book);

    }

}