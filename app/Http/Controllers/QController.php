<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class QController extends Controller
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
        return redirect("qs/{$q->id}");
    }

    public function get_edit($q_id)
    {
        $q = Question::find($q_id);
        $this->authorize('qna-edit', $q);
        return view('pages.edit_q', ['q' => $q]);
    }

    public function put_edit(Request $request, $q_id)
    {
        $q = Question::find($q_id);
        $this->authorize('qna-edit', $q);
        $input = $request->only(['title', 'content']);
        $q->where('id', $q_id)->update($input);
        return redirect("qs/{$q->id}");
    }

    public function delete_item($q_id)
    {
        $q = Question::find($q_id);
        $this->authorize('qna-edit', $q);
        $q->delete();
        return redirect('qs');
    }

    function get_list()
    {
        $qs = Question::with('writer')->orderBy('id', 'desc')->paginate(10);
        return view('pages.list', ['qs' => $qs]);
    }

    function get_item($q_id)
    {
        $q = Question::with('answers')->find($q_id);
        return view('pages.item', ['q' => $q]);
    }
}
