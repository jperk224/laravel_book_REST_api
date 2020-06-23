<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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

// Route::prefix('authors')->group(function() {
//     Route::get('authors', 'AuthorController@index');  // return all authors
//     Route::get('authors/{author}', 'AuthorController@show');    // return an individual author
//     Route::post('authors', 'AuthorController@store');   // add an author
//     Route::put('authors/{author}', 'AuthorController@update');
//     Route::patch('authors/{author}', 'AuthorController@update');
//     Route::delete('authors/{author}', 'AuthorController@destroy');
// });

// One line of code does the above ^^
// Route::apiResource('authors', 'AuthorController');

// // Return all resources
// Route::get('books', 'BookController@index');    // return all books
// // Return individual resources
// Route::get('books/{book}', 'BookController@show');    // return an individual book
// // Store new records
// Route::post('books', 'BookController@store');   // add a book
// // Update records --> accepts both PUT and PATCH
// Route::put('books/{book}', 'BookController@update');
// Route::patch('books/{book}', 'BookController@update');
// // Delete records
// Route::delete('books/{book}', 'BookController@destroy');

// Route::apiResource('books', 'BookController');

// Further refactoring
Route::apiResources([
    'authors' => 'AuthorController',
    'books' => 'BookController'
]);
