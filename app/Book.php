<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $fillable = ['id','book_name','book_create_name','book_detail','book_image'];
    // Close timestamp
    public $timestamps = true;
}
