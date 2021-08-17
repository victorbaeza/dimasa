@extends('layouts.admin.main')
@php
    $title = 'Crear Método de envío';
    $page_header_title = $title;
    $post_route = route('admin.shipment.do_create');
@endphp

@section('content')
    @include('admin.orders.shipment.formbody')
@endsection
