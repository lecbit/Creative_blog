<?php

namespace App\Http\Controllers\Admin\Post;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;


class UpdateController extends Controller
{
    public function __invoke(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();
        $post->update($data);
        return view('admin.post.show', compact('post'));
    }
}
