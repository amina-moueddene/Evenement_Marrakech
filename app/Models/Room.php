<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_title',
        'image',
        'description',
        'price',
<<<<<<< HEAD:app/Models/Event.php
        'lieu',
        'event_type',
        'date'
=======
        'wifi',
        'room_type',
>>>>>>> parent of 2f48760 (Merge pull request #16 from MohAitMesskine/CreateEvents):app/Models/Room.php
    ];

}
