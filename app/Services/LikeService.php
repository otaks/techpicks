<?php
namespace App\Services;

use App\Post;
use App\Pick;
use App\Like;

use Illuminate\Support\Facades\DB;
use App\Services\LikeService;

/**
 * Likeサービスクラス
 */
class LikeService
{
    /**
     * Likeを登録する
     */
    public function create($pickId, $userId)
    {
        return DB::transaction(function () use ($pickId, $userId) {
            $like = new Like();
            $like->pick_id = $pickId;
            $like->user_id = $userId;
            $like->save();

            return $like;
        });
    }

    /**
     * Likeを削除する
     */
    public function delete($pickId, $userId)
    {
        DB::table('likes')
            ->where('pick_id', $pickId)
            ->where('user_id', $userId)
            ->delete();
    }    

    public function addIsLikedOnEachPick($user, $picks)
    {
        foreach($picks as $pick){
            $myLike = \App\Like::select()
                ->where('pick_id', $pick->id)
                ->where('user_id', $user->id)
                ->get();
            
            $pick['is_liked'] = $myLike->isEmpty() ? "false" :"true";
        }

        return $picks;
    }
}
