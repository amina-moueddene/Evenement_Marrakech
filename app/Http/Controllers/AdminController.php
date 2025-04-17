<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

use App\Models\Event;
use App\Models\Booking;
use App\Models\Gallary;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
use Illuminate\Notifications\Notification;

class AdminController extends Controller
{

    public function logout(Request $request)
    {
        Auth::logout();  // Déconnexion de l'utilisateur
        $request->session()->invalidate();  // Invalidation de la session
        $request->session()->regenerateToken();  // Régénération du token CSRF pour la sécurité

        return redirect('/');  // Redirection vers la page d'accueil après déconnexion
    }

    public function index(){

        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            if ($usertype =='user'){
                $room = Event::all();
                $gallary = Gallary::all();

                return View ('home.index',compact('room', 'gallary'));
           }
           else if ($usertype == 'admin'){
                return View ('admin.index');
       }
          else{
                return redirect()->back();
          }
        }
    }

    public function home(){
        $gallary = Gallary::all();
        $room = Event::all();
        return View ('home.index',compact('room', 'gallary'));

    }


    public function create_room(){
        return View ('admin.create_room');

    }

    public function add_room(Request $request){
       $data = new Event;
       $data -> room_title = $request->title;
       $data -> description = $request->description;
       $data -> price = $request->price;
       $data -> wifi = $request->wifi;
       $data -> room_type = $request->type;

        $image = $request->image;
        if($image)
            {
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('room',$imagename);
                $data->image = $imagename;
            }
       $data -> save();
         return redirect()->back();

    }

    public function view_room(){
        $data = Event::all();
        return View ('admin.view_room',compact('data'));

    }


    public function room_delete($id){
        $data = Event::find($id);
        $data->delete();
        return redirect()->back();

    }

    public function room_update($id){
        $data = Event::find($id);
        return View ('admin.update_room',compact('data'));

    }

    public function edit_room(Request $request,$id){
        $data = Event::find($id);

        $data -> room_title = $request->title;
        $data -> description = $request->description;
        $data -> price = $request->price;
        $data -> wifi = $request->wifi;
        $data -> room_type = $request->type;
        $image = $request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $data->image = $imagename;
        }

        $data -> save();
          return redirect()->back();

     }

        public function bookings (){
            $data = Booking::all();
            return View ('admin.booking',compact('data'));

        }


        public function delete_booking($id) {
            $data = Booking::find($id);
            $data->delete();
            return redirect()->back();
        }

        public function approve_book($id){
            $data = Booking::find($id);
            $data->status = 'approve';
            $data->save();
            return redirect()->back();
        }

        public function reject_booking($id){
            $data = Booking::find($id);
            $data->status = 'reject';
            $data->save();
            return redirect()->back();
        }

        public function view_gallary(){

            $gallary = Gallary::all();
            return View ('admin.gallary', compact('gallary'));
        }

        public function upload_gallary(Request $request){
            $data = new Gallary;
            $image = $request->image;
            if($image)
                {
                    $imagename=time().'.'.$image->getClientOriginalExtension();
                    $request->image->move('gallary',$imagename);
                    $data->image = $imagename;
                }
           $data -> save();
             return redirect()->back();
        }


        public function delete_gallary($id){
            $data = Gallary::find($id);
            $data->delete();
            return redirect()->back();
        }


        public function all_messages(){
            $data = Contact::all();
            return View ('admin.all_messages',compact('data'));
        }

        public function send_mail($id){
            $data = Contact::find($id);
            return View ('admin.send_mail',compact('data'));
        }

        public function mail(Request $request, $id){
           $data = Contact::find($id);

            $details = [
                'greeting' => $request->greeting,
                'body' => $request->body,
                'action_text' => $request->action_text,
                'action_url' => $request->action_url,
                'endline' => $request->endline,

            ];

            $data->notify(new SendEmailNotification($details));
            return redirect()->back();

        }

}

