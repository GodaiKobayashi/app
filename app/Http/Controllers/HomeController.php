<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if(!isset($user->profile)){
            return redirect()->route('profile.create');
        }
        
        $twitterController = app()->make('App\Http\Controllers\Auth\TwitterController');
        $tweets = $twitterController->index("Apex");
        return view('home') 
            ->with(['user' => $user,'tweets' => $tweets]);
    }

    public function getData()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        $json = ["comments" => $comments];
            return response()->json($json);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $comment = $request->input('comment');
        Comment::create([
            'login_id' => $user->id,
            'name' => $user->name,
            'comment' => $comment,
        ]);
        return redirect()->route('home');
    }
    
    public function board()
    {
        return view('board');
    }
}