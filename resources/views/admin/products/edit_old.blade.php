@extends('layouts.admin.main')
@php
   $title = 'Editar Producto';
   $page_header_title = 'Editar Producto - '.$product->name;
   $post_route = route('admin.products.do_edit', $product->id);
@endphp

{{-- Content --}}
@section('content')
    @include('admin.products.formbody')
@stop
