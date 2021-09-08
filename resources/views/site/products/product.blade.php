@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
@stop
{{-- Content --}}
@section('content')
<section class="mt-4">
  <div class="container">
                    <nav class="breadcrumb-nav product-navigation">
                        <ul class="breadcrumb pt-0 pb-0 mb-0">
                            <li><a href="market2.html"><i class="d-icon-home"></i></a></li>
                            <li><a href="#">Fontanería</a></li>
                            <li><a href="#">PVC</li>
                            <li  class="active">MULTI-SPLIT INVERTER MOD. TERMAT R32</li>
                        </ul>

                        <ul class="product-nav mb-0">
                            <li class="product-nav-prev">
                                <a href="#">
                                    <i class="d-icon-arrow-left"></i> Anterior
                                    <span class="product-nav-popup">
                                        <img src="/images/product3.jpg"
                                            alt="product thumbnail" width="110" height="123">
                                        <span class="product-name">Sed egtas Dnte Comfort</span>
                                    </span>
                                </a>
                            </li>
                            <li class="product-nav-next">
                                <a href="#">
                                    Siguiente <i class="d-icon-arrow-right"></i>
                                    <span class="product-nav-popup">
                                        <img src="/images/product2.jpg"
                                            alt="product thumbnail" width="110" height="123">
                                        <span class="product-name">Sed egtas Dnte Comfort</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="row gutter-lg">
                        <div class="col-12">
                            <div class="product product-single row">
                                <div class="col-md-5">
                                    <div class="product-gallery pg-vertical">
                                        <div
                                            class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                                            <figure class="product-image">
                                                <img src="/images/product3.jpg"
                                                    alt="">
                                            </figure>
                                        </div>
                                        <div class="product-thumbs-wrap">
                                            <div class="product-thumbs">
                                                <div class="product-thumb active">
                                                    <img src="/images/product3.jpg"
                                                        alt="product thumbnail" width="118" height="135">
                                                </div>
                                            </div>
                                            <button class="thumb-up disabled"><i
                                                    class="fas fa-chevron-left"></i></button>
                                            <button class="thumb-down disabled"><i
                                                    class="fas fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-details pt-3">
                                        <h1 class="product-name">MULTI-SPLIT INVERTER MOD. TERMAT R32</h1>
                                        <div class="product-meta">
                                            MARCA: <span class="product-brand">Lorem ipsum</span>
                                        </div>
                                        <div class="product-price">198,00 €</div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:80%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 1
                                                Valoraciones )</a>
                                        </div>
                                        <p class="product-short-desc">
                                            Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue.
                                            Morbi purus liberpuro ate vol faucibus adipiscing.</p>
                                        <!-- <div class="product-form product-size">
                                            <label>Size:</label>
                                            <div class="product-form-group">
                                                <div class="product-variations">
                                                    <a class="size" href="#">XL</a>
                                                    <a class="size" href="#">L</a>
                                                    <a class="size" href="#">M</a>
                                                    <a class="size" href="#">S</a>
                                                </div>
                                                <a href="#" class="product-variation-clean">Clean All</a>
                                            </div>
                                        </div>
                                        <div class="product-variation-price">
                                            <span>$239.00</span>
                                        </div> -->

                                        <hr class="product-divider">

                                        <div class="product-form product-qty">
                                            <div class="product-form-group">
                                                <div class="input-group mr-2">
                                                    <button class="quantity-minus d-icon-minus"></button>
                                                    <input class="quantity form-control" type="number" min="1"
                                                        max="1000000">
                                                    <button class="quantity-plus d-icon-plus"></button>
                                                </div>
                                                <button
                                                    class="btn-product btn-cart text-normal ls-normal font-weight-semi-bold"><i
                                                        class="d-icon-bag"></i>Añadir al carrito</button>
                                            </div>
                                        </div>

                                        <hr class="product-divider mb-3">

                                        <div class="product-footer">
                                            <div class="social-links mr-4">
                                                <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                                <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                                <a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>
                                            </div>
                                            <span class="divider"></span>
                                            <div class="product-action">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="variation-table-mobile mb-10">
                              <h4>Modelos</h4>
                              <div class="accordion accordion-border accordion-boxed accordion-plus accordion-gutter-md">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse2-1" class="expand pr-5"><div>MULTI-SPLIT INVERTER MOD. TERMAT R32<br><br><span class="variation-price">198,00 €</span></div></a>
                                        </div>
                                        <div id="collapse2-1" class="collapsed">
                                            <div class="card-body">
                                                <p class="mb-0"><b>Referencia: </b># TM2MS1899CAN3R32</p>
                                                <p class="mb-0"><b>Características: </b>18 K</p>
                                                <p class="mb-0"><b>PVR: </b>198,00 €</p>
                                                <p class="mb-0 text-center"><a href="{{ route('products.product') }}" class="btn btn-outline btn-primary pt-2 pl-3 pr-3 pb-2 mt-1">VER MODELO</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                      <div class="card-header">
                                          <a href="#collapse2-2" class="expand pr-5"><div>MULTI-SPLIT INVERTER MOD. TERMAT R33<br><br><span class="variation-price">398,00 €</span></div></a>
                                      </div>
                                      <div id="collapse2-2" class="collapsed">
                                        <div class="card-body">
                                            <p class="mb-0"><b>Referencia: </b># TM2MS1899CAN3R32</p>
                                            <p class="mb-0"><b>Características: </b>18 K</p>
                                            <p class="mb-0"><b>PVR: </b>398,00 €</p>
                                            <p class="mb-0 text-center"><a href="{{ route('products.product') }}" class="btn btn-outline btn-primary pt-2 pl-3 pr-3 pb-2 mt-1">VER MODELO</a></p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <table class="variation-table mb-10">
                                    <thead>
                                        <tr>
                                            <th class="pl-2">Referencia</th>
                                            <th>Modelo</th>
                                            <th>Características</th>
                                            <th>PVR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="variation-number font-weight-bold"><a href="#"># TM2MS1899CAN3R32</a></td>
                                            <td class="variation-date"><time>MULTI-SPLIT INVERTER MOD. TERMAT R32</time></td>
                                            <td class="variation-status"><span>18 K</span></td>
                                            <td class="variation-total"><span>198,00 €</span></td>
                                        </tr>
                                        <tr>
                                            <td class="variation-number font-weight-bold"><a href="#"># TM2MS18912CAN3R32</a></td>
                                            <td class="variation-date"><time>MULTI-SPLIT INVERTER MOD. TERMAT R32</time></td>
                                            <td class="variation-status"><span>18 K</span></td>
                                            <td class="variation-total"><span>398,00 €</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                            <div class="tab tab-nav-simple product-tabs">
                                <ul class="nav nav-tabs justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link nav-link-product active" href="#product-tab-description">Descripción</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link nav-link-product" href="#product-tab-shipping-returns">Envío y devoluciones</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link nav-link-product" href="#product-tab-reviews">Valoraciones (1)</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active in" id="product-tab-description">
                                        <div class="row mt-6">
                                            <div class="col-12">
                                                <h5 class="description-title mb-4 font-weight-semi-bold ls-m">Descripción
                                                </h5>
                                                <p class="mb-2">
                                                    Praesent id enim sit amet.Tdio vulputate eleifend in in tortor.
                                                    ellus massa. siti iMassa ristique sit amet condim vel, facilisis
                                                    quimequistiqutiqu amet condim Dilisis Facilisis quis sapien.
                                                    Praesent id enim sit amet.
                                                </p>
                                                <ul class="mb-8">
                                                    <li>Praesent id enim sit amet.Tdio vulputate</li>
                                                    <li>Eleifend in in tortor. ellus massa.Dristique sitii</li>
                                                    <li>Massa ristique sit amet condim vel</li>
                                                    <li>Dilisis Facilisis quis sapien. Praesent id enim sit amet</li>
                                                </ul>
                                                <h5 class="description-title mb-3 font-weight-semi-bold ls-m">
                                                    Especificaciones</h5>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th class="font-weight-semi-bold text-dark pl-0">Lorem ipsum
                                                            </th>
                                                            <td class="pl-4">Praesent id enim sit amet.Tdio</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-semi-bold text-dark pl-0">Et dolore
                                                                Size</th>
                                                            <td class="pl-4">Praesent id enim sit</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-semi-bold text-dark pl-0">Sit amet
                                                                </th>
                                                            <td class="pl-4">Praesent id enim sit amet.Tdio vulputate
                                                                eleifend in in tortor. ellus massa. siti</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-semi-bold text-dark border-no pl-0">
                                                                Alequat</th>
                                                            <td class="border-no pl-4">Praesent id enim</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="product-tab-shipping-returns">
                                        <p class="mb-0 pt-5">Praesent id enim sit amet.Tdio vulputate eleifend in in tortor. ellus massa. siti iMassa ristique sit amet condim vel, facilisis quimequistiqutiqu amet condim Dilisis Facilisis quis sapien. Praesent id enim sit amet.</p>
                                            <div class="icon-box-wrap d-flex flex-wrap mt-10">
                                                <div
                                                    class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4 mr-10">
                                                    <div class="icon-box-icon">
                                                        <i class="d-icon-lock"></i>
                                                    </div>
                                                    <div class="icon-box-content">
                                                        <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">2 años de garantía</h4>
                                                        <p>Garantizado</p>
                                                    </div>
                                                </div>
                                                <div class="divider d-xl-show mr-10"></div>
                                                <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4">
                                                    <div class="icon-box-icon">
                                                        <i class="d-icon-truck"></i>
                                                    </div>
                                                    <div class="icon-box-content">
                                                        <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">Envío gratuito
                                                        </h4>
                                                        <p>En pedidos superiores a 20 €</p>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="tab-pane " id="product-tab-reviews">
                                        <div class="comments mb-8 pt-2 pb-2 border-no">
                                            <ul>
                                                <li>
                                                    <div class="comment">
                                                        <figure class="comment-media">
                                                            <a href="#">
                                                                <img src="images/blog/comments/1.jpg" alt="avatar">
                                                            </a>
                                                        </figure>
                                                        <div class="comment-body">
                                                            <div class="comment-rating ratings-container mb-0">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width:80%"></span>
                                                                    <span class="tooltiptext tooltip-top">4.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="comment-user">
                                                                <span class="comment-date text-body">22 de Septiembre de 2020</span>
                                                                <h4><a href="#">Anónimo</a></h4>
                                                            </div>

                                                            <div class="comment-content">
                                                                <p>Sed pretium, ligula sollicitudin laoreet viverra,
                                                                    tortor libero sodales leo,
                                                                    eget blandit nunc tortor eu nibh. Nullam mollis. Ut
                                                                    justo. Suspendisse potenti.
                                                                    Sed egestas, ante et vulputate volutpat, eros pede
                                                                    semper est, vitae luctus metus libero eu augue.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Comments -->
                                        <div class="reply">
                                            <div class="title-wrapper text-left">
                                                <h3 class="title title-simple text-left text-normal">Añade una valoración</h3>
                                            </div>
                                            <div class="rating-form mt-5">
                                                <label for="rating" class="text-dark">Tu valoración * </label>
                                                <span class="rating-stars selected">
                                                    <a class="star-1" href="#">1</a>
                                                    <a class="star-2" href="#">2</a>
                                                    <a class="star-3" href="#">3</a>
                                                    <a class="star-4 active" href="#">4</a>
                                                    <a class="star-5" href="#">5</a>
                                                </span>

                                                <select name="rating" id="rating" required="" style="display: none;">
                                                    <option value="">Rate…</option>
                                                    <option value="5">Perfect</option>
                                                    <option value="4">Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2">Not that bad</option>
                                                    <option value="1">Very poor</option>
                                                </select>
                                            </div>
                                            <form action="#">
                                                <textarea id="reply-message" cols="30" rows="6"
                                                    class="form-control mb-4" placeholder="Comentario *"
                                                    required></textarea>
                                                <div class="row">
                                                    <div class="col-md-6 mb-5">
                                                        <input type="text" class="form-control" id="reply-name"
                                                            name="reply-name" placeholder="Nombre *" required />
                                                    </div>
                                                    <div class="col-md-6 mb-5">
                                                        <input type="email" class="form-control" id="reply-email"
                                                            name="reply-email" placeholder="Email *" required />
                                                    </div>
                                                </div>
                                                <!-- <div class="form-checkbox mb-4">
                                                    <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                                        name="signin-remember" />
                                                    <label class="form-control-label" for="signin-remember">
                                                        Save my name, email, and website in this browser for the next
                                                        time I comment.
                                                    </label>
                                                </div> -->
                                                <button type="submit" class="btn btn-primary btn-outline">Enviar<i
                                                        class="d-icon-arrow-right"></i></button>
                                            </form>
                                        </div>
                                        <!-- End Reply -->
                                    </div>
                                </div>
                            </div>

                            <section class="pt-2 mt-10 mb-10">
                                <h2 class="title ls-normal">Otros clientes también miraron</h2>

                                <div class="owl-carousel owl-theme owl-nav-inner h-100 owl-loaded owl-drag theme-border pt-2 pl-5 pr-5" data-owl-options="{
                                                      'nav': true,
                                                      'dots': false,
                                                      'margin': 20,
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
                                                              'items': 5
                                                          }
                                                      }
                                                  }">





                                  {{-- <div class="owl-stage-outer">
                                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.5s ease 0s; width: 1307px;">
                                      <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                                        <div class="product-wrap h-100 mb-0">
                                          <div class="product product-border text-center h-100">
                                            <figure class="product-media">
                                              <a href="{{ route('products.product') }}">
                                                <img src="/images/product1.jpg" alt="product" width="260" height="293">
                                              </a>
                                              <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Añadir al carrito"><i class="d-icon-bag"></i></a>
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i class="d-icon-search"></i></a>
                                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><i class="d-icon-compare"></i></a>
                                              </div>
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
                                      </div>
                                      <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                                        <div class="product-wrap h-100 mb-0">
                                          <div class="product product-border text-center h-100">
                                            <figure class="product-media">
                                              <a href="{{ route('products.product') }}">
                                                <img src="/images/product2.jpg" alt="product" width="260" height="293">
                                              </a>
                                              <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Añadir al carrito"><i class="d-icon-bag"></i></a>
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i class="d-icon-search"></i></a>
                                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><i class="d-icon-compare"></i></a>
                                              </div>
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
                                      </div>
                                      <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                                        <div class="product-wrap h-100 mb-0">
                                          <div class="product product-border text-center h-100">
                                            <figure class="product-media">
                                              <a href="{{ route('products.product') }}">
                                                <img src="/images/product3.jpg" alt="product" width="260" height="293">
                                              </a>
                                              <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Añadir al carrito"><i class="d-icon-bag"></i></a>
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i class="d-icon-search"></i></a>
                                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><i class="d-icon-compare"></i></a>
                                              </div>
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
                                      </div>
                                      <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                                        <div class="product-wrap h-100 mb-0">
                                          <div class="product product-border text-center h-100">
                                            <figure class="product-media">
                                              <a href="{{ route('products.product') }}">
                                                <img src="/images/product4.jpg" alt="product" width="260" height="293">
                                              </a>
                                              <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Añadir al carrito"><i class="d-icon-bag"></i></a>
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i class="d-icon-search"></i></a>
                                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><i class="d-icon-compare"></i></a>
                                              </div>
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
                                      </div>
                                      <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                                        <div class="product-wrap h-100 mb-0">
                                          <div class="product product-border text-center h-100">
                                            <figure class="product-media">
                                              <a href="{{ route('products.product') }}">
                                                <img src="/images/product6.jpg" alt="product" width="260" height="293">
                                              </a>
                                              <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Añadir al carrito"><i class="d-icon-bag"></i></a>
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i class="d-icon-search"></i></a>
                                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><i class="d-icon-compare"></i></a>
                                              </div>
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
                                      </div>
                                      <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                                        <div class="product-wrap h-100 mb-0">
                                          <div class="product product-border text-center h-100">
                                            <figure class="product-media">
                                              <a href="{{ route('products.product') }}">
                                                <img src="/images/product7.jpg" alt="product" width="260" height="293">
                                              </a>
                                              <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Añadir al carrito"><i class="d-icon-bag"></i></a>
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i class="d-icon-search"></i></a>
                                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><i class="d-icon-compare"></i></a>
                                              </div>
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
                                      </div>
                                      <div class="owl-item active" style="width: 241.397px; margin-right: 20px;">
                                        <div class="product-wrap h-100 mb-0">
                                          <div class="product product-border text-center h-100">
                                            <figure class="product-media">
                                              <a href="{{ route('products.product') }}">
                                                <img src="/images/product1.jpg" alt="product" width="260" height="293">
                                              </a>
                                              <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Añadir al carrito"><i class="d-icon-bag"></i></a>
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i class="d-icon-search"></i></a>
                                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><i class="d-icon-compare"></i></a>
                                              </div>
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
                                      </div>
                                    </div>
                                  </div>
                                  <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="d-icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="d-icon-angle-right"></i></button>
                                  </div>
                                  <div class="owl-dots disabled"></div> --}}


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
                            </section>
                        </div>
                    </div>
                </div>
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
