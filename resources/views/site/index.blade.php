@extends('layouts.site.main')
  @php
    $canonical = Request::url();
  @endphp

{{-- css --}}
@section('extracss')
@stop
{{-- Content --}}
@section('content')

@stop
{{-- Scripts --}}
@section('scripts')
  <script>

  </script>
@stop
