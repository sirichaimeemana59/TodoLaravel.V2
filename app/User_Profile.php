<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Profile extends Model
{
    protected $table ='table_profile';
    protected $fillable =['firstname','lastname','birthday','photo'];
    protected $primaryKey ='id';
    public $timestamps=true;
}
