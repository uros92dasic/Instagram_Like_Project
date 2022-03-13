<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5); //orderBy('created_at', 'DESC') = latest() / paginate instead of get

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
              //'another' => '', //it will let the @csrf pass trough
              'caption'=>'required',
              'image'=>['required', 'image'],
          ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        //auth()->user()->posts()->create($data);
        auth()->user()->posts()->create([
           'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'.auth()->user()->id);
        //dd(request()->all());
    }

    public function show(\App\Models\Post $post) //if this post is exactly the same as {post} in web, Laravel will grab it automaticaly
    {
        return view('posts.show', compact('post'));
        /*return view('posts.show', [
           'post' => $post,
        ]);*/
        //dd($post);
    }
}
