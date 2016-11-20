<!DOCTYPE html>
<html>
    <head>
        <title>Where my cactaurs at?</title>

        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
                text-align: center;
                padding-top: 0px;
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

            h2.title {
                font-weight: 100;
                font-size: 72px;
                margin-bottom: 40px;
            }

            img {
                width: 150px;
                height: auto;
            }

            p {
                line-height: 28px;
                font-size: 18px;
                font-weight: bold;
            }

            p.small {
                margin-top: 30px;
                font-size: 13px;
            }

            p a {
                color: #555555;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h2 class="title">Page Not Found</h2>
                <img src="/img/chocobo.png"/>
                @if (isset($username) && $altuser)
                    <p>No user with this username - perhaps you meant <a href="/u/{{ $altuser->username }}">{{ "@" . $altuser->username }}</a>?</p>
                @elseif (isset($username))
                    <p>No user with this username</p>
                @else
                    <p>Uh oh! We seem to have misplaced this page.</p>
                    <p class='small'><a href="javascript:window.history.go(-1)">Head back?</a></p>
                @endif
            </div>
        </div>
    </body>
</html>
