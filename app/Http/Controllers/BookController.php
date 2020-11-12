<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\BookCollection;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\BookCollection
     */
    public function index()
    {
        return new BookCollection(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \App\Http\Resources\Book
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());

        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \App\Http\Resources\Book
     */
    public function show(Book $book)
    {
        return new BookResource(Book::find($book));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest;
     * @param  \App\Models\Book  $book
     * @return \App\Http\Resources\Book
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $entity = Book::find($book->id);

        $entity->update($request->validated());

        return new BookResource($entity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $entity = Book::find($book->id);

        $entity->delete();

        return response()->json([], 202);
    }
}
