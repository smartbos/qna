@extends('jumbotron')

@section('content')

<h2>질문하기</h2>

<form method="post" action="/qs/write">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">제목</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="제목">
    </div>
    <div class="form-group">
        <label for="content">내용</label>
        <textarea class="form-control" id="content" name="content" placeholder="제목" rows="20"></textarea>
    </div>
    <button type="submit" class="btn btn-default">저장</button>
</form>

@endsection