@extends('jumbotron')

@section('content')
@unless(Auth::check())
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-default" href="/auth/github">Github 로그인</a>
    </div>
</div>
@else
<div class="row">
    <div class="col-lg-12">
        <form method="post" action="/auth/logout">
            {{ csrf_field() }}
            <button class="btn btn-danger">로그아웃</button>
        </form>
    </div>
</div>
@endunless
@endsection
