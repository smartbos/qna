@extends('jumbotron')

@section('content')

@can('qna-edit', $q)
<!-- 수정, 삭제 버튼 -->
<form method="POST" action="/qs/{{ $q->id }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <a class="btn btn-default" href="/qs/{{ $q->id }}/edit">수정</a>
    <button class="btn btn-danger">삭제</button>
</form>
@endcan

<!-- 질문내용 -->
<h1>{{ $q->title }}</h1>
<p>
{{ $q->content }}
</p>

<!-- 답변내용 -->


<!-- 답변하기 창 -->
@can('qna-write')
<!-- 수정, 삭제 버튼 -->
<hr/>
<form method="POST" action="/qs/{{ $q->id }}/as/write">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <div class="form-group">
        <label for="answer">답변</label>
        <textarea class="form-control" id="answer" name="answer" placeholder="답변" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-default">답변하기</button>
</form>
@endcan

@endsection