@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
@stop
{{-- Content --}}
@section('content')
  <section id="clients" class="section-bg pt-0">
      <div class="shop-boxed-banner banner mb-5 mb-lg-7 pb-7 pt-7" id="brands-header" title="Marcas de Dimasa - Foto de Negocios creado por pressfoto - www.freepik.es" style="background-image: url('/images/marcas.jpg'); background-color: #ECEDEF;">
        <div class="banner-content container">
          <!-- <h2 class="banner-subtitle font-weight-semi-bold ls-m text-uppercase text-secondary mb-3">
            NUESTRAS ÚLTIMAS</h2> -->
          @if(isset($title))<h1 class="banner-title font-weight-bold text-primary ls-m mb-0">{{$title}}</h1>@else<h1 class="banner-title font-weight-bold text-primary ls-m mb-0">MARCAS CON LAS QUE TRABAJAMOS</h1>@endif
        </div>
      </div>
      <div class="container">
        <div class="row">
            @if(isset($title))
          <div class="col-12">
            <div class="brands-type">
      			<h2><a href="/marcas">
      				<i class="fa fa-arrow-left"></i> Volver a todas las marcas			</a></h2>
      		</div>
          </div>
        @endif
          <div class="col-12">
            <div class="brands-types-wrapper">
			<div class="brands-type">
			<h2><a href="/marcas/fontaneria" @if($title) class="active" @endif>
				Marcas de Fontanería			</a></h2>
		</div>
			<div class="brands-type">
			<h2><a href="/marcas/fontaneria">
				Marcas de ACS / Calefacción			</a></h2>
		</div>
			<div class="brands-type">
			<h2><a href="/marcas/fontaneria">
				Marcas de Aire Acondicionado			</a></h2>
		</div>
			<div class="brands-type">
			<h2><a href="/marcas/fontaneria">
				Marcas de Energía Renovable			</a></h2>
		</div>
			<div class="brands-type">
			<h2><a href="/marcas/fontaneria">
				Marcas de Tubería y Valvulería			</a></h2>
		</div>
			<div class="brands-type">
			<h2><a href="/marcas/fontaneria">
				Marcas de Contraincendios			</a></h2>
		</div>
			<div class="brands-type">
			<h2><a href="/marcas/fontaneria">
				Marcas de Bombeo			</a></h2>
		</div>
			<div class="brands-type">
			<h2><a href="/marcas/fontaneria">
				Marcas de Saneamientos			</a></h2>
		</div>
			<div class="brands-type">
			<h2><a href="/marcas/fontaneria">
				Marcas de Sanitarios y Griferías			</a></h2>
		</div>
			<div class="brands-type">
			<h2><a href="/marcas/fontaneria">
				Marcas de Ventilación			</a></h2>
		</div>
			<div class="brands-type">
			<h2><a href="/marcas/fontaneria">
				Marcas de Piscinas			</a></h2>
		</div>
	</div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="char-navigation mb-5 pt-4 pb-4 d-flex justify-content-center flex-wrap">
              <a class="char-navigation-element animated-scroll" href="#char_1" data-char="1"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">A</a>
              <a class="char-navigation-element animated-scroll" href="#char_2" data-char="2"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">B</a>
              <a class="char-navigation-element animated-scroll" href="#char_3" data-char="3"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">C</a>
              <a class="char-navigation-element animated-scroll" href="#char_4" data-char="4"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">D</a>
              <a class="char-navigation-element animated-scroll" href="#char_5" data-char="5"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">E</a>
              <a class="char-navigation-element animated-scroll" href="#char_6" data-char="6"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">F</a>
              <a class="char-navigation-element animated-scroll" href="#char_7" data-char="7"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">G</a>
              <a class="char-navigation-element animated-scroll" href="#char_8" data-char="8"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">H</a>
              <a class="char-navigation-element animated-scroll" href="#char_9" data-char="9"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">I</a>
              <a class="char-navigation-element animated-scroll" href="#char_10" data-char="10"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">J</a>
              <a class="char-navigation-element animated-scroll" href="#char_11" data-char="11"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">K</a>
              <a class="char-navigation-element animated-scroll" href="#char_12" data-char="12"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">L</a>
              <a class="char-navigation-element animated-scroll" href="#char_13" data-char="13"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">M</a>
              <a class="char-navigation-element animated-scroll" href="#char_14" data-char="14"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">N</a>
              <a class="char-navigation-element animated-scroll" href="#char_15" data-char="15"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">Ñ</a>
              <a class="char-navigation-element animated-scroll" href="#char_16" data-char="16"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">O</a>
              <a class="char-navigation-element animated-scroll" href="#char_17" data-char="17"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">P</a>
              <a class="char-navigation-element animated-scroll" href="#char_18" data-char="18"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">Q</a>
              <a class="char-navigation-element animated-scroll" href="#char_19" data-char="19"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">R</a>
              <a class="char-navigation-element animated-scroll" href="#char_20" data-char="20"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">S</a>
              <a class="char-navigation-element animated-scroll" href="#char_21" data-char="21"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">T</a>
              <a class="char-navigation-element animated-scroll" href="#char_22" data-char="22"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">U</a>
              <a class="char-navigation-element animated-scroll" href="#char_23" data-char="23"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">V</a>
              <a class="char-navigation-element animated-scroll" href="#char_24" data-char="24"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">W</a>
              <a class="char-navigation-element animated-scroll" href="#char_25" data-char="25"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">X</a>
              <a class="char-navigation-element animated-scroll" href="#char_26" data-char="26"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">Y</a>
              <a class="char-navigation-element animated-scroll" href="#char_27" data-char="27"
              data-scroll-options="{
                  'speed': 500,
                  'offset': 100,
                  'delay': 200
              }">Z</a>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <span class="char-navigation-index" id="char_1">A</span>
            <hr>
            <div class="row no-gutters clients-wrap clearfix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.genebre.es/templates/public/default/img/logo.jpg" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.mediclinics.es/img/mdccom-logo-1539083892.jpg" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.cvtechvac.com/wp-content/uploads/2020/07/logo-cvtech.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="http://www.domingorepresentative.com/wp-content/uploads/2019/04/DR-Logo-3rd-Apr.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.productosqp.com/pub/media/theme_options/default/logo_productos_qp.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://termat.es/assets/img/logo/termat.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://korman.com.es/assets/img/logo/korman.png" class="img-fluid" alt=""> </div></a>
                </div>
            </div>
          </div>
          <div class="col-lg-12">
            <span class="char-navigation-index" id="char_2">B</span>
            <hr>
            <div class="row no-gutters clients-wrap clearfix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="images/brands/brand1.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="images/brands/brand2.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="images/brands/brand3.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="images/brands/brand4.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="images/brands/brand5.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="images/brands/brand6.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="images/brands/brand7.png" class="img-fluid" alt=""> </div></a>
                </div>
            </div>
          </div>
          <div class="col-lg-12">
            <span class="char-navigation-index" id="char_3">C</span>
            <hr>
            <div class="row no-gutters clients-wrap clearfix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.genebre.es/templates/public/default/img/logo.jpg" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.mediclinics.es/img/mdccom-logo-1539083892.jpg" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.cvtechvac.com/wp-content/uploads/2020/07/logo-cvtech.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="http://www.domingorepresentative.com/wp-content/uploads/2019/04/DR-Logo-3rd-Apr.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.productosqp.com/pub/media/theme_options/default/logo_productos_qp.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://termat.es/assets/img/logo/termat.png" class="img-fluid" alt=""> </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://korman.com.es/assets/img/logo/korman.png" class="img-fluid" alt=""> </div></a>
                </div>
            </div>
          </div>
        </div>

      </div>
  </section>

@stop
{{-- Scripts --}}
@section('scripts')

@stop
