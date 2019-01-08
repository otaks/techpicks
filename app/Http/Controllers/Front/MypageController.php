<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\MyPickService;

class MypageController extends Controller
{
    private $prefix = 'front.mypage.';
    private $myPickService;

    public function __construct(MyPickService $myPickService)
    {
        $this->myPickService = $myPickService;
    }

    public function index(Request $request)
    {
        $userId = \Auth::user()->id;
        $posts = $this->myPickService->getLatestMyPicks($userId);
        $posts = $this->myPickService->addTopCommentOnEachPost($posts);
        if ($request->ajax()) {
            return json_encode($posts);
        } else {
            return view("{$this->prefix}index", ["posts" => json_encode($posts)]);
        }

    }
}
