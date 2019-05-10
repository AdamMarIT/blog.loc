<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class AdminController extends Controller
{
     public function indexAdmin() { 
        $posts = DB::table('users')
            ->join('posts', 'posts.user_id', '=', 'users.id')
            ->orderBy('posts.id', 'desc')
            ->paginate(5);
       
        return view('posts.indexAdmin', ['posts' => $posts]);
    }

    public function deletePost($id) { 
        $post = Post::find($id);
        $post->delete();
        return \Redirect::to("/admin");
    }

    public function articleAdmin($id) {
        $post = Post::find($id);
        $user = User::find($post->user_id);
        //вывод комментариев под постом
        $comments = DB::table('users')
            ->join('comments', 'comments.user_id', '=', 'users.id')
            ->where ('post_id', '=', $id)
            ->orderBy('comments.id')
            ->get();
         $article_id = $id;   

        return view('posts.articleAdmin', ['post' => $post, 'user' => $user,  'comments' => $comments, 'article_id' => $article_id]);
    }

    public function editComment(Request $request, $id) {
        if ($request->isMethod('post')) {
            $commentBody = $request->comment;
            $article = $request->article;
            $editComment = new Comment;
            $editComment->editComment($commentBody,$id);
            return \Redirect::to("/article/$article/admin");
                  
        } 
    }

    public function deleteComment(Request $request, $id) {
        if ($request->isMethod('post')) {
            $article = $request->article;
            $comment = new Comment;
            $comment->deleteComment($id);
            return \Redirect::to("/article/$article/admin");
                  
        } 
    }

}
