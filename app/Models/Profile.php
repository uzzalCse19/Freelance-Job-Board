<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['bio', 'user_id'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
