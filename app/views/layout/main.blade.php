
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>CRISIS</title>
        {{ HTML::style('packages/css/bootstrap.css') }}
        {{ HTML::style('packages/css/crisis.custom.css') }}
        <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>
        {{ HTML::script('packages/js/bootstrap.min.js') }}
    </head>

    <body>
        <!-- Header and Nav -->
        <nav class="navbar navbar-default navbar-fixed-top red-line" role="navigation">
            <div class="container">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            CRISIS
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Header and Nav -->
        <div class="container main-frame">
            @yield('content')
        </div>
    </body>
    <script>
        $(document).ready(function() {  
        }); 
    </script>
</html>