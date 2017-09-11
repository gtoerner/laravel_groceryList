<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroceryItems extends Model
{
    protected $table = 'grocery';
    protected $fillable = ['name'];
}
