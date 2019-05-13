<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    protected $fillable =['name_product','price','amount','photo','name_create'];
    protected $primaryKey ='id_product';
    public $timestamps=true;
}
