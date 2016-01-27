@extends('jumbotron')

@section('content')

<h2>Q&A</h2>
@if(Auth::check())
<p><a class="btn btn-success" href="/qs/write">질문하기</a></p>
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
    @foreach($qs as $q)
    <tr>
        <th scope="row">{{ $q->id }}</th>
        <td><a href="/qs/{{ $q->id }}">{{ $q->title }}</a></td>
        <td>
            <img src="{{ $q->writer->avatar }}" width="16px" height="16px" />
            {{ $q->writer->name }}
        </td>
        <td>{{ $q->created_at }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
{!! $qs->links() !!}
@endsection
