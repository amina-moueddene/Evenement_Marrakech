<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;

use App\Models\Comment;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  
public function store(Request $request, Event $event)
{
    $request->validate([
        'content' => 'required|string|min:5',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    $comment = new Comment([
        'content' => $request->content,
        'rating' => $request->rating,
        'user_id' => Auth::id(),
    ]);

    $event->comments()->save($comment);

    return redirect()->route('event_details', $event->id)
        ->with('success', 'Votre commentaire a été ajouté avec succès!');
}

}