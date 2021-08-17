@extends('layouts.admin.main')
@php
    $title = 'Crear Cupón';
    $page_header_title = $title;
    $post_route = route('admin.coupons.do_create');
@endphp

@section('content')
    @include('admin.orders.coupons.formbody')
@endsection
