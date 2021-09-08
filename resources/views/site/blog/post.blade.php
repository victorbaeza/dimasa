@extends('layouts.site.main')
@section('content')
  <section>
      <div class="container pt-10">
          <div class="row gutter-lg">
            <div class="col-lg-9">
                <article class="post-single">
                    <figure class="post-media">
                        <a href="#">
                            <img src="/images/noticia1.png" width="880" height="450" alt="post" />
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
                            Lorem ipsum et dolore sit amet
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
                    <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-sm-2 cols-1" data-owl-options="{
                        'items': 4,
                        'margin': 20,
                        'loop': false,
                        'nav': false,
                        'dots': true,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '576': {
                                'items': 1
                            },
                            '768': {
                                'items': 2
                            },
                            '992': {
                                'items': 3,
                                'dots': true
                            }
                        }
                    }">
                      <div class="post post-sm overlay-dark">
                        <a href="">
                          <figure class="post-media">
                                  <img src="/images/noticia1.png" width="380" height="200" alt="" />
                          </figure>
                          <div class="post-details">
                              <h4 class="post-title">Ejemplo</h4>
                              <p class="post-content text-justify">Descripción</p>
                          </div>
                          </a>
                      </div>
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
