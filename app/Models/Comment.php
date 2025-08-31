<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['author', 'content'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}