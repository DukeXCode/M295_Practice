<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function getAll()
    {
        return Post::all();
    }
}
