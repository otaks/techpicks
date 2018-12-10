<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    private $prefix = 'front.pages.';

    public function index()
    {
        // 最新10件のみ記事を表示する
        $results = DB::table('posts')
            ->orderBy('created_at')
            ->take(10)
            ->get();

        return view("{$this->prefix}index", compact('results'));
    }
}
