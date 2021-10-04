@extends('layouts.admin.main')

{{-- Extra CSS --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop
{{-- Content --}}
@section('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <form method="POST" action="{{ route('admin.purchases.do_create') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="num_lines" id="num_lines" value="1" />

      <div class="row">
        <div class="col-md-8 col-lg-8 col-8">
          <div class="ibox">
            <div class="ibox-title">
                <h3>Crear Nueva Compra</h3>
            </div>

            <div class="ibox-content">

              <a href="#" class="btn btn-xs btn-info" id="btn_add_line"><i class="fa fa-plus-circle"></i> Añadir línea</a>

              <div class="table-responsive mt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Precio unidad</th>
                      {{-- <th>Total</th> --}}
                    </tr>
                  </thead>
                  <tbody id="detallesTable">

                      <tr>
                        <td>
                          <select class="select4product" name="add_product_1" style="width:100%;" required></select>
                        </td>
                        <td><input type="number" step="1" min="1" name="add_quantity_1" class="form-control" required></td>
                        <td><input type="number" step="0.01" min="0" name="add_price_1" class="form-control" required></td>
                      </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Crear Compra</button>
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
                <label class="col-lg-3 col-form-label">Proveedor:</label>
                <div class="custom-file col-lg-9">
                  <select class="select4vendor" name="vendor" style="width:100%;" required></select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Forma de Pago:</label>
                <div class="custom-file col-lg-9">
                  <select class="select4purchasepaymentform" name="payment_form" style="width:100%;" required></select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Estado:</label>
                <div class="custom-file col-lg-9">
                  <select class="form-control" name="status" required>
                    @foreach (PurchaseStatus::all() as $status)
                      <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              {{-- <div class="form-group row">
                <label class="col-lg-3 col-form-label">Documento:</label>
                <div class="custom-file col-lg-9">
                  <input type="file" name="invoice_file" accept=".pdf">
                </div>
              </div> --}}

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Observaciones:</label>
                <div class="custom-file col-lg-9">
                  <textarea class="form-control" name="observations" rows="3"></textarea>
                </div>
              </div>



              <br>
              <hr>

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

    select4product();
    select4vendor();
    select4purchasepaymentform();

    var num_lines = 1;

    $(document).on('click', '#btn_add_line', function(e){
        e.preventDefault();
        num_lines++;

        var html = '<tr>';
        html += '<td><select class="select4product" name="add_product_'+num_lines+'" style="width:100%;" required></select></td>';
        html += '<td><input type="number" step="1" min="1" name="add_quantity_'+num_lines+'" class="form-control" required></td>';
        html += '<td><input type="number" step="0.01" min="0" name="add_price_'+num_lines+'" class="form-control" required></td>';
        html += '</tr>';

        $(html).appendTo('#detallesTable');
        $('#num_lines').val(num_lines);
        select4product();
    })

    </script>
@endsection
