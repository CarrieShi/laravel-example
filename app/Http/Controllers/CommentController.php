<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\comment;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        if (Comment::create($request->all())) {
            return redirect()->back()->with('status', '评论发表成功！');
        } else {
            return redirect()->back()->withInput()->withErrors('评论发表失败！');
        }
    }
}
