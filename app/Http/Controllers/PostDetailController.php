<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostDetailController extends Controller
{
    /**
    * 指定記事の詳細
    *
    * @param    Request $request
    * @param    $id
    * @return   Response
    */
    public function show($postId)
    {
        // レコードを検索
        $pics = Pick::find($postId);
        // 検索結果をビューに渡す
        return view('postDetail')
    }
}
