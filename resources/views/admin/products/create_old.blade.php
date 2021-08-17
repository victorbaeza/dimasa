@extends('layouts.admin.main')
@php
    $title = 'Crear Producto Nuevo';
    $page_header_title = $title;
    $post_route = route('admin.products.do_create');
@endphp

{{-- Content --}}
@section('content')
    @include('admin.products.formbody')
@stop
