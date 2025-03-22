<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;


class HomeController extends Controller
{
    public function room_details($id){

        $room = Room::find($id);
        return View ('home.rooms_details',compact('room'));
       
    }

    public function add_booking(Request $request, $id){

        $request->validate([
          
            'startDate' => 'required|date',
            'endDate' => 'date|after :: startDate',
        ]);


        $data= new Booking();
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;



        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $isbooked= Booking::where('room_id',$id)
        ->where('start_date','<=',$endDate)
        ->where('end_date','>=',$startDate)->exists();
        if($isbooked){
            return redirect()->back()->with('message','Room already booked please choose another date');
        }
     
        else{
            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
            
        $data->save();
        return redirect()->back()->with('message','Booking added successfully');
       
        }
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
