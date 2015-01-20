<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rally SSO</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/modern-business.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/cssstyles.css" rel="stylesheet">

</head>

<body>

    @if(Auth::check())
        @include('layouts.partials.navbar')
    @endif

    <div class="container">
        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>


    <script>
        $('#flash-overlay-modal').modal();
    </script>

</body>

</html>


{{--<script>--}}
    {{--document.write('<script src=js/vendor/' +--}}
    {{--('__proto__' in {} ? 'zepto' : 'jquery') +--}}
    {{--'.js><\/script>')--}}
{{--</script>--}}
{{--<script src="js/foundation.min.js"></script>--}}
{{--<script>--}}
    {{--$(document).foundation();--}}
{{--</script>--}}
