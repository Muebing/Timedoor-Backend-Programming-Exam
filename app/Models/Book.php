<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'categories_id'];

    function author()
    {
        return $this->belongsTo(Author::class);
    }

    function category()
    {
        return $this->belongsTo(Categories::class);
    }

    function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
