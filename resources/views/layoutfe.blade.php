<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.png">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="/css/timepicki.css" rel="stylesheet">
    <link href="/css/lw.css" rel="stylesheet">

    @yield('header')

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body>
@if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif
<div id="site-header">
    <h1 id="site-title">
        <a class="text-muted" href="/" title="Luxury Wedding" rel="home">Luxury Wedding</a>
    </h1>
    <h2 id="site-description">
        <a class="text-muted" href="/" title="Best Luxury offers from Lemberg Wedding professionals" rel="home">Best Luxury offers from Lemberg<br/>Wedding professionals</a>
    </h2>
</div>

<!-- /.@include('layout.navigation') -->


<div class="container">


    @yield('content')


</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery-1.11.2.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jasny-bootstrap.min.js"></script>
<script src='/js/timepicki.js'></script>
<script>
    $(document).ready(function()
    {
            $('.timepicker').timepicki({show_meridian:false,
            min_hour_value:0,
            max_hour_value:23,
            step_size_minutes:15,
            overflow_minutes:true,
            increase_direction:'up',
            disable_keyboard_mobile: true});
    });
</script>
@yield('footer')
</body>
</html>