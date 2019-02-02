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

    public function getPick($post_id, $uid)
    {
        $pick = Pick::select()
            ->where('post_id',$post_id)
            ->where('user_id',$uid)
            ->get();
        return $pick->isEmpty() ? null : $pick[0];
    }

    /**
     * Pickを更新/登録する
     *
     * @param $pickData
     */
    public function updateOrCreate($pickData)
    {
        DB::transaction(function () use ($pickData) {
            $pick = \App\Pick::updateOrCreate(
                ['user_id' => $pickData['userId'], 'post_id' => $pickData['postId']],
                ['comment' => $pickData['comment'], 'is_liked_count' => 0]
            );

            if ($pick->getChanges()) {
                $this->likeService->deleteAll($pick->id);//コメント更新でいいねクリアのため
            } else {
                $post = $this->postService->get($pickData['postId']);
                $this->postService->updatePost($post->id, ['is_picked_count' => ++$post->is_picked_count]);
            }
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
     * post_idに一致するpicksを取得
     */
    public function getPicksByPostId($post_id)
    {
      $picks = Pick::select()
                  ->where('post_id',$post_id)
                  ->paginate(10);
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
