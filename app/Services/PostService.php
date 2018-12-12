<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

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
}
