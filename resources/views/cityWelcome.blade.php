<!doctype html>
<html class="fontawesome-i2svg-active fontawesome-i2svg-complete" lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Du bist nicht allein. Wir vermitteln nachbarschaftliche Hilfen in der Coronazeit in {{ $city->name }}.">
    <meta name="author" content="Pfarrer Christoph Fischer, Evangelische Kirchengemeinde Tailfingen">

    <meta property="og:locale" content="de_DE" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Wir helfen Nachbarn in {{ $city->name }}" />
    <meta property="og:description" content="Du bist nicht allein. Wir vermitteln nachbarschaftliche Hilfen in der Coronazeit in {{ $city->name }}." />
    <meta property="og:url" content="{{ route('cityWelcome', $city) }}" />
    <meta property="og:site_name" content="Wir helfen Nachbarn in {{ $city->name }}" />
    <meta property="og:image" content="{{ asset('img/butterfly-1127666_1920.jpg') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Du bist nicht allein. Wir vermitteln nachbarschaftliche Hilfen in der Coronazeit in {{ $city->name }}." />
    <meta name="twitter:title" content="Wir helfen Nachbarn in {{ $city->name }}" />
    <meta name="twitter:creator" content="@ch_fischer" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <title>Wir helfen Nachbarn in {{ $city->name }}</title>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <style type="text/css">svg:not(:root).svg-inline--fa {
            overflow: visible
        }

        .svg-inline--fa {
            display: inline-block;
            font-size: inherit;
            height: 1em;
            overflow: visible;
            vertical-align: -.125em
        }

        .svg-inline--fa.fa-lg {
            vertical-align: -.225em
        }

        .svg-inline--fa.fa-w-1 {
            width: .0625em
        }

        .svg-inline--fa.fa-w-2 {
            width: .125em
        }

        .svg-inline--fa.fa-w-3 {
            width: .1875em
        }

        .svg-inline--fa.fa-w-4 {
            width: .25em
        }

        .svg-inline--fa.fa-w-5 {
            width: .3125em
        }

        .svg-inline--fa.fa-w-6 {
            width: .375em
        }

        .svg-inline--fa.fa-w-7 {
            width: .4375em
        }

        .svg-inline--fa.fa-w-8 {
            width: .5em
        }

        .svg-inline--fa.fa-w-9 {
            width: .5625em
        }

        .svg-inline--fa.fa-w-10 {
            width: .625em
        }

        .svg-inline--fa.fa-w-11 {
            width: .6875em
        }

        .svg-inline--fa.fa-w-12 {
            width: .75em
        }

        .svg-inline--fa.fa-w-13 {
            width: .8125em
        }

        .svg-inline--fa.fa-w-14 {
            width: .875em
        }

        .svg-inline--fa.fa-w-15 {
            width: .9375em
        }

        .svg-inline--fa.fa-w-16 {
            width: 1em
        }

        .svg-inline--fa.fa-w-17 {
            width: 1.0625em
        }

        .svg-inline--fa.fa-w-18 {
            width: 1.125em
        }

        .svg-inline--fa.fa-w-19 {
            width: 1.1875em
        }

        .svg-inline--fa.fa-w-20 {
            width: 1.25em
        }

        .svg-inline--fa.fa-pull-left {
            margin-right: .3em;
            width: auto
        }

        .svg-inline--fa.fa-pull-right {
            margin-left: .3em;
            width: auto
        }

        .svg-inline--fa.fa-border {
            height: 1.5em
        }

        .svg-inline--fa.fa-li {
            width: 2em
        }

        .svg-inline--fa.fa-fw {
            width: 1.25em
        }

        .fa-layers svg.svg-inline--fa {
            bottom: 0;
            left: 0;
            margin: auto;
            position: absolute;
            right: 0;
            top: 0
        }

        .fa-layers {
            display: inline-block;
            height: 1em;
            position: relative;
            text-align: center;
            vertical-align: -.125em;
            width: 1em
        }

        .fa-layers svg.svg-inline--fa {
            -webkit-transform-origin: center center;
            transform-origin: center center
        }

        .fa-layers-counter, .fa-layers-text {
            display: inline-block;
            position: absolute;
            text-align: center
        }

        .fa-layers-text {
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transform-origin: center center;
            transform-origin: center center
        }

        .fa-layers-counter {
            background-color: #ff253a;
            border-radius: 1em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #fff;
            height: 1.5em;
            line-height: 1;
            max-width: 5em;
            min-width: 1.5em;
            overflow: hidden;
            padding: .25em;
            right: 0;
            text-overflow: ellipsis;
            top: 0;
            -webkit-transform: scale(.25);
            transform: scale(.25);
            -webkit-transform-origin: top right;
            transform-origin: top right
        }

        .fa-layers-bottom-right {
            bottom: 0;
            right: 0;
            top: auto;
            -webkit-transform: scale(.25);
            transform: scale(.25);
            -webkit-transform-origin: bottom right;
            transform-origin: bottom right
        }

        .fa-layers-bottom-left {
            bottom: 0;
            left: 0;
            right: auto;
            top: auto;
            -webkit-transform: scale(.25);
            transform: scale(.25);
            -webkit-transform-origin: bottom left;
            transform-origin: bottom left
        }

        .fa-layers-top-right {
            right: 0;
            top: 0;
            -webkit-transform: scale(.25);
            transform: scale(.25);
            -webkit-transform-origin: top right;
            transform-origin: top right
        }

        .fa-layers-top-left {
            left: 0;
            right: auto;
            top: 0;
            -webkit-transform: scale(.25);
            transform: scale(.25);
            -webkit-transform-origin: top left;
            transform-origin: top left
        }

        .fa-lg {
            font-size: 1.3333333333em;
            line-height: .75em;
            vertical-align: -.0667em
        }

        .fa-xs {
            font-size: .75em
        }

        .fa-sm {
            font-size: .875em
        }

        .fa-1x {
            font-size: 1em
        }

        .fa-2x {
            font-size: 2em
        }

        .fa-3x {
            font-size: 3em
        }

        .fa-4x {
            font-size: 4em
        }

        .fa-5x {
            font-size: 5em
        }

        .fa-6x {
            font-size: 6em
        }

        .fa-7x {
            font-size: 7em
        }

        .fa-8x {
            font-size: 8em
        }

        .fa-9x {
            font-size: 9em
        }

        .fa-10x {
            font-size: 10em
        }

        .fa-fw {
            text-align: center;
            width: 1.25em
        }

        .fa-ul {
            list-style-type: none;
            margin-left: 2.5em;
            padding-left: 0
        }

        .fa-ul > li {
            position: relative
        }

        .fa-li {
            left: -2em;
            position: absolute;
            text-align: center;
            width: 2em;
            line-height: inherit
        }

        .fa-border {
            border: solid .08em #eee;
            border-radius: .1em;
            padding: .2em .25em .15em
        }

        .fa-pull-left {
            float: left
        }

        .fa-pull-right {
            float: right
        }

        .fa.fa-pull-left, .fab.fa-pull-left, .fal.fa-pull-left, .far.fa-pull-left, .fas.fa-pull-left {
            margin-right: .3em
        }

        .fa.fa-pull-right, .fab.fa-pull-right, .fal.fa-pull-right, .far.fa-pull-right, .fas.fa-pull-right {
            margin-left: .3em
        }

        .fa-spin {
            -webkit-animation: fa-spin 2s infinite linear;
            animation: fa-spin 2s infinite linear
        }

        .fa-pulse {
            -webkit-animation: fa-spin 1s infinite steps(8);
            animation: fa-spin 1s infinite steps(8)
        }

        @-webkit-keyframes fa-spin {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @keyframes fa-spin {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        .fa-rotate-90 {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg)
        }

        .fa-rotate-180 {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg)
        }

        .fa-rotate-270 {
            -webkit-transform: rotate(270deg);
            transform: rotate(270deg)
        }

        .fa-flip-horizontal {
            -webkit-transform: scale(-1, 1);
            transform: scale(-1, 1)
        }

        .fa-flip-vertical {
            -webkit-transform: scale(1, -1);
            transform: scale(1, -1)
        }

        .fa-flip-both, .fa-flip-horizontal.fa-flip-vertical {
            -webkit-transform: scale(-1, -1);
            transform: scale(-1, -1)
        }

        :root .fa-flip-both, :root .fa-flip-horizontal, :root .fa-flip-vertical, :root .fa-rotate-180, :root .fa-rotate-270, :root .fa-rotate-90 {
            -webkit-filter: none;
            filter: none
        }

        .fa-stack {
            display: inline-block;
            height: 2em;
            position: relative;
            width: 2.5em
        }

        .fa-stack-1x, .fa-stack-2x {
            bottom: 0;
            left: 0;
            margin: auto;
            position: absolute;
            right: 0;
            top: 0
        }

        .svg-inline--fa.fa-stack-1x {
            height: 1em;
            width: 1.25em
        }

        .svg-inline--fa.fa-stack-2x {
            height: 2em;
            width: 2.5em
        }

        .fa-inverse {
            color: #fff
        }

        .sr-only {
            border: 0;
            clip: rect(0, 0, 0, 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px
        }

        .sr-only-focusable:active, .sr-only-focusable:focus {
            clip: auto;
            height: auto;
            margin: 0;
            overflow: visible;
            position: static;
            width: auto
        }

        .svg-inline--fa .fa-primary {
            fill: var(--fa-primary-color, currentColor);
            opacity: 1;
            opacity: var(--fa-primary-opacity, 1)
        }

        .svg-inline--fa .fa-secondary {
            fill: var(--fa-secondary-color, currentColor);
            opacity: .4;
            opacity: var(--fa-secondary-opacity, .4)
        }

        .svg-inline--fa.fa-swap-opacity .fa-primary {
            opacity: .4;
            opacity: var(--fa-secondary-opacity, .4)
        }

        .svg-inline--fa.fa-swap-opacity .fa-secondary {
            opacity: 1;
            opacity: var(--fa-primary-opacity, 1)
        }

        .svg-inline--fa mask .fa-primary, .svg-inline--fa mask .fa-secondary {
            fill: #000
        }

        .fad.fa-inverse {
            color: #fff
        }</style>
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
          rel="stylesheet" type="text/css">
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body id="page-top" cz-shortcut-listen="true">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Wir helfen Nachbarn</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#need_help">Ich brauche Hilfe</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#can_help">Ich kann helfen</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Kontakt</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('welcome') }}">Andere Orte</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold">Du bist nicht allein</h1>
                <hr class="divider my-4">
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 font-weight-bold mb-5" style="font-size: 2em;">in {{ $city->name }}</p>
                <a class="btn btn-primary btn-xl js-scroll-trigger mb-2" href="#need_help">Ich brauche Hilfe</a>
                <a class="btn btn-primary btn-blue btn-xl js-scroll-trigger mb-2" href="#can_help">Ich kann helfen</a>
            </div>
        </div>
    </div>
</header>
<!-- need_help section-->
<section class="page-section bg-primary" id="need_help">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h2 class="text-white mt-0">Ich brauche Hilfe!</h2>
                <hr class="divider light my-4">
                <p class="text-white-50 mb-4">Du brauchst Hilfe? Vielleicht gehörst du zu einer Risikogruppe und
                    solltest zu Hause bleiben. Wir finden Menschen, die für dich einkaufen, Besorgungen erledigen, dich
                    einfach mal anrufen, usw. Sag uns einfach, was du brauchst.</p>
                <h3 class="text-white mt-0">Wie geht es dann weiter?</h3>
                <p class="text-white-50 mb-4">Wir vermitteln deine Anfrage an Menschen, die sich zum Helfen bereit
                    erklärt haben. Diese melden sich bei dir und helfen dir.</p>
            </div>
            <div class="col-lg-6">
            @if (count($errors) > 0)
                <!-- Form Error List -->
                    <div class="alert alert-danger">
                        <strong>Whoops! Something went wrong!</strong>

                        <br><br>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('helpRequests.store') }}">
                    @csrf
                    @input(['name' => 'name', 'label' => 'Name'])
                    @input(['name' => 'address', 'label' => 'Straße und Hausnummer'])
                    <input type="hidden" name="city" value="{{ $city->name }}"/>
                    <input type="hidden" name="zip" value="{{ $city->zip }}"/>
                    <input type="hidden" name="city_id" value="{{ $city->id }}"/>
                    @input(['name' => 'phone', 'label' => 'Telefon'])
                    @input(['name' => 'email', 'label' => 'E-Mailadresse (falls vorhanden)'])
                    @input(['name' => 'threema', 'label' => '<a href="https://www.threema.ch" target="_blank">Threema</a>-ID (falls
                            vorhanden)'])
                    @textarea(['name' => 'request', 'label' => 'Dabei brauche ich Hilfe', 'rows' => 10, 'placeholder' => 'z.B. beim Einkaufen, bei Besorgungen, ... Oder: Ich brauche jemand, der mich anruft, um zu reden.'])
                    @checkbox(['name' => 'accept_policy', 'label' => 'Ich stimme zu, dass meine Daten von den
                    Projektträgern zur Vermittlung von Hilfsangeboten genutzt und dazu elektronisch gespeichert
                    werden.', 'value' => 1])
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Anfrage absenden"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- can_help section-->
<section class="page-section bg-blue" id="can_help">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h2 class="text-white mt-0">Ich kann helfen!</h2>
                <hr class="divider light my-4">
                <p class="text-white-50 mb-4">Du bist bereit zu helfen? Super! Über das folgende Formular kannst du dich
                    anmelden. Unser Büro koordiniert die eingehenden Anfragen und meldet sich bei dir, wenn
                    deine Hilfe benötigt wird.</p>
                <h3 class="text-white mt-0">Wie geht es dann weiter?</h3>
                <p class="text-white-50 mb-4">Wir kontaktieren dich, wenn wir von Menschen wissen, denen du helfen
                    kannst.</p>
            </div>
            <div class="col-lg-6">
            @if (count($errors) > 0)
                <!-- Form Error List -->
                    <div class="alert alert-danger">
                        <strong>Whoops! Something went wrong!</strong>

                        <br><br>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('helpers.store') }}">
                    @csrf
                    @input(['name' => 'name', 'label' => 'Name'])
                    @input(['name' => 'address', 'label' => 'Straße und Hausnummer'])
                    <input type="hidden" name="city" value="{{ $city->name }}"/>
                    <input type="hidden" name="zip" value="{{ $city->zip }}"/>
                    <input type="hidden" name="city_id" value="{{ $city->id }}"/>
                    @input(['name' => 'phone', 'label' => 'Telefon'])
                    @input(['name' => 'email', 'label' => 'E-Mailadresse (falls vorhanden)'])
                    @input(['name' => 'threema', 'label' => '<a href="https://www.threema.ch" target="_blank">Threema</a>-ID (falls
                            vorhanden)'])
                    @textarea(['name' => 'notes', 'label' => 'Bemerkungen', 'rows' => 10])
                    @checkbox(['name' => 'accept_policy', 'label' => 'Ich stimme zu, dass meine Daten von den
                    Projektträgern zur Vermittlung von Hilfsangeboten genutzt und dazu elektronisch gespeichert
                    werden.', 'value' => 1])
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Anfrage absenden"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact section-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Nimm Kontakt mit uns auf</h2>
                <hr class="divider my-4">
                <p class="text-muted mb-5">Natürlich kannst du auch auf anderen Wegen mit uns Kontakt aufnehmen, wenn du
                    mehr wissen willst, Hilfe brauchst oder helfen möchstest.</p>
            </div>
        </div>
        <div class="row">
            @foreach ($city->phoneNumbers() as $phoneNumber)
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <svg class="svg-inline--fa fa-phone fa-w-16 fa-3x mb-3 text-muted" aria-hidden="true"
                         focusable="false"
                         data-prefix="fas" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path>
                    </svg><!-- <i class="fas fa-phone fa-3x mb-3 text-muted"></i> -->
                    <div>{{ $phoneNumber['name'] }}<br/>{{ $phoneNumber['number'] }}</div>
                </div>
            @endforeach
            @foreach ($city->emailAddresses() as $emailAddress)
                <div class="col-lg-4 mr-auto text-center">
                    <svg class="svg-inline--fa fa-envelope fa-w-16 fa-3x mb-3 text-muted" aria-hidden="true"
                         focusable="false" data-prefix="fas" data-icon="envelope" role="img"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
                    </svg>
                    <span class="d-block">{{ $emailAddress['name'] }}</span>
                    <a class="d-block" href="mailto:{{ $emailAddress['email'] }}">{{ $emailAddress['email'] }}</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container">
        <div class="container">
            <div class="small text-center text-muted">Copyright © 2020 -
                <a href="https://www.tailfingen-evangelisch.de" target="_blank">Evangelische Kirchengemeinde Tailfingen</a>
                &middot; <a href="https://www.tailfingen-evangelisch.de/meta/impressum" target="_blank">Impressum</a>
                &middot; <a href="https://www.tailfingen-evangelisch.de/meta/datenschutz" target="_blank">Datenschutz</a>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>


</body>
</html>
