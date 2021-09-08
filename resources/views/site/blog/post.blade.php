@extends('layouts.site.main')
@section('content')
  <section>
      <div class="container pt-10">
          <div class="row gutter-lg">
            <div class="col-lg-9">
                <article class="post-single">
                    <figure class="post-media">
                        <a href="#">
                            <img src="//images/noticia1.png" width="880" height="450" alt="post" />
                        </a>
                    </figure>
                    <div class="post-details">

                        <h1 class="post-title">Ejemplo de título</h1>
                                <div class="post-meta">
                                    {{-- por <a href="#" class="post-author mr-1">Ricardo López Patiño</a> --}}
                                    | <a href="#" class="post-date ml-1">20-09-2021</a>
                                </div>
                                <hr>
                        <div class="post-body mb-7">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>

                        <hr>
                        <div class="post-footer mt-7 mb-3">

                            <div class="social-icons">
                              <span>Comparte este artículo:</span>
                              <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="social-link social-facebook fab fa-facebook-f"></a>
                              <a target="_blank" href="https://twitter.com/home?status={{url()->current()}}" class="social-link social-twitter fab fa-twitter"></a>
                              <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&title=&summary=&source=" class="social-link social-linkedin fab fa-linkedin-in"></a>
                            </div>
                        </div>
                    </div>
                </article>
                <div class="related-posts mt-5">
                    <h3 class="title title-simple text-left text-normal ls-normal">Artículos relacionados</h3>
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
                            <div class="post post-list">
                              <figure class="post-media">
                                <a href="post-single.html">
                                  <img src="/images/noticia1.png" width="280" height="200" alt="post">
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
                            <div class="post post-list">
                              <figure class="post-media">
                                <a href="post-single.html">
                                  <img src="/images/noticia2.png" width="280" height="200" alt="post">
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
                            <div class="post post-list">
                              <figure class="post-media">
                                <a href="post-single.html">
                                  <img src="/images/noticia3.png" width="280" height="200" alt="post">
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
            </div>
            <aside class="col-lg-3 right-sidebar sidebar-fixed sticky-sidebar-wrapper">
                <div class="sidebar-overlay">
                    <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                </div>
                <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i>&nbsp;Menu</a>
                <div class="sidebar-content">
                    <div class="sticky-sidebar" data-sticky-options="{'top': 89, 'bottom': 70}">
                        <div class="widget widget-search border-no mb-2">
                            <form action="#" class="input-wrapper input-wrapper-inline btn-absolute">
                                <input type="text" class="form-control" name="search" autocomplete="off"
                                    placeholder="Buscar" required />
                                <button class="btn btn-search btn-link" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="widget widget-collapsible border-no mt-5">
                            <h3 class="widget-title">Categorías</h3>
                            <ul class="widget-body filter-items search-ul">
                                <li><a href="">Ejemplo</a></li>
                            </ul>
                        </div>
                        {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title">@lang('frontend.blog_featured')</h3>
                            <div class="widget-body">
                                <div class="post-col">
                                  @foreach ($last_products as $product)
                                    <a href="{{ route('site.product_view', ['slug' => $product->slug]) }}">
                                      <div class="product product-list-sm">
                                          <figure class="product-media">
                                                  <img src="{{$product->getPrincipalImage()}}" alt="{{$product->name}}" width="133"
                                                      height="149">
                                          </figure>
                                          {{-- <div class="product-label-group">
                                              <label class="product-label label-sale">25%</label>
                                          </div> --}}
                                          {{-- <div class="product-details">
                                              <h3 class="product-name">
                                                  {{$product->name}}
                                              </h3>
                                              <div class="product-price">
                                                  {!! Helper::getProductPriceHtml($product) !!}
                                              </div>
                                              <div class="ratings-container">
                                                  <div class="ratings-full">
                                                      <span class="ratings" style="width:100%"></span>
                                                      <span class="tooltiptext tooltip-top"></span>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </a>
                                  @endforeach

                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </aside>
          </div>
          </div>
  </section>
@stop
