<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class PostController extends Controller
{
    public function index() {
    	$posts = DB::table('users')
    	    ->join('posts', 'posts.user_id', '=', 'users.id')
    	    ->orderBy('posts.id', 'desc')
    	    ->paginate(5);
       
    	return view('posts.index', ['posts' => $posts]);
    }

    public function article($id) {
    	$post = Post::find($id);
    	$user = User::find($post->user_id);
    	//вывод комментариев под постом
    	$comments = DB::table('users')
    	    ->join('comments', 'comments.user_id', '=', 'users.id')
    	    ->where ('post_id', '=', $id)
    	    ->orderBy('comments.id')
    	    ->get();
    	 $article_id = $id;   

    	return view('posts.article', ['post' => $post, 'user' => $user,  'comments' => $comments, 'article_id' => $article_id]);
    }
    public function add(Request $request) {
    	if ($request->isMethod('post')) {
    		$post = new Post;
            //'user_id'  => $request->user()->id,
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->content = $request->content;
            $post->save();    
        	
    	} 
    	return view('posts.addpost');
    }

    public function store(Request $request)
    {
        $validator = $this->validate($request, [
        'title' => 'required|unique:posts|min:8|max:255',
        'content' => 'required|min:50|',
   		 ]);
         
        $this->add($request);
        return \Redirect::to('/');

    }

     public function storeComment(Request $request)
    {
        // добываем id поста, к которому пишем коммент
        $url = $request->path();
        $id = explode( '/', $url);
        //проверка вводимых комментов
        $validator = $this->validate($request, [
        'comment' => 'required|max:255'
   		 ]);
        $comment = new Comment; 
        $comment->add($request,$id[1]);
        return \Redirect::to("/article/$id[1]");

    }
}
