<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job_posts';
    protected $fillable = ['title', 'description', 'budget', 'deadline', 'user_id'];

    // Polymorphic comments
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // Local scope for high value jobs
    public function scopeHighValue($query)
    {
        return $query->where('budget', '>', 1000);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
