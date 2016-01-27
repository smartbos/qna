@extends('jumbotron')

@section('content')

<!-- 질문내용 -->
<h1>{{ $q->title }}</h1>
<form method="POST" action="/qs/{{ $q->id }}/delete">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <a href="/qs/{{ $q->id }}">{{ $q->created_at }}</a>
    @can('qna-edit', $q)
    <a class="btn btn-xs btn-default" href="/qs/{{ $q->id }}/edit">수정</a>
    <button class="btn btn-xs btn-danger">삭제</button>
    @endcan
    - <b>{{ $q->writer->name }}</b>
</form>
<br/>
<p>{{ $q->content }}</p>

<!-- 답변내용 -->
@foreach($q->answers as $a)
<a name="{{ $a->id }}"></a>
<hr/>
<p>
<form method="POST" action="/as/{{ $a->id }}/delete">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <a href="{{ '#'.$a->id }}">{{ $a->created_at }}</a>
    @can('qna-edit', $a)
    <a class="btn btn-xs btn-default" href="/as/{{ $a->id }}/edit">수정</a>
    <button class="btn btn-xs btn-danger">삭제</button>
    @endcan
    - <b>{{ $a->writer->name }}</b>
</form>
</p>
<p>{{ $a->content }}</p>
@endforeach

<!-- 답변하기 창 -->
@can('qna-write')
<hr/>
<form method="POST" action="/as/write">
    {{ csrf_field() }}
    <input type="hidden" name="q_id" value="{{ $q->id }}"/>
    <div class="form-group">
        <label for="content">답변</label>
        <textarea class="form-control" id="content" name="content" placeholder="답변" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-default">답변하기</button>
</form>
@endcan

@endsection