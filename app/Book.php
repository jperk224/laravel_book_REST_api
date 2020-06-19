<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'title',
        'author_id',
        'abstract'
    ];

    public function author() 
    {   // define the relationship between books an authors.  Books belong to authors
        // its an inverse of the hasMany relationship defined in Author.php
        return $this->belongsTo(Author::class);
    }
}
