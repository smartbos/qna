<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Comment;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class CommentController extends Controller
{
    public function post_write(Request $request)
    {
        $this->authorize('qna-write');
        $request->merge(['writer_id' => Auth::user()->id]);
        $ctype = $request->input('commentable_type');
        switch($ctype) {
            case 'q':
                $ctype = Question::class;
                break;
            case 'a':
                $ctype = Answer::class;
                break;
        }
        $request->merge(['commentable_type' => $ctype]);
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
        $ctype = $c->commentable_type;
        $subUrl = '';
        switch($ctype) {
            case Question::class:
                $subUrl = $c->commentable_id;
                break;
            case Answer::class:
                $subUrl = $c->answer->question->id."#{$c->commentable_id}";
                break;
        }
        return "qs/$subUrl";
    }
}
