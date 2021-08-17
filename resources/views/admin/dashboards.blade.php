@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
@stop
{{-- Content --}}
@section('content')

  <div class="row">
    <div class="col-lg-4 col-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Ventas Totales </h5>
                <div class="ibox-tools">
                    {{-- <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a> --}}
                </div>
            </div>
            <div class="ibox-content">
              <h1 class="font-weight-bolder">{{ Helper::showPrice($stats['total_ventas']) }}</h1>
              <div id="ventas-totales"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Total de visitas a la tienda online </h5>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-content">
              <h1 class="font-weight-bolder">{{ ($stats['total_visitas']) }}</h1>
              <div id="total-visitas"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Tasa de Conversión </h5>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-content">
              <h1 class="font-weight-bolder">{{ ($stats['embudo_convertido_%']) }}%</h1>
              <h3 class="mt-3">EMBUDO DE CONVERSIÓN</h3>

              <div>
                <table class="table">
                  <tr>
                    <td class="text-left">Agregado al carrito <br> <span class="text-muted">{{ $stats['embudo_add_to_cart'] }} visitas</span> </td>
                    <td class="text-right">{{ round($stats['embudo_add_to_cart_%']) }}%</td>
                  </tr>
                  <tr>
                    <td class="text-left">Llegaron a la pantalla de pago <br> <span class="text-muted">{{ $stats['embudo_checkout'] }} visitas</span> </td>
                    <td class="text-right">{{ round($stats['embudo_checkout_%']) }}%</td>
                  </tr>
                  <tr>
                    <td class="text-left">Sesiones convertidas <br> <span class="text-muted">{{ $stats['embudo_convertido'] }} visitas</span> </td>
                    <td class="text-right">{{ round($stats['embudo_convertido_%']) }}%</td>
                  </tr>
                </table>
              </div>

              <div>
                <h3>Tasa de clientes recurrentes</h3>
                <table class="table">
                  <tr>
                    <td class="text-left">Clientes recurrentes <br> <span class="text-muted">{{ $stats['num_clientes_recurrentes'] }} clientes</span> </td>
                    <td class="text-right">{{ round($stats['clientes_recurrentes_%']) }}%</td>
                  </tr>
                  <tr>
                    <td class="text-left">Clientes que compran por primera vez <br> <span class="text-muted">{{ $stats['num_clientes_primera_vez'] }} clientes</span> </td>
                    <td class="text-right">{{ round($stats['clientes_primera_vez_%']) }}%</td>
                  </tr>
                </table>
              </div>
            </div>
        </div>
    </div>
  </div>


  <div class="row">
    <div class="col-lg-4 col-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Productos más vendidos, por unidades </h5>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-content">
              <div>
                <table class="table">
                  @foreach ($stats['productos_mas_vendidos'] as $producto)
                    <tr>
                      <td class="text-left">{{ $stats['producto'][$producto->id]->name }} </td>
                      <td class="text-right">{{ ($producto->total_sold) }}</td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
        </div>
    </div>
  </div>

@stop
{{-- Scripts --}}
@section('scripts')
  <script src="/vendor/js/plugins/morris/raphael-2.1.0.min.js"></script>
  <script src="/vendor/js/plugins/morris/morris.js"></script>
<script>

$(function() {

    Morris.Line({
        element: 'ventas-totales',
            data: [
                { date: '2008', value: 5 },
                { date: '2009', value: 10 },
                { date: '2010', value: 8 },
                { date: '2011', value: 22 },
                { date: '2012', value: 8 },
                { date: '2014', value: 10 },
                { date: '2015', value: 5 }
            ],
        xkey: 'date',
        ykeys: ['value'],
        resize: true,
        lineWidth:4,
        labels: ['Ventas'],
        lineColors: ['#1ab394'],
        pointSize:5,
    });


    Morris.Line({
        element: 'total-visitas',
            data: [
                { year: '2008', value: 5 },
                { year: '2009', value: 10 },
                { year: '2010', value: 8 },
                { year: '2011', value: 22 },
                { year: '2012', value: 8 },
                { year: '2014', value: 10 },
                { year: '2015', value: 5 }
            ],
        xkey: 'year',
        ykeys: ['value'],
        resize: true,
        lineWidth:4,
        labels: ['Ventas'],
        lineColors: ['#1ab394'],
        pointSize:5,
    });

});

</script>
@stop
