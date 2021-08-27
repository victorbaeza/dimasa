@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
@stop
{{-- Content --}}
@section('content')
  <section class="section-bg pt-0">
        <div class="parallax-banner pb-7 pt-7" title="Empresas Instaladoras" style="background-image: url('/images/empresas-instaladoras.jpg'); background-color: #ECEDEF;height: 100vh;background-position: 100% 68%;">
        <div class="parallax-banner-content">
          <h1 class="banner-title text-uppercase font-weight-lighter text-center">Empresas instaladoras</h1>
          <div class="text-center">
            <a href="#partners" class="animated-scroll d-flex flex-column" title="Ver empresas instaladoras"
            data-scroll-options="{
                'speed': 500,
                'offset': 100,
                'delay': 200
            }">
      <span class="font-size-2">Ver todas</span><i class="d-icon-arrow-down bounce mt-2"></i>
    </a>
  </div>
        </div>
      </div>
  </section>
  <section id="partners" class="pt-10 pb-10">
    <div class="container">
      <nav class="toolbox sticky-toolbox sticky-content fix-top pt-0 mb-5">
        <div class="toolbox-left">
          <form action="#" class="input-wrapper input-wrapper-inline btn-absolute bg-white">
              <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Buscar..." required="">
              <button class="btn btn-search btn-link" type="submit">
                  <i class="d-icon-search"></i>
              </button>
          </form>
        </div>
        <div class="toolbox-right">
          <div class="toolbox-item toolbox-sort select-box text-dark mb-0">
            <label class="d-block">MOSTRAR :</label>
            <select name="orderby" class="form-control">
              <option value="" selected="selected">10</option>
              <option value="rating">20</option>
              <option value="date">30</option>
              <option value="price-low">50</option>
            </select>
          </div>

          {{-- <a href="#" class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary btn-icon-right d-lg-none">Filtrar<i class="d-icon-arrow-right"></i></a>
          <div class="toolbox-item toolbox-sort select-box text-dark mb-0">
            <label>Ordenar :</label>
            <select name="orderby" class="form-control">
              <option value="" selected="selected">-</option>
              <option value="popularity">Popularidad</option>
              <option value="rating">Valoraciones</option>
              <option value="date">Nuevo a antiguo</option>
              <option value="price-low">Precio más bajo</option>
              <option value="price-high">Precio más alto</option>
            </select>
          </div> --}}
        </div>
      </nav>
                    <div class="row gutter-lg">
                        <div class="col-12">
                          {{-- <div class="partners">
                            <section class="partner">
                            	<div class="partner__photo">
                            		<div class="photo-container">
                            			<div class="photo-main" style="background-image: url(images/noticia2.png); background-repeat: no-repeat;background-size: cover;">
                            				<div class="controls">
                            					<i class="material-icons">share</i>
                            					<i class="material-icons">favorite_border</i>
                            				</div>
                            			</div>
                            		</div>
                            	</div>
                            	<div class="partner__info">
                            		<div class="title">
                            			<h1>Delicious Apples</h1>
                            			<span>COD: 45999</span>
                            		</div>
                            		<div class="variant">
                            			<h3>SELECT A COLOR</h3>
                            			<ul>
                            				<li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302064/codepen/delicious-apples/green-apple2.png" alt="green apple"></li>
                            				<li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302752/codepen/delicious-apples/yellow-apple.png" alt="yellow apple"></li>
                            				<li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302427/codepen/delicious-apples/orange-apple.png" alt="orange apple"></li>
                            				<li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302285/codepen/delicious-apples/red-apple.png" alt="red apple"></li>
                            			</ul>
                            		</div>
                            		<div class="description">
                            			<h3>BENEFITS</h3>
                            			<ul>
                            				<li>Apples are nutricious</li>
                            				<li>Apples may be good for weight loss</li>
                            				<li>Apples may be good for bone health</li>
                            				<li>They're linked to a lowest risk of diabetes</li>
                            			</ul>
                            		</div>
                            		<button class="buy--btn">ADD TO CART</button>
                            	</div>
                            </section>
                          </div> --}}
                            <div class="posts partners">

                                <article class="partner post mb-4">
                                    <figure class="partner-media post-media">
                                            <img src="/images/AIRZONE.png" alt="post" />
                                    </figure>
                                    <div class="post-details partner-details">
                                        <div class="d-flex flex-wrap align-items-center">
                                          <h4 class="post-title font-weight-normal mb-0 mr-2">EMPRESA INSTALADORA S.L.</h4>
                                          <div class="d-flex align-items-center flex-wrap partner-categories">
                                            <a href="#" data-href="/catalogo/fontaneria" class="mr-1 ml-1">
                                              <img src="/images/icons/azules/1.png" alt="Fontanería" title="Fontanería" width="22" height=22 />
                                            </a>
                                            <a href="#" data-href="/catalogo/fontaneria" class="mr-1 ml-1">
                                              <img src="/images/icons/azules/2.png" alt="ACS/Calefacción" title="ACS/Calefacción" width="22" height=22 />
                                            </a>
                                            <a href="#" data-href="/catalogo/fontaneria" class="mr-1 ml-1">
                                              <img src="/images/icons/azules/3.png" alt="Aire Acondicionado" title="Aire Acondicionado" width="22" height=22 />
                                            </a>
                                            <a href="#" data-href="/catalogo/fontaneria" class="mr-1 ml-1">
                                              <img src="/images/icons/azules/4.png" alt="Energía Renovable" title="Energía Renovable" width="22" height=22 />
                                            </a>
                                          </div>
                                        </div>
                                        <hr>
                                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie facilisis nisl a gravida. Suspendisse potenti. In eu pellentesque nibh, nec lobortis nunc. Proin efficitur lobortis lacus, vel dapibus ex faucibus sed. Nullam blandit pharetra leo vitae suscipit. Pellentesque eu mollis turpis. Duis ornare congue turpis, vel malesuada arcu malesuada et. </p>
                                        <ul>
                                          <li><b>CIF: </b><span>F42886234</span></li>
                                          <li><b>Dirección: </b><span>Calle de Alfredo Corrochano, 101, 29006 Málaga.</span></li>
                                          <li><b>Teléfono: </b><span><a href="tel:+34 952 336 808">+34 952 336 808</a></span></li>
                                        </ul>
                                        <div class="d-flex justify-content-between flex-wrap">
                                          <div class="social-links mt-2">
                                            <a href="#" class="social-link social-instagram fab fa-twitter"></a>
                                            <a href="#" class="social-link social-instagram fab fa-linkedin-in"></a>
                                            <a href="https://www.facebook.com/#/" class="social-link social-facebook fab fa-facebook-f"></a>
                                            <a href="https://www.instagram.com/#_/" class="social-link social-instagram fab fa-instagram"></a>
                                          </div>
                                          <button class="btn btn-outline btn-primary mt-2">CONTACTAR</button>
                                        </div>
                                    </div>

                                </article>

                            </div>
                            <ul class="pagination pt-4">
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
                    </div>
                </div>
  </section>
@stop
{{-- Scripts --}}
@section('scripts')
<script>
$(document).ready(function(){
  var parallax_height = window.innerHeight - $('header').height();
  $('.parallax-banner').css({
    "height": parallax_height+"px"
  })
})
</script>
@stop
