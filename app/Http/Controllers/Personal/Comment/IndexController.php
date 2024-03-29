<?php

namespace App\Http\Controllers\Personal\Comment;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = auth()->user()->getCommentsByUser;
        return view('personal.comment.index', compact('comments'));
    }
}
