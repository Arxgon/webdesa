<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id','title','slug','description','status','published_at',
        'is_featured','cover_image_url',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured'  => 'boolean',
    ];

    public function author()    { return $this->belongsTo(User::class, 'user_id'); }
    public function photos()    { return $this->hasMany(Photo::class)->orderBy('order'); }
    public function comments()  { return $this->morphMany(Comment::class, 'commentable'); }
}
