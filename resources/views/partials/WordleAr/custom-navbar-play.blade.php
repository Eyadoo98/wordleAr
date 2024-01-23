<div class="bg-white dark:bg-black">
    <div class="mx-auto border-b-2 border-paige border-opacity-10 pb-4">
        <div class="flex items-center justify-between">
            <img src="{{asset('assets/images/moon.png')}}" id="moon" class="block w-5 cursor-pointer ml-4 invisible" alt="Moon">
            <div class="text-center text-gray-500 dark:text-white"
                 style="text-align: -moz-center;text-align: -webkit-center;">
                <h1 class="text-4xl mt-4" style="font-family: 'ChangaBold'"> اللعبة</h1>
            </div>

            <div class="text-gray-500 dark:text-white">

                @include('partials.WordleAr.modal-how-to-play-navbar-question')

                @include('partials.WordleAr.modal-how-to-play-navbar-statistics')

                @include('partials.WordleAr.modal-how-to-play-navbar-sittings')

                {{--<span class="mr-4 cursor-pointer">اعدادات</span>--}}
{{--                @if(isset($retrievedJsonObject['date']) == 'today')--}}
{{--                    <a href="{{ route('status.player') }}">--}}
{{--                        <span class="mr-4 progress-word">التقدم</span>--}}
{{--                    </a>--}}
{{--                @endif--}}

            </div>

        </div>
    </div>
</div>