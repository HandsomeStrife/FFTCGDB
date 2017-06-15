<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Final Fantasy TCG DB</title>

    <meta name="description" content="An online card search, deck builder, collection manager and trading interface for the Final Fantasy TCG" />
    <meta name="keywords" content="FFGTCG, ff tcg, final fantasy TCG, deckbuilder, final fantasy deck builder, deck builder, final fantasy tcg deck builder" />
    <meta name="robots" content="index, follow" />

    @if (isset($cardview) && !empty($cardview) && isset($card) && !empty($card))
        <meta property="og:title" content="{{ $card->name }}" />
        <meta property="og:type" content="card" />
        <meta property="og:description" content="{{ $card->description }}" />
        <meta property="og:image" content="http://fftcgdb.com/img/cards/original/{{ $card->card_number }}.png" />
    @else
        <meta property="og:title" content="Final Fantasy TCG DB" />
        <meta property="og:description" content="Deckbuilding, Trading and Collection management!" />
        <meta property="og:image" content="http://fftcgdb.com/img/icons/favicon.png" />
    @endif

    <link rel="icon" type="image/png" href="/img/icons/favicon.png" />

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/fonts.css" rel="stylesheet">
    <link href="/css/styles.css?v=22" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/img/icons/favicon.png" height="30" /> Final Fantasy TCG DB
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                    <li><a href="{{ url('/search') }}">Search</a></li>

                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/decks') }}">Public Decks</a></li>
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        
                            <li><a href="{{ url('/collection') }}">Your Collection</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Decks<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/decks/u') }}">Your Decks</a></li>
                                    <li><a href="{{ url('/decks') }}">Public Decks</a></li>
                                    <li><a href="{{ url('/decks/u/0/edit') }}">Create new Deck</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} @include('messenger.unread-count') <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/profile') }}">Profile</a></li>
                                    <li><a href="{{ url('/messages') }}">Messages</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class='container'>
            @include('flash::message')
        </div>

        @yield('content')
    </div>

    <p class='footer-text'>&copy; Copyright 2016 | Built by <a href="https://twitter.com/thedanives">@thedanives</a> | All Rights Reserved | This is a fan site<br/>FINAL FANTASY, SQUARE ENIX and the SQUARE ENIX logo are trademarks or registered trademarks of Square Enix Holdings Co., Ltd..)</p>

    <!-- Styles -->
    <link href="//cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <!-- Scripts -->
    <script src="/js/app.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" type="text/javascript"></script>
    <script src="//npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js" type="text/javascript"></script>
    <script src="//unpkg.com/isotope-layout@3.0/dist/isotope.pkgd.min.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/jquery.scrollto/2.1.2/jquery.scrollTo.min.js" type="text/javascript"></script>
    <script src="/js/jquery-canvas-sparkles.min.js" type="text/javascript"></script>
    <script src="/js/delay.min.js" type="text/javascript"></script>
    <script src="/js/main.js?v=6" type="text/javascript"></script>
    @yield('scripts')

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-87029224-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
