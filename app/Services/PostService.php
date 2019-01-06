<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Post;
use App\Services\MyPickService;

class PostService
{
    private $myPickService;

    public function __construct(MyPickService $myPickService)
    {
        $this->myPickService = $myPickService;
    }

    public function getLatestTenArticles()
    {
        // 最新10件のみ記事を表示する
        $results = \App\Post::select()
            ->orderBy('created_at')
            ->paginate(10);
        $posts = $this->myPickService->addTopCommentOnEachPost($results);

        return $posts;
    }

    /**
     * 指定されたIDでPostを検索する
     */
    public function get($id)
    {
        return Post::find($id);
    }

    /**
     * 記事を登録する
     * @param $post
     * @return mixed
     */
    public function save($post)
    {
        return  Post::create([
            'url'             => $post['url'],
            'title'           => $post['title'],
            'description'     => $post['description'],
            'is_picked_count' => 1,
        ]);
    }
}
