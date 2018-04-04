<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function destroy(Comment $comment)
    {
        if (!empty($comment)) {
            if ($comment->delete()) {
                return redirect()->route('admin.contacts.index');
            }
        } else {
            return 'co loi xay ra';
        }
    }
}
