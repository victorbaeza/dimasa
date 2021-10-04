@extends('layouts.site.main')
  @php
    $title = __('errors.pagina_no_encontrada');
  @endphp

@section('content')

  <div class="container padding-top-3x padding-bottom-3x mb-1">
    <img class="d-block m-auto" src="/images/404.png" style="width: 100%; max-width: 550px;" alt="404">
    <div class="padding-top-1x mt-2 text-center">
      <h3>@lang('errors.pagina_no_encontrada')</h3>
      <p>@lang('errors.404_mensaje')<br><br>
        <a href="/" class="btn btn-info">@lang('errors.volver_inicio')</a><br></p>
    </div>
  </div>

@stop

@section('scripts')
@stop
