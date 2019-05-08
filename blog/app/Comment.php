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
    		self::insert(array(
    			//'user_id'  => $request->user()->id,
    			'user_id'  => Auth::id(),
    			'post_id'  => $postId,
			    'comment' => strip_tags($request->comment)
			    
			));	
    	} 
    	
    }
}
