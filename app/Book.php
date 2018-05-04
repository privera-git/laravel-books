<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = ['title', 'author', 'isbn'];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d h:i:s.u';
}
