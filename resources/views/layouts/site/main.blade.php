<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Ibermedia">
      <!-- Favicon Icon -->
      <link rel="apple-touch-icon" sizes="32x32" href="/images/favicon-32x32.png">
      <link rel="icon" type="image/png" href="/images/favicon-32x32.png">

      <title>@if(isset($title)){{$title}}@else @lang('seo.titles.main') @endif</title>
      <meta name="description" content="@if(isset($description)){{$description}}@else @lang('seo.descriptions.main') @endif">
      <meta name="keywords" content="@section('keywords') @show">
      <!-- Dublin Core Schema -->
      <link rel="schema.dcterms" href="http://purl.org/dc/terms/">
      <meta name=DC.Language content=es>
      <meta property="dcterms:title" content="@if(isset($title)){{$title}}@else @lang('seo.titles.main') @endif">
      <meta property="dcterms:description" content="@if(isset($description)){{$description}}@else @lang('seo.descriptions.main') @endif">
      <meta property="dcterms:subject" content="@section('dc_subject')  @show">
      <meta property="dcterms:identifier" content="@section('dc_id')  @show">
      <!-- OpenGraph Schema -->
      <meta property=og:locale content="es">
      <meta property=og:type content="article">
      <meta property=og:site_name content="@section('og_sitename') Nombre  @show">
      <meta property=og:title content="@if(isset($title)){{$title}}@else @lang('seo.titles.main') @endif">
      <meta property=og:description content="@if(isset($description)){{$description}}@else @lang('seo.descriptions.main') @endif">
      <meta property=og:url content="@section('og_url') {{Request::url()}} @show">
      <meta property="og:image" content="@section('og_image') @show">
      <!-- Twitter Cards -->
      <meta name=twitter:card content=summary>
      <meta name=twitter:title content="@if(isset($title)){{$title}}@else @lang('seo.titles.main') @endif">
      <meta name=twitter:description content="@if(isset($description)){{$description}}@else @lang('seo.descriptions.main') @endif">
      <meta name=twitter:image content="@section('tw_image')  @show">
      <meta name=twitter:site content=@twitter>



      {{-- CSS STYLES --}}
      <link rel="stylesheet" media="screen" href="/css/vendor.min.css">
      <link id="mainStyles" rel="stylesheet" media="screen" href="/css/styles.min.css">
      <link href="/vendor/font-awesome/css/font-awesome.css" rel="stylesheet">
      <link rel="stylesheet" media="screen" href="/css/customizer.min.css">
      <link rel="stylesheet" media="screen" href="/css/main.css">
      <script src="/js/modernizr.min.js"></script>
      <script src="https://kit.fontawesome.com/1241dd5bb4.js" crossorigin="anonymous"></script>

      @yield('extracss')

      @if(isset($canonical) && $canonical) <link rel="canonical" href="{{$canonical}}" /> @endif
      @if(isset($prev)) <link rel="prev" href="{{$prev}}" /> @endif
      @if(isset($next)) <link rel="next" href="{{$next}}" /> @endif

</head>
<body>


    @include('layouts.site.header')


      {{-- MAIN DIV WRAPPER --}}
      <div class="offcanvas-wrapper">

        @include('layouts.site.notifications')

        @yield('content')

      </div>


    @include('layouts.site.footer')

</body>
</html>
