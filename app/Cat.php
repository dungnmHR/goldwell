<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    //
    protected $fillable = [
        'name','slug','type', 'cat_id', 'status'
    ];
}
