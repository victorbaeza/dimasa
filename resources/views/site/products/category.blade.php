@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
@stop
{{-- Content --}}
@section('content')
<section class="mt-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 d-lg-show" id="menu-lat">
          <div class="widget widget-collapsible border-no">
										<ul class="widget-body filter-items search-ul">
											<li class="with-ul">
                        <a href="/catalogo/fontaneria">
                          <img width="22" src="/images/icons/azules/1.png" class="mr-1" />Fontanería
                          <i class="fas fa-chevron-down"></i>
                        </a>
												<ul style="display: none;">
													<li><a href="#">Lorem ipsum</a></li>
												</ul>
											</li>
											<li class="with-ul">
                        <a href="/catalogo/fontaneria">
                          <img width="22" src="/images/icons/azules/2.png" class="mr-1" />ACS / Calefacción
                          <i class="fas fa-chevron-down"></i>
                        </a>
												<ul>
													<li><a href="#">Lorem ipsum</a></li>
												</ul>
											</li>
                      <li class="with-ul">
                        <a href="/catalogo/fontaneria">
                          <img width="22" src="/images/icons/azules/3.png" class="mr-1" />Aire acondicionado
                          <i class="fas fa-chevron-down"></i>
                        </a>
												<ul>
													<li><a href="#">Lorem ipsum</a></li>
												</ul>
											</li>
                      <li class="with-ul">
                        <a href="/catalogo/fontaneria">
                          <img width="22" src="/images/icons/azules/4.png" class="mr-1" />Energía renovable
                          <i class="fas fa-chevron-down"></i>
                        </a>
												<ul>
													<li><a href="#">Lorem ipsum</a></li>
												</ul>
											</li>
                      <li class="with-ul">
                        <a href="/catalogo/fontaneria">
                          <img width="22" src="/images/icons/azules/5.png" class="mr-1" />Tubería y valvulería
                          <i class="fas fa-chevron-down"></i>
                        </a>
												<ul>
													<li><a href="#">Lorem ipsum</a></li>
												</ul>
											</li>
                      <li class="with-ul">
                        <a href="/catalogo/fontaneria">
                          <img width="22" src="/images/icons/azules/6.png" class="mr-1" />Contraincendios
                          <i class="fas fa-chevron-down"></i>
                        </a>
												<ul>
													<li><a href="#">Lorem ipsum</a></li>
												</ul>
											</li>
                      <li class="with-ul">
                        <a href="/catalogo/fontaneria">
                          <img width="22" src="/images/icons/azules/7.png" class="mr-1" />Bombeo
                          <i class="fas fa-chevron-down"></i>
                        </a>
												<ul>
													<li><a href="#">Lorem ipsum</a></li>
												</ul>
											</li>
										</ul>
									</div>
        </div>
        <div class="col-lg-9">
          <nav class="breadcrumb-nav">
            <div>
              <ul class="breadcrumb">
                <li><a href="/"><i class="d-icon-home"></i></a></li>
                <li>Fontanería</li>
              </ul>
            </div>
          </nav>
          <div class="shop-boxed-banner banner mb-8 mb-lg-7" style="background-image: url('/images/banner-categoria.jpg'); background-color: #ECEDEF;background-position: 0px -25rem;">
              <div class="banner-content">
                  <h2 class="banner-subtitle font-weight-semi-bold ls-m text-uppercase text-secondary mb-3">
                      Distribuidor de fontanería y tubería</h2>
                  <h1 class="banner-title font-weight-bold text-primary ls-m mb-6">FONTANERÍA</h1>
              </div>
          </div>
          <div class="row cols-xl-5 cols-lg-6 cols-md-4 cols-sm-3 cols-2">

              <div class="category category-absolute category-classic mb-5">
                  <a href="{{ route('products.category_products') }}">
                      <figure class="category-media">
                          <img src="/images/categoria1.png" alt="Cateogry" width="280" height="280">
                      </figure>
                      <!-- <div class="category-content">
                          <h4 class="category-name">PVC</h4>
                          <span class="category-count">1 Productos</span>
                        </div> -->
                  </a>
              </div>
              <div class="category category-absolute category-classic mb-5">
                  <a href="{{ route('products.category_products') }}">
                      <figure class="category-media">
                          <img src="/images/categoria2.png" alt="Cateogry" width="280" height="280">
                      </figure>
                      <!-- <div class="category-content">
                          <h4 class="category-name">Polibutileno</h4>
                          <span class="category-count">1 Productos</span>
                        </div> -->
                  </a>
              </div>
              <div class="category category-absolute category-classic mb-5">
                  <a href="{{ route('products.category_products') }}">
                      <figure class="category-media">
                          <img src="/images/categoria3.png" alt="Cateogry" width="280" height="280">
                      </figure>
                      <!-- <div class="category-content">
                          <h4 class="category-name">Polipropileno</h4>
                          <span class="category-count">1 Productos</span>
                        </div> -->
                  </a>
              </div>
              <div class="category category-absolute category-classic mb-5">
                  <a href="{{ route('products.category_products') }}">
                      <figure class="category-media">
                          <img src="/images/categoria4.png" alt="Cateogry" width="280" height="280">
                      </figure>
                      <!-- <div class="category-content">
                          <h4 class="category-name">Reticulado</h4>
                          <span class="category-count">0 Productos</span>
                        </div> -->
                  </a>
              </div>
              <div class="category category-absolute category-classic mb-5">
                  <a href="{{ route('products.category_products') }}">
                      <figure class="category-media">
                          <img src="/images/categoria5.png" alt="Cateogry" width="280" height="280">
                      </figure>
                      <!-- <div class="category-content">
                          <h4 class="category-name">Multicapa</h4>
                          <span class="category-count">0 Productos</span>
                        </div> -->
                  </a>
              </div>
              <div class="category category-absolute category-classic mb-5">
                  <a href="{{ route('products.category_products') }}">
                      <figure class="category-media">
                          <img src="/images/categoria6.png" alt="Cateogry" width="280" height="280">
                      </figure>
                      <!-- <div class="category-content">
                          <h4 class="category-name">Polietileno</h4>
                          <span class="category-count">7 Productos</span>
                        </div> -->
                  </a>
              </div>
          </div>
          <div class="mt-5">
              <p style="text-align: justify;font-size: 12px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie facilisis nisl a gravida. Suspendisse potenti. In eu pellentesque nibh, nec lobortis nunc. <b>Proin efficitur
                      lobortis lacus</b>, vel dapibus ex faucibus sed. Nullam blandit pharetra leo vitae suscipit. Pellentesque eu mollis turpis. Duis ornare congue turpis, vel malesuada arcu malesuada et. Curabitur luctus maximus augue, vel sagittis
                  lorem euismod ut. Donec vel ligula a massa dignissim mattis id eget tellus. Maecenas aliquet non quam eu finibus. <b>Sed ornare</b> bibendum est. Nullam at sagittis nibh. Aenean sodales odio convallis vulputate blandit. Curabitur
                  feugiat, massa quis dictum facilisis, mauris enim dapibus neque, sit amet vulputate nulla justo vestibulum mi. Nullam ultrices eros et tellus pulvinar, at rhoncus ante aliquam. Vivamus efficitur efficitur iaculis.

                  <br><br>Cras nec <b>justo sit amet diam pulvinar</b> tincidunt. Nam a vestibulum magna, quis rhoncus erat. <b>Nulla finibus</b> finibus malesuada. Etiam accumsan mauris nulla, quis malesuada velit faucibus id. Aliquam id sapien
                  malesuada, scelerisque augue ac, pharetra turpis. Nam convallis nisi eleifend venenatis dictum. Aliquam erat volutpat.
              </p>
          </div>
      </div>
  </section>
        </div>
      </div>

@stop
{{-- Scripts --}}
@section('scripts')
<script>
$(document).ready(function(){
  var segments = window.location.pathname.split('/');
  if(segments.length == 3 && segments[1] == 'catalogo'){
    var menu = $('.category-dropdown .dropdown-box');
    menu.remove();

    // menu.css({
    //   "transform": "translate3d(0, 0, 0)",
    //   "visibility": "visible",
    //   "opacity": "1",
    //   "top": 0,
    //   "box-shadow": "none",
    //   "position": "relative",
    // });
  }

});
</script>
@stop
