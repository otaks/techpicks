<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pick extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'picks';

    protected $fillable = ['comment','is_liked_count'];

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
