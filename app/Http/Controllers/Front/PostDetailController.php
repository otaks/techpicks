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
        $this->postService = $postService;
        $this->pickService = $pickService;
        $this->likeService = $likeService;
    }

    /**
    * 指定記事の詳細表示
    */
    public function show($postId)
    {
        $userId = \Auth::user()->id;
        $post = $this->postService->get($postId);
        return view("{$this->prefix}postDetail",compact('post','userId'));
    }

    /**
     * Get picks records
     * @param {Integer} $postId
     */
    public function getPicksByPostId($postId)
    {
        $picks = $this->pickService->getPicksByPostId($postId);
        return json_encode($picks);
    }

    /**
     * いいねをしているかをチェック
     */
    public function checkLiked($pickId, $userId)
    {
        $ret = array();
        $ret['status'] = $this->likeService->isLiked($pickId, $userId);
        return json_encode($ret);
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
