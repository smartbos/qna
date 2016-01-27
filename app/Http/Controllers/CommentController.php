<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class CommentController extends Controller
{
    public function post_write(Request $request)
    {
        $this->authorize('qna-write');
        $request->merge(['writer_id' => Auth::user()->id]);
        $c = Comment::create($request->all());
        $redirectUrl = $this->getRedirectUrlWithComment($c);
        return redirect($redirectUrl);
    }

    public function get_edit($c_id)
    {
        $c = Comment::find($c_id);
        $this->authorize('qna-edit', $c);
        return view('pages.edit_c', ['c' => $c]);
    }

    public function put_edit(Request $request, $c_id)
    {
        $c = Comment::find($c_id);
        $this->authorize('qna-edit', $c);
        $input = $request->only(['content']);
        $c->update($input);
        $redirectUrl = $this->getRedirectUrlWithComment($c);
        return redirect($redirectUrl);
    }

    public function delete_item($c_id)
    {
        $c = Comment::find($c_id);
        $this->authorize('qna-edit', $c);
        $c->delete();
        $redirectUrl = $this->getRedirectUrlWithComment($c);
        return redirect($redirectUrl);
    }

    private function getRedirectUrlWithComment($c)
    {
        $q_id = $c->parent_answer ? $c->answer->question->id : $c->parent_id;
        $redirectUrl = "qs/{$q_id}" . ($c->parent_answer ? "#{$c->parent_id}" : '');
        return $redirectUrl;
    }
}
