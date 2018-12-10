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

    protected $fillable = ['comment'];
}
