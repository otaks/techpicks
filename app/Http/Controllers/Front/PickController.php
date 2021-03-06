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
        $user = \Auth::user();
        $post = $this->postService->get($postId);
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
     *
     * @param $pickId
     * @param $postId
     * @return string
     */
    public function destroy($pickId, $postId)
    {
        $hasDeleted = $this->postService->deleteMyPick($pickId, $postId);

        return json_encode([ 'has_deleted' => $hasDeleted ]);
    }
}
