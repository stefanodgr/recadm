<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    /* AUTENTICADOR DE SESSION */
    public function __construct(){

        $this->middleware('auth');
    }
    
    public function index()
    {


        $posts =Post::orderBy('id', 'asc')->get();
            return view('admin.posts.index',['posts'=> $posts]);
        
    }

    /* 
    * Show the form for creating a new resource
    * Metodo para Crear
    * @return \Illuminate\Http\Response   
    */
    public function create()
    {
        //call the view admin.posts.create 
        return view('admin.posts.create');
    }

    /* 
    *Store a newly created resource in storage
    *@param  \Illuminate\Http\Request $request
    *@return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title'         =>'required|max:255',
            'image'         =>'required|image',
            'post_content'  =>'required'
        ]);

        //get the image from the form
        $fileNameWithTheExtension  = request('image')->getClientOriginalName();
        

        //get el nombre de la imagen
        $fileName = pathinfo($fileNameWithTheExtension,PATHINFO_FILENAME);
 
        //get extension de la imagen
        $extension = request('image')->getClientOriginalExtension();
        //create nuevo nombre de la imagen
        $newfileName = $fileName . '_' . time() . '.' . $extension;

        // guardar la imagen en una carpeta public
        $path = request('image')->storeAs('public/images/posts_images/',$newfileName);


        $user= auth()->user();
        $post = new Post();

        $post->title        = request('title');
        $post->content      = request('post_content');
        $post->image_url  = $newfileName;
        $post->userId  = $user->id;
        $post->save();

        return redirect('/posts')->withSuccess('Registro Exitoso!');
    }

    public function edit(Post $post)
    {
        // get the post with the id $post->idata
        $post = Post::find($post->id);

        // return  view
        return view('admin/posts/edit', ['post' =>$post]);

    }

    public function update(Request $request, Post $post)
    {
        $data = request()->validate([
            'title'         =>'required|max:255',
            'image'         =>'required|image',
            'post_content'  =>'required'
        ]);

        //get the image from the form
        $fileNameWithTheExtesion = request('image')->getClientOriginalName();
        

        //get el nombre de la imagen
        $fileName = pathinfo($fileNameWithTheExtesion,PATHINFO_FILENAME);

        //get extension de la imagen
        $extension = request('image')->getClientOriginalName();

        //create nuevo nombre de la imagen
        $newfileName = $fileName . '_' . time() . '.' . $extension;

        // guardar la imagen en una carpeta public
        $path = request('image')->storeAs('public/images/posts_images/',$newfileName);


        $post =  Post::findOrFail($post->id);

        $post->title    = request('title');
        $post->content  = request('post_content');
        $post->image_url  = $newfileName;
        $post->save();

        return redirect('/posts')->withSuccess('Registro Editado Exitoso!');
    }

    public function destroy( Request $request)
    {  
        //find the post
        $post = Post::find($request->post_id);

        $oldImage = public_path() .'/storage/images/posts_images/'.$post->image_url;
        if(file_exists($oldImage)){
            //delte the image
            unlink($oldImage);
        }

        //delete the post
        $post->delete();
        return redirect('/posts')->withDelete('Registro Eliminado Exitoso!');
    }


}
