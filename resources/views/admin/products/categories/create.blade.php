@extends('layouts.admin.main')
@php
    $title = 'Crear Categoría de producto';
    $page_header_title = $title;
    $post_route = route('admin.products.categories.do_create');
@endphp

@section('content')
    @include('admin.products.categories.formbody')
@endsection
