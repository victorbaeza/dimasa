@extends('layouts.admin.main')
@php
    $title = 'Editar Método de envío';
    $page_header_title = $title;
    $post_route = route('admin.shipment.do_edit', $shipment->id);
@endphp

@section('content')
    @include('admin.orders.shipment.formbody')
@endsection
