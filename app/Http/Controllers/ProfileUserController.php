<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class ProfileUserController extends Controller
{
    public function show()
    {
        $userId = Auth::id();

        $data = Booking::with('event')
          
            ->where('status', 'approve')
            ->get();

        return view('user.profile', compact('data'));
    }
}
