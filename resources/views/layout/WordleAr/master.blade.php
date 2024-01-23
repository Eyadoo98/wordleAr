<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>WordleAr</title>

    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{asset('assets/images/wordle-apple-touch-icon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

    {{--    toastr.min.css--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    {{--    animate.css--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    {{--    alpine js--}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{--    <script src="https://unpkg.com/alpinejs" defer></script>--}}

    {{-- font awesome   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
{{--    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>--}}
    @livewireStyles

</head>

<body>

@yield('content')
@isset($slot)
    {{$slot}}
@endisset
{{--{{$slot ? $slot : ''}}--}}
{{--<div id="dataUrlReloadStatus" data-url-reload-status="{{ route('status.player') }}"></div>--}}
<span data-value="" class="hard-mode-switch"></span>
<div id="game-board-container" style="display: none;overflow-y: hidden;">
    <div class="h-9 text-gray-500 dark:text-black bg-white dark:bg-black height-game-board"></div>

    <div id="game-board" class="text-gray-500 dark:text-black bg-white dark:bg-black">

    </div>
    <div class="h-9 text-gray-500 dark:text-black bg-white dark:bg-black"></div>
    <div id="keyboard-cont" class="text-gray-500 dark:text-black bg-white dark:bg-black">
        <div class="first-row">
            <button class="keyboard-button text-black dark:text-white bg-gray-custom dark:bg-gray-dark  rounded-md">ض</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ص</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ث</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ق</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ف</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">غ</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ع</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ه</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">خ</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ح</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ج</button>
        </div>
        <div class="second-row">

            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ش</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">س</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ي</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ب</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ل</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ا</button>

            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ت</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ن</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">م</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ك</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ة</button>


        </div>
        <div class="third-row">
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">Enter</button>

            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ئ</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ؤ</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">لا</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ى</button>

            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ء</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ظ</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ط</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ذ</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">د</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ز</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">ر</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">و</button>
            <button class="keyboard-button text-black dark:text-white p-6 bg-gray-custom dark:bg-gray-dark rounded-md">Del</button>


        </div>
    </div>
    <div class="h-screen text-gray-500 dark:text-black bg-white dark:bg-black"></div>

</div>


@livewireScripts

<script src="{{asset('assets/js/script.js')}}" type="module"></script>

<script src="{{asset('assets/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>