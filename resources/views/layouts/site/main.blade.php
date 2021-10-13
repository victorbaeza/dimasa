<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <title>Saneamientos Dimasa</title>

  <meta name="keywords" content="HTML5 Template" />
  <meta name="description" content="Saneamientos Dimasa">
  <meta name="author" content="D-THEMES">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="/images/favicon.png">

  <script>
    WebFontConfig = {
      google: {
        families: ['Poppins:300,400,500,600,700,800', 'Jost:400,600,700']
      }
    };
    (function(d) {
      var wf = d.createElement('script'),
        s = d.scripts[0];
      wf.src = 'js/webfont.js';
      wf.async = true;
      s.parentNode.insertBefore(wf, s);
    })(document);
  </script>


  <link rel="stylesheet" type="text/css" href="/vendor/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="/vendor/animate/animate.min.css">

  <!-- Plugins CSS File -->
  <link rel="stylesheet" type="text/css" href="/vendor/magnific-popup/magnific-popup.min.css">
  <link rel="stylesheet" type="text/css" href="/vendor/owl-carousel/owl.carousel.min.css">

  <!-- Main CSS File -->
  <link rel="stylesheet" type="text/css" href="/css/style.css?ver=1">
  <link rel="stylesheet" type="text/css" href="/css/intranet.css">
  <link rel="stylesheet" type="text/css" href="/css/calculadora.css">




  @yield('extracss')
</head>

<body class="home market">
  <div class="page-wrapper">
    @include('layouts.site.header')

    <main class="main">
      <div class="page-content">
        @yield('content')
      </div>
    </main>
    <!-- End Main -->

    @include('layouts.site.footer')
  </div>
  <!-- Sticky Footer -->
  <!-- <div class="sticky-footer sticky-content fix-bottom">
    <a href="#" class="sticky-link active">
      <i class="d-icon-home"></i>
      <span>Inicio</span>
    </a>
    <a href="@" class="sticky-link">
      <i class="d-icon-volume"></i>
      <span>Empresa</span>
    </a>
    <a href="#" class="sticky-link">
      <i class="d-icon-heart"></i>
      <span>Noticias</span>
    </a>
    <a href="#" class="sticky-link">
      <i class="d-icon-user"></i>
      <span>Formación</span>
    </a>
    <div class="header-search hs-toggle dir-up">
      <a href="#" class="search-toggle sticky-link">
        <i class="d-icon-search"></i>
        <span>Search</span>
      </a>
      <form action="#" class="input-wrapper">
        <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search your keyword..." required />
        <button class="btn btn-search" type="submit">
          <i class="d-icon-search"></i>
        </button>
      </form>
    </div>
  </div> -->
  <!-- Scroll Top -->
  <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>
  @include("layouts.site.mobile-menu")
  @include('layouts.site.login')

    </div>
  </div>

  <!-- Plugins JS File -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/jquery.plugin/jquery.plugin.min.js"></script>
  <script src="/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="/vendor/owl-carousel/owl.carousel.min.js"></script>
  <script src="/vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="/vendor/photoswipe/photoswipe.min.js"></script>
  <script src="/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
  {{-- <script src="/vendor/elevatezoom/jquery.elevatezoom.min.js"></script> --}}
  <script src="/vendor/jquery.countdown/jquery.countdown.min.js"></script>


  <!-- Main JS File -->
  <script src="/js/main.js"></script>

  @yield('scripts')
</body>

</html>
