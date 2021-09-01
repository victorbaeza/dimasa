@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
@stop
{{-- Content --}}
@section('content')
<section class="mt-4">
  <div class="container">

        <div class="row gutter-lg main-content-wrap">
          <aside
            class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
            <div class="sidebar-overlay"></div>
            <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
            <div class="sidebar-content">
              <div class="sticky-sidebar" data-sticky-options="{'top': 10}">
                <!-- <div class="filter-actions mb-4">
                  <a href="#" class="filter-clean">Clean All</a>
                </div> -->
                <div class="widget">
                  <h3 class="widget-title">Marca</h3>
                  <ul class="widget-body filter-items">
                    <li><a href="#">Crearplast</a></li>
                    <li><a href="#">raypero</a></li>
                    <li><a href="#">STH</a></li>
                    <li><a href="#">Evocell</a></li>
                  </ul>
                </div>
                <div class="widget">
                  <h3 class="widget-title">Medida</h3>
                  <ul class="widget-body filter-items">
                    <li><a href="#">1"</a></li>
                    <li><a href="#">1" - 3/4"</a></li>
                    <li><a href="#">1/2" - 3/4"</a></li>
                    <li><a href="#">1/2"</a></li>
                  </ul>
                </div>
                <div class="widget">
                  <h3 class="widget-title">Diámetro</h3>
                  <ul class="widget-body filter-items">
                    <li><a href="#">110</a></li>
                    <li><a href="#">110-4</a></li>
                    <li><a href="#">125</a></li>
                    <li><a href="#">140</a></li>
                    <li><a href="#">16</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </aside>
          <div class="col-lg-9 main-content">

            <nav class="toolbox sticky-toolbox sticky-content fix-top pt-0">
              <div class="toolbox-left">
                <h1 class="title shop-title mb-0">Accesorios PVC para fontanería</h1>
              </div>
              <div class="toolbox-right">
                <a href="#" class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary btn-icon-right d-lg-none">Filtrar<i class="d-icon-arrow-right"></i></a>
                <div class="toolbox-item toolbox-sort select-box text-dark">
                  <label>MOSTRAR :</label>
                  <select name="orderby" class="form-control">
                    <option value="" selected="selected">20</option>
                    <option value="rating">100</option>
                    <option value="date">200</option>
                    <option value="price-low">500</option>
                  </select>
                </div>

                <a href="#" class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary btn-icon-right d-lg-none">Filtrar<i class="d-icon-arrow-right"></i></a>
                <div class="toolbox-item toolbox-sort select-box text-dark">
                  <label>Ordenar :</label>
                  <select name="orderby" class="form-control">
                    <option value="" selected="selected">-</option>
                    <option value="popularity">Popularidad</option>
                    <option value="rating">Valoraciones</option>
                    <option value="date">Nuevo a antiguo</option>
                    <option value="price-low">Precio más bajo</option>
                    <option value="price-high">Precio más alto</option>
                  </select>
                </div>
              </div>
            </nav>
            {{-- <div class="row cols-xl-5 cols-md-4 cols-2">
                    <div class="product-wrap h-100 mb-0">
                      <div class="product product-border text-center h-100">
                        <figure class="product-media">
                          <a href="{{ route('products.product') }}">
                            <img src="/images/product1.jpg" alt="product" width="260" height="293">
                          </a>
                        </figure>
                        <div class="product-details">
                          <h3 class="product-name">
                            <a href="{{ route('products.product') }}">CODO H-H EVAC. SERIE B TERRAIN</a>
                          </h3>
                          <div class="product-price">
                            <ins class="new-price">198.00 €</ins><del class="old-price">270.00 €</del>
                          </div>
                          <div class="ratings-container">
                            <div class="ratings-full">
                              <span class="ratings" style="width:100%"></span>
                              <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="{{ route('products.product') }}" class="rating-reviews">( 6 valoraciones
                              )</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="product-wrap h-100 mb-0">
                      <div class="product product-border text-center h-100">
                        <figure class="product-media">
                          <a href="{{ route('products.product') }}">
                            <img src="/images/product2.jpg" alt="product" width="260" height="293">
                          </a>
                        </figure>
                        <div class="product-details">
                          <h3 class="product-name">
                            <a href="{{ route('products.product') }}">CODO EVAC. SERIE B TERRAIN BLANCO</a>
                          </h3>
                          <div class="product-price">
                            <span class="price">50.00 €</span>
                          </div>
                          <div class="ratings-container">
                            <div class="ratings-full">
                              <span class="ratings" style="width:80%"></span>
                              <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="{{ route('products.product') }}" class="rating-reviews">( 4 valoraciones
                              )</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="product-wrap h-100 mb-0">
                      <div class="product product-border text-center h-100">
                        <figure class="product-media">
                          <a href="{{ route('products.product') }}">
                            <img src="/images/product3.jpg" alt="product" width="260" height="293">
                          </a>
                        </figure>
                        <div class="product-details">
                          <h3 class="product-name">
                            <a href="{{ route('products.product') }}">LG UD. INTERIORES MULTI INVERTER - CONFORT CONNECT</a>
                          </h3>
                          <div class="product-price">
                            <ins class="new-price">1.154,21 €</ins><del class="old-price">1.184,63 €</del>
                          </div>
                          <div class="ratings-container">
                            <div class="ratings-full">
                              <span class="ratings" style="width:100%"></span>
                              <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="{{ route('products.product') }}" class="rating-reviews">( 2 valoraciones
                              )</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="product-wrap h-100 mb-0">
                      <div class="product product-border text-center h-100">
                        <figure class="product-media">
                          <a href="{{ route('products.product') }}">
                            <img src="/images/product4.jpg" alt="product" width="260" height="293">
                          </a>
                        </figure>
                        <div class="product-details">
                          <h3 class="product-name">
                            <a href="{{ route('products.product') }}">SIME CALENTADOR ATMOSFERICO MINI OF Erp</a>
                          </h3>
                          <div class="product-price">
                            <span class="price">230.00 €</span>
                          </div>
                          <div class="ratings-container">
                            <div class="ratings-full">
                              <span class="ratings" style="width:60%"></span>
                              <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="{{ route('products.product') }}" class="rating-reviews">( 8 valoraciones
                              )</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="product-wrap h-100 mb-0">
                      <div class="product product-border text-center h-100">
                        <figure class="product-media">
                          <a href="{{ route('products.product') }}">
                            <img src="/images/product6.jpg" alt="product" width="260" height="293">
                          </a>
                        </figure>
                        <div class="product-details">
                          <h3 class="product-name">
                            <a href="{{ route('products.product') }}">MANGUITO TIPO SAMBRA</a>
                          </h3>
                          <div class="product-price">
                            <ins class="new-price">15.21 €</ins><del class="old-price">18.63 €</del>
                          </div>
                          <div class="ratings-container">
                            <div class="ratings-full">
                              <span class="ratings" style="width:100%"></span>
                              <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="{{ route('products.product') }}" class="rating-reviews">( 2 valoraciones
                              )</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="product-wrap h-100 mb-0">
                      <div class="product product-border text-center h-100">
                        <figure class="product-media">
                          <a href="{{ route('products.product') }}">
                            <img src="/images/product7.jpg" alt="product" width="260" height="293">
                          </a>
                        </figure>
                        <div class="product-details">
                          <h3 class="product-name">
                            <a href="{{ route('products.product') }}">B.I.E. 25mm-20m VERSAL RAL3000</a>
                          </h3>
                          <div class="product-price">
                            <ins class="new-price">198.00 €</ins><del class="old-price">270.00 €</del>
                          </div>
                          <div class="ratings-container">
                            <div class="ratings-full">
                              <span class="ratings" style="width:100%"></span>
                              <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="{{ route('products.product') }}" class="rating-reviews">( 6 valoraciones
                              )</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="product-wrap h-100 mb-0">
                      <div class="product product-border text-center h-100">
                        <figure class="product-media">
                          <a href="{{ route('products.product') }}">
                            <img src="/images/product1.jpg" alt="product" width="260" height="293">
                          </a>
                        </figure>
                        <div class="product-details">
                          <h3 class="product-name">
                            <a href="{{ route('products.product') }}">CODO H-H EVAC. SERIE B TERRAIN</a>
                          </h3>
                          <div class="product-price">
                            <ins class="new-price">198.00 €</ins><del class="old-price">270.00 €</del>
                          </div>
                          <div class="ratings-container">
                            <div class="ratings-full">
                              <span class="ratings" style="width:100%"></span>
                              <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="{{ route('products.product') }}" class="rating-reviews">( 6 valoraciones
                              )</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> --}}

                  <div class="row product-wrapper equal-height">
                            <div class="col-md-3 col-6">
                                <div class="product product-image-gap">
                                  <a href="{{route('products.product')}}">
                                    <figure class="product-media">
                                            <img src="/images/product1.jpg" alt="product" width="280" height="315">
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-name">
                                            CODO H-H EVAC. SERIE B TERRAIN
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">199,00 €</ins><del class="old-price">210,00 €</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <span class="rating-reviews">( 6 valoraciones )</span>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="product product-image-gap">
                                  <a href="{{route('products.product')}}">
                                    <figure class="product-media">
                                            <img src="/images/product2.jpg" alt="product" width="280"
                                                height="315">
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-name">MANGUITO TIPO SAMBRA
                                        </h3>
                                        <div class="product-price">
                                            <span class="price">35,00 €</span>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                              <span class="rating-reviews">( 6 valoraciones )</span>
                                        </div>
                                    </div>
                                  </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="product product-image-gap">
                                  <a href="{{route('products.product')}}">
                                    <figure class="product-media">
                                            <img src="/images/product3.jpg" alt="product" width="280"
                                                height="315">

                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-name">B.I.E. 25mm-20m VERSAL RAL3000
                                        </h3>
                                        <div class="product-price">
                                            <span class="price">590,00 €</span>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                              <span class="rating-reviews">( 6 valoraciones )</span>
                                        </div>
                                    </div>
                                  </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="product product-image-gap">
                                  <a href="{{route('products.product')}}" class="rating-reviews">
                                    <figure class="product-media">
                                            <img src="/images/product4.jpg" alt="product" width="280"
                                                height="315">

                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-name">CODO H-H EVAC. SERIE B TERRAIN
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">198,00 €</ins><del class="old-price">270,00 €</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                              <span class="rating-reviews">( 6 valoraciones )</span>
                                        </div>
                                    </div>
                                  </a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <nav class="toolbox toolbox-pagination mt-6">
              <p class="show-info">Mostrando <span>7 de 7</span> productos</p>
              <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                    <i class="d-icon-arrow-left"></i>Anterior
                  </a>
                </li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
                <li class="page-item">
                  <a class="page-link page-link-next" href="#" aria-label="Next">
                    Siguiente<i class="d-icon-arrow-right"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="mt-5 container">
          <p style="text-align: justify;font-size: 12px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie facilisis nisl a gravida. Suspendisse potenti. In eu pellentesque nibh, nec lobortis nunc. <b>Proin efficitur lobortis lacus</b>, vel dapibus ex faucibus sed. Nullam blandit pharetra leo vitae suscipit. Pellentesque eu mollis turpis. Duis ornare congue turpis, vel malesuada arcu malesuada et. Curabitur luctus maximus augue, vel sagittis lorem euismod ut. Donec vel ligula a massa dignissim mattis id eget tellus. Maecenas aliquet non quam eu finibus. <b>Sed ornare</b> bibendum est. Nullam at sagittis nibh. Aenean sodales odio convallis vulputate blandit. Curabitur feugiat, massa quis dictum facilisis, mauris enim dapibus neque, sit amet vulputate nulla justo vestibulum mi. Nullam ultrices eros et tellus pulvinar, at rhoncus ante aliquam. Vivamus efficitur efficitur iaculis.

<br><br>Cras nec <b>justo sit amet diam pulvinar</b> tincidunt. Nam a vestibulum magna, quis rhoncus erat. <b>Nulla finibus</b> finibus malesuada. Etiam accumsan mauris nulla, quis malesuada velit faucibus id. Aliquam id sapien malesuada, scelerisque augue ac, pharetra turpis. Nam convallis nisi eleifend venenatis dictum. Aliquam erat volutpat.</p>
  </section>

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
