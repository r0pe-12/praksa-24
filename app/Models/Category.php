<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts(){
        # code
        return $this->belongsToMany(Post::class);
    }
}
