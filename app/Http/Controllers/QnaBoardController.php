<?php

namespace App\Http\Controllers;

use App\QnaPost;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class QnaBoardController extends Controller
{
    function get_list()
    {
        $posts = QnaPost::with('writer')->orderBy('id', 'desc')->paginate(10);
        return view('pages.list', ['posts' => $posts]);
    }

    function get_item($post_id)
    {
        $post = QnaPost::find($post_id);
        return view('pages.item', ['post' => $post]);
    }

    public function get_write()
    {
        $this->authorize('qna-write');

        return view('pages.write');
    }

    public function post_write(Request $request)
    {
        $this->authorize('qna-write');

        $request->merge(['writer_id' => Auth::user()->id]);
        $post = QnaPost::create($request->all());
        return redirect("qna/{$post->id}");
    }

    public function get_edit($post_id)
    {
        $post = QnaPost::find($post_id);
        $this->authorize('qna-edit', $post);

        return view('pages.edit', ['post' => $post]);
    }

    public function put_edit(Request $request, $post_id)
    {
        $post = QnaPost::find($post_id);
        $this->authorize('qna-edit', $post);
        $input = $request->only(['title', 'content']);
        QnaPost::where('id', $post_id)->update($input);
        return redirect("qna/{$post->id}");
    }
}
