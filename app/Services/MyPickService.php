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
}
