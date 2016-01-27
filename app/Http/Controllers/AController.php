<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class AController extends Controller
{
    public function post_write(Request $request)
    {
        $this->authorize('qna-write');

        $request->merge(['writer_id' => Auth::user()->id]);
        $a = Answer::create($request->all());
        return redirect("qs/{$a->q_id}#{$a->id}");
    }

    public function get_edit($a_id)
    {
        $a = Answer::find($a_id);
        $this->authorize('qna-edit', $a);

        return view('pages.edit_a', ['a' => $a]);
    }

    public function put_edit(Request $request, $a_id)
    {
        $a = Answer::find($a_id);
        $this->authorize('qna-edit', $a);
        $input = $request->only(['content']);
        $a->update($input);
        return redirect("qs/{$a->q_id}#{$a->id}");
    }

    public function delete_item($a_id)
    {
        $a = Answer::find($a_id);
        $this->authorize('qna-edit', $a);
        $a->delete();
        return redirect("qs/{$a->q_id}");
    }
}
