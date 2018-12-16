<?php
namespace App\Services;

use App\Post;
use App\Pick;
use Illuminate\Support\Facades\DB;
use App\Services\PostService;

/**
 * Pickサービスクラス
 */
class PickService
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Pickを登録する
     */
    public function create($pickData)
    {
        $post = $this->postService->get($pickData['postId']);
        if ($post == null) {
            throw new \UnexpectedValueException("Postが見つかりません");
        }

        return DB::transaction(function () use ($pickData, $post) {
            $pick = new Pick();
            $pick->comment = $pickData['comment'];
            $pick->user_id = $pickData['userId'];
            $pick->post_id = $post->id;
            $pick->is_liked_count = 0;
            $pick->save();

            $post->is_picked_count++;
            $post->save();

            return $pick;

        });
    }
}
