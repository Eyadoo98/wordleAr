<div class="h-dvh bg-paige dark:bg-black">
    <div class="container mx-auto pt-9">
        <div class="flex justify-end">
            <img src="{{asset('assets/images/moon.png')}}" id="moon" class="block w-5 cursor-pointer mr-4"
                 alt="Moon">
        </div>
        <div class="lg:h-60 sm:h-0 "></div>
        <div class="flex flex-col items-center">
            <div class="-webkit-text-center -moz-text-center">
                <img src="{{asset('assets/images/wordle-apple-touch-icon.png')}}" width="80" height="80"
                     alt="wordle-apple-touch-icon.png">
            </div>
            <div class="text-center text-black dark:text-white"
                 style="text-align: -moz-center;text-align: -webkit-center;">
                <h1 class="text-4xl mt-4" style="font-family: 'ChangaBold'">اسم اللعبة</h1>
            </div>
            <div>
                <p class="text-3xl text-black dark:text-white mt-6" style="font-family: 'ChangaLight'">
                    احصل على 6 فرص لتخمين <br> .كلمة مكونة من 5 أحرف
                </p>
            </div>
            <div class="h-9"></div>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 space-x-0 sm:space-x-4">
                <button class="bg-paige text-black py-3 px-12 rounded-full border-solid border-2 border-black"
                        style="font-family: 'ChangaLight'" wire:click="$set('view','how-can-play')">كيفية اللعب
                </button>
                <a href="{{route('auth.Socialite')}}">
                <button class="bg-paige text-black py-3 px-12 rounded-full border-solid border-2 border-black"
                        style="font-family: 'ChangaLight'">تسجيل الدخول
{{--                    wire:click="$set('view','auth')"--}}
                </button>
                </a>
                <button class="bg-black dark:bg-paige text-white dark:text-black py-3 px-16 rounded-full play-btn"
                        style="font-family: 'ChangaLight'" wire:click="$set('view','play-game')">العب
                </button>
            </div>
            <div class="h-9"></div>
            <div>
                <p class="text-1xl text-black dark:text-white" style="font-family: 'ChangaLight'">
                    {{$currentDate}}
                </p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{--@if($from_auth_view == "play")--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('.play-btn').trigger('click');--}}
{{--        });--}}
{{--    </script>--}}
{{--@endif--}}
{{--<a href="{{url('auth/google')}}" style="background-color: green; color: #FFFFFF">--}}
{{--    <strong>Google Login</strong>--}}
{{--</a>--}}

{{--<a href="{{url('auth/facebook')}}" style="background-color: deepskyblue; color: #FFFFFF">--}}
{{--    <strong>Facebook Login</strong>--}}
{{--</a>--}}