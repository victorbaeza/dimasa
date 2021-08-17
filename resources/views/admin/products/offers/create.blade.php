@extends('layouts.admin.main')
@php
    $title = 'Crear Oferta de producto';
    $page_header_title = $title;
    $post_route = route('admin.products.offers.do_create');
@endphp

@section('content')
    @include('admin.products.offers.formbody')
@endsection
