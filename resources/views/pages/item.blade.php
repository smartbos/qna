@extends('jumbotron')

@section('content')

@can('qna-edit', $post)
<a class="btn btn-default" href="/qna/{{ $post->id }}/edit">수정</a>
@endcan
<h1>{{ $post->title }}</h1>
<p>
{{ $post->content }}
</p>

@endsection