<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SharedController extends Controller
{
    public function index(Request $request)
    {
        $post_type = [];
        $post_type = $request->query('post_type', 'all');
        if ($post_type === 'online') {
            $posts = Post::where('post_type', 'online')->orderBy('title', 'DESC')->paginate(9);
        } elseif ($post_type === 'offline') {
            $posts = Post::where('post_type', 'offline')->orderBy('title', 'DESC')->paginate(9);
        } elseif($post_type === 'all') {
            $posts = Post::orderBy('post_type', 'DESC')->paginate(9);
        }

        return view('posts.index', compact('posts','post_type'));
    }


    public function create()
    {
        return 'create';
    }

    public function show($post_id)
    {
        return $post_id;
    }

    public function edit($post_id)
    {
        // dd($post_id);
        $post = Post::where('id', $post_id)->first();
        if($post)
        {
            return view('posts.index', compact('post'));
        }else{
            return back()->with('error', 'No post found!');
        }

    }

    public function update(Request $request, $post_id)
    {
        return $post_id;
    }

    public function destroy($post_id)
    {
        return $post_id;
    }
}
