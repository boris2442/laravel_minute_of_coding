<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
     public function author()
    {
        return $this->hasOne(User::class);
    }
}
