<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    
    public function books() 
    {   // define the relationship between authors and books; an author has many books
        return $this->hasMany(Book::class);
    }
}
