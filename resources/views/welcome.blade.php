<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>uProject</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('public/img/logo.svg') }}" rel="icon">
  <link href="{{ asset('public/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('public/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('public/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left" style="margin-top: -12px;">
        {{-- <h1><a href="#header" class="scrollto">uProject</a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#intro"><img src="{{ asset('public/img/uProject1.png') }}" height="50" ></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          
          @if (Route::has('login'))
              <li><a href="#about">About Us</a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#portfolio">Portfolio</a></li>
              <!-- <li><a href="#team">Team</a></li> -->
              <li><a href="#contact">Contact</a></li>  
              @auth
                  <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>     
              @else
                  <li><a href="{{ route('login') }}">Login</a></li>
                  @if (Route::has('register'))
                      <li><a href="{{ route('register') }}">Register</a></li>
                  @endif
              @endauth    
          @endif
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
    <!--==========================
    Header end
  ============================-->
  

  <!--==========================
    slider Section
  ============================-->
    @include('template.slider')
  <!--==========================
    slider Section end
  ============================-->

  <main id="main">

    <!--===========================
      Featured Services Section
    ============================-->
    {{-- @include('template.feature') --}}
    <!--===========================
      Featured Services Section end
    =============================-->
    

    <!--==========================
      About Us Section
    ============================-->
      @include('template.about')
    <!--==========================
      About Us Section End
    ============================-->
    

    <!--==========================
      Services Section
    ============================-->
      @include('template.service')
    <!--==========================
      Services Section end
    ============================-->
    

    <!--==========================
      Call To Action Section
    ============================-->
    {{-- @include('template.callTo') --}}
    <!--==========================
      Call To Action Section end
    ============================-->


    <!--==========================
      Skills Section
    ============================-->
      @include('template.skills')
    <!--==========================
      Skills Section
    ============================-->
    

    <!--==========================
      Facts Section
    ============================-->
      @include('template.facts')
    <!--==========================
      Facts Section end
    ============================-->
    

    <!--==========================
      Portfolio Section
    ============================-->
      @include('template.portfolio')
    <!--==========================
      Portfolio Section end
    ============================-->


    <!--==========================
      Clients Section
    ============================-->
    {{-- @include('template.clients') --}}
    <!--==========================
      Clients Section
    ============================-->
    

    <!--==========================
      Clients testimony Section
    ============================-->
    {{-- @include('template.testimony') --}}
    <!--===========================
      Clients testimony Section end
    =============================-->


    <!--==========================
      Team Section
    ============================-->
    {{-- @include('template.team') --}}
    <!--==========================
      Team Section end
    ============================-->


    <!--==========================
      Contact us Section
    ============================-->
      @include('template.contactUs')
    <!--==========================
      Contact us Section
    ============================-->
    

  </main>

  <!--==========================
    Footer
  ============================-->
    @include('template.footer')
  <!--==========================
    Footer end
  ============================-->
  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


  <!--==========================
    Include JS
  ============================-->
  @include('template.allJS')
  <!--==========================
    Include JS end
  ============================-->

</body>
</html>
