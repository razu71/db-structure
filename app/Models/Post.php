<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    //for polymorphic relationship
    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function firstPhoto()
    {
        return $this->morphOne(Photo::class, 'imageable')->latestOfMany()->withDefault(['image' => '']);
    }
}
