<?php
namespace App\Services;

use App\Post;

class MyPickService
{
    public function getLatestMyPicks($userId)
    {
        $myPicks = \App\Post::select()
        ->where('user_id',$userId)
        ->join("picks", 'posts.id','=','picks.post_id')
        ->orderBy('picks.created_at')
        ->take(10)
        ->get();
        return $myPicks;
    }

    /**
     * 記事毎にトップコメントを追加
     *
     * @param $posts
     * @return mixed
     */
    public function addTopCommentOnEachPost($posts)
    {
        foreach ($posts as $post) {
            $myPick = \App\Pick::select()
                ->where('post_id', $post->post_id)
                ->orderBy('is_liked_count', 'desc')
                ->orderBy('created_at', 'desc')
                ->limit(1)
                ->get();
            $post['top_comment'] = ($myPick->first())['comment'];
        }

        return $posts;
    }
}
