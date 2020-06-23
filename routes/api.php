<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Return all resources
Route::get('authors', 'AuthorController@index');  // return all authors
Route::get('books', 'BookController@index');    // return all books

// Return individual resources
Route::get('authors/{author}', 'AuthorController@show');    // return an individual author

// Store new records
Route::post('authors', 'AuthorController@store');   // add an author

// Update records --> accepts both PUT and PATCH
Route::put('authors/{author}', 'AuthorController@update');
Route::patch('authors/{author}', 'AuthorController@update');

// Delete records
Route::delete('authors/{author}', 'AuthorController@destroy');
