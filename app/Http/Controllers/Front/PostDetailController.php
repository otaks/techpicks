<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Pick;
use App\User;
use App\Services\PickService;
use App\Services\PostService;
use App\Services\LikeService;
use App\Http\Requests\PickRequest;

class PostDetailController extends Controller
{
    private $prefix = 'front.posts.';
    private $postService;
    private $likeService;

    public function __construct(PostService $postService, PickService $pickService, LikeService $likeService)
    {
        $this->pickService = $pickService;
        $this->likeService = $likeService;
    }

    /**
    * 指定記事の詳細表示
    */
    public function show($postId)
    {
        // 対象記事とコメントの検索
        $results = $this->pickService->detail($postId);

        // dd($results);

        $user = User::find(1); //TODO:要実装
        $results = $this->likeService->addIsLikedOnEachPick($user, $results);

        // 検索結果をビューに渡す
        return view("{$this->prefix}postDetail",compact('user', 'results', 'postId'));
    }

    /**
     * Get picks records
     * @param {Integer} $postId
     */
    public function getPicksByPostId($postId)
    {
        $picks = $this->pickService->getPicksFromPostId($postId);
        return json_encode($picks);
    }

    /**
     * "いいね"増加
     */
    public function incrementLike($pickId, $userId)
    {
        $ret = array();
        $ret['is_liked_count'] = $this->pickService->incrementLike($pickId, $userId);
        return json_encode($ret);
    }
    /**
     * "いいね"減少
     */
    public function decrementLike($pickId, $userId)
    {
        $ret = array();
        $ret['is_liked_count'] = $this->pickService->decrementLike($pickId, $userId);
        return json_encode($ret);
    }
}
