@extends('jumbotron')

@section('content')

@can('qna-edit', $post)
<form method="POST" action="/qna/{{ $post->id }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <a class="btn btn-default" href="/qna/{{ $post->id }}/edit">수정</a>
    <button class="btn btn-danger">삭제</button>
</form>
@endcan
<h1>{{ $post->title }}</h1>
<p>
{{ $post->content }}
</p>

@endsection