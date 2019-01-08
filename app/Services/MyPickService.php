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
        ->paginate(10);

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
                ->where('post_id', $this->selectPostId($post))
                ->orderBy('is_liked_count', 'desc')
                ->orderBy('created_at', 'desc')
                ->limit(1)
                ->get();
            $post['top_comment'] = ($myPick->first())['comment'];
        }

        return $posts;
    }

    /**
     * post_idカラムと比較する値を選択する
     * postがpickと既に紐づいている場合はpost_idを選択
     * 紐づいていない場合はidを選択
     *
     * @param $post
     * @return mixed
     */
    private function selectPostId($post)
    {
        return !is_null($post->post_id) ? $post->post_id : $post->id;
    }
}
