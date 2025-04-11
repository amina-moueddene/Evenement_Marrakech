<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_title',
        'image',
        'description',
        'price',
        'lieu',
        'room_type',
        'date'
    ];

}
