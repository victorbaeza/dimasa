@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
<link rel="stylesheet" href="/vendor/lightgallery/css/lightgallery.css">
<!-- lightgallery plugins -->
<link type="text/css" rel="stylesheet" href="/vendor/lightgallery/css/lg-zoom.css" />
<link type="text/css" rel="stylesheet" href="/vendor/lightgallery/css/lg-thumbnail.css" />
@stop
{{-- Content --}}
@section('content')
<div class="shop-boxed-banner banner mb-8 mb-lg-7 pb-7 pt-7" style="background-image: url('/images/empresa.jpg');height: 400px;background-position: 100% 40%;">
</div>

<section class="mb-10 appear-animate fadeIn appear-animation-visible">
            <div class="container">
              <h1 class="text-center mb-5">¿Quiénes somos?</h1>
              <p class="text-center">
                  En Dimasa contamos con una  experiencia en la distribución y comercialización de productos del sector de la construcción, aportando soluciones a nuestros clientes. Hoy día, Dimasa es uno de los referentes en la distribución y comercialización de material de instalación de la provincia de Mólaga, ofreciendo soluciones personalizadas a nuestros clientes: los profesionales. Tras 22 años en el sector, hemos madurado y profesionalizado nuestra empresa, puliendo cada detalle para facilitar y mejorar la experiencia de compra de nuestros clientes.
              </p>
            </div>
        </section>

        <div class="container appear-animate fadeIn appear-animation-visible">
        {{-- <h2 class="text-center mb-5">Nuestra historia</h2> --}}

        <section id="timeline" class="pl-0 pr-0 ">


          <div class="tl-item">

            <div class="tl-bg" style="background-image: url(https://placeimg.com/801/801/nature)"></div>

            <div class="tl-year">
              <p class="f2 heading--sanSerif">1996</p>
            </div>

            <div class="tl-content">
              <p>Dimasa se crea en Máaga en 1996, su fundador Juan José Martín, fue durante varios años delegado de la importante firma de saneamientos TERRAIN SDP. En esta fecha Terrain decide dejar la delegación propia y confiar la distribución en exclusiva para Máaga y provincia a Saneamientos Dimasa.</p>
            </div>

          </div>

          <div class="tl-item">

            <div class="tl-bg" style="background-image: url(https://placeimg.com/802/802/nature)"></div>

            <div class="tl-year">
              <p class="f2 heading--sanSerif">2000</p>
            </div>

            <div class="tl-content">
              <p>En Dimasa, pensamos a lo grande, así que decidimos mudarnos a otras instalaciones con el objetivo de crecer e incorporar nuevas familias de productos, creando así un amplio catálogo de posibilidades.</p>
            </div>

          </div>

          <div class="tl-item">

            <div class="tl-bg" style="background-image: url(https://placeimg.com/803/803/nature)"></div>

            <div class="tl-year">
              <p class="f2 heading--sanSerif">2017</p>
            </div>

            <div class="tl-content">
              <p>Tras más de 20 años de profesionalidad, y siendo unos de los referentes en el sector, necesitábamos dar un valor añadido a nuestros clientes: 5.000 m2 de nuevas instalaciones con parking privado, zona de autoservicio, almacén, exposición, nuevas oficinas y una sala de formación para los clientes.</p>
            </div>

          </div>

        </section>
      </div>

<section class="container mt-10 pt-5">
  <h2 class="title title-center">NUESTROS SERVICIOS</h2>
  <div class="owl-carousel owl-theme mb-10 pb-6 owl-loaded owl-drag theme-border pt-5" data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'loop': false,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4,
                            'dots': false
                        }
                    }
                }">




    <div class="owl-stage-outer">
      <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.5s ease 0s; width: 1200px;">
        <div class="owl-item active" style="width: 280px; margin-right: 20px;">
          <div class="icon-box icon-solid text-center">
            <span class="icon-box-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px" height="70px" viewBox="0 0 70 70" xml:space="preserve">
                <path opacity="0.5" d="M34.117,51.666c0.228,0.099,0.471,0.146,0.715,0.146c0.001,0,0.001,
                                    0,0.001,0  c0.242,0-0.502-0.048-0.275-0.146L64.5,38.522c0,0.008,0,0.016,0,0.022l3.405-1.028c0.66-0.28,1.587-0.924,1.601-1.642
                                    c0.014-0.717-0.149-1.377-0.799-1.682l-9.624-4.581l-21.985,9.37c-0.736,0.314-1.488,0.475-2.294,0.475
                                    c-0.813,0-1.586-0.163-2.33-0.481l-21.689-9.294l-9.734,4.54C0.397,34.524-0.012,35.183,0,35.9c0.011,0.719,
                                    0.446,1.363,1.105,1.646  l0.614,0.264c0-0.009-0.001-0.016-0.003-0.023L34.117,51.666z">
                </path>
                <path d="M34.833,55.938c-0.813,0-1.6-0.162-2.344-0.48l-21.675-9.285l-9.761,4.553c-0.651,0.303-1.063,
                                    0.961-1.051,1.679  c0.012,0.718,0.444,1.363,1.104,1.646l33.011,14.141c0.228,0.099,0.472,0.146,0.716,
                                    0.146c0.242,0,0.485-0.048,0.713-0.146  l33.345-14.172c0.662-0.28,1.096-0.924,1.109-1.643c0.013-0.717-0.396-1.376-1.047-1.682l-9.771-4.592l-22.024,9.36
                                    C36.422,55.778,35.639,55.938,34.833,55.938z"></path>
                <path d="M34.832,35.331C34.833,35.331,34.833,35.331,34.832,35.331c0.243,0,0.486-0.048,0.714-0.146l27.801-11.814l5.546-2.357
                                    c0.66-0.281,1.094-0.924,1.107-1.643c0.013-0.717-0.396-1.376-1.047-1.682L35.944,2.173c-0.49-0.231-1.055-0.231-1.544-0.002
                                    L1.053,17.718c-0.651,0.304-1.063,0.961-1.051,1.679c0.012,0.719,0.444,1.363,1.104,1.647l2.129,0.912l30.882,13.229
                                    C34.344,35.283,34.588,35.331,34.832,35.331z"></path>
              </svg>
            </span>
            <div class="icon-box-content">
              <h4 class="icon-box-title">Genus Quaimus Restinc</h4>
              <p>Sed egestas, ante et vulputate volutpat, ros pede sempe vitae luctus met.</p>
            </div>
          </div>
        </div>
        <div class="owl-item active" style="width: 280px; margin-right: 20px;">
          <div class="icon-box icon-solid text-center">
            <span class="icon-box-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px" height="70px" viewBox="0 0 70 70" xml:space="preserve">
                <path opacity="0.5" d="M35.48,0C17.678,0,3.821,6.841,3.821,15.574c0,0.167,0.076,0.331,0.089,0.497
                                    c7.111,5.235,18.469,8.716,31.19,8.716c13.138,0,24.399-3.656,31.399-9.199c0-0.004,0-0.009,
                                    0-0.013C66.5,6.696,53.264,0,35.48,0z"></path>
                <path d="M66.437,30.242c0.018-0.223,0.063-0.439,0.063-0.665V22.12c-7,4.952-19.053,8.001-31.582,8.001
                                    c-12.367,0-22.418-2.863-31.418-7.551v6.903c0,0.249,0.051,0.49,0.073,0.737C3.53,30.382,3.5,30.559,
                                    3.5,30.744v9.924  c7,5.443,18.954,9.07,31.885,9.07c12.744,0,25.115-3.441,31.115-8.721V30.744C66.5,
                                    30.57,66.474,30.404,66.437,30.242z"></path>
                <path d="M35.273,70C53.021,70,66.5,63.357,66.5,54.549v-8.233c-7,4.831-18.775,7.806-31.115,7.806
                                    c-12.538,0-22.885-3.149-31.885-8.174v8.496C3.5,63.167,17.51,70,35.273,70z">
                </path>
              </svg>
            </span>
            <div class="icon-box-content">
              <h4 class="icon-box-title">Beatus Nature Sumus</h4>
              <p>Sed egestas, ante et vulputate volutpat, ros pede sempe vitae luctus met.</p>
            </div>
          </div>
        </div>
        <div class="owl-item active" style="width: 280px; margin-right: 20px;">
          <div class="icon-box icon-solid text-center">
            <span class="icon-box-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px" height="70px" viewBox="0 0 70 70" xml:space="preserve">
                <path opacity="0.5" fill="#26b" d="M64.03,67.5H5.968c-2.125,0-4.107-1.979-5.171-3.821c-1.063-1.843-1.063-4.546,
                                    0-6.39L29.828,6.798   c1.064-1.842,3.045-3.09,5.172-3.09c2.126,0,4.108,1.092,5.171,2.934l29.03,50.257c1.064,
                                    1.843,1.064,4.951,0.002,6.794   C68.138,65.533,66.156,67.5,64.03,67.5z">
                </path>
                <path fill="#26b" d="M31.756,54.585c0-1.954,1.357-3.365,3.203-3.365c1.954,0,3.203,1.411,3.203,3.365
                                    c0,1.9-1.249,3.366-3.203,3.366C33.06,57.951,31.756,56.485,31.756,54.585z M33.113,
                                    46.82l-0.759-26.058h5.211L36.804,46.82H33.113   z"></path>
              </svg>
            </span>
            <div class="icon-box-content">
              <h4 class="icon-box-title">Appareat Conducunt</h4>
              <p>Sed egestas, ante et vulputate volutpat, ros pede sempe vitae luctus met.</p>
            </div>
          </div>
        </div>
        <div class="owl-item active" style="width: 280px; margin-right: 20px;">
          <div class="icon-box icon-solid text-center">
            <span class="icon-box-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px" height="70px" viewBox="0 0 70 70" xml:space="preserve">
                <g>
                  <g>
                    <path fill="none" d="M36.5,16.059c0-5.28-4.597-9.226-8.533-9.226c-3.904,0-8.467,3.945-8.467,9.226V22.5h17V16.059z">
                    </path>
                    <path opacity="0.5" d="M29.058,31.5H55.5v-3.452c0-3.171-1.965-5.548-5.136-5.548H40.5v-6.441C40.5,
                                            9.103,34.451,3,27.966,3    C21.518,3,15.5,9.103,15.5,16.059V22.5H6.92c-3.17,0-6.42,2.377-6.42,
                                            5.548V56.16c0,3.17,3.25,6.34,6.42,6.34H18.5V39.963    C18.5,34.803,23.897,31.5,29.058,31.5z M19.5,
                                            16.059c0-5.28,4.563-9.226,8.467-9.226c3.937,0,8.533,3.945,8.533,9.226V22.5h-17    V16.059z">
                    </path>
                  </g>
                </g>
                <path fill="#26b" d="M64.005,34.437c3.052,0,5.526,2.475,5.526,5.526v22.17c0,3.053-2.475,
                                    5.527-5.526,5.527H27.78  c-3.052,0-5.527-2.475-5.527-5.527v-22.17c0-3.051,2.475-5.526,
                                    5.527-5.526H64.005"></path>
                <path fill="#FFFFFF" d="M52.5,45.688c0,4.291-3.203,7.916-7.031,7.916c-3.791,
                                    0-6.969-3.625-6.969-7.916V43.5h-4v2.188  c0,6.479,4.998,11.75,10.969,11.75c6.006,
                                    0,11.031-5.271,11.031-11.75V43.5h-4V45.688z"></path>
              </svg>
            </span>
            <div class="icon-box-content">
              <h4 class="icon-box-title">Appareat Conducunt</h4>
              <p>Sed egestas, ante et vulputate volutpat, ros pede sempe vitae luctus met.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="d-icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="d-icon-angle-right"></i></button>
    </div>
    <div class="owl-dots disabled"></div>
  </div>
</section>

<section class="container mb-10 about-social ">
  <h2 class="title title-center">REDES SOCIALES</h2>
  <div class="social-links inline-links d-flex justify-content-center">
    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
    <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
    <a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>
  </div>
</section>

@stop
{{-- Scripts --}}
@section('scripts')
<script src="/vendor/lightgallery/lightgallery.min.js"></script>
<!-- lightgallery plugins -->
<script src="/vendor/lightgallery/plugins/thumbnail/lg-thumbnail.umd.js"></script>
<script src="/vendor/lightgallery/plugins/zoom/lg-zoom.umd.js"></script>
<script>
$(document).ready(function(){
  lightGallery(document.getElementById('lightgallery'), {
        plugins: [lgZoom, lgThumbnail],
        speed: 500,
    });
});
</script>
@stop
