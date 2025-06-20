<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function author()
    {
        return $this->belongsTo(User::class);  // definit une relation many to one
    }
    public function category()
    {
        return $this->belongsTo(Category::class);  // definit une relation many to one
    }

    //  public function tags(){
    //   return $this->belongsToMany(Tag::class);  
    // }
    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'author_id',
        'image'
    ];
    protected $guarded=['id']; 
    
}
