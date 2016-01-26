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
        <a class="btn btn-danger" href="/auth/logout">로그아웃</a>
    </div>
</div>
@endunless
@endsection
