<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = Post::orderBy('created_at', 'desc')->paginate(8);
            $favorites= Post::withCount('favorite_users')->orderBy('favorite_users_count', 'desc')->paginate(8);
            $data = [
                'user' => $user,
                'posts' => $posts,
                'favorites' =>$favorites,
            ];
        }
        return view('welcome', $data);
    }
            public function create()
    {
        $post = new Post;

        return view('posts.create', [
            'post' => $post,
        ]);
    }
        public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required|max:255',
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/');
    }
        public function destroy($id)
    {
        $post = \App\Post::findOrFail($id);


        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return redirect('/');
    }
}
