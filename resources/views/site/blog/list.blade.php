@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
@stop
{{-- Content --}}
@section('content')
  <div class="shop-boxed-banner banner mb-8 mb-lg-7 pb-7 pt-7" style="background-image: url('/images/noticias.jpg'); background-color: #ECEDEF;background-position: 0px -25rem;">
    <div class="banner-content container">
      <!-- <h2 class="banner-subtitle font-weight-semi-bold ls-m text-uppercase text-secondary mb-3">
        NUESTRAS ÚLTIMAS</h2> -->
      <h1 class="banner-title font-weight-bold text-primary ls-m mb-0">NOTICIAS</h1>
    </div>
  </div>
  <div class="container">

                <div class="row gutter-lg">
                    <div class="col-lg-9">
                        <div class="posts grid post-grid row" data-grid-options="{
                            'layoutMode': 'fitRows'
                        }">
                            <div class="grid-item col-md-4 col-sm-6">
                              <a href="post.html">
                                <article class="post mb-3">
                                    <figure class="post-media overlay-zoom">
                                            <img src="images/noticia1.png" width="430" height="300"
                                                alt="post" />
                                    </figure>
                                    <div class="post-details">
                                        <div class="post-meta">
                                          22-06-2021

                                        </div>
                                        <h4 class="post-title">Nueva Delegación En San Pedro De Alcántara, Marbella</h4>
                                        <p class="post-content">
                                          Con nuestro 25 aniversario y siguiendo con la misma ilusión que el primer día, queremos comunicaros que a partir del Lunes 5...
                                        </p>
                                        <span
                                            class="btn btn-link btn-underline btn-primary">Leer más<i
                                                class="d-icon-arrow-right"></i></span>
                                    </div>
                                </article>
                                </a>
                            </div>
                            <div class="grid-item col-md-4 col-sm-6">
                              <a href="post.html">
                                <article class="post mb-3">
                                    <figure class="post-media overlay-zoom">
                                            <img src="images/noticia2.png" width="430" height="300"
                                                alt="post" />
                                    </figure>
                                    <div class="post-details">
                                        <div class="post-meta">
                                          22-06-2021

                                        </div>
                                        <h4 class="post-title">PP-R RED FIRE NUEVO SISTEMA CONTRAINCENDIOS</h4>
                                        <p class="post-content">
                                          En Dimasa tenemos disponible en stock la nueva gama HELIROMA RED FIRE, un sistema en PP-R de tubería y accesorios...
                                        </p>
                                        <span
                                            class="btn btn-link btn-underline btn-primary">Leer más<i
                                                class="d-icon-arrow-right"></i></span>
                                    </div>
                                </article>
                              </a>
                            </div>
                            <div class="grid-item col-md-4 col-sm-6">
                              <a href="post.html">
                                <article class="post mb-3">
                                    <figure class="post-media overlay-zoom">

                                            <img src="images/noticia3.png" width="430" height="300"
                                                alt="post" />
                                    </figure>
                                    <div class="post-details">
                                        <div class="post-meta">
                                          22-06-2021

                                        </div>
                                        <h4 class="post-title">NUEVA TARIFA TERRAIN 2021</h4>
                                        <p class="post-content">
                                          Como distribuidores oficiales de la firma Terrain, queremos informarles que desde el 1 de julio de 2021 estará vigente la nueva tarifa Terrain 2021.
                                        </p>
                                        <span
                                            class="btn btn-link btn-underline btn-primary">Leer más<i
                                                class="d-icon-arrow-right"></i></span>
                                    </div>
                                </article>
                              </a>
                            </div>
                        </div>
                        <ul class="pagination mt-5">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                    aria-disabled="true">
                                    <i class="d-icon-arrow-left"></i>Anterior
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Siguiente<i class="d-icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <aside class="col-lg-3 right-sidebar sidebar-fixed sticky-sidebar-wrapper">
                        <div class="sidebar-overlay">
                            <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                        </div>
                        <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar" data-sticky-options="{'top': 89, 'bottom': 70}">
                                <div class="widget widget-search border-no mb-2">
                                    <form action="#" class="input-wrapper input-wrapper-inline btn-absolute">
                                        <input type="text" class="form-control" name="search" autocomplete="off"
                                            placeholder="Buscar en Blog" required />
                                        <button class="btn btn-search btn-link" type="submit">
                                            <i class="d-icon-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="widget widget-collapsible border-no">
                                    <h3 class="widget-title">Categorías</h3>
                                    <ul class="widget-body filter-items search-ul">
                                        <li><a href="#">Fontanería</a></li>
                                        <li><a href="#">Saneamiento</a></li>
                                        <li><a href="#">Empresa</a></li>
                                    </ul>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Artículos destacados</h3>
                                    <div class="widget-body">
                                        <div class="post-col">
                                            <div class="post post-list-sm">
                                                <figure class="post-media">
                                                    <a href="post.html">
                                                        <img src="images/noticia1.png" width="90" height="90"
                                                            alt="post" />
                                                    </a>
                                                </figure>
                                                <div class="post-details">
                                                    <div class="post-meta">
                                                        <a href="#" class="post-date">22-06-2021</a>
                                                    </div>
                                                    <h4 class="post-title"><a href="post.html">Nueva Delegación En San Pedro De Alcántara, Marbella</a></h4>
                                                </div>
                                            </div>
                                            <div class="post post-list-sm">
                                                <figure class="post-media">
                                                    <a href="post.html">
                                                        <img src="images/noticia2.png" width="90" height="90"
                                                            alt="post" />
                                                    </a>
                                                </figure>
                                                <div class="post-details">
                                                    <div class="post-meta">
                                                        <a href="#" class="post-date">22-06-2021</a>
                                                    </div>
                                                    <h4 class="post-title"><a href="post.html">PP-R RED FIRE NUEVO SISTEMA CONTRAINCENDIOS</a></h4>
                                                </div>
                                            </div>
                                            <div class="post post-list-sm">
                                                <figure class="post-media">
                                                    <a href="post.html">
                                                        <img src="images/noticia3.png" width="90" height="90"
                                                            alt="post" />
                                                    </a>
                                                </figure>
                                                <div class="post-details">
                                                    <div class="post-meta">
                                                        <a href="#" class="post-date">22-06-2021</a>
                                                    </div>
                                                    <h4 class="post-title"><a href="post.html">NUEVA TARIFA TERRAIN 2021</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="widget widget-posts widget-collapsible">
                                    <h3 class="widget-title">Tag Cloud</h3>
                                    <div class="widget-body">
                                        <a href="#" class="tag">Bag</a>
                                        <a href="#" class="tag">Classic</a>
                                        <a href="#" class="tag">Converse</a>
                                        <a href="#" class="tag">Leather</a>
                                        <a href="#" class="tag">Fit</a>
                                        <a href="#" class="tag">Green</a>
                                        <a href="#" class="tag">Man</a>
                                        <a href="#" class="tag">Jeans</a>
                                        <a href="#" class="tag">Women</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
@stop
{{-- Scripts --}}
@section('scripts')

@stop
