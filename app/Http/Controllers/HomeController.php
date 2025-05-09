<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
public function index(Request $request)
{
    // Get the selected event type from the form (default to 'all')
    $event_type = $request->input('event', 'all');

    // Filter events based on the selected type
    if ($event_type !== 'all') {
        $event = event::where('event_type', $event_type)->get();
    } else {
        // If "all" is selected, retrieve all events
        $event = event::all();
    }

    // Retrieve all gallery items
    $gallary = Gallary::all();

    // Return the view with the events, gallery, and the selected filter
    return view('home.index', compact('event', 'gallary', 'event_type'));
}

    public function event_details($id)
    {
        $event = event::find($id);
        return view('home.event_details', compact('event'));
    }

    public function add_booking(Request $request, $id)
    {
        $data = new Booking();
        $data->event_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->user_id = Auth::id();

        $data->save();
        return redirect()->back()->with('message', 'Booking added successfully');
    }




    public function contact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();
        return redirect()->back()->with('message', 'Message sent successfully');
    }
}
