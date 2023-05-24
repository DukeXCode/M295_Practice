<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class TopicController extends Controller
{
    public function getPostsForSlug(string $slug)
    {
        $topic = Topic::all()->where('slug', '=', $slug)->first();
        return $topic->posts;
    }
}
