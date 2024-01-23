<div>
    @switch($view)
        @case('main')
            @if(isset($retrievedJsonObject['date']) != 'today')

                @include('partials.WordleAr.landing-page')
                @break
            @endif
        @case('how-can-play')
            @if(isset($retrievedJsonObject['date']) != 'today')
                @include('partials.WordleAr.play',['showNav' => 'show'])
                @break
            @endif
        @case('play-game')
            @include('partials.WordleAr.play',['showNav' => 'false'])
            @break

    @endswitch
</div>
