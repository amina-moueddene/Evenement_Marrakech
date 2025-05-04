<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_title',
        'image',
        'description',
        'price',
        'lieu',
        'event_type',
    ];

    public function comments()
{
    return $this->hasMany(Comment::class);
}

}
