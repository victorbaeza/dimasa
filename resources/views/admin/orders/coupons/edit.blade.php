@extends('layouts.admin.main')
@php
    $title = 'Editar Cupón';
    $page_header_title = $title;
    $post_route = route('admin.coupons.do_edit', $coupon->id);
@endphp

@section('content')
    @include('admin.orders.coupons.formbody')
@endsection
