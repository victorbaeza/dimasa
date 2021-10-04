@extends('layouts.admin.main')

{{-- Extra CSS --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop
{{-- Content --}}
@section('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <form method="POST" action="{{ route('admin.orders.do_edit') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $order->id }}" />

      <div class="row">
        <div class="col-md-8 col-lg-8 col-8">
          <div class="ibox">
            <div class="ibox-title">
                <h3>Editar Pedido - #{{ $order->number }}</h3>
                <div class="ibox-tools">
                  {{-- <a class="collapse-link">
                      <i class="fa fa-chevron-down"></i>
                  </a> --}}
                </div>
            </div>

            <div class="ibox-content">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Precio unidad</th>
                      <th>IVA</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody id="detallesTable">
                    @foreach ($order->Lines as $line)
                      <tr>
                        <td>{{ $line->product_name }}</td>
                        <td>{{ $line->quantity }}</td>
                        <td>{{ Helper::showPrice($line->price_unit) }}</td>
                        <td>{{ $line->VAT }}</td>
                        <td>{{ Helper::showPrice($line->total) }}</td>
                      </tr>
                    @endforeach
                      <tr>
                        <td colspan="3" class="text-right"><strong>Cupones aplicados:</strong></td>
                        <td colspan="2" class="text-left">
                          <ul>
                            @foreach ($order->Coupons as $coupon_order)
                              <li>{{ $coupon_order->Coupon->code }}</li>
                            @endforeach
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" class="text-right"><strong>Subtotal:</strong></td>
                        <td colspan="2" class="text-right"><strong>{{ Helper::showPrice($order->subtotal) }}</strong></td>
                      </tr>
                      <tr>
                        <td colspan="3" class="text-right"><strong>IVA:</strong></td>
                        <td colspan="2" class="text-right"><strong>{{ Helper::showPrice($order->VAT) }}</strong></td>
                      </tr>
                      <tr>
                        <td colspan="3" class="text-right"><strong>Coste de envío:</strong></td>
                        <td colspan="2" class="text-right"><strong>{{ Helper::showPrice($order->shipping_cost) }}</strong></td>
                      </tr>
                      <tr>
                        <td colspan="3" class="text-right"><strong>Total:</strong></td>
                        <td colspan="2" class="text-right"><strong>{{ Helper::showPrice($order->total) }}</strong></td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar cambios</button>
          </div>

        </div>


        <div class="col-md-4 col-lg-4 col-4">
          <div class="ibox">
            <div class="ibox-title">
                <h3>Detalles del pedido</h3>
                <div class="ibox-tools">
                  <a class="collapse-link">
                      <i class="fa fa-chevron-down"></i>
                  </a>
                </div>
            </div>

            <div class="ibox-content">

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nº de pedido:</label>
                <div class="custom-file col-lg-9">
                  <input type="text" class="form-control" value="{{$order->number}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Forma de Pago:</label>
                <div class="custom-file col-lg-9">
                  <input type="text" class="form-control" value="{{$order->PaymentForm->name }}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Estado:</label>
                <div class="custom-file col-lg-9">
                  <input type="text" class="form-control" value="{{ $order->Status->name }}" readonly>
                </div>
              </div>

                {{-- <div class="form-group row">
                  <label class="col-lg-3 col-form-label"></label>
                  <div class="custom-file col-lg-9">
                    <a href="{{ route('admin.orders.confirm_payment', ['id'=>$order->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Confirmar pago</a>
                  </div>
                </div> --}}

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Cliente:</label>
                <div class="custom-file col-lg-9">
                  <input type="text" class="form-control" value="{{$order->name}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Email:</label>
                <div class="custom-file col-lg-9">
                  <input type="text" class="form-control" value="{{$order->email}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Teléfono:</label>
                <div class="custom-file col-lg-9">
                  <input type="text" class="form-control" value="{{$order->phone}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">CIF:</label>
                <div class="custom-file col-lg-9">
                  <input type="text" class="form-control" value="{{$order->cif}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Fecha del pedido:</label>
                <div class="custom-file col-lg-9">
                  <input type="text" class="form-control" value="{{ Helper::showDate($order->date) }}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nº de seguimiento:</label>
                <div class="custom-file col-lg-9">
                  <input type="text" class="form-control" name="tracking_code" value="{{ $order->tracking_code }}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Observaciones:</label>
                <div class="custom-file col-lg-9">
                  <textarea class="form-control" name="observations" rows="3">{{ $order->observations }}</textarea>
                </div>
              </div>

              <br>
              <hr>

              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td width="30%">Dirección de envío</td>
                      <td>{!! nl2br($order->getFullShippingAddress()) !!}</td>
                    </tr>
                    <tr>
                      <td width="30%">Dirección de facturación</td>
                      <td>{!! nl2br($order->getFullAddress()) !!}</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>

      </div>

    </form>
  </div>

@stop
{{-- Scripts --}}
@section('scripts')
    <script src="/vendor/select2-4.0.6/js/select2.js"></script>
    <script>

    </script>
@endsection
