@extends('layouts.admin.main')
@php
    $title = 'Editar Oferta de producto';
    $page_header_title = 'Editar Oferta - '.$offer->id;
    $post_route = route('admin.products.offers.do_edit', $offer->id);
@endphp

@section('content')
    @include('admin.products.offers.formbody')
@endsection
