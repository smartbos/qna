@extends('jumbotron')

@section('content')

<style>
    .well {
        background-color: #ffffff;
    }

    .well hr {
        margin: 10px 0px;
    }
</style>

<!-- 질문내용 -->
<div class="well well-sm">
    <!-- 수정/삭제 버튼 -->
    <h1 style="margin-top: 0px;">{{ $q->title }}</h1>
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

    {{ $q->content }}

    <!-- 코멘트 목록 -->
    @foreach($q->comments as $c)
    <hr/>
    {{ $c->content }}<br/>
    <form method="POST" action="/comments/{{ $c->id }}/delete">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        {{ $c->created_at }}
        @can('qna-edit', $c)
        <a class="btn btn-xs btn-default" href="/comments/{{ $c->id }}/edit">수정</a>
        <button class="btn btn-xs btn-danger">삭제</button>
        @endcan
        - <b>{{ $c->writer->name }}</b>
    </form>
    @endforeach

    @can('qna-write')
    <!-- 코멘트 입력 창 -->
    <hr/>
    <form class="form-inline" method="POST" action="/comments/write">
        {{ csrf_field() }}
        <input type="hidden" name="commentable_id" value="{{ $q->id }}"/>
        <input type="hidden" name="commentable_type" value="q"/>
        <div class="form-group">
            <input type="text" class="form-control input-sm" id="content" name="content" placeholder="짧은 답변" />
        </div>
        <button type="submit" class="btn btn-sm btn-default">작성</button>
    </form>
    @endcan
</div>

<hr/>

<!-- 답변내용 -->
@foreach($q->answers as $a)
<div class="well well-sm">

    <a name="{{ $a->id }}"></a>

    <!-- 수정/삭제 버튼 -->
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

    {{ $a->content }}

    <!-- 코멘트 목록 -->
    @foreach($a->comments as $c)
    <hr/>
    {{ $c->content }}<br/>
    <form method="POST" action="/comments/{{ $c->id }}/delete">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        {{ $c->created_at }}
        @can('qna-edit', $c)
        <a class="btn btn-xs btn-default" href="/comments/{{ $c->id }}/edit">수정</a>
        <button class="btn btn-xs btn-danger">삭제</button>
        @endcan
        - <b>{{ $c->writer->name }}</b>
    </form>
    @endforeach

    @can('qna-write')
    <!-- 코멘트 입력 창 -->
    <hr/>
    <form class="form-inline" method="POST" action="/comments/write">
        {{ csrf_field() }}
        <input type="hidden" name="commentable_id" value="{{ $a->id }}"/>
        <input type="hidden" name="commentable_type" value="a"/>
        <div class="form-group">
            <input type="text" class="form-control input-sm" id="content" name="content" placeholder="짧은 답변" />
        </div>
        <button type="submit" class="btn btn-sm btn-default">작성</button>
    </form>
    @endcan
</div>
@endforeach

<!-- 답변하기 창 -->
@can('qna-write')
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