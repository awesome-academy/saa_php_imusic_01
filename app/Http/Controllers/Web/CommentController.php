<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $commentRepo;
    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function create(CommentRequest $request)
    {
        $data = [
            'user_id' => $request->comment_user_id,
            'commentable_type' => $request->commentable_type,
            'commentable_id' => $request->commentable_id,
            'content' => $request->comment_content,
        ];
        $comment = $this->commentRepo->storeComment($data);
        if ($comment != null) {
            $user = $comment->user;
            return response()->json([
                'success' => true,
                'message' => trans('add_comment_success'),
                'data' => [
                    'comment_content' => $comment->content,
                    'comment_created_at' => date('d-m-Y', strtotime($comment->created_at)),
                    'user_avatar' => $user->avatar,
                    'user_name' => $user->name,
                    'delete_link' => route('comment.delete', ['comment_id' => $comment->id]),
                    'delete_title' => trans('messages.delete_title'),
                    'content_comment_id' => 'content_comment_id_' . $comment->id,
                    'update_link' => route('comment.update', ['comment_id' => $comment->id]),
                    'update_title' => trans('messages.edit_title'),
                ]
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => trans('add_comment_fail'),
            'data' => ''
        ]);
    }

    public function delete(Comment $comment)
    {
        $result = $this->commentRepo->deleteComment($comment);
        if ($result == 0) {
            return response()->json([
                'success' => true,
                'message' => trans('add_comment_success'),
                'data' => ''
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => trans('add_comment_fail'),
                'data' => ''
            ]);
        }
    }

    public function update(CommentRequest $request,Comment $comment)
    {
        $content = $request->comment_content;
        $result = $this->commentRepo->updateComment($comment, $content);
        if ($result == 0) {
            return response()->json([
                'success' => true,
                'message' => trans('update_comment_success'),
                'data' => [
                    'comment_content' => $content
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => trans('update_comment_fail'),
                'data' => ''
            ]);
        }
    }
}
