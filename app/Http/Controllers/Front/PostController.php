<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use App\Services\PickService;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    private $prefix = 'front.posts.';

    private $postService;
    private $pickService;

    public function __construct(PostService $postService, PickService $pickService)
    {
        $this->postService = $postService;
        $this->pickService = $pickService;
    }

    public function create()
    {
        return view("{$this->prefix}create");
    }

    public function store(PostRequest $request)
    {
        $post = $this->postService->save($request->all());
        $pickData = array();
        $pickData['postId'] = $post->id;
        $pickData['userId'] = \Auth::user()->id;
        $pickData['comment'] = $request->all()['comment'];
        $pick = $this->pickService->updateOrCreate($pickData);

        return redirect('mypage');
    }
}
