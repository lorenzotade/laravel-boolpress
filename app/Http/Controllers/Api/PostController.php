<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
            ->select(
                'posts.id', 
                'posts.title', 
                'posts.description', 
                'posts.slug',
                'posts.created_at as date', 
                'categories.name as category'
            )
            ->join('categories', 'posts.category_id', 'categories.id')
            ->paginate(4);

        return response()->json($posts);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['categories', 'tags'])->first();
        if($post) {
            return response()->json([
                'success' => true,
                'result' => $post
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Nessun post trovato'
        ]);
    }   
}