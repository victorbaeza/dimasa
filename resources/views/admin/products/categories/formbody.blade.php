@section('extracss')
    <link href="/vendor/select2-4.0.6/css/select2.css" rel="stylesheet">
@stop

<form method="POST" action="{{$post_route}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>{{$page_header_title}}</h5>
                </div>
                @include('shared.language_selector')
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label><b>Nombre <span class="text-danger">*</span></b></label>
                                        @foreach($languages as $lang)
                                            <input type="text" name="{{$lang}}_name" placeholder="Nombre de la categoria" class="form-control @if(!$loop->first) d-none @endif js-translatable" data-lang="{{$lang}}"
                                                   value="{{old($lang.'_name', (isset($category) && $category->translate($lang)) ? $category->translate($lang)->name : null)}}">
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label><b>Descripción<span class="text-danger">*</span></b></label>
                                        @foreach($languages as $lang)
                                            <textarea type="text" name="{{$lang}}_description" class="form-control @if(!$loop->first) d-none @endif js-translatable" rows="6"
                                                      data-lang="{{$lang}}">{{old($lang.'_description', (isset($category) && $category->translate($lang)) ? $category->translate($lang)->description : null)}}</textarea>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="font-bold">Keywords</label>
                                                @foreach($languages as $lang)
                                                    <select name="{{$lang}}_keywords[]" class="form-control js-select2-keywords  @if(!$loop->first) d-none @endif js-translatable" data-lang="{{$lang}}" multiple>
                                                        @if(isset($category) && $category->translate($lang))
                                                            @foreach(Helper::getKeywords($category, $lang) as $keyword)
                                                                <option value="{{$keyword}}" selected>{{$keyword}}</option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="font-bold">Título SEO</label>
                                                @foreach($languages as $lang)
                                                    <input type="text" name="{{$lang}}_title_seo" class="form-control @if(!$loop->first) d-none @endif js-translatable" data-lang="{{$lang}}"
                                                           value="{{old($lang.'_title_seo', (isset($category) && $category->translate($lang)) ? $category->translate($lang)->title_seo : null)}}">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="font-bold">Descripción SEO</label>
                                                @foreach($languages as $lang)
                                                    <textarea name="{{$lang}}_description_seo" class="form-control @if(!$loop->first) d-none @endif js-translatable"
                                                              data-lang="{{$lang}}">{{old($lang.'_description_seo', (isset($category) && $category->translate($lang)) ? $category->translate($lang)->description_seo : null)}}</textarea>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label><b>Categoría Padre</b></label>
                                <select class="form-control js-select2" name="parent_id">
                                    <option></option>
                                    @foreach($parent_categories as $parent_category)
                                        <option value="{{$parent_category->id}}" @if(isset($category) && $category->parent_id === $parent_category->id) selected @endif>{{$parent_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-3 offset-2">
                            <div class="row">
                                <label class="col-lg-4 col-form-label required"><b>Imagen Principal</b></label>
                            </div>
                            @isset($category)
                                <div class="row ml-2">
                                    <img src="{{asset($category->getPhoto())}}">
                                </div>
                            @endisset
                            <div class="row">
                                <div class="custom-file col-lg-8 ml-2">
                                    <input id="photo_principal" type="file" class="custom-file-input js-image-input" name="photo_principal" accept="image/png, image/jpg, image/jpeg">
                                    <label for="photo_principal" class="custom-file-label js-image-label">Elegir nueva imagen principal...</label>
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
                <button class="btn btn-success dim" type="submit"><i class="fa fa-check"></i>@isset($category) Guardar cambios @else Crear Categoría @endisset</button>
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
            limitImageSize();
            toggleLanguageInputs(false)
            toggleKeywordsInput();
            $('.js-select2').select2({
                allowClear: true,
                placeholder: 'Categoría padre'
            });
        })
    </script>
@endsection
