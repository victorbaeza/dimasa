@extends('layouts.admin.main')

{{-- Extra CSS --}}
@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop
{{-- Content --}}
@section('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <form method="POST" action="{{ route('admin.purchases.do_edit', ['id' => $purchase->id ]) }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $purchase->id }}" />
      <input type="hidden" name="num_lines" id="num_lines" value="0" />

      <div class="row">
        <div class="col-md-8 col-lg-8 col-8">
          <div class="ibox">
            <div class="ibox-title">
                <h3>Editar Compra ç {{ $purchase->id }}</h3>
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
                    @foreach ($purchase->Lines as $line)
                      <tr>
                        <td>
                          <select class="select4product" name="product_{{ $line->id }}" style="width:100%;" required>
                            <option value="{{ $line->product_id }}" selected>{{ $line->Product->name }}</option>
                          </select>
                        </td>
                        <td><input type="number" step="1" min="1" name="quantity_{{ $line->id }}" class="form-control" value="{{ $line->quantity }}" required></td>
                        <td><input type="number" step="0.01" min="0" name="price_{{ $line->id }}" class="form-control" value="{{ $line->price }}" required></td>
                        <td>
                          <a class="btn btn-xs btn-danger btn_alert btn_remove_line" data-id="{{ $line->id }}" href="{{ route('admin.purchases.edit.do_remove_line', ['id' => $purchase->id, 'line_id' => $line->id]) }}"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar Cambios</button>
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
                  <select class="select4vendor" name="vendor" style="width:100%;" required>
                    <option value="{{ $purchase->vendor_id }}" selected>{{ $purchase->Vendor->name }}</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Forma de Pago:</label>
                <div class="custom-file col-lg-9">
                  <select class="select4purchasepaymentform" name="payment_form" style="width:100%;" required>
                    <option value="{{ $purchase->payment_form_id }}" selected>{{ $purchase->PaymentForm->name }}</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Estado:</label>
                <div class="custom-file col-lg-9">
                  <select class="form-control" name="status" required>
                    @foreach (PurchaseStatus::all() as $status)
                      <option value="{{ $status->id }}" @if ($purchase->status_id == $status->id) selected @endif>{{ $status->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Documento:</label>
                <div class="custom-file col-lg-9">
                  @if (!$purchase->invoice_file)
                    <input type="file" name="invoice_file" accept=".pdf">
                  @else
                    <a href="{{ $purchase->getFile() }}" target="_blank">{{ $purchase->invoice_file }}</a>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Observaciones:</label>
                <div class="custom-file col-lg-9">
                  <textarea class="form-control" name="observations" rows="3">{{ $purchase->observations }}</textarea>
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

    var num_lines = 0;

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
