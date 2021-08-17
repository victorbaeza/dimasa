<form method="POST" action="{{$post_route}}">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>{{$page_header_title}}</h5>
                </div>
                @include('shared.language_selector')
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="required font-weight-bold">Descripción</label>
                        @foreach($languages as $lang)
                            <textarea type="text" name="{{$lang}}_description"
                                      class="form-control @if(!$loop->first) d-none @endif js-translatable"
                                      data-lang="{{$lang}}">{{old($lang.'_description', (isset($shipment) && $shipment->translate($lang)) ? $shipment->translate($lang)->description : null)}}</textarea>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="cost" class="required font-weight-bold">Precio</label>
                                <input id="cost" type="number" step=".01" name="cost" class="form-control" min="0.00" required value="{{old('cost', (isset($shipment) ? $shipment->cost : null))}}">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="minimum_free" class="font-weight-bold">Precio Mínimo Envío gratis (opcional)</label>
                                <input id="minimum_free" type="number" step=".01" name="minimum_free" min="0.00" class="form-control" value="{{old('minimum_free', (isset($shipment) ? $shipment->minimum_free : null))}}">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-check">
                                <input type="checkbox" class="i-checks form-check-input custom-checkbox" name="default" @if(old('default',(isset($shipment) && $shipment->default))) value="1" checked @endif>
                                <label class="form-check-label"><b>Envío por defecto</b></label>
                            </div>
                            <div class="form-check mt-3">
                                <input type="checkbox" class="i-checks form-check-input custom-checkbox" name="active" @if(old('active',(isset($shipment) && $shipment->active || !isset($shipment)))) value="1" checked @endif>
                                <label class="form-check-label"><b>Activo</b></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="text-center">
                <button class="btn btn-success dim" type="submit"><i class="fa fa-check"></i>@isset($shipment) Guardar cambios @else Crear Método de envío @endisset</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</form>

@section('scripts')
    <script>
        $(function () {
            toggleLanguageInputs(false)
        })
    </script>
@endsection
