@extends('jumbotron')

@section('content')

@can('qna-edit', $q)
<form method="POST" action="/qna/{{ $q->id }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <a class="btn btn-default" href="/qna/{{ $q->id }}/edit">수정</a>
    <button class="btn btn-danger">삭제</button>
</form>
@endcan
<h1>{{ $q->title }}</h1>
<p>
{{ $q->content }}
</p>

@endsection