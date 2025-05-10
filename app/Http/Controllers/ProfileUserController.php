<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Event;

class ProfileUserController extends Controller
{
  public function show()
{


  $userId = Auth::id();  


    $data = Booking::where('user_id', $userId)
                   ->where('status', 'approve')
                   ->paginate(10);


$eventTypeCounts = DB::table('bookings')
    ->join('events', 'bookings.event_id', '=', 'events.id')
    ->where('bookings.user_id', $userId)
    ->select('events.event_type', DB::raw('count(*) as total'))
    ->groupBy('events.event_type')
    ->pluck('total', 'events.event_type')
    ->toArray();

$bookingsByMonth = Booking::selectRaw('MONTH(created_at) as month, count(*) as total')
    ->where('user_id', $userId)  // Filter bookings by the authenticated user
    ->groupBy(DB::raw('MONTH(created_at)'))
    ->pluck('total', 'month')
    ->toArray();


    return view('user.profile', compact('data', 'eventTypeCounts', 'bookingsByMonth'));
}


public function show_dash()
{
    $data = Booking::where('status', 'approve')->paginate(10);

    // Exemple de récupération des réservations par mois
    $reservations_by_month = Booking::where('status', 'approve')
                                    ->selectRaw('MONTH(start_date) as month, COUNT(*) as count')
                                    ->groupBy('month')
                                    ->orderBy('month')
                                    ->get();


    return view('user.dashboard', compact('data', 'reservations_by_month'));
}

public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->delete();

    return redirect()->route('user.profile')->with('success', 'Booking deleted successfully');
}
}
