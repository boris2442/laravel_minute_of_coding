<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    //
    use HasFactory;
     public function articles()
    {
        return $this->hasMany(Article::class);  // definit une relation many to one
    }

       protected $fillable = [  'name',];
      
  
      
    protected $guarded=['id']; 
}
