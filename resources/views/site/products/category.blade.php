@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
  <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
@stop
{{-- Content --}}
@section('content')
<section class="mt-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 d-lg-show" id="menu-lat" style="max-width: 20%">
          <div class="widget widget-collapsible border-no">
										<ul class="widget-body filter-items search-ul">
											<li class="with-ul">
                        <a href="/catalogo/fontaneria">
                          <img width="22" src="/images/icons/azules/1.png" class="mr-1" />Fontanería
                          <i class="fas fa-chevron-down"></i>
                        </a>
												<ul>
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
        <div class="col-lg-9 col-12" id="category-column">
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
          <div class="row cols-lg-4 cols-md-3 cols-sm-2 cols-1">

            <div class="category category-absolute category-classic mb-5">
              <a href="{{ route('products.category_products') }}">
                  <figure class="category-media">
                      <img src="/images/categoria1.jpg" alt="Cateogry" />
                  </figure>
                  <div class="category-content">
                      <h4 class="category-name">PVC</h4>
                      <span class="category-count">20 productos</span>
                  </div>
                </a>

                <select class="form-control category-selector">
                  <option >- Elige una categoría -</option>
                  <option data-href="{{route('products.category_products')}}">Tubería insonoro</option>
                  <option data-href="{{route('products.category_products')}}">Tubería insonoro plus</option>
                </select>
                {{-- <div class="accordion accordion-boxed accordion-plus accordion-gutter-md category-selector" style="position:absolute;z-index: 999;width: 100%;">
                    <div class="card">
                        <div class="card-header">
                            <a href="#collapse3-1" class="expand" style="width: 100%;">First Header</a>
                        </div>
                        <div id="collapse3-1" class="collapsed">
                            <div class="card-body">
                              <div class="category-selection" data-href="{{route('products.category_products')}}">
                                <div class="d-flex align-items-center">
                                  <img src="/images/product1.jpg" class="mr-1" style="width: 40px;height: 40px !important;margin-left: 0;margin-right: 0;object-fit: contain;" /><span>Tubería insonoro</span>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

              </div>
              <div class="category category-absolute category-classic mb-5">
                <a href="{{ route('products.category_products') }}">
                    <figure class="category-media">
                        <img src="/images/categoria2.jpg" alt="Cateogry" />
                    </figure>
                    <div class="category-content">
                        <h4 class="category-name">Polibutileno</h4>
                        <span class="category-count">20 productos</span>
                    </div>
                  </a>
                  <select class="form-control category-selector">
                    <option>- Elige una categoría -</option>
                    <option data-href="{{route('products.category_products')}}">Tubería PB</option>
                    <option data-href="{{route('products.category_products')}}">Accesorios PB</option>
                  </select>
                </div>
                <div class="category category-absolute category-classic mb-5">
                  <a href="{{ route('products.category_products') }}">
                      <figure class="category-media">
                          <img src="/images/categoria3.jpg" alt="Cateogry" />
                      </figure>
                      <div class="category-content">
                          <h4 class="category-name">Polipropileno</h4>
                          <span class="category-count">46 productos</span>
                      </div>
                    </a>
                    <select class="form-control category-selector">
                      <option>- Elige una categoría -</option>
                      <option data-href="{{route('products.category_products')}}">Tubería PB</option>
                      <option data-href="{{route('products.category_products')}}">Accesorios PB</option>
                    </select>
                  </div>
                  <div class="category category-absolute category-classic mb-5">
                    <a href="{{ route('products.category_products') }}">
                        <figure class="category-media">
                            <img src="/images/categoria4.jpg" alt="Cateogry" />
                        </figure>
                        <div class="category-content">
                            <h4 class="category-name">Polietileno</h4>
                            <span class="category-count">33 productos</span>
                        </div>
                      </a>
                      <select class="form-control category-selector">
                        <option>- Elige un producto -</option>
                        <option data-href="{{route('products.product')}}"><img src="/images/producto1.png" width="20" />TUBO PE40 BD 4 ATM.</option>
                        <option data-href="{{route('products.product')}}">TUBO PE40 BD 6 ATM.</option>
                      </select>

                    </div>
          </div>
          <div class="mt-10">
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
<script src="{{asset('js/select2.min.js')}}"></script>
<script>
$(document).ready(function(){
  $('.category-selector').select2();
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

  setCategorySelectorEvent();

});

function setCategorySelectorEvent()
{
  var selectors = $('.category-selector');

  selectors.on('change', function(){
    var href = $(this).find('option:selected').data('href');
    if(href != undefined)
    window.location.href = href;
  });
}
</script>
@stop
