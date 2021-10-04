@extends('layouts.admin.main')

{{-- css --}}
@section('extracss')
@stop

{{-- Content --}}
@section('content')
  <div class="row">
      <div class="col-lg-12">
          <div class="ibox ">
              <div class="ibox-title">
                  <h5>Solicitudes de contacto </h5>
              </div>
              <div class="ibox-content">
                  <div class="row">
                      <div class="col-sm-3">
                        <form method="GET" action="{{route('admin.contacts.list')}}" id="searchForm">
                          <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                          <input type="hidden" name="order" value="{{$order}}" id="order" />

                          <div class="input-group">
                            <input name="q" placeholder="Nombre o correo a buscar" type="text" class="form-control form-control-sm" value="{{$q}}">
                            {{-- <input name="asunto" placeholder="Asunto del mensaje" type="text" class="form-control form-control-sm" value="" > --}}
                            <span class="input-group-append"> <button type="submit" class="btn btn-sm btn-primary">Buscar</button> </span>
                          </div>
                          <br>
                          </form>
                      </div>
                  </div>

                  <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <th>Nombre {!! Helper::orderColumn('name',$order_col,$order) !!}</th>
                              <th>Email {!! Helper::orderColumn('email',$order_col,$order) !!}</th>
                              <th>Teléfono</th>
                              <th>Asunto {!! Helper::orderColumn('subject',$order_col,$order) !!}</th>
                              <th>Mensaje</th>
                              <th>Fecha {!! Helper::orderColumn('created_at',$order_col,$order) !!}</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($contacts as $contact)
                              <tr>
                                  <td>{{$contact->name}}</td>
                                  <td>{{$contact->email}}</td>
                                  <td>{{$contact->phone}}</td>
                                  <td>{{$contact->subject}}</td>
                                  <td>{{$contact->message}}</td>
                                  <td>{{ date('d/m/Y H:i:s', strtotime($contact->created_at)) }}</td>
                                  {{-- <td><a href="/admin/contactos/editar/{{$contacto->id}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</a></td> --}}
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>

                  @if ($contacts->hasMorePages() || $contacts->lastPage())
                  <div class="row">
                      <?php echo $contacts->appends(['q' => $q])->render(); ?>
                  </div>
                  @endif

              </div>
          </div>
      </div>

  </div>
@stop

{{-- Scripts --}}
@section('scripts')
<script>
  $(document).ready(function() {
    orderColumn();
  });
</script>
@stop
