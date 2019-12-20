<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()){
            $user = \Auth::user();
            $posts = Post::orderBy('id', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        return view('welcome', $data);
    }
    
    public function top()
    {
        $user = \Auth::user();
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        $data = [
            'user' => $user,
            'posts' => $posts,
        ];
        
        return view('posts.top', $data);
    }
    
public function store(Request $request)
    {
        $this->validate($request, [
           'content' => 'required|max:191',
           'post_image' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $originalPostImg = $request->post_image;
        if($originalPostImg->isValid()){
            $filePath = $originalPostImg->store('public');
            $post_image = basename($filePath);
        }
        $request->user()->posts()->create([
            'content' => $request->content,
            'post_image' => $post_image,
        ]);
        return back();
    }
    
    public function destroy($id)
    {
        $post = \App\Post::find($id);
        
        
        if(\Auth::id() === $post->user_id){
            $post->delete();
        }
        
        return back();
    }
    
    public function create()
    {
        $post = new Post;
        
        return view('posts.create', ['post' => $post]);
    }
    
}
