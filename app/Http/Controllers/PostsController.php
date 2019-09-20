<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;   //the model
use DB;  //to fetch data by query
class PostsController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth')->except(['index','show']);
    }
    //index page
    public function index(){

      //$posts = Post::take(5)->get();
      //$posts = Post::where('id',5)->get();
      //$posts = Post::orderBy('id','desc')->get();

      //$posts=DB::select('select * from posts');  //this another way to fetch data (the first is by model(Post))
      $posts = Post::orderBy('id','desc')->paginate(6);  //the first way to fetch data
      $count = Post::count();
      return view('posts.index',compact('posts','count'));
    }//index

    //show page
    public function show($id){

        $post=Post::find($id);
        return view('posts.show',compact('post'));
    }//show

    //create post
    public function create(){

      return view('posts.create');

    }//create function

    //store post
    public function store(Request $request){

      $request->validate([                       //if sthere are errors they will be stored in the 'errors' array
        'title'=> 'required|max:200',
        'body'=>   'required|max:2000',
        'coverImage'=>'image|mimes:jpeg,bmp,png|max:1999'
      ]);

      if($request->hasFile('coverImage')){
          $file = $request->file('coverImage');
          $ext = $file->getClientOriginalExtension();
          $filename = "cover_image_" . time() . "." . $ext;
          $file->storeAs('public/coverImages',$filename);

      }
      else {
        $filename = 'noimage.png';
      }

      $post=new Post();
      $post->title=$request->title;
      $post->body=$request->body;
      $post->image = $filename;
      $post->user_id=auth()->user()->id;

      $post->save();

      return redirect('/posts')->with('status','Post was created ');
    }//store function

    //edit post form
    public function edit($id){
      $post = Post::find($id);

      if(auth()->user()->id !== $post->user_id)
      {
          return redirect('/posts')->with('error','You are not authorized');
      }

      return view('posts.edit',compact('post'));
    }//edit function


    //update post form
    public function update(Request $request,$id){

      $request->validate([                       //if there are errors they will be stored in the 'errors' array
        'title'=> 'required|max:200',
        'body'=>   'required|max:500'
      ]);

      $post=Post::find($id);
      $post->title=$request->title;
      $post->body=$request->body;
      $post->save();

      return redirect('/posts/' . $post->id)->with('status','Post was updated');
    }//update function

    //destroy post
    public function destroy($id){

      $post=Post::find($id);
      $post->delete();
      return redirect('/posts')->with('status','Post was deleted');
    }//destroy function
}
