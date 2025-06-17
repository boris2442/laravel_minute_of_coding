<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;
    // protected $fillable=['name', 'category', 'slug', 'description', 'price']; 
    //attribut qui peut etre assigner en masse
   protected $guarded=[]; //attribut qui ne peut pas etre assigner en masse
}
