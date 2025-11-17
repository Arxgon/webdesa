<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'album_id','user_id','title','caption','image_path','taken_at','location','order','status',
    ];

    protected $casts = [
        'taken_at' => 'datetime',
        'order'    => 'integer',
    ];

    public function album()    { return $this->belongsTo(Album::class); }
    public function author()   { return $this->belongsTo(User::class, 'user_id'); }
    public function comments() { return $this->morphMany(Comment::class, 'commentable'); }
}
