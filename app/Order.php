<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='order';
    protected $fillable =['id_product','price_product','amount','total_price','order_tax'];
    protected $primaryKey ='id_order';
    public $timestamps=true;

    public function join_product ()
    {
        return $this->hasOne('App\Product','id_product','id_product');
    }
}
