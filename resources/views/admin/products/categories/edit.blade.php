@extends('layouts.admin.main')
@php
    $title = 'Editar Categoría de producto';
    $page_header_title = 'Editar Categoria - '.$category->name;
    $post_route = route('admin.products.categories.do_edit', $category->id);
@endphp

@section('content')
    @include('admin.products.categories.formbody')
@endsection
