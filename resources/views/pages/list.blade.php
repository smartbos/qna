@extends('jumbotron')

@section('content')

<h2>Q&A</h2>
@if(Auth::check())
<p><a class="btn btn-success" href="/qna/write">질문하기</a></p>
@endif
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Writer</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
        <th scope="row">{{ $post->id }}</th>
        <td><a href="/qna/{{ $post->id }}">{{ $post->title }}</a></td>
        <td>
            <img src="{{ $post->writer->avatar }}" width="16px" height="16px" />
            {{ $post->writer->name }}
        </td>
        <td>{{ $post->created_at }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
{!! $posts->links() !!}
@endsection
