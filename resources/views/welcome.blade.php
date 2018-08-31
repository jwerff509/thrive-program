
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Thrive Zambia</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .half-height {
                height: 25vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


            .hero-image-main {
                height: 675px;
                width: 1200px;
                padding-top: 1px;
                background: url({{ URL::asset('images/home_banner.jpg') }}) center;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref quarter-height">
          <div class="top-left links">

          </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('country-dbs') }}">View Dashboards</a>
                    @endif
                </div>
            @endif

            <div class="content" style="align-content: center;">
                <div class="title m-b-md">
                  <p><img style="float: left; padding: 0 20px 0 0" src="{{ URL::asset('/images/world_vision.png') }}" width="190" height="75" />Thrive Zambia
                  <img style="float: right; padding: 0 0 0 20px" src="{{ URL::asset('/images/tango.jpg') }}" width="190" height="75" /></p>
                </div>

              <div class="row">
                <div class="hero-image-main"></div>
              </div>
            </div>
        </div>

    </body>
</html>
