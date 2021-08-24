@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
@stop
{{-- Content --}}
@section('content')
  <section class="intro-section">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-9 mb-4">
                  <div class="owl-carousel owl-theme owl-dot-inner row gutter-no cols-1 animation-slider"
                      data-owl-options="{
                      'nav': false,
                      'dots': true,
                      'autoplay': false,
                      'items': 1
                  }">
                  <div class="banner banner-fixed content-middle intro-slide intro-slide2">
                      <figure>
                          <img src="images/slider2.jpg" alt="Banner" width="1030"
                              height="450" style="background-color: #e2e2e3;" />
                      </figure>
                      {{-- <div class="banner-content text-right">
                          <div class="slide-animate" data-animation-options="{
                              'name': 'fadeInRightShorter', 'duration': '1s'
                          }">
                              <h5 class="banner-subtitle text-capitalize font-weight-normal">Find Your
                                  Trending</h5>
                              <h3 class="banner-title text-uppercase font-weight-bold ls-m">Autumn style
                              </h3>
                              <div
                                  class="banner-price-info font-weight-semi-bold text-dark text-uppercase ls-m">
                                  Get Up To <span class="text-primary">20% Off</span>
                              </div>
                              <p class="text-dark font-weight-normal">* Only until the end of this week
                              </p>
                              <a href="market1-shop.html" class="btn btn-dark btn-outline btn-rounded">
                                  Shop Now<i class="d-icon-arrow-right"></i></a>
                          </div>
                      </div> --}}
                  </div>
                      <div class="banner banner-fixed content-middle intro-slide intro-slide1">
                          <figure>
                              <img src="images/slider1.png" alt="Banner" width="1030"
                                  height="450" style="background-color: #fefefe;" />
                          </figure>
                          {{-- <div class="banner-content">
                              <div class="slide-animate" data-animation-options="{
                                  'name': 'fadeInLeftShorter', 'duration': '1s'
                              }">
                                  <h5 class="banner-subtitle text-capitalize font-weight-normal">Lifestyle
                                      Collection</h5>
                                  <h3 class="banner-title text-uppercase font-weight-bold ls-m">for Ski
                                      Clothes</h3>
                                  <div
                                      class="banner-price-info font-weight-semi-bold text-body text-uppercase ls-m">
                                      Sale Up To <span class="text-primary">30% Off</span>
                                  </div>
                                  <a href="market1-shop.html" class="btn btn-dark btn-outline btn-rounded">
                                      Shop Now<i class="d-icon-arrow-right"></i></a>
                              </div>
                          </div> --}}
                      </div>

                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="row cols-lg-1 cols-sm-2 cols-1">
                    <a href="#">
                      <div class="intro-banner mb-4">
                          <div class="banner banner-fixed content-middle overlay-zoom">
                              <figure>
                                  <img src="images/banner2.png" alt="Intro Banner"
                                      width="330" height="215" style="background-color: #232323;" />
                              </figure>
                              {{-- <div class="banner-content">
                                  <h3 class="banner-title font-weight-bold text-white ls-m">Electronics</h3>
                                  <div class="product-count text-uppercase text-white font-weight-semi-bold">6
                                      Products</div>
                                  <span class="divider bg-white"></span>
                                  <a href="market1-shop.html"
                                      class="btn btn-white btn-link btn-underline ls-m">
                                      Shop Now<i class="d-icon-arrow-right"></i></a>
                              </div> --}}
                          </div>
                      </div>
                    </a>
                      <a href="#">
                      <div class="intro-banner mb-4">
                          <div class="banner banner-fixed content-middle overlay-zoom">
                              <figure>
                                  <img src="images/banner3.png" alt="Intro Banner"
                                      width="330" height="215" style="background-color: #eca5a9;" />
                              </figure>
                              {{-- <div class="banner-content">
                                  <h3 class="banner-title font-weight-bold text-white ls-m">Accessories</h3>
                                  <div class="product-count text-uppercase text-white font-weight-semi-bold">3
                                      Products</div>
                                  <span class="divider bg-white"></span>
                                  <a href="market1-shop.html"
                                      class="btn btn-white btn-link btn-underline ls-m">
                                      Shop Now<i class="d-icon-arrow-right"></i></a>
                              </div> --}}
                          </div>
                      </div>
                    </a>
                  </div>
              </div>
          </div>
      </div>
  </section>
  {{-- <section class="pt-4 pb-4">
    <div class="container">
      <div class="intro-wrapper row">
        <div class="col-xl-12 mb-4">
          <div class="owl-carousel owl-theme owl-dot-inner row cols-1 gutter-no animation-slider" data-owl-options="{
                              'nav': false,
                              'dots': true,
                              'margin': 0
                          }">
            <div class="banner banner-fixed intro-slide intro-slide1 content-middle">
              <figure>
                <img src="images/slider1.png" alt="Banner" width="1030" height="498" style="background-color: #e7e9e9;" />
              </figure>
              <!-- <div class="banner-content">
                                      <div class="slide-animate" data-animation-options="{
                                          'name': 'fadeInLeftShorter', 'duration': '1s'
                                      }">
                                          <h4 class="banner-subtitle font-weight-semi-bold text-body text-uppercase">
                                              Sale up to <span class="text-secondary ls-l">20% OFF</span> Everything
                                          </h4>
                                          <h3 class="banner-title font-weight-bold mb-1">The Excellent
                                              Collection</h3>
                                          <p class="font-weight-normal text-body mb-5">Only until the end of the week
                                          </p>
                                          <a href="categoria.html" class="btn btn-dark btn-rounded">Shop Now<i
                                                  class="d-icon-arrow-right"></i></a>
                                      </div>
                                  </div> -->
            </div>
            <div class="banner banner-fixed intro-slide intro-slide1 content-middle">
              <figure>
                <img src="images/slider2.jpg" alt="Banner" width="1030" height="498" style="background-color: #e7e9e9;" />
              </figure>
              <!-- <div class="banner-content">
                                      <div class="slide-animate" data-animation-options="{
                                          'name': 'fadeInLeftShorter', 'duration': '1s'
                                      }">
                                          <h4 class="banner-subtitle font-weight-semi-bold text-body text-uppercase">
                                              Sale up to <span class="text-secondary ls-l">20% OFF</span> Everything
                                          </h4>
                                          <h3 class="banner-title font-weight-bold mb-1">The Excellent
                                              Collection</h3>
                                          <p class="font-weight-normal text-body mb-5">Only until the end of the week
                                          </p>
                                          <a href="categoria.html" class="btn btn-dark btn-rounded">Shop Now<i
                                                  class="d-icon-arrow-right"></i></a>
                                      </div>
                                  </div> -->
            </div>
          </div>
        </div>
        <!-- <div class="col-xl-12">
                          <div class="row cols-xl-2 cols-lg-2 cols-sm-2 cols-1">
                              <div class="banner-wrap">
                                  <div class="banner banner-fixed intro-banner mb-4">
                                      <figure>
                                          <img src="images/banner1.png" alt="Banner"
                                              width="330" height="239" style="background-color: #e4e4e4;" />
                                      </figure>
                                      <div class="banner-content">
                                          <h4
                                              class="banner-subtitle text-uppercase font-weight-normal text-body ls-m">
                                              Distribuidor referente</h4>
                                          <h3
                                              class="banner-title text-uppercase font-weight-semi-bold ls-m">
                                            Saneamientos y<br> accesorios</h3>

                                      </div>
                                  </div>
                              </div>
                              <div class="banner-wrap">
                                  <div class="banner banner-fixed intro-banner mb-4">
                                      <figure>
                                          <img src="images/banner2.png" alt="Banner"
                                              width="330" height="239" style="background-color: #f0eae4;" />
                                      </figure>
                                      <div class="banner-content">
                                          <h4
                                              class="banner-subtitle text-uppercase font-weight-normal text-body ls-m">
                                              Descargas</h4>
                                          <h3
                                              class="banner-title text-uppercase font-weight-semi-bold ls-m">
                                              documentación</h3>

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div> -->
      </div>
      <div class="row col-xl-12 col-12 mb-4">
        <div class="owl-carousel owl-theme owl-nav-inner h-100 owl-loaded owl-drag" data-owl-options="{
                              'nav': true,
                              'dots': false,
                              'margin': 20,
                              'autoplay': true,
                              'autoplayTimeout': 3000,
                              'autoplaySpeed': 1000,
                              'loop': true,
                              'autoplayHoverPause': true,
                              'responsive': {
                                  '0': {
                                      'items': 2
                                  },
                                  '576': {
                                      'items': 3
                                  },
                                  '992': {
                                      'items': 4
                                  },
                                  '1200': {
                                      'items': 6
                                  }
                              }
                          }">





          <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.5s ease 0s; width: 1307px;">
              <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                <div class="product-wrap h-100 mb-0">
                  <div class="product product-border text-center h-100">
                    <figure class="product-media">
                      <a href="producto.html">
                        <img src="images/product1.jpg" alt="product" width="260" height="293">
                      </a>
                      <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a </div>
                    </figure>
                    <div class="product-details">
                      <h3 class="product-name">
                        <a href="producto.html">CODO H-H EVAC. SERIE B TERRAIN</a>
                      </h3>
                      <div class="product-price">
                        <ins class="new-price">198.00 €</ins><del class="old-price">270.00 €</del>
                      </div>
                      <div class="ratings-container">
                        <div class="ratings-full">
                          <span class="ratings" style="width:100%"></span>
                          <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="producto.html" class="rating-reviews">( 6 valoraciones
                          )</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                <div class="product-wrap h-100 mb-0">
                  <div class="product product-border text-center h-100">
                    <figure class="product-media">
                      <a href="producto.html">
                        <img src="images/product2.jpg" alt="product" width="260" height="293">
                      </a>
                      <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a </div>
                    </figure>
                    <div class="product-details">
                      <h3 class="product-name">
                        <a href="producto.html">CODO EVAC. SERIE B TERRAIN BLANCO</a>
                      </h3>
                      <div class="product-price">
                        <span class="price">50.00 €</span>
                      </div>
                      <div class="ratings-container">
                        <div class="ratings-full">
                          <span class="ratings" style="width:80%"></span>
                          <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="producto.html" class="rating-reviews">( 4 valoraciones
                          )</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                <div class="product-wrap h-100 mb-0">
                  <div class="product product-border text-center h-100">
                    <figure class="product-media">
                      <a href="producto.html">
                        <img src="images/product3.jpg" alt="product" width="260" height="293">
                      </a>
                      <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a </div>
                    </figure>
                    <div class="product-details">
                      <h3 class="product-name">
                        <a href="producto.html">LG UD. INTERIORES MULTI INVERTER - CONFORT CONNECT</a>
                      </h3>
                      <div class="product-price">
                        <ins class="new-price">1.154,21 €</ins><del class="old-price">1.184,63 €</del>
                      </div>
                      <div class="ratings-container">
                        <div class="ratings-full">
                          <span class="ratings" style="width:100%"></span>
                          <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="producto.html" class="rating-reviews">( 2 valoraciones
                          )</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                <div class="product-wrap h-100 mb-0">
                  <div class="product product-border text-center h-100">
                    <figure class="product-media">
                      <a href="producto.html">
                        <img src="images/product4.jpg" alt="product" width="260" height="293">
                      </a>
                      <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a </div>
                    </figure>
                    <div class="product-details">
                      <h3 class="product-name">
                        <a href="producto.html">SIME CALENTADOR ATMOSFERICO MINI OF Erp</a>
                      </h3>
                      <div class="product-price">
                        <span class="price">230.00 €</span>
                      </div>
                      <div class="ratings-container">
                        <div class="ratings-full">
                          <span class="ratings" style="width:60%"></span>
                          <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="producto.html" class="rating-reviews">( 8 valoraciones
                          )</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                <div class="product-wrap h-100 mb-0">
                  <div class="product product-border text-center h-100">
                    <figure class="product-media">
                      <a href="producto.html">
                        <img src="images/product6.jpg" alt="product" width="260" height="293">
                      </a>
                      <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a </div>
                    </figure>
                    <div class="product-details">
                      <h3 class="product-name">
                        <a href="producto.html">MANGUITO TIPO SAMBRA</a>
                      </h3>
                      <div class="product-price">
                        <ins class="new-price">15.21 €</ins><del class="old-price">18.63 €</del>
                      </div>
                      <div class="ratings-container">
                        <div class="ratings-full">
                          <span class="ratings" style="width:100%"></span>
                          <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="producto.html" class="rating-reviews">( 2 valoraciones
                          )</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                <div class="product-wrap h-100 mb-0">
                  <div class="product product-border text-center h-100">
                    <figure class="product-media">
                      <a href="producto.html">
                        <img src="images/product7.jpg" alt="product" width="260" height="293">
                      </a>
                      <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a </div>
                    </figure>
                    <div class="product-details">
                      <h3 class="product-name">
                        <a href="producto.html">B.I.E. 25mm-20m VERSAL RAL3000</a>
                      </h3>
                      <div class="product-price">
                        <ins class="new-price">198.00 €</ins><del class="old-price">270.00 €</del>
                      </div>
                      <div class="ratings-container">
                        <div class="ratings-full">
                          <span class="ratings" style="width:100%"></span>
                          <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="producto.html" class="rating-reviews">( 6 valoraciones
                          )</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                <div class="product-wrap h-100 mb-0">
                  <div class="product product-border text-center h-100">
                    <figure class="product-media">
                      <a href="producto.html">
                        <img src="images/product1.jpg" alt="product" width="260" height="293">
                      </a>
                      <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a </div>
                    </figure>
                    <div class="product-details">
                      <h3 class="product-name">
                        <a href="producto.html">CODO H-H EVAC. SERIE B TERRAIN</a>
                      </h3>
                      <div class="product-price">
                        <ins class="new-price">198.00 €</ins><del class="old-price">270.00 €</del>
                      </div>
                      <div class="ratings-container">
                        <div class="ratings-full">
                          <span class="ratings" style="width:100%"></span>
                          <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="producto.html" class="rating-reviews">( 6 valoraciones
                          )</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="d-icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="d-icon-angle-right"></i></button>
          </div>
          <div class="owl-dots disabled"></div>
        </div>
      </div>
    </div>
  </section> --}}


  {{-- <section class="container mt-5">
    <div class="banner-grid-3cols row cols-lg-3 cols-md-2 cols-1 justify-content-center">
      <div class="banner banner-fixed content-middle mb-4 appear-animate fadeInLeftShorter appear-animation-visible" data-animation-options="{
                      'name': 'fadeInLeftShorter', 'duration': '1s'
                  }" style="animation-duration: 1s;">
        <figure>
          <img src="images/banner1.png" alt="Banner" width="447" height="180" style="background-color: #f1f1f1;">
        </figure>
        <div class="banner-content">
        </div>
      </div>

      <div class="banner banner-fixed content-middle mb-4 appear-animate fadeInLeftShorter appear-animation-visible" data-animation-options="{
                      'name': 'fadeInLeftShorter', 'duration': '1s'
                  }" style="animation-duration: 1s;">
        <figure>
          <img src="images/banner2.png" alt="Banner" width="447" height="180" style="background-color: #f1f1f1;">
        </figure>
        <div class="banner-content">

        </div>
      </div>

      <div class="banner banner-fixed content-middle mb-4 appear-animate fadeInRightShorter appear-animation-visible" data-animation-options="{
                      'name': 'fadeInRightShorter', 'duration': '1s'
                  }" style="animation-duration: 1s;">
        <figure>
          <img src="images/banner3.png" alt="Banner" width="447" height="180" style="background-color: #edecec;">
        </figure>
        <div class="banner-content">
        </div>
      </div>
    </div>
  </section> --}}

  <section class="container mt-10">
    <div class="brand-wrapper">
      <h2 class="title title-center-sm">NUESTRAS MARCAS</h2>
      <div class="owl-carousel owl-theme owl-loaded owl-drag theme-border" data-owl-options="{
                      'nav': false,
                      'dots': false,
                      'magin': 0,
                      'autoplay': true,
                      'autoplayTimeout': 3000,
                      'autoplaySpeed': 1000,
                      'loop': true,
                      'responsive': {
                          '0': {
                              'items': 2
                          },
                          '576': {
                              'items': 3
                          },
                          '768': {
                              'items': 4
                          },
                          '992': {
                              'items': 6
                          },
                          '1200': {
                              'items': 7
                          }
                      }
                  }">







        <div class="owl-stage-outer">
          <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1381px;">
            <div class="owl-item active" style="width: 197.143px;">
              <figure class="pl-5 pr-5 pb-5 pt-5">
                <img src="images/brand1.png" alt="Brand" width="197" height="93">
              </figure>
            </div>
            <div class="owl-item active" style="width: 197.143px;">
              <figure class="pl-5 pr-5 pt-5 pb-5">
                <img src="images/brand2.png" alt="Brand" width="213" height="100">
              </figure>
            </div>
            <div class="owl-item active" style="width: 197.143px;">
              <figure class="pl-5 pr-5 pt-5 pb-5">
                <img src="images/brand3.png" alt="Brand" width="213" height="100">
              </figure>
            </div>
            <div class="owl-item active" style="width: 197.143px;">
              <figure class="pl-5 pr-5 pt-5 pb-5">
                <img src="images/brand4.png" alt="Brand" width="213" height="100">
              </figure>
            </div>
            <div class="owl-item active" style="width: 197.143px;">
              <figure class="pl-5 pr-5 pt-5 pb-5">
                <img src="images/brand5.png" alt="Brand" width="213" height="100">
              </figure>
            </div>
            <div class="owl-item active" style="width: 197.143px;">
              <figure class="pl-5 pr-5 pt-5 pb-5">
                <img src="images/brand6.png" alt="Brand" width="213" height="100">
              </figure>
            </div>
            <div class="owl-item active" style="width: 197.143px;">
              <figure class="pl-5 pr-5 pt-5 pb-5">
                <img src="images/brand7.png" alt="Brand" width="213" height="100">
              </figure>
            </div>
            <div class="owl-item active" style="width: 197.143px;">
              <figure class="pl-5 pr-5 pt-5 pb-5">
                <img src="images/brand8.png" alt="Brand" width="213" height="100">
              </figure>
            </div>
          </div>
        </div>
        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="d-icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="d-icon-angle-right"></i></button>
        </div>
        <div class="owl-dots disabled"></div>
      </div>
    </div>
  </section>

  <section class="mt-5">
    <div class="container mt-4">
      <h2 class="title title-center-sm">BLOG Y NOTICIAS</h2>
      <div class="owl-carousel owl-theme owl-loaded owl-drag theme-border pt-5 pr-5 pl-5" data-owl-options="{
                      'items': 2,
                      'nav': false,
                      'dots': true,
                      'loop': false,
                      'margin': 20,
                      'responsive': {
                          '0': {
                              'items': 1
                          },
                          '992': {
                              'items': 3,
                              'dots': false
                          }
                      }
                  }">


        <div class="owl-stage-outer">
          <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1200px;">
            <div class="owl-item active" style="width: 580px; margin-right: 20px;">
              <div class="post post-list overlay-dark">
                <figure class="post-media">
                  <a href="post-single.html">
                    <img src="images/noticia1.png" width="280" height="200" alt="post">
                  </a>
                  <!-- <div class="post-calendar">
                    <span class="post-day">19</span>
                    <span class="post-month">JAN</span>
                  </div> -->
                </figure>
                <div class="post-details">
                  <h4 class="post-title"><a href="post-single.html">Nueva delegación en San Pedro de Alcántara, Marbella</a>
                  </h4>
                  <p class="post-content">Con nuestro 25 aniversario y siguiendo con la misma ilusión que el primer día, queremos comunicaros que a partir del Lunes 5</p>
                  <a href="post-single.html" class="btn btn-outline btn-md btn-primary">Leer más<i class="d-icon-arrow-right"></i></a>
                </div>
              </div>
            </div>
            <div class="owl-item active" style="width: 580px; margin-right: 20px;">
              <div class="post post-list overlay-dark">
                <figure class="post-media">
                  <a href="post-single.html">
                    <img src="images/noticia2.png" width="280" height="200" alt="post">
                  </a>
                  <!-- <div class="post-calendar">
                    <span class="post-day">19</span>
                    <span class="post-month">JAN</span>
                  </div> -->
                </figure>
                <div class="post-details">
                  <h4 class="post-title"><a href="post-single.html">PP-R RED FIRE NUEVO SISTEMA CONTRAINCENDIOS</a>
                  </h4>
                  <p class="post-content">En Dimasa tenemos disponible en stock la nueva gama HELIROMA RED FIRE, un sistema en PP-R de tubería y accesorios desarrolladas para redes contraincendios.</p>
                  <a href="post-single.html" class="btn btn-outline btn-md btn-primary">Leer más<i class="d-icon-arrow-right"></i></a>
                </div>
              </div>
            </div>
            <div class="owl-item active" style="width: 580px; margin-right: 20px;">
              <div class="post post-list overlay-dark">
                <figure class="post-media">
                  <a href="post-single.html">
                    <img src="images/noticia3.png" width="280" height="200" alt="post">
                  </a>
                  <!-- <div class="post-calendar">
                    <span class="post-day">19</span>
                    <span class="post-month">JAN</span>
                  </div> -->
                </figure>
                <div class="post-details">
                  <h4 class="post-title"><a href="post-single.html">NUEVA TARIFA TERRAIN 2021</a></h4>
                  <p class="post-content">Como distribuidores oficiales de la firma Terrain, queremos informarles que desde el 1 de julio de 2021 estará vigente la nueva tarifa Terrain 2021.</p>
                  <a href="post-single.html" class="btn btn-outline btn-md btn-primary">Leer más<i class="d-icon-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="d-icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="d-icon-angle-right"></i></button>
        </div>
        <div class="owl-dots disabled"></div>
      </div>
    </div>
  </section>

  <section class="container mt-10 mb-10">
    <div class="banner banner-wrapper appear-animate" data-animation-options="{'name': 'fadeIn'}" style="background-image: url(images/banner-catalogo.png);
                    background-color: #e7ebee;">
      <div class="banner-content d-flex align-items-center justify-content-center">
        <h3 class="banner-title font-weight-bold text-uppercase text-center text-white mb-0 ls-m">
          NUEVO CATÁLOGO <span class="text-warning">2021</span><br>
          <span class="banner-text font-primary font-weight-normal text-normal ls-normal d-inline-block"><a href="#" class="link-download-home">DESCARGAR</a></span>
        </h3>
        <!-- <a href="categoria.html" class="btn btn-white btn-rounded">DESCARGAR<i class="d-icon-arrow-down"></i></a> -->
      </div>
    </div>
  </section>



  <section class="container mt-10 pt-5">
    <h2 class="title title-center-sm">SERVICIOS QUE OFRECEMOS</h2>
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

  <section class="mt-10 pt-2 container mb-10">
    <div class="banner banner-newsletter" style="background-image: url(images/demos/demo11/newsletter.jpg); background-color: #211D1A;">
      <div class="banner-content row gutter-no align-items-center pt-10 pb-10 pr-10 pl-10">
        <div class="col-xl-5 col-lg-6">
          <div class="icon-box icon-box-side mb-4 mb-lg-0">
            <div class="icon-box-content">
              <h4 class="icon-box-title font-weight-bold text-white">SUSCRÍBETE A NUESTRA NEWSLETTER</h4>
              <p class="text-white">Y no te pierdas ninguna novedad
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-7 col-lg-6 d-lg-block d-flex justify-content-center">
          <form action="#" method="get" class="input-wrapper input-wrapper-inline ml-lg-auto">
            <input type="email" class="form-control font-primary font-italic form-solid pl-2 pl-lg-6" name="email" id="email" placeholder="Introduce tu correo electrónico..." required="">
            <button class="btn btn-primary" type="submit">Suscribirse <i class="d-icon-arrow-right"></i></button>
          </form>
        </div>
      </div>
    </div>
  </section>


@stop
{{-- Scripts --}}
@section('scripts')

@stop
