<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>uProject | @yield('title')</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('public/js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-C++cugH8+Uf86JbNOnQoBweHHAe/wVKN/mb0lTybu/NZ9sEYbd+BbbYtNpWYAsNP" crossorigin="anonymous">

      <!-- Libraries CSS Files -->
      <link href="{{ asset('public/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
      <link href="{{ asset('public/lib/animate/animate.min.css') }}" rel="stylesheet">
      <link href="{{ asset('public/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
      <link href="{{ asset('public/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
      <link href="{{ asset('public/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

      <!-- Main Stylesheet File -->
      <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

      <style>
          body
          {
            background-image: url("{{ asset('public/img/back3.jpg') }} ");
          }
      </style>
    
</head>
<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left mb-4" style="margin-top: -12px;">
        <a href="{{ url('/home') }}"><img src="{{ asset('public/img/uProject1.png') }}" height="50"></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
           <!-- Authentication Links -->
            @guest
                <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li>
                    <a href="{{URL::to('dashboard') }}"> Dashboard</a>
                </li>
                <li>
                    <a href="{{URL::to('userProfile') }}"> Profile</a>
                </li>
                <li>
                    <a href="{{URL::to('addProject') }}"> Start Project</a>
                </li>
                <li>
                    <a href="{{URL::to('project_status') }}"> Project Status</a>
                </li>
                @if(Auth::user()->role_id == 2)
                    <li>
                        <a href="{{URL::to('approveProject') }}"> Approve Project</a>
                    </li>
                    <li>
                        <a href="{{URL::to('adminPanel') }}"> Admin Panel</a>
                    </li>
                @endif
                <li class="dropdown">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-center" style="color: black;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><br><!-- #header -->
    <!--==========================
    Header end
  ============================--> 


<div id="app" class="mt-4">

    <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- Left Side Of Navbar --}}
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    {{-- Right Side Of Navbar --}}
                    <ul class="navbar-nav ml-auto">
                        {{-- Authentication Links --}}
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('dashboard') }}"> Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('userProfile') }}"> Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('addProject') }}"> Start Project</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('project_status') }}"> Project Status</a>
                            </li>
                            @if(Auth::user()->role_id == 2)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('approveProject') }}"> Approve Project</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('adminPanel') }}"> Admin Panel</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->

    <div class="container-fluid">
        @include('partials.errors')
        @include('partials.success')
        <main class="py-4">
            @yield('content')
        </main>
    </div>      
</div>

  <!--==========================
    Footer
  ============================-->
    @include('template.footer')
  <!--==========================
    Footer end
  ============================--> 


  <!--==========================
    Include JS
  ============================-->
  @include('template.allJS')
  <!--==========================
    Include JS end
  ============================--> 
</body>
</html>
