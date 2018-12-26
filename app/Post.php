<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'subject', 'content', 'score', 'is_published','slug',
    ];

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }


}
