<div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown">
        {{Lang::locale()}}
    </button>
    <div class="dropdown dropdown-menu">
        @if(isset($translationsArray))
            @foreach($translationsArray as $language => $translation)
                <a class="dropdown-item" href="{{route('set_language', ['locale' => $language, 'slug' => $translation['slug']])}}">{{$language}}</a>
            @endforeach
        @else
            @foreach(Helper::getLanguages() as $language)
                <a class="dropdown-item" href="{{route('set_language', $language)}}">{{$language}}</a>
            @endforeach
        @endif
    </div>
</div>
