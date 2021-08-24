@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
@stop

{{-- Content --}}
@section('content')
  {{-- <div class="shop-boxed-banner banner pb-7 pt-7" style="background-image: url('/images/contacto.jpg');height: 300px;background-position: 100% 60%;">
  </div> --}}
  <div class="page-header pl-4 pr-4 mb-5" id="contact-header" style="background-image: url(images/contacto.jpg)">
    <div class="container">
      <h1 class="page-title lh-1 text-left">Contacte con nosotros</h1>
    </div>
    </div>
  <section class="contact-section mt-5">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-6 ls-m mb-4 pt-5">
                <div class="justify-content-center flex-column">
                  {{-- row cols-sm-2 cols-lg-4  --}}
                    <div class="store">
                        <figure class="">
                            <img src="/images/empresa.jpg" alt="Delegación en San Pedro de Alcántara, Marbella" style="width: 100%;height: auto;">
                            <h4 class="overlay-visible">Marbella</h4>
                            <div class="overlay overlay-transparent">
                                <a href="tel:+34 952 336 808">+34 952 336 808</a>
                                <div class="social-links mt-1">
                                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                    <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </figure>
                    </div>
                    <div class="store">
                        <figure class="">
                            <img src="/images/video.jpg" alt="Delegación en Málaga" style="width: 100%;height: auto;">
                            <h4 class="overlay-visible">Málaga</h4>
                            <div class="overlay overlay-transparent">
                                <a href="tel:+34 952 336 808">+34 952 336 808</a>
                                <div class="social-links mt-1">
                                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                    <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </figure>
                    </div>
                    {{--<div class="store">
                        <figure class="banner-radius">
                            <img src="/images/video.jpg" alt="Delegación en San Pedro de Alcántara, Marbella" style="width: 100%;height: auto;">
                            <h4 class="overlay-visible">Oslo</h4>
                            <div class="overlay overlay-transparent">
                                <a href="tel:+34 952 336 808">+34 952 336 808</a>
                                <div class="social-links mt-1">
                                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                    <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </figure>
                    </div>
                    <div class="store">
                        <figure class="banner-radius">
                            <img src="/images/video.jpg" alt="Delegación en San Pedro de Alcántara, Marbella" style="width: 100%;height: auto;">
                            <h4 class="overlay-visible">Stockholm</h4>
                            <div class="overlay overlay-transparent">
                                <a class="mt-8" href="mail:#">mail@stockholmriodestore.com</a>
                                <a href="tel:#">Phone: (123) 456-7890</a>
                                <div class="social-links mt-1">
                                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                    <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </figure>
                    </div> --}}
                </div>
                  {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.382076311605!2d-4.485763784428757!3d36.71338408028081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f0b38d30d5d9%3A0x9828b85a6153521a!2sCalle%20de%20Alfredo%20Corrochano%2C%20101%2C%2029006%20M%C3%A1laga!5e0!3m2!1ses!2ses!4v1629462629201!5m2!1ses!2ses" style="border:0;width: 100%;height: 490px" allowfullscreen="" loading="lazy"></iframe> --}}
              </div>
              <div class="col-lg-9 col-md-8 col-sm-6 d-flex align-items-center mb-4">
                  <div class="w-100">
                    <form class="pl-5 pr-5 pt-5 pb-5" method="POST" action="{{ route('site.do_contact') }}" id="c_form">
                                        @csrf
                                        <input type="hidden" name="del" value="1" />
                                        <h5>Formulario de contacto</h5>
                                        <p>Rellene el siguiente formulario y nos pondremos en contacto con usted lo antes posible. Los datos marcados con <b>*</b> son obligatorios</p>
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
                                <button class="btn btn-outline btn-primary mt-1 g-recaptcha">INSCRIBIRSE<i
                                        class="d-icon-arrow-right"></i></button>
                                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- End About Section-->

  {{-- <section class="store-section pt-10 pb-8">
      <div class="container">
          <h2 class="title title-center mb-7 text-normal">Delegaciones</h2>

      </div>
  </section> --}}
  <!-- End Store Section -->

  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.382076311605!2d-4.485763784428757!3d36.71338408028081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f0b38d30d5d9%3A0x9828b85a6153521a!2sCalle%20de%20Alfredo%20Corrochano%2C%20101%2C%2029006%20M%C3%A1laga!5e0!3m2!1ses!2ses!4v1629462629201!5m2!1ses!2ses" style="border:0;width: 100%;height: 490px" allowfullscreen="" loading="lazy"></iframe>

  <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
  {{-- <div class="grey-section google-map" id="googlemaps" style="height: 386px"></div> --}}
  <!-- End Map Section -->
@stop

{{-- Scripts --}}
@section('scripts')
  {{-- <script src="/vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key="></script>
<script>

        /*
        Map Settings

            Find the Latitude and Longitude of your address:
                - https://www.latlong.net/
                - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

        */

        // Map Markers
        var mapMarkers = [ {
            address: "Calle de Alfredo Corrochano, 101, 29006 Málaga.",
            html: "<strong>New York Office<\/strong><br>New York, NY 10017",
            popup: true
        } ];

        // Map Initial Location
        var initLatitude = 36.713500188580156;
        var initLongitude = -4.483500000204053;

        // Map Extended Settings
        var mapSettings = {
            controls: {
                draggable: !window.Riode.isMobile,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true
            },
            scrollwheel: false,
            markers: mapMarkers,
            latitude: initLatitude,
            longitude: initLongitude,
            zoom: 11
        };

        var map = $( '#googlemaps' ).gMap( mapSettings );

        // Map text-center At
        var mapCenterAt = function ( options, e ) {
            e.preventDefault();
            $( '#googlemaps' ).gMap( "centerAt", options );
        }

    </script> --}}
@stop
