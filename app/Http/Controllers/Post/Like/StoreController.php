<?php

namespace App\Http\Controllers\Post\Like;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostUserLike;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function __invoke(Post $post)
    {

        auth()->user()->getPostsByLikes()->toggle($post->id);

        return redirect()->back();
    }
}
