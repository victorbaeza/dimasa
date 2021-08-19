@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
@stop
{{-- Content --}}
@section('content')
  <style>
  .page-header h1{
    font-size: 3.5rem;
    color: #283d50;
    text-align: center;
    font-weight: 400;
    position: relative
}

.section-header p {
    text-align: center;
    margin: auto;
    font-size: 15px;
    padding-bottom: 60px;
    color: #556877;
    width: 50%
}

#clients {
    padding: 60px 0
}

#clients .clients-wrap {
    border-top: 1px solid #d6eaff;
    border-left: 1px solid #d6eaff;
    margin-bottom: 30px
}

#clients .clients-wrap > div {
  border-right: 1px solid #d6eaff;
  border-bottom: 1px solid #d6eaff;
}

#clients .client-logo {
    padding: 55px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;

    overflow: hidden;
    background: #fff;
    height: 160px
}

#clients img {
    transition: all 0.3s ease-in-out
}

#clients .client-logo:hover img{
  transform:scale(1.3);
}
  </style>
  <section id="clients" class="section-bg pt-0">
    <div class="page-header pl-4 pr-4 mb-5" style="background-image: url(images/page-header/about-us.jpg)">
      <div class="container">
        <h1 class="page-title lh-1 text-white text-left">Marcas con las que trabajamos</h1>
      </div>
      </div>
      <div class="container">
          <div class="row no-gutters clients-wrap clearfix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <div class="col-lg-2 col-md-4 col-xs-6">
                  <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.genebre.es/templates/public/default/img/logo.jpg" class="img-fluid" alt=""> </div></a>
              </div>
              <div class="col-lg-2 col-md-4 col-xs-6">
                  <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.mediclinics.es/img/mdccom-logo-1539083892.jpg" class="img-fluid" alt=""> </div></a>
              </div>
              <div class="col-lg-2 col-md-4 col-xs-6">
                  <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.cvtechvac.com/wp-content/uploads/2020/07/logo-cvtech.png" class="img-fluid" alt=""> </div></a>
              </div>
              <div class="col-lg-2 col-md-4 col-xs-6">
                  <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="http://www.domingorepresentative.com/wp-content/uploads/2019/04/DR-Logo-3rd-Apr.png" class="img-fluid" alt=""> </div></a>
              </div>
              <div class="col-lg-2 col-md-4 col-xs-6">
                  <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://www.productosqp.com/pub/media/theme_options/default/logo_productos_qp.png" class="img-fluid" alt=""> </div></a>
              </div>
              <div class="col-lg-2 col-md-4 col-xs-6">
                  <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://termat.es/assets/img/logo/termat.png" class="img-fluid" alt=""> </div></a>
              </div>
              <div class="col-lg-2 col-md-4 col-xs-6">
                  <a href="/catalogo/fontaneria"><div class="client-logo"> <img src="https://korman.com.es/assets/img/logo/korman.png" class="img-fluid" alt=""> </div></a>
              </div>
          </div>
      </div>
  </section>

@stop
{{-- Scripts --}}
@section('scripts')

@stop
