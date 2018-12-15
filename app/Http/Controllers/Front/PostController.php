<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    private $prefix = 'front.post.';

    public function create()
    {
        return view("{$this->prefix}create");
    }

}
