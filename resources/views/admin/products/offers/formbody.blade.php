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
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="required font-bold">Fecha de inicio</label>
                                        <input type="date" id="start_date" name="start_date" value="{{old('start_date', (isset($offer) ? $offer->start_date : null))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="required font-bold">Fecha de finalización</label>
                                        <input type="date" id="end_date" name="end_date" value="{{old('start_date', (isset($offer) ? $offer->end_date : null))}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="required font-bold">Descuento</label>
                                        <input id="discount" type="number" step=".01" name="discount" placeholder="0.00" class="form-control" min="0.00" required value="{{old('discount', (isset($offer) ? $offer->discount : null))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <label class="required font-bold">Tipo de descuento</label>
                                    <select class="w-100" id="discount_type" required name="discount_type">
                                        @foreach(DiscountType::values() as $discount)
                                            <option value="{{$discount}}" @if(isset($offer) && $offer->discount_type == $discount->getValue()) selected @endif>{{DiscountType::getText($discount)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            @isset($offer)
                                <div class="row offset-2">
                                    <div class="col-xs-12">
                                        <button type="button" class="btn btn-primary" data-modify-category>Modificar Categorías</button>
                                    </div>
                                    <div class="col-xs-12 ml-5">
                                        <h3>Productos Asignados</h3>
                                        <ul>
                                            @foreach($productsAssigned as $product)
                                                <li>{{$product->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endisset
                            <div @isset($offer) class="d-none" @endisset data-category-block>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <label class="font-bold">Asignar Categoría</label>
                                            <select class="form-control" name="category" id="category">
                                                <option></option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-none" id="subcategories-block">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="font-bold">Subcategorías</label>
                                            <select class="form-control w-100" name="subcategories[]" id="subcategories" multiple></select>
                                        </div>
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
                <button class="btn btn-success dim" type="submit"><i class="fa fa-check"></i>@isset($offer) Guardar cambios @else Crear Oferta @endisset</button>
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

            let $category = $('#category');
            let categoryId = 0;
            $category.select2({
                allowClear: true,
                placeholder: 'Categoría'
            });

            let $subcategories = $('#subcategories');

            $category.on('change', function(){
                if(this.value){
                    $('#subcategories-block').removeClass('d-none');
                    categoryId = this.value;
                    $subcategories.select2({
                        placeholder: 'subcategorias',
                        allowClear: true,
                        dropdownAutoWidth: true,
                        ajax: {
                            url: '/ajax/products/subcategories/',
                            data: params => {
                                return {
                                    categoryId: categoryId
                                }
                            },
                            processResults: data => {
                                console.log(data)
                                return {
                                    results: data
                                }
                            }
                        }
                    });
                }else{
                    $('#subcategories-block').addClass('d-none');
                    categoryId = 0;
                }
                $subcategories.val(null).trigger('change');
            });

            $('[data-modify-category]').on('click', function(){
                let $categoryBlock = $('[ data-category-block]');

                if($categoryBlock.hasClass('d-none')){
                    $categoryBlock.removeClass('d-none');
                }else{
                    $categoryBlock.addClass('d-none');
                    $category.val(null).trigger('change');
                }
            });

            //fechas
            let startDate = document.getElementById('start_date');
            startDate.min = new Date().toISOString().split("T")[0];

            startDate.addEventListener('change', function(){
                let endDate = document.getElementById('end_date');
                if(endDate.value < this.value)
                    endDate.value = null;

                endDate.min = this.value;
            });
        })
    </script>
@endsection
