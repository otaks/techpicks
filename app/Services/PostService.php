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
            ->orderBy('created_at', 'desc')
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
            'image'           => $post['image'],
            'is_picked_count' => 0,
        ]);
    }

    public function deleteMyPick($pickId, $postId)
    {
        return \DB::transaction(function() use ($pickId, $postId) {
            $post = $this->get($postId);
            if (!$post) return false;

            $params = [
                'is_picked_count' => --$post->is_picked_count
            ];

            $result = $this->updatePost($postId, $params);
            if ($result == 0) return false;

            $result =$this->myPickService->deletePick($pickId);
            if ($result == 0) return false;

            return true;
        });
    }

    public function updatePost($postId, $params)
    {
        return DB::table('posts')
            ->where('id', $postId)
            ->update($params);
    }
}
