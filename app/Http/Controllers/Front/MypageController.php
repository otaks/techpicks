<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    private $prefix = 'front.mypage.';

    public function index()
    {
        return view("{$this->prefix}index");
    }
}
