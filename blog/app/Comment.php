<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class Comment extends Model
{
     public function add(Request $request,$postId) {
    	if ($request->isMethod('post')) {
    		$comment = new Comment;
           	//'user_id'  => $request->user()->id,
    		$comment->user_id = Auth::id();
    		$comment->post_id = $postId;
			$comment->comment = strip_tags($request->comment);
			$comment->save();    
				
    	} 
    	
    }
}
