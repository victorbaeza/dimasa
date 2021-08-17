@extends('layouts.admin.main')
@php($title = 'Listado productos')
{{-- css --}}
@section('extracss')
@stop

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Asignar Ofertas al producto - {{$product->name}}</h5>
                </div>
                <div class="ibox-content">
                    <form action="{{route('admin.products.do_assign_offers', $product)}}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Asignar</th>
                                    <th>ID</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha finalización</th>
                                    <th>Descuento</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($offers as $offer)
                                    <tr>
                                        <td><input type="checkbox" name="offers[{{$offer->id}}]" @if($product->hasOffer($offer->id)) checked value="1" @endif></td>
                                        <td>{{$offer->id}}</td>
                                        <td>{{$offer->start_date}}</td>
                                        <td>{{$offer->end_date}}</td>
                                        <td>
                                            @if($offer->discount_type == DiscountType::ABSOLUTE()->getValue())
                                                <span>{{$offer->discount}}€</span>
                                            @else
                                                <span>{{$offer->discount}}%</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-5">
                            <div class="col-xs-12 col-sm-4 offset-sm-4">
                                <button type="submit" class="btn btn-primary btn-block">Asignar ofertas</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
