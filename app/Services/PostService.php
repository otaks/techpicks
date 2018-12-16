<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Post;

class PostService
{
    public function getLatestTenArticles()
    {
        // 最新10件のみ記事を表示する
        $results = DB::table('posts')
            ->orderBy('created_at')
            ->take(10)
            ->get();

        return $results;
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
