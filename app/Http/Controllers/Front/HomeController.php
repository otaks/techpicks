<?php

namespace App\Http\Controllers\Front;

use App\User;
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

    public function index(Request $request)
    {
        $user = User::find(1); //TODO:要実装
        // 最新10件のみ記事を表示する
        $posts = $this->postService->getLatestTenArticlesWithIsPicked($user);

        if ($request->ajax()) {
            return json_encode($posts);
        } else {
            return view("{$this->prefix}index", ["posts" => json_encode($posts)]);
        }
    }
}
