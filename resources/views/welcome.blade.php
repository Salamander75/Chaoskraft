<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
                <a href="{{ route('registration') }}">Registrate</a>
            </div>
            @if (count($errors) > 0)
                <div id="error-messages">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('fail'))
                <div id="error-messages">
                    {{ Session::get('fail') }}
                </div>
            @endif
            <form method="post" action="auth/login">
                <div>
                    Email
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    Password
                    <input type="password" name="password" id="password">
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <button type="submit">Login</button>

            </form>
        </div>
    </body>
</html>
