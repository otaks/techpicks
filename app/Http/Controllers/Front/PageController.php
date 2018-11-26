<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $prefix = 'front.pages.';

    public function index()
    {
        return view("{$this->prefix}index");
    }
}
