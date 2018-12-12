<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;

class HomeController extends Controller
{
    private $prefix = 'front.home.';
    protected $hogeService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        // 最新10件のみ記事を表示する
        $results = $this->postService->getLatestTenArticles();

        return view("{$this->prefix}index", compact('results'));
    }
}
