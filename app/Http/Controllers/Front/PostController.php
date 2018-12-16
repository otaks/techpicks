<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    private $prefix = 'front.posts.';

    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function create()
    {
        return view("{$this->prefix}create");
    }

    public function store(PostRequest $request)
    {
        $posts = $this->postService->save($request->all());
        return redirect('mypage');
    }
}
