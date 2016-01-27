<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class AController extends Controller
{
    public function post_write(Request $request, $q_id)
    {
        $this->authorize('qna-write');

        $request->merge(['writer_id' => Auth::user()->id]);
        $a = Answer::create($request->all());
        return redirect("qs/{$q_id}#{$a->id}");
    }
}
