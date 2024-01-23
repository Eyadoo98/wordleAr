<div x-data="{ showModal: false }" @keydown.escape="showModal = false" id="ModalHowToPlay" style="direction: rtl;display: unset">
    <!-- Trigger for Modal -->
    {{--                    <button type="button" @click="showModal = true">Open Modal</button>--}}
    <i class="fa fa-question-circle mr-3 cursor-pointer" @click="showModal = true" style="font-size: 30px;"></i>
    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50 custom-font-size-modal" x-show="showModal">
        <!-- Modal inner -->
        <div class="max-w-3xl px-6 py-4 mx-auto rounded shadow-lg bg-white dark:bg-black" style="max-width: 520px;"
             @click.away="showModal = false"
             x-transition:enter="motion-safe:ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <div class="float-left">
                <button type="button" class="z-50 cursor-pointer text-black dark:text-white close-question-button" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="h-6 height-dev"></div>
            <div class="flex items-center">
                <h5 class="text-black dark:text-white max-w-none text-2xl" style="font-family: 'ChangaBold">كيفيك
                    اللعب</h5>
            </div>
            <!-- content -->
            <div class="text-black dark:text-white text-2xl custom-font-size-modal" style="font-family: 'ChangaLight">تخمين الكلمة في 6
                محاولات.
            </div>
            <div class="h-4"></div>
            <ul class="text-black dark:text-white list-disc list-inside text-1xl" style="font-family: 'ChangaLight">
                <li>يجب أن يكون كل تخمين كلمة صالحة مكونة من 5 أحرف.</li>
                <li>سيتغير لون المربعات لإظهار مدى قرب تخمينك من الكلمة.</li>
            </ul>
            <div class="h-4 height-dev"></div>
            <span class="text-black dark:text-white text-1xl" style="font-family: 'ChangaBold">امثلة</span>

            <div class="h-6 height-dev"></div>
            <div class="flex flex-col">
                <div>
                    <span class="text-black dark:text-white border-2 border-gray-400 p-2 bg-green-500 letter-example-one custom-letters">م</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 min-w-5 min-h-9 custom-letters">ك</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 custom-letters">ت</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 custom-letters">ب</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 custom-letters"
                          style="padding-right: 12px;min-width: 35px;">ا</span>
                </div>
                <div class="text-black dark:text-white mt-9">
                    <span>حرف م في الكلمة وفي المكان الصحيح.</span>
                </div>
            </div>

            <div class="h-9 height-dev"></div>
            <div class="flex flex-col">
                <div>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 custom-letters">ت</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 bg-yellow-500 letter-example-two custom-letters">ف</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 custom-letters" style="padding-right: 14px;min-width: 35px;">ا</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 custom-letters">ح</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 custom-letters">ة</span>
                </div>
                <div class="text-black dark:text-white mt-9">
                    <span>حرف ف في الكلمة وفي المكان الخطأ.</span>
                </div>
            </div>

            <div class="h-9 height-dev"></div>
            <div class="flex flex-col">
                <div>
                    <span class="text-black dark:text-white border-2 gray-400 p-2" style="display: inline-block;">س</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 custom-letters" style="min-width: 36px;">ف</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 custom-letters" style="min-width: 36px;padding-right: 12px;">ي</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 bg-gray-500 letter-example-three" style="min-width: 36px;padding-right: 12px;">ن</span>
                    <span class="text-black dark:text-white border-2 gray-400 p-2 custom-letters" style="min-width: 36px;padding-right: 12px;">ة</span>
                </div>
                <div class="text-black dark:text-white mt-9">
                    <span>حرف ن ليس في الكلمة وليس  في المكان الصحيح.</span>
                </div>


                <div class="text-blue-500 underline">
                    <hr class="w-auto h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 ml-20">
                    <div class="float-right ml-2">
                        <img src="{{asset('assets/images/wordle-apple-touch-icon.png')}}" width="30" height="30"
                             alt="wordle-apple-touch-icon.png">
                    </div>
                    <div>
                        <a href="{{route('auth.Socialite')}}" style="font-family: 'ChangaLight">تسجيل الدخول او انشاء حساب مجاني لحفظ
                            تقدمك.</a>
                    </div>
                </div>
            </div>

            <div class="text-blue-500">
                <hr class="w-auto h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 ml-20">
                <div class="text-white dark:text-white no-underline">

                    <a href="#" class="no-underline text-black dark:text-white" style="font-family: 'ChangaLight">يتم إصدار لغز جديد يوميًا عند
                        منتصف الليل. إذا لم تكن قد قمت بذلك بالفعل، يمكنك <span class="text-blue-500 underline">الاشتراك</span>
                        للحصول على رسالة التذكير اليومية عبر البريد الإلكتروني.</a>
                </div>
            </div>
            <!-- content -->
            <!-- ... (rest of your modal content) -->
        </div>
    </div>
</div>