<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Kuisioner IKM</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('vendor/reveal/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('vendor/reveal/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('vendor/reveal/lib/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('vendor/reveal/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/reveal/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/reveal/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/reveal/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/reveal/lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/reveal/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/sweet/sweetalert.css') }}">


  <!-- Main Stylesheet File -->
  <link href="{{ asset('vendor/reveal/css/style.css') }}" rel="stylesheet">
</head>

<body id="body">

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="/">Home</a></li>
          {{-- <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> --}}
          <li><a href="/login">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  
  <section id="intro">

    <div class="intro-content">
      <center>
        <img src="{{ asset('/vendor/img/logoetes.png') }}"><br><br>
        <h3><marquee width="1500px">Kami PASTI. Professional, Akuntabel, Sinergi, Transparan dan Inovatif</marquee></h3>
      </center>
    </div>

     

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('img/intro-carousel/1.jpg');"></div>
    </div>

  </section><!-- #intro -->

  <main id="main">
    @yield('content')
  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        Designed by <a href="#">BootstrapMade</a>
      </div>
      <div class="credits">
        &copy; Copyright <strong>Reveal</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('vendor/reveal/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/reveal/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('vendor/reveal/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/reveal/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('vendor/reveal/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('vendor/reveal/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('vendor/reveal/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('vendor/reveal/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendor/reveal/lib/magnific-popup/magnific-popup.min.js') }}"></script>
  <script src="{{ asset('vendor/reveal/lib/sticky/sticky.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('vendor/reveal/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('vendor/reveal/js/main.js') }}"></script>
  <script src="{{ asset('vendor/sweet/sweetalert.min.js') }}"></script>


  @yield('plugins')

</body>
</html>
