@extends('layout.WordleAr.master')
<div class="flex h-dvh bg-paige dark:bg-black">
    <div class="container mx-auto pt-9">
        <div class="flex justify-end">
            <img src="{{asset('assets/images/moon.png')}}" id="moon" class="block w-5 cursor-pointer mr-4"
                 alt="Moon">
        </div>
        {{--        <div class="lg:h-60 sm:h-0 "></div>--}}
        <div class="flex flex-col items-center">
            <div class="-webkit-text-center -moz-text-center">
                <img src="{{asset('assets/images/wordle-apple-touch-icon.png')}}" width="40" height="40"
                     alt="wordle-apple-touch-icon.png">
            </div>
            <div class="text-center text-black dark:text-white"
                 style="text-align: -moz-center;text-align: -webkit-center;">
                <h1 class="text-sm mt-4" style="font-family: 'ChangaBold'">اسم اللعبة</h1>
            </div>
            <div class="h-60"></div>
            <div>
                <p class="lg:text-3xl sm:text-sm text-black dark:text-white mt-6 text-center" style="font-family: 'ChangaBold'">
                    مرحبا بكم في لعبة الكلمات العربية
                </p>
            </div>
            <div class="h-4"></div>

            <div>
                <p class="lg:text-3xl sm:text-sm text-black dark:text-white mb-9 text-center" style="font-family: 'ChangaLight'">
                    !عمل رائع في لغز اليوم <br> .تحقق من التقدم المحرز الخاص بك
                </p>
            </div>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 space-x-0 sm:space-x-4">
                <a href="{{route('main',['view'=>'play-game'])}}">
                    <button class="bg-black dark:bg-paige text-white dark:text-black py-3 px-16 rounded-full play-btn"
                            style="font-family: 'ChangaLight'">
                        التقدم
                    </button>
                </a>

            </div>
            <div class="h-9"></div>
            <div>
                <p class="text-1xl text-black dark:text-white" style="font-family: 'ChangaBold'">
                    {{\Illuminate\Support\Carbon::now()->format('F j, Y')}}
                </p>
            </div>
        </div>
    </div>
</div>