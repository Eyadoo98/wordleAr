@extends('layout.WordleAr.master')
<nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
     style="box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);background-color: white;">
    <div class="max-w-screen-xl flex flex-wrap   mx-auto p-4 justify-center">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-black dark:text-white"
                  style="font-family: 'SevillanaRegular'; font-weight: bold;">SP-APPS TIMES</span>
        </a>
    </div>
</nav>
<div class="h-9"></div>
<div class="container mx-auto px-16">
    <div class="flex flex-col items-center">
        <div>
            <p class="text-2xl font-social" style="font-family: 'ChangaBold' ">تسجيل الدخول أو إنشاء حساب</p>
        </div>
        <div class="h-6"></div>
        <form action="{{route('auth.Login')}}" method="POST">
            @csrf
            <div style="text-align: -moz-right;text-align: -webkit-right;">
                <span style="font-size: 14px;">عنوان البريد الالكتروني</span>
                <br>
                <label>
                    <input type="email" name="email" required id="email"
                           class="border-solid border-2 border-gray-400 w-96 p-1 mt-2 width-button-social" style="font-family: 'ChangaLihgt;"/>
                </label>
                <div class="text-red-500 text-sm error-email"></div>
                <div class="h-3"></div>
                <div class="hidden hidden-input-password">
                    <span style="font-size: 14px;"> كلمة السر</span>
                    <br>
                    <label>
                        <input type="password" name="password" id="password"
                               class="border-solid border-2 border-gray-400 w-96 p-1 mt-2 width-button-social"
                               style="font-family: 'ChangaLihgt;"/>
                    </label>
                </div>
            </div>
            <div class="h-4"></div>
            <div class="bg-black text-white">
                <button class="w-96 p-2 continue-btn width-button-social" type="submit">
                    استمر
                </button>
            </div>
            <div class="section-agreements hidden">
                <div class="h-6"></div>
                <div class="flex justify-end">
                    <div class="text-right">
                    <span class="text-sm"
                          style="font-family: 'ChangaLihgt;">  أنت توافق على تلقي التحديثات والعروض  <br> يمكنك إلغاء الاشتراك أو الاتصال بنا في أي وقت.</span>
                    </div>
                    <div>
                        <label for="checkbox">
                            <input type="checkbox" class="ml-2" id="checkbox">
                        </label>
                    </div>

                </div>

            </div>
        </form>

        <div>
            <div class="inline-flex items-center justify- w-full section-socialite">
                <hr class="w-96 h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 width-button-social">
                <span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-black ">أو</span>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-right px-4" style="font-size: 14px; text-align: -moz-center;text-align: -webkit-center;">
                من خلال المتابعة، فإنك توافق على <span class="underline cursor-pointer"> شروط البيع </span>
                و <span class="underline cursor-pointer">سياسة<br>. الخصوصية</span> المحدثة
            </p>
            <div class="section-socialite">
                <div class="h-4"></div>
                <div class="inline-flex items-center justify-center w-full">
                    <a href="{{url('auth/google')}}">
                        <button class="w-96 p-2 width-button-social justify-center hover:bg-gray-100 px-4 py-2 border flex gap-2 border-gray-700 dark:border-slate-700 rounded-lg text-slate-700 dark:text-slate-200  dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow transition duration-150">
                            <img class="w-4 h-4" src="https://www.svgrepo.com/show/475656/google-color.svg"
                                 loading="lazy"
                                 alt="google logo">
                            <span class="text-black">تسجيل الدخول بواسطة جوجل</span>
                        </button>
                    </a>
                </div>

                <div class="h-4"></div>
                <div class="inline-flex items-center justify-center w-full">
                    <a href="{{url('auth/facebook')}}">
                        <button class="w-96 width-button-social p-2 justify-center hover:bg-gray-100 px-4 py-2 border flex gap-2 border-gray-700 dark:border-slate-700 rounded-lg text-slate-700 dark:text-slate-200 dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow transition duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-facebook text-blue-500" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                            <span class="text-black" style="font-family: 'ChangaBold';">تسجيل الدخول بواسطة الفيس بوك</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(".continue-btn").on('click', function (e) {
        e.preventDefault();
        let validationEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

        let email = $('#email').val();
        let password = $('#password').val();

        $('.section-socialite').css({'display': 'block'});
        $('.section-agreements').css({'display': 'none'});

        if (validationEmail.test($('#email').val()) && email.length !== 0) {
            $('.error-email').text('');
            $('.hidden-input-password').css({'display': 'block'});
            $('.section-agreements').css({'display': 'unset'});
            $('.section-socialite').css({'display': 'none'});

            if (password.length !== 0) {
                $.ajax(
                    {
                        url: "{{route('auth.Login')}}",
                        type: "POST",
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}',
                        },
                        data:
                            {
                                email: email,
                                password: password,
                            },

                        success: function (result) {
                            window.location.href = "{{route('main', ['view' => 'play-game'])}}";
                        },
                    }
                );
            }
        } else {
            $('.error-email').text('الرجاء إدخال بريد إلكتروني صالح');
        }


    });
</script>
@include('partials.WordleAr.footer')
