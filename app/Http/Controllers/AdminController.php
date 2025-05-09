<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\event;
use App\Models\Booking;
use App\Models\Notification;
use App\Models\Gallary;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{


    public function dashboard()
    {
        $newClients = User::where('usertype', 'user')->count();
        $newEvents = Event::count();
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $approvedBookings = Booking::where('status', 'approve')->count();
        $monthlyEvents = Event::whereMonth('created_at', now()->month)->count();
        $recentEvents = Event::latest()->take(5)->get();

        return view('admin.index', compact(
            'newClients',
            'newEvents',
            'totalBookings',
            'pendingBookings',
            'approvedBookings',
            'monthlyEvents',
            'recentEvents'
        ));
    }

    
    
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
                $event = event::all();
                $gallary = Gallary::all();

                return View ('home.index',compact('event', 'gallary'));
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
        $event = event::all();
        return View ('home.index',compact('event', 'gallary'));
       
    }


    public function create_event(){
        return View ('admin.create_event');
       
    }

    public function add_event(Request $request){
       $data = new event;
       $data -> event_title = $request->title;
       $data -> description = $request->description;
       $data -> price = $request->price;
       $data -> date = $request->date;
       $data -> lieu = $request->lieu;
       $data -> event_type = $request->type;

        $image = $request->image;
        if($image)
            {
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('event',$imagename);
                $data->image = $imagename;
            }
       $data -> save();

       foreach (User::all() as $user) {
        Notification::create([
            'user_id' => $user->id,
            'title' => $data -> event_title,
            'link' => route('event_details', $data->id),       
         ]);
    }


         return redirect()->back();

    }

    public function view_event(){
        $data = event::all();
        return View ('admin.view_event',compact('data'));
       
    }
    

    public function event_delete($id){
        $data = event::find($id);
        $data->delete();
        return redirect()->back();
       
    }

    public function event_update($id){
        $data = event::find($id);
        return View ('admin.update_event',compact('data'));
       
    }

    public function edit_event(Request $request,$id){
        $data = event::find($id);

        $data -> event_title = $request->title;
        $data -> description = $request->description;
        $data -> price = $request->price;
        $data -> date = $request->date;
        $data -> lieu = $request->lieu;
        $data -> event_type = $request->type;
        $image = $request->image;
 
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('event',$imagename);
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

