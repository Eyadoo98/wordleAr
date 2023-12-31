<div>
    @php
        $retrievedJsonString = session('jsonObject');
        $retrievedJsonObject = json_decode($retrievedJsonString, true);
        #$sessionDate = \Illuminate\Support\Facades\Session::get('last_visit_date');
    @endphp

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

{{--    @if(isset($retrievedJsonObject['date']) == 'today')--}}
{{--        @include('partials.WordleAr.status')--}}
{{--    @endif--}}
</div>
