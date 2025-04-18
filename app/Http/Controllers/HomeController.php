<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\Booking;
use App\Models\Contact;


class HomeController extends Controller
{
    public function event_details($id){

        $event = event::find($id);
        return View ('home.event_details',compact('event'));
       
    }

    public function add_booking(Request $request, $id){

        $request->validate([
          
            'startDate' => 'required|date',
            'endDate' => 'date|after :: startDate',
        ]);


        $data= new Booking();
        $data->event_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        // $isbooked= Booking::where('event_id',$id)
        // ->where('start_date','<=',$endDate)
        // ->where('end_date','>=',$startDate)->exists();
        // if($isbooked){
        //     return redirect()->back()->with('message','event already booked please choose another date');
        // }
     
        // else{
        //     $data->start_date = $request->startDate;
        //     $data->end_date = $request->endDate;
            
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
