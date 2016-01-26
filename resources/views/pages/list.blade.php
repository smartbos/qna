@extends('jumbotron')

@section('content')

<h2>Q&A</h2>
<p>
    <a class="btn btn-success" href="/qna/write">질문하기</a>
</p>
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
        <td>{{ $post->writer->name }}</td>
        <td>{{ $post->created_at }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
{!! $posts->links() !!}
@endsection
