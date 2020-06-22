<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(AuthorResource::collection(Author::all(), 200));
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
        $data = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'company' => 'required',
            'email' => 'required'
        ]);
        // if validation passes, create a new author from the validated
        // data and return it
        return response(new AuthorResource(Author::create($data)), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return response(new AuthorResource($author), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Author $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        // Validate the request
        $data = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'company' => 'required',
            'email' => 'required'
        ]);
        // if validation passes, update the authoer and return it
        $author->update($data);
        return response($author->update($data), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Author $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        // Eloquent won't automatically delete record relationships (i.e. books) for
        // the record being deleted, we must manually do that before deleting the record
        foreach ($author->books() as $book) {
            $book->delete();
        }
        $author->delete();
        return response(null, 204);
    }
}
