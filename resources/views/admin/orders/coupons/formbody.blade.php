@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop

<form method="POST" action="{{$post_route}}">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>{{$page_header_title}}</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <label class="required font-bold">Código Único</label>
                                        <input class="w-100" type="text" id="code" name="code" value="{{old('code', (isset($coupon) ? $coupon->code : null))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 mt-4">
                                    <button type="button" id="generateCode" class="btn btn-primary">Generar código aleatorio</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="required font-bold">Fecha de inicio</label>
                                        <input type="date" id="start_date" name="start_date" value="{{old('start_date', (isset($coupon) ? $coupon->start_date : null))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="required font-bold">Fecha de finalización</label>
                                        <input type="date" id="end_date" name="end_date" value="{{old('start_date', (isset($coupon) ? $coupon->end_date : null))}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="required font-bold">Descuento</label>
                                        <input id="discount" type="number" step=".01" name="discount" placeholder="0.00" class="form-control" min="0.00" required value="{{old('discount', (isset($coupon) ? $coupon->discount : null))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <label class="required font-bold">Tipo de descuento</label>
                                    <select class="w-100" id="discount_type" required name="discount_type">
                                        @foreach(DiscountType::values() as $discount)
                                            <option value="{{$discount}}" @if(isset($coupon) && $coupon->discount_type == $discount->getValue()) selected @endif>{{DiscountType::getText($discount)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="font-bold">Precio mínimo</label>
                                        <input id="minimum_price" type="number" step=".01" name="minimum_price" placeholder="0.00" class="form-control" min="0.00"  value="{{old('minimum_price', (isset($coupon) ? $coupon->minimum_price : null))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="font-bold">Límite de usos (opcional)</label>
                                        <input id="use_limit" type="number" name="use_limit" placeholder="0" class="form-control" min="0" value="{{old('use_limit', (isset($coupon) ? $coupon->use_limit : null))}}">
                                    </div>
                                </div>
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
                <button class="btn btn-success dim" type="submit"><i class="fa fa-check"></i>@isset($coupon) Guardar cambios @else Crear Cupón @endisset</button>
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
    <script src="/vendor/select2-4.0.6/js/select2.js"></script>
    <script>
        $(function(){
            $('#discount_type').select2();

            $('#generateCode').on('click', function(){
                document.getElementById('code').value = generateUUID();
            })

            let startDate = document.getElementById('start_date');
            startDate.min = new Date().toISOString().split("T")[0];

            startDate.addEventListener('change', function(){
                 let endDate = document.getElementById('end_date');
                 if(endDate.value < this.value)
                    endDate.value = null;

                 endDate.min = this.value;
            });

            function generateUUID(){
                return 'xxxxxxxx-xxxx-4xxx-yxxx'.replace(/[xy]/g, function(c) {
                    let r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x3 | 0x8);
                    return v.toString(16);
                });
            }
        })
    </script>
@endsection
