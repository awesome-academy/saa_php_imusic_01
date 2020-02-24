<?php 
namespace App\Repositories;

use App\Models\Album;
use App\Models\Comment;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CommentRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Comment();
    }
    
    public function storeComment($data)
    {   
        $creator_id = $data['user_id'];
        $comment = new Comment([
            'content' => $data['content'],
            'user_id' => $creator_id,
        ]);
        try {
            switch ($data['commentable_type']) {
                case Config::get('constants.song.commentable_type'):
                    $commentable = Song::find($data['commentable_id']);
                    $commentable->comments()->save($comment);
                    break;
                case Config::get('constants.album.commentable_type'):
                    $commentable = Album::find($data['commentable_id']);
                    $commentable->comments()->save($comment);
                    break;
                default:
                    break;
            }
            return $comment;
        } catch (\Throwable $th) {
            
        }
        return null;
    }

    public function deleteComment(Comment $comment){
        try {
            $comment->delete();
            return 0;
        } catch (\Throwable $th) {
            //throw $th;
        }
        return 1;
    }


}
