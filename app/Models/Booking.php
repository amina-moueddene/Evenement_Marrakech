<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',
       
    ];


    public function event(){
        return $this->hasOne('App\Models\event', 'id', 'event_id');
    }
}
