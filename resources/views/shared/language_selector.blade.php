<ul class="nav nav-tabs">
    @foreach($languages as $lang)
        <li class="nav-item">
            @if ($loop->first)
                <a class="nav-link active js-lang" href="#" data-id="{{$lang}}">{{Str::upper($lang)}}</a>
            @else
                <a class="nav-link js-lang" href="#" data-id="{{$lang}}">{{Str::upper($lang)}}</a>
            @endif
        </li>
    @endforeach
</ul>

<script>
        const languages = document.querySelectorAll('.js-lang');
        for(let i = 0; i< languages.length; i++){
            languages[i].addEventListener('click', function(event){
                for (let j = 0; j < languages.length; j++){
                    languages[j].classList.remove('active');
                    event.target.classList.add('active');
                }
            });
        }
</script>
