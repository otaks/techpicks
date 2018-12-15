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
}
