<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
  
    public function index(){
        // $user= auth()->user();

        // $name = $user->name;

        // $usuario = new User ();
        // $post->title    = request('title');
        // $post->content  = request('post_content');
        // $post->image_url  = $newfileName;
        // $post->userId  = $user->id;
        // dd($user);
        return view('admin.index');
    }
    
}
