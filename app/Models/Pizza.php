<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    // when saving to db it typecasts an array to datatype of column of db
    // when retrieving from db it typecasts the datatype to array
   protected $casts = [
       'toppings' => 'array'
   ];
}
