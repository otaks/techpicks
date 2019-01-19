<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function pick()
    {
        return $this->belongsTo('App\Pick');
    }

}
