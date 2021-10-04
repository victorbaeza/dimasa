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
                  <h5>Listado de suscriptores Newsletter </h5>
              </div>
              <div class="ibox-content">

                <form method="GET" action="{{ route('admin.contacts.newsletter.list') }}" id="mainForm">
                  <input type="hidden" name="order_col" value="{{$order_col}}" id="order_col" />
                  <input type="hidden" name="order" value="{{$order}}" id="order" />

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group"><input name="q" placeholder="Suscriptor a buscar" type="text" class="form-control form-control-sm" value="{{$q}}">
                              <span class="input-group-append">
                                <button type="button" class="btn btn-sm btn-primary">Buscar</button>
                              </span>
                            </div>
                            <br>
                        </div>
                    </div>

                  </form>

                  <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <th></th>
                              <th>Nombre {!! Helper::OrderColumn('name',$order_col,$order) !!}</th>
                              <th>Email {!! Helper::OrderColumn('email',$order_col,$order) !!}</th>
                              <th>Fecha de suscripción {!! Helper::OrderColumn('created_at',$order_col,$order) !!}</th>
                              <th>Fecha de baja {!! Helper::OrderColumn('unsubscribed_at',$order_col,$order) !!}</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($subscriptors as $subscriptor)
                              <tr>
                                <td>{{ $subscriptor->id }}</td>
                                <td>{{ $subscriptor->name }}</td>
                                <td>{{ $subscriptor->email }}</td>
                                <td>{{ Helper::showDate($subscriptor->created_at, true) }}</td>
                                <td>@if($subscriptor->unsubscribed_at) {{ Helper::showDate($subscriptor->unsubscribed_at, true) }} @endif </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>


                  @if ($subscriptors->hasMorePages() || $subscriptors->lastPage())
                  <div class="row">
                      <div class="col-12">
                          {{ $subscriptors->appends( Request::except('page') )->links() }}
                      </div>
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
