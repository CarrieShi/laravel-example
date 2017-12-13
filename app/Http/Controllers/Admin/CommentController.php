<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Comment;

use Redirect;

class CommentController extends Controller
{
    //
    public function index()
    {
        // return view('admin.comment.index')->withComments(Comment::all());
        return view('admin.comment.index')->withComments(Comment::where('nickname', Auth::user()->name)->get());
    }

    public function edit($id)
    {
        return view('admin.comment.edit')->withComment(Comment::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nickname' => 'required',
            'content' => 'required',
        ]);
        if (Comment::where('id', $id)->update($request::except(['_method', '_token']))) {
            return Redirect::to('admin/comment');
        } else {
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return Redirect::to('admin/comment');
    }
}
