<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>gamerhash.io</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">--}}
    {{--<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">--}}
</head>

<body data-gr-c-s-loaded="true">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header w-100">
            <div class="row">
                <div class="col-md-6 text-left">
                    <img height="38px" src="/logo.png">
                </div>

                <div class="col-md-6 text-right">
                    <div class="">
                        <a href="/auth/register" class="btn btn-default login-green">SIGN UP</a>
                        <a href="/auth/login" class="btn btn-default login-empty">LOG IN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="align-content-center">
    <div class="container flex-center">
        @yield('content')
    </div>
</div>
<footer class="footer fixed-bottom">
    <div class="container">
        <div class="text-center p-4">
            <b class="pr-3">Terms & Conditions </b> <b>Privacy Policy</b>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</body></html>
