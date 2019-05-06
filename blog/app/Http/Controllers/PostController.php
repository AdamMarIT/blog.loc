<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function index() {
    	$posts = DB::table('posts')
    	    ->join('users', 'users.id', '=', 'posts.user_id')
    	    ->orderBy('posts.id', 'desc')
    	    ->paginate(5);
       
    	return view('posts.index', ['posts' => $posts]);
    }
    public function article($id) {
    	$post = Post::find($id);
    	return view('posts.article', ['post' => $post]);
    }
}
