<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '') :: {{ config('app.name', 'Pfarrplaner') }}</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
          rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css"
          rel="stylesheet"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-date-range-picker/0.20.0/daterangepicker.min.css"/>
@yield('styles', '')

</head>
<body class="hold-transition sidebar-mini sidebar-collapse {{ strtolower(str_replace('.', '-', Request::route()->getName())) }} @if(isset($slave) && $slave) slave @endif">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            @yield('navbar-left')
        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            @auth
                <!-- Notifications Dropdown Menu -->
                @component('components.ui.whatsnew')
                @endcomponent
                <li class="nav-item" id="toggleControlSidebar" style="display: none;">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                                class="fas fa-cogs"></i></a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-navbar" href="{{ route('logout') }}">
                        <i class="fa fa-power-off"></i><span class="d-none d-md-inline"> Abmelden</span>
                    </a>
                </li>
            @endauth
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-link" style="margin-left: 5px;">
            <img src="{{ asset('img/logo/pfarrplaner.png') }}" width="22" height="22" class="brand-image"
                 style="opacity: .8; margin-top: 7px;"/>
            <span class="brand-text font-weight-light">{{ config('app.name', 'Pfarrplaner') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            @auth
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <i class="fa fa-user" style="font-size: 1.2em; color: white; margin: 7px 0 0 7px;"></i>
                </div>
                <div class="info">
                    <a href="{{ route('user.profile') }}" class="d-block">{{ Auth::user()->fullName() }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    @foreach(\App\UI\MenuBuilder::sidebar() as $item)
                        @if(!is_array($item))
                            <li class="nav-header">
                                {{ strtoupper($item) }}
                            </li>
                        @else
                            <li class="nav-item @if(isset($item['submenu']))has-treeview @endif">
                                <a class="nav-link" href="{{ $item['url'] }}">
                                    @if(isset($item['icon']))<i class="nav-icon {{ $item['icon'] }}"
                                                                @if(isset($item['icon_color']))style="color: {{ $item['icon_color'] }};"@endif></i>@endif
                                    <p>
                                        {{ $item['text'] }}
                                        @if(isset($item['submenu']))<i class="right fas fa-angle-left"></i>@endif
                                    </p>

                                </a>
                                @if(isset($item['submenu']))
                                    <ul class="nav nav-treeview" style="display: none;">
                                        @foreach($item['submenu'] as $item2)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ $item2['url'] }}">
                                                    @if(isset($item2['icon']))<i class="nav-icon {{ $item2['icon'] }}"
                                                                                 @if(isset($item2['icon_color']))style="color: {{ $item2['icon_color'] }};"@endif></i>@endif
                                                    <p>
                                                        {{ $item2['text'] }}
                                                        @if(isset($item2['counter']))
                                                            <span class="badge right @if(isset($item2['counter_class'])) badge-{{$item2['counter_class']}} @else badge-info @endif">{{ $item2['counter'] }}</span>
                                                        @endif
                                                    </p>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            @endauth
            @guest
                <form method="post" action="{{ route('login') }}" class="sidebar-form hidden-collapsed login-form">
                    @csrf
                    @input(['name' => 'email', 'label' => 'E-Mailadresse'])
                    @input(['name' => 'password', 'label' => 'Passwort', 'type' => 'password'])
                    <input type="submit" class="btn btn-primary" value="Anmelden" />
                </form>
            @endguest
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                            {{ \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() }}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @include('components.flashmessage')
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3 control-sidebar-content">
            @yield('control-sidebar')
        </div>
    <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@auth
<script>
    window.Laravel = {!! json_encode([
       'csrfToken' => csrf_token(),
       'apiToken' => Auth::user()->api_token ?? null,
   ]) !!};
</script>
@endauth
<script src="{{ asset('js/bundle.js') }}" />
<!-- other libraries -->
<script src="{{ asset('js/pfarrplaner/forms.js') }}"></script>
@yield('scripts')
@if(env('MATOMO_SITE') >0)
<script>
    var _paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="//matomo.pfarrplaner.de/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '{{ env('MATOMO_SITE') }}']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
</script>
@endif
</body>
</html>
