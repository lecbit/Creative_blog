<?php

namespace App\Http\Controllers\Category\Post;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = $category->getPosts()->paginate(2);
        return view('category.posts.index', compact('posts'));
    }
}
