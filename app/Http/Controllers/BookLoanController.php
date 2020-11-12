<?php

namespace App\Http\Controllers;

use App\Http\Resources\Book as BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookLoanController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Book  $book
     * @return \App\Http\Resources\Book
     */
    public function update(Request $request)
    {
        $book = Book::where('isbn', $request->isbn)->first();

        $book->in_stock =! $book->in_stock;

        $book->save();

        return new BookResource($book);
    }
}
