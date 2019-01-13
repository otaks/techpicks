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

    public function getLatestTenArticlesWithIsPicked($user)
    {
        // 最新10件のみ記事を表示する
        $results = \App\Post::select()
            ->orderBy('created_at')
            ->paginate(10);

        foreach($results as $result){
            $pick = \App\Pick::select()
                ->where('post_id', $result->id)
                ->where('user_id', $user->id)
                ->get();
            $result['is_picked'] = $pick->isEmpty() ? false : true;
        }
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

    public function decrementIsPickedCount($postId)
    {
        $post = PostService::get($postId);
        \Log::info("$post->is_picked_count=" + (string)$post->is_picked_count);
        $num = $post->is_picked_count--;
        $param = [
            'is_picked_count' => $num
        ];
        DB::table('posts')
            ->where('id', $postId)
            ->update($param);       
    }
}
