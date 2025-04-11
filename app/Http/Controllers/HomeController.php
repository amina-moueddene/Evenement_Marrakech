<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Booking;
use App\Models\Contact;

class HomeController extends Controller
{
    public function room_details($id){
        $room = Event::find($id);
        return View ('home.rooms_details',compact('room'));
    }

    public function add_booking(Request $request, $id){
        $data= new Booking();
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $data->save();
        return redirect()->back()->with('message','Booking added successfully');
    }

    public function contact(Request $request){
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->back()->with('message','Message sent successfully');
    }
}
