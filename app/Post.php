<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'posts';

    protected $fillable = ['url', 'title', 'description', 'image'];

    public function pick()
    {
        return $this->belongsTo('App\Pick');
    }
}
