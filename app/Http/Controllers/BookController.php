<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(BookResource::collection(Book::all()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validate = Validator::make($request->toArray(), [
            'title' => 'required',
            'author_id' => 'required',
            'abstract' => 'required'
        ]);
        // if validation passes, create a new book from the validated
        // data and return it
        return response(new BookResource(Book::create($validate->validate())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response(new BookResource($book), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // Validate the request
        $validate = Validator::make($request->toArray(), [
            'title' => 'required',
            'author_id' => 'required',
            'abstract' => 'required'
        ]);
        // if validation passes, update the book and return it
        $book->update($validate->validate());
        return response(new BookResource($book), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response(null, 204);
    }
}
