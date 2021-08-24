@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
<style>
.downloads-bar{
  margin-top: -75px;
}

#downloads-bar-input{
  border-radius: 50px;
  min-height: 5rem;
  border: none;
  box-shadow: 0px 0px 20px 0px #dcdcdc;
}

#downloads-bar-input input{
    border: none;
    font-size: 2rem;
}

#downloads-bar-input .btn i{
  font-size: 2.5rem;
  color: #666;
  margin-right: 5px;
}

.descarga{
  border: 1px solid #d1d1d1;
  padding: 25px 20px;
  transition: all .2s ease-in;
}

.descarga:hover{
  background: #355f94;
}

.descarga:hover *{
  color: #fff !important;
}

.descarga i{
  font-size: 4rem;
}

.descarga .descarga-meta{
  font-size: 1.3rem;
}
</style>
@stop
{{-- Content --}}
@section('content')
<div class="shop-boxed-banner banner pb-7 pt-7" style="background-image: url('/images/descargas.jpg');height: 300px;background-position: 100% 60%;">
</div>

<section id="search-section" class="mb-10">
  {{-- <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 d-flex align-items-center justify-content center bg-white search-header pt-5 pb-2 pl-5 pr-5">
        <h1 class="font-size-2 text-center">Búsqueda: </h1>
        <div class="widget widget-search border-no mb-2">
            <form action="#" class="input-wrapper input-wrapper-inline btn-absolute">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="Buscar en Blog" required />
                <button class="btn btn-search btn-link" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div> --}}
  <div class="container-fluid pt-10 pb-10">
      <div class="container">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-8 downloads-bar d-flex justify-content-center">
            <form action="#" id="downloads-bar-input" class="input-wrapper input-wrapper-inline btn-absolute bg-white mb-5">
                <input type="text" class="form-control" name="download-search" autocomplete="off" placeholder="Búsqueda en el centro de descargas..." required="">
                <button class="btn btn-search btn-link" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3 mb-4">
                  <a href="/es/descargar/catalogo-tunel.pdf">
                    <div class="descarga d-flex justify-content-between align-items-center">
                      <i class="far fa-file-pdf text-web"></i>
                      <div class="descarga-contenido">
                        <div class="descarga-meta">
                          <span>22/08/2022 actualizado</span>
                          <span>| 11.54 MBytes</span>
                        </div>
                        <span class="text-web font-weight-bold text-center">Catálogo de ejemplo</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 mb-4">
                  <a href="/es/descargar/catalogo-tunel.pdf">
                    <div class="descarga d-flex justify-content-between align-items-center">
                      <i class="far fa-file-pdf text-web"></i>
                      <div class="descarga-contenido">
                        <div class="descarga-meta">
                          <span>22/08/2022 actualizado</span>
                          <span>| 11.54 MBytes</span>
                        </div>
                        <span class="text-web font-weight-bold text-center">Catálogo de ejemplo</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 mb-4">
                  <a href="/es/descargar/catalogo-tunel.pdf">
                    <div class="descarga d-flex justify-content-between align-items-center">
                      <i class="far fa-file-pdf text-web"></i>
                      <div class="descarga-contenido">
                        <div class="descarga-meta">
                          <span>22/08/2022 actualizado</span>
                          <span>| 11.54 MBytes</span>
                        </div>
                        <span class="text-web font-weight-bold text-center">Catálogo de ejemplo</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 mb-4">
                  <a href="/es/descargar/catalogo-tunel.pdf">
                    <div class="descarga d-flex justify-content-between align-items-center">
                      <i class="far fa-file-pdf text-web"></i>
                      <div class="descarga-contenido">
                        <div class="descarga-meta">
                          <span>22/08/2022 actualizado</span>
                          <span>| 11.54 MBytes</span>
                        </div>
                        <span class="text-web font-weight-bold text-center">Catálogo de ejemplo</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 mb-4">
                  <a href="/es/descargar/catalogo-tunel.pdf">
                    <div class="descarga d-flex justify-content-between align-items-center">
                      <i class="far fa-file-pdf text-web"></i>
                      <div class="descarga-contenido">
                        <div class="descarga-meta">
                          <span>22/08/2022 actualizado</span>
                          <span>| 11.54 MBytes</span>
                        </div>
                        <span class="text-web font-weight-bold text-center">Catálogo de ejemplo</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 mb-4">
                  <a href="/es/descargar/catalogo-tunel.pdf">
                    <div class="descarga d-flex justify-content-between align-items-center">
                      <i class="far fa-file-pdf text-web"></i>
                      <div class="descarga-contenido">
                        <div class="descarga-meta">
                          <span>22/08/2022 actualizado</span>
                          <span>| 11.54 MBytes</span>
                        </div>
                        <span class="text-web font-weight-bold text-center">Catálogo de ejemplo</span>
                      </div>
                    </div>
                  </a>
                </div>
            </div>
          </div>
          <nav class="toolbox toolbox-pagination mt-6">
								<p class="show-info">Mostrando <span>6 de 6</span> archivos</p>
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
      </div>
</div>
</section>
@stop
{{-- Scripts --}}
@section('scripts')

@stop
