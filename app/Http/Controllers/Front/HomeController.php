<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Services\PickService;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $prefix = 'front.home.';
    protected $hogeService;

    public function __construct(PostService $postService, PickService $pickService)
    {
        $this->postService = $postService;
        $this->pickService = $pickService;
    }

    public function index()
    {
        // 最新10件のみ記事を表示する
        $results = $this->postService->getLatestTenArticles();

        return view("{$this->prefix}index", compact('results'));
    }
}
