<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    protected $fillable =['name_product','price','amount','photo'];
    protected $primaryKey ='id_product';
    public $timestamps=true;
}
