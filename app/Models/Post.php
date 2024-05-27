<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function user(): BelongsTo
    {
        # code
        return $this->belongsTo(User::class);
    }

    public function categories(){
        # code
        return $this->belongsToMany(Category::class);
    }
}
