<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Pick;
use App\Services\PickService;
use App\Http\Requests\PickRequest;

class PostDetailController extends Controller
{
    private $prefix = 'front.posts.';

    public function __construct(PickService $pickService)
    {
        $this->pickService = $pickService;
    }

    /**
    * 指定記事の詳細表示
    */
    public function show($postId)
    {
        // 対象記事とコメントの検索
        $results = $this->pickService->detail($postId);

        // dd($results);

        // 検索結果をビューに渡す
        return view("{$this->prefix}postDetail",compact('results'));
    }
}
