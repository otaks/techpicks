<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use \App\Services\PickService;
use \App\Services\PostService;

class PickController extends Controller
{
    private $prefix = 'front.picks.';
    private $pickService;
    private $postService;

    public function __construct(PostService $postService, PickService $pickService)
    {
        $this->postService = $postService;
        $this->pickService = $pickService;
    }


    /**
     * ピック登録画面表示
     */
    public function create($postId)
    {
        $post = $this->postService->get($postId);
        return view("{$this->prefix}create", ["post"=>$post]);
    }

    /**
     * ピック登録
     */
    public function store(Request $request)
    {
        echo "INSERT処理をここで";
    }

    /**
     * ピック表示
     */
    public function show($id)
    {
        return view("{$this->prefix}show");
    }

    /**
     * ピック編集画面表示
     */
    public function edit($id)
    {
        return view("{$this->prefix}edit");
    }

    /**
     * ピック更新
     */
    public function update(Request $request, $id)
    {
        echo "UPDATE処理をここで";
    }

    /**
     * ピック削除
     */
    public function destroy($id)
    {
        echo "DELETE処理をここで";
    }
}
