<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;
use App\Post;

class PostDetailController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
    * 指定記事の詳細
    *
    * @param    Request $request
    * @param    $postId
    * @return   Response
    */
    public function show($postId)
    {
        // レコードを検索
        $post = $this->postService->get($postId);
        // 検索結果をビューに渡す
        return view('postDetail');
    }
}
