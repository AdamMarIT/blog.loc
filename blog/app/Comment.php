<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class Comment extends Model
{
    public function add($commentBody,$postId) {
    		$comment = new Comment;
    		$comment->user_id = Auth::id();
    		$comment->post_id = $postId;
			$comment->comment = $commentBody;
			$comment->save();    		
    	 
    }
    public function editComment($comment, $id) {
            $editComment = self::find($id);
            if ($editComment->comment != $comment){
                $editComment->comment = $comment;
                $editComment->save(); 
            }               
    }
    public function deleteComment($id) { 
        $post = self::find($id);
        $post->delete();
    }
}
