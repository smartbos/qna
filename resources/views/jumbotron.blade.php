
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>ModernPUG</title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/qna-dist/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/qna-dist/css/jumbotron-narrow.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation"{!! Request::path() == 'about' ? ' class="active"' : '' !!}>
                    <a href="/about">About</a>
                </li>
                <li role="presentation"{!! Request::path() == 'auth/login' ? ' class="active"' : '' !!}>
                    <a href="/auth/login">
                        @unless(Auth::check())
                        Login
                        @else
                        {{ Auth::user()->name }}
                        @endunless
                    </a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted"><a href="/">ModernPUG</a></h3>
    </div>

    @yield('content')

    <footer class="footer">
        <p>&copy; 2016 ModernPUG.</p>
    </footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/qna-dist/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
