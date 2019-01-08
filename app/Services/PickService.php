<?php
namespace App\Services;

use App\Post;
use App\Pick;
use Illuminate\Support\Facades\DB;
use App\Services\PostService;
use App\Services\LikeService;

/**
 * Pickサービスクラス
 */
class PickService
{
    private $postService;
    private $likeService;

    public function __construct(PostService $postService, LikeService $likeService)
    {
        $this->postService = $postService;
        $this->likeService = $likeService;
    }

    /**
     * Pickを登録する
     */
    public function create($pickData)
    {
        //対象記事を取得
        $post = $this->postService->get($pickData['postId']);
        if ($post == null) {
            throw new \UnexpectedValueException("記事が見つかりません");
        }

        //すでにピック済みかチェックする
        $pick = Pick::where('user_id', $pickData['userId'])
            ->where('post_id', $post->id)->first();
        if ($pick != null) {
            throw new \UnexpectedValueException("既にピックされています");
        }

        //DBに登録
        return DB::transaction(function () use ($pickData, $post) {
            //ピック登録
            $pick = new Pick();
            $pick->comment = $pickData['comment'];
            $pick->user_id = $pickData['userId'];
            $pick->post_id = $post->id;
            $pick->is_liked_count = 0;
            $pick->save();

            //対象記事のピックカウント更新
            $post->is_picked_count++;
            $post->save();

            return $pick;

        });
    }

    /**
     * 対象Postに紐づくPickを結合
     */
    public function detail($post_id)
    {
        $picks = Pick::select()
                    ->where('posts.id',$post_id)
                    ->join('posts','picks.post_id','=','posts.id')
                    ->get();

        return $picks;
    }

    /**
     * "いいね"増加
     */
    public function incrementLike($pickId, $userId)
    {
        $this->likeService->create($pickId, $userId);

        $pick = Pick::find($pickId);
        $pick->is_liked_count++;
        $pick->save();

        return $pick->is_liked_count;
    }
    
    /**
     * "いいね"減少
     */
    public function decrementLike($pickId, $userId)
    {
        $this->likeService->delete($pickId, $userId);

        $pick = Pick::find($pickId);
        $pick->is_liked_count--;
        $pick->save();

        return $pick->is_liked_count;
    } 
}
