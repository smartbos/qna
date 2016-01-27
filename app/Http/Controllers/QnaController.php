<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class QnaController extends Controller
{
    public function get_write()
    {
        $this->authorize('qna-write');

        return view('pages.write');
    }

    public function post_write(Request $request)
    {
        $this->authorize('qna-write');

        $request->merge(['writer_id' => Auth::user()->id]);
        $q = Question::create($request->all());
        return redirect("qna/{$q->id}");
    }

    public function get_edit($q_id)
    {
        $q = Question::find($q_id);
        $this->authorize('qna-edit', $q);

        return view('pages.edit', ['q' => $q]);
    }

    public function put_edit(Request $request, $q_id)
    {
        $q = Question::find($q_id);
        $this->authorize('qna-edit', $q);
        $input = $request->only(['title', 'content']);
        Question::where('id', $q_id)->update($input);
        return redirect("qna/{$q->id}");
    }

    public function delete_item($q_id)
    {
        Question::find($q_id)->delete();
        return redirect('qna');
    }

    function get_list()
    {
        $qs = Question::with('writer')->orderBy('id', 'desc')->paginate(10);
        return view('pages.list', ['qs' => $qs]);
    }

    function get_item($q_id)
    {
        $q = Question::find($q_id);
        return view('pages.item', ['q' => $q]);
    }
}
