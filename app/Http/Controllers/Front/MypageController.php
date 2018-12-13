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

    public function index()
    {
        $userId = \Auth::user()->id;
        $posts = $this->myPickService->getLatestMyPicks($userId);
        return view("{$this->prefix}index", ["posts"=>$posts]);
    }
}
