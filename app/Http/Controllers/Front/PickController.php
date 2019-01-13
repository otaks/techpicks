<?php

namespace App\Http\Controllers\Front;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Services\PickService;
use App\Services\PostService;
use App\Services\LikeService;
use App\Http\Requests\PickRequest;
use Illuminate\Support\Facades\Auth;

class PickController extends Controller
{
    private $prefix = 'front.picks.';
    private $pickService;
    private $postService;
    private $likeService;

    public function __construct(PostService $postService, PickService $pickService, LikeService $likeService)
    {
        $this->postService = $postService;
        $this->pickService = $pickService;
        $this->likeService = $likeService;
    }


    /**
     * ピック登録画面表示
     */
    public function create($postId)
    {
        $post = $this->postService->get($postId);

        $user = User::find(1); //TODO:要実装
        $pick = $this->pickService->getPick($postId, $user->id);
        return view("{$this->prefix}create", ["post" => $post, "pick" => $pick]);
    }

    /**
     * ピック登録
     */
    public function store(PickRequest $pickRequest)
    {
        $pickData = $pickRequest->all();
        $pickData['userId'] = Auth::user()->id;

        //ピックを登録
        $this->pickService->updateOrCreate($pickData);

        //マイピック一覧へリダイレクト
        return redirect('/mypage');
    }

    /**
     * ピック表示
     */
    public function show($id)
    {
        echo "ピック照会画面表示";
    }

    /**
     * ピック編集画面表示
     */
    public function edit($id)
    {
        echo "ピック編集画面表示";
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
    public function destroy($pickId, $postId)
    {
        $this->postService->decrementIsPickedCount($postId);
        $this->pickService->deletePick($pickId);
        $this->likeService->deleteAll($pickId);
        //return redirect()->route('top');   //TODO:遷移元画面への遷移分け
        return redirect('/');   //TODO:遷移元画面への遷移分け
    }
}
