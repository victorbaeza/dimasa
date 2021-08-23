@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
<link rel="stylesheet" href="/vendor/lightgallery/css/lightgallery.css">
<!-- lightgallery plugins -->
<link type="text/css" rel="stylesheet" href="/vendor/lightgallery/css/lg-zoom.css" />
<link type="text/css" rel="stylesheet" href="/vendor/lightgallery/css/lg-thumbnail.css" />
<style>
#courses-section{
  margin-top: -60px;
}
/* #courses-section .courses-header{
        max-width: 1140px;
} */
#courses-section article.box-shadow, #courses-section .widget.box-shadow{
  box-shadow: 0px 0px 20px 0px #dcdcdc;
}

#courses-section article .post-footer{
  font-size: 1.2rem;
}

#courses-section article .post-media img{
  object-fit: contain;
  background-color: #355F94;
}

#courses-section .post-media img{
  height: auto !important;
  max-height: 250px !important;
}

.img-fluid {
    max-width: 100%;
    height: auto;
}
@media (min-width: 576px){
  .post-list {
      align-items: start;
  }
}
</style>
@stop
{{-- Content --}}
@section('content')
<div class="shop-boxed-banner banner pb-7 pt-7" style="background-image: url('/images/formacion.jpg');height: 300px;background-position: 100% 60%;">
</div>

<section id="courses-section" class="mb-10">
  <div class="container courses-header">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-7">
        <article class="post post-list mb-4 bg-white box-shadow">
              <figure class="post-media">
                      <img src="/images/AIRZONE.png" alt="post">
              </figure>
              <div class="post-details pl-5 pr-5">
                  <div class="post-meta">
                    <span class="text-warning">NOVEDAD</span>
                  </div>
                  <h4 class="post-title">FORMACIONES ONLINE ARIZONE
                  </h4>
                  <p class="text-justify post-content short text-justify">
                      CURSOS DE FORMACIÓN ONLINE SEMANALES<br>
                      La empresa Airzone tiene en su web una serie de cursos online que pone a disposición de todos los profesionales del sector, es muy fácil acceder a ellos solo tienes que elegir el curso al que quieres realizar, matricularte y gestionarlo desde tu cuenta Airzone Academy.
                  </p>

                  <a href="#" class="btn btn-link btn-underline btn-primary course-read-more mr-3">LEER MÁS<i class="fas fa-eye"></i></a>
                  <a href="#" class="btn btn-link btn-underline btn-primary course-register">INSCRIBIRME<i class="d-icon-arrow-right"></i></a>
                  <div class="post-footer mb-2 mt-3">
                    <div class="d-flex align-items-center"><span>Inscritos: 10 · Hasta el: 22-09-2021</span></div>
                  </div>
              </div>
          </article>
        {{-- <div class="box d-flex align-items-center">
          <div class="box-image">
            <img src="/images/aula.jpg" />
          </div>
          <div class="box-content">
            <h3 class="box-title">FORMACIÓN CURSOS TÉCNICOS</h3>
            <p class="box-description">Desde Saneamientos Dimasa somos consientes de la importancia que tiene hoy en día la formación en las empresas para aportarles un plus de diferenciación</p>
          </div>
        </div> --}}
        <h1 class="text-center font-size-3">Formación con Dimasa</h1>
        <div class="icon-box-wrap d-flex flex-wrap justify-content-center mt-5 align-items-center">
											<div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4 mr-10">
												<div class="icon-box-icon">
													<i class="fas fa-globe"></i>
												</div>
												<div class="icon-box-content">
													<h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">Formación online</h4>
													<p>con clases en directo</p>
												</div>
											</div>
											<div class="divider d-xl-show mr-10"></div>
											<div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4">
												<div class="icon-box-icon">
													<i class="fas fa-chalkboard-teacher"></i>
												</div>
												<div class="icon-box-content">
													<h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">Instructores profesionales
													</h4>
													<p>con experiencia en el sector</p>
												</div>
											</div>
										</div>
      </div>
      <div class="col-lg-3">
        <div class="widget bg-white box-shadow pl-5 pr-5 pt-5 pb-5">
            <h3 class="widget-title">Destacados</h3>
            <div class="widget-body">
                <div class="post-col">
                    <div class="post post-list-sm">
                        <figure class="post-media">
                                <img src="images/blog/1_xs.jpg" width="90" height="90" alt="post">
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title">Lorem ipsum et dolore sit amet</h4>
                        </div>
                    </div>
                    <div class="post post-list-sm">
                        <figure class="post-media">
                            <a href="#">
                                <img src="images/blog/2_xs.jpg" width="90" height="90" alt="post">
                            </a>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title">Lorem ipsum et dolore sit amet</h4>
                        </div>
                    </div>
                    <div class="post post-list-sm">
                        <figure class="post-media">
                            <a href="#">
                                <img src="images/blog/3_xs.jpg" width="90" height="90" alt="post">
                            </a>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title">Lorem ipsum et dolore sit amet</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>
  <div class="container-fluid bg-lighter mt-10 pt-10 pb-10">
      <div class="container">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-4">
            <form action="#" class="input-wrapper input-wrapper-inline btn-absolute bg-white mb-5">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Busca un curso" required="">
                <button class="btn btn-search btn-link" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-7">
            <article class="post post-list mb-4 bg-white">
                  <figure class="post-media">
                          <img src="/images/aula.jpg" alt="post">
                  </figure>
                  <div class="post-details pl-5 pr-5">
                      <h4 class="post-title">FORMACIÓN CURSOS TÉCNICOS
                      </h4>
                      <p class="text-justify post-content short">
                          Desde Saneamientos Dimasa somos consientes de la importancia que tiene hoy en día la formación en las empresas para aportarles un plus de diferenciación y competitividad en su sector,  siguiendo con las novedades emprendidas hace algún tiempo por nuestra empresa hemos  puesto en marcha un aula de formación para aportar conocimientos a nuestros clientes. Esta formación tendrá como finalidad tanto el transmitir las nuevas novedades en nuestro sector así como el reciclaje de productos e instalaciones habituales y que no siempre estamos bien informados.
                      </p>

                      <a href="#" class="btn btn-link btn-underline btn-primary course-read-more mr-3">LEER MÁS<i class="fas fa-eye"></i></a>
                      <a href="#" class="btn btn-link btn-underline btn-primary course-register">INSCRIBIRME<i class="d-icon-arrow-right"></i></a>
                      <div class="post-footer mb-2 mt-3">
                        <div class="d-flex align-items-center"><span>Inscritos: 10 · Hasta el: 22-09-2021</span></div>
                      </div></div>
              </article>
              <article class="post post-list mb-4 bg-white">
                    <figure class="post-media">
                        <a href="#">
                            <img src="/images/JAGA-FORMACION.png" alt="post">
                        </a>
                    </figure>
                    <div class="post-details pl-5 pr-5">
                        <h4 class="post-title"><a href="#">II JUEVES TÉCNICO 2020 - JAGA Radiadores de Baja Temperatura</a>
                        </h4>
                        <p class="text-justify post-content short">
                          CURSO DE FORMACIÓN SOBRE RADIADORES BAJA TEMPERATURA<br>
II JORNADA TÉCNICA en Saneamientos Dimasa pensada para todas aquellas empresas instaladoras de radiadores de Baja Temperatura.   ¡Un antes y un después en la calefacción! Cada vez son más los clientes finales que quieren instalar calefacción en su vivienda, y se informan sobre la solución más eficiente y de menor consumo.
                        </p>

                        <a href="#" class="btn btn-link btn-underline btn-primary course-read-more mr-3">LEER MÁS<i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-link btn-underline btn-primary course-register">INSCRIBIRME<i class="d-icon-arrow-right"></i></a>
                        <div class="post-footer mb-2 mt-3">
                          <div class="d-flex align-items-center"><span>Inscritos: 10 · Hasta el: 22-09-2021</span></div>
                        </div>
                    </div>
                </article>
                <article class="post post-list mb-4 bg-white">
                      <figure class="post-media">
                          <a href="#">
                              <img src="/images/AIRZONE.png" alt="post">
                          </a>
                      </figure>
                      <div class="post-details pl-5 pr-5">
                          <h4 class="post-title"><a href="#">I JUEVES TÉCNICO 2020 - SIME CALENTADORES</a>
                          </h4>
                          <p class="text-justify post-content short">
                            CURSO DE FORMACIÓN SOBRE CALENTADORES
                            I JORNADA TÉCNICA en Saneamientos Dimasa pensada para todas aquellas empresas instaladoras de calentadores de ACS.   En el curso veremos, de una manera muy práctica, todos los aspectos y consideraciones a tener en cuenta en la instalación, problemas comunes y adaptaciones de instalaciones debido al cambio de normativa. Para la práctica utilizaremos nuestro calentador más vendido el SIME CALENTADOR ESTANCO MINI 12/16 BF ErP GN/GLP. *Necesario reserva y confirmación de plaza. Aforo limitado.
                          </p>

                          <a href="#" class="btn btn-link btn-underline btn-primary course-read-more mr-3">LEER MÁS<i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-link btn-underline btn-primary course-register">INSCRIBIRME<i class="d-icon-arrow-right"></i></a>
                          <div class="post-footer mb-2 mt-3">
                            <div class="d-flex align-items-center"><span>Inscritos: 10 · Hasta el: 22-09-2021</span></div>
                          </div>
                      </div>
                  </article>
          </div>
            <aside class="col-lg-3 mb-4 sidebar-fixed sticky-sidebar-wrapper">
              <form class="pl-5 pr-5 pt-5 pb-5  bg-white" method="POST" action="{{ route('site.do_contact') }}" id="c_form">
                                  @csrf
                                    <h2 class="title ls-m mt-2 title-center" style="padding-bottom: 15px;border-bottom: 1px solid #2674C5;">¿Necesita una formación?</h2>
                                    <p class="text-justify">Díganos en qué está interesado e intentaremos organizarla:</p>
                                    {{-- @if ($message = Session::get('success'))

                                      <div class="alert alert-success alert-dark alert-inline mb-5">
                                          <h4 class="alert-title">¡Hecho!</h4>
                                          @if(is_array($message))
                                            @foreach ($message as $m)
                                              {{ $m }}
                                            @endforeach
                                          @else
                                            {{ $message }}
                                          @endif
                                          <button type="button" class="btn btn-link btn-close">
                                              <i class="d-icon-times"></i>
                                          </button>
                                      </div>

                                    {{ Session::forget('success') }}
                                    @endif --}}
                                    <div class="row mb-2">
                                        <div class="mb-4">
                                            <input name="name_lat" class="form-control" type="text" placeholder="Nombre *" required>
                                            @error('name_lat')<span class="text-danger">El nombre es obligatorio y debe contener 50 caracteres como máximo</span>@enderror
                                        </div>
                                        <div class="mb-4">
                                            <input name="email_lat" class="form-control" type="email" placeholder="Email *" required>
                                            @error('email_lat')<span class="text-danger">El email es obligatorio y debe tener un formato de email válido (ejemplo@dominio.com)</span>@enderror
                                        </div>
                                        <div class="mb-4">
                                            <input name="phone_lat" class="form-control" type="text" placeholder="Teléfono *" required>
                                            @error('phone_lat')<span class="text-danger">El teléfono es obligatorio y solo puede contener números</span>@enderror
                                        </div>
                                        <div class="mb-4">
                                            <textarea name="message_lat" class="form-control" type="text" rows="4" placeholder="Mensaje *" required></textarea>
                                            @error('message_lat')<span class="text-danger">El mensaje es obligatorio</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-checkbox mb-4">
                                <input type="checkbox" class="custom-checkbox" id="signin-remember" name="checkbox" required>
                                <label class="form-control-label" for="signin-remember">
                                  Acepto la <strong><a href="{{route('site.privacy')}}">política de privacidad</a></strong>
                                </label>
                              </div>
                              @if( $c_error = Session::get('c_error') )
                            <div class="col-md-12">
                                <span class="text-danger">{{$c_error}}</span>
                            </div>
                          @endif
                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                    <input type="hidden" id="action" name="action" value="submit">
                          <button class="btn btn-outline btn-primary mt-4 g-recaptcha">ENVIAR<i
                                  class="d-icon-arrow-right"></i></button>
                                </form>
            </aside>
          <div class="col-lg-1"></div>
        </div>
      </div>
</div>
</section>

<div class="newsletter-popup mfp-hide" id="course-registration">
  <form class="pl-5 pr-5 pt-5 pb-5" method="POST" action="{{ route('site.do_contact') }}" id="c_form">
                      @csrf
                        <h2 class="title ls-m mt-2 title-center" style="padding-bottom: 15px;border-bottom: 1px solid #2674C5;">Formulario de inscripción</h2>
                        <p class="text-justify">Está a punto de inscribirse a <strong>II JUEVES TÉCNICO 2020 - JAGA Radiadores De Baja Temperatura</strong>. Por favor, introduzca los datos que le solicitamos a continuación: </p>
                        {{-- @if ($message = Session::get('success'))

                          <div class="alert alert-success alert-dark alert-inline mb-5">
                              <h4 class="alert-title">¡Hecho!</h4>
                              @if(is_array($message))
                                @foreach ($message as $m)
                                  {{ $m }}
                                @endforeach
                              @else
                                {{ $message }}
                              @endif
                              <button type="button" class="btn btn-link btn-close">
                                  <i class="d-icon-times"></i>
                              </button>
                          </div>

                        {{ Session::forget('success') }}
                        @endif --}}
                        <div class="row mb-2">
                            <div class="col-md-6 mb-4">
                                <input name="name" class="form-control" type="text" placeholder="Nombre *" required>
                                @error('name')<span class="text-danger">El nombre es obligatorio y debe contener 50 caracteres como máximo</span>@enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <input name="email" class="form-control" type="email" placeholder="Email *" required>
                                @error('email')<span class="text-danger">El email es obligatorio y debe tener un formato de email válido (ejemplo@dominio.com)</span>@enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <input name="phone" class="form-control" type="text" placeholder="Teléfono *" required>
                                @error('phone')<span class="text-danger">El teléfono es obligatorio y solo puede contener números</span>@enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <input name="subject" class="form-control" type="text" placeholder="N.I.F. *" required>
                                @error('nif')<span class="text-danger">El N.I.F. es obligatorio</span>@enderror
                            </div>
                        </div>
                        <div class="form-checkbox mb-4">
                    <input type="checkbox" class="custom-checkbox" id="signin-remember" name="checkbox" required>
                    <label class="form-control-label" for="signin-remember">
                      Acepto la <strong><a href="{{route('site.privacy')}}">política de privacidad</a></strong>
                    </label>
                  </div>
                  @if( $c_error = Session::get('c_error') )
                <div class="col-md-12">
                    <span class="text-danger">{{$c_error}}</span>
                </div>
              @endif
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
        <input type="hidden" id="action" name="action" value="submit">
              <button class="btn btn-outline btn-primary mt-4 g-recaptcha">INSCRIBIRSE<i
                      class="d-icon-arrow-right"></i></button>
                    </form>
  </div>
@stop
{{-- Scripts --}}
@section('scripts')
<script>
$(document).on('click', '.course-register', function(){
  Riode.popup( {
     items: {
         src: '#course-registration'
     },
     type: 'inline',
     tLoading: '',
     mainClass: 'mfp-newsletter mfp-flip-popup',
     callbacks: {
         beforeClose: function () {
             // if "do not show" is checked
             // $( '#hide-newsletter-popup' )[ 0 ].checked && Riode.setCookie( 'hideNewsletterPopup', true, 7 );
         }
     },
   });
});

$(document).on('click', '.course-read-more', function(e){
  e.preventDefault();

  var content = $(this).closest('.post-details').find('.post-content');

  $('#courses-section .post-content').each(function(){
      $(this).removeClass("active");
  });

  content.addClass("active");

  $('#courses-section .post-content').each(function(){
    if($(this).hasClass("active") == false){
      $(this).removeClass("large");
      $(this).addClass("short");
      $(this).css({
        "-webkit-line-clamp": "3"
      });
      $(this).closest('.post-details').find('.course-read-more').html('LEER MÁS<i class="fas fa-eye"></i>');
    }

  })

  if(content.hasClass("short") == true){
    $(this).html('OCULTAR<i class="fas fa-eye-slash"></i>');
    content.css({
          "-webkit-line-clamp": "unset"
    });
    content.removeClass("short");
    content.addClass("large");
  }else if(content.hasClass("large") == true){

    $(this).html('LEER MÁS<i class="fas fa-eye"></i>');
    content.css({
          "-webkit-line-clamp": "3"
    });
    content.removeClass("large");
    content.addClass("short");
    content.removeClass("active");
  }


});
$(document).ready(function(){

})
</script>
@stop
