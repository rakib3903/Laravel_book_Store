<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    public function bookForm(){
        return view('book.book');
    }
    public function editBook($id){
        $book = Book::findOrFail($id);
        return view('book.edit', ['book' => $book]);
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/');
    }

    public function submitBook(Request $request){
        $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'writer' => 'required'
        ]);
        Book::create([
            'email' => $request->email,
            'title' => $request->title,
            'writer' => $request->writer,
        ]);
        return redirect('/');
    }

    public function updateBook(Request $request){
        $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'writer' => 'required'
        ]);
        $book = Book::where('email', $request->email)->first();
        $book->title = $request->title;
        $book->writer = $request->writer;
        $book->save();
        return redirect('/');
    }
}
