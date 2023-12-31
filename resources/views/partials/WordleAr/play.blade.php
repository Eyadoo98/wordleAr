@include('partials.WordleAr.custom-navbar-play')
@include('partials.WordleAr.modal-status')
@if(isset($retrievedJsonObject['date']) == 'today')
    @php
        $showNav = 'show';
    @endphp
@endif
@if($showNav === "show")
<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false" id="ModalTest" style="direction: rtl;">
    <!-- Trigger for Modal -->
    {{--        <button type="button" @click="showModal = true">Open Modal</button>--}}
    <!-- Modal -->
    <div x-data="{ showModal: true }">
        <!-- Modal outer container -->
        <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50 custom-font-size-modal" style="height: max-content"
             x-show="showModal">
            <!-- Modal inner -->
            <div class="max-w-3xl px-6 py-4 mx-auto rounded shadow-lg bg-black dark:bg-paige"
                 style="max-width: 520px;"
                 @click.away="showModal = false"
                 x-transition:enter="motion-safe:ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100"
            >
                <!-- Title / Close-->
                <div class="float-left">
                    <button type="button" class="z-50 cursor-pointer text-white dark:text-black"
                            @click="showModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="h-6"></div>
                <div class="flex items-center">
                    <h5 class="text-white dark:text-black max-w-none text-2xl" style="font-family: 'ChangaBold">كيفيك
                        اللعب</h5>
                </div>
                <!-- content -->
                <div class="text-white dark:text-black text-2xl custom-font-size-modal" style="font-family: 'ChangaLight">تخمين الكلمة في 6
                    محاولات.
                </div>
                <div class="h-4"></div>
                <ul class="text-white dark:text-black list-disc list-inside text-1xl" style="font-family: 'ChangaLight">
                    <li>يجب أن يكون كل تخمين كلمة صالحة مكونة من 5 أحرف.</li>
                    <li>سيتغير لون المربعات لإظهار مدى قرب تخمينك من الكلمة.</li>
                </ul>
                <div class="h-4"></div>
                <span class="text-white dark:text-black text-1xl" style="font-family: 'ChangaBold">امثلة</span>

                <div class="h-6"></div>
                <div class="flex flex-col">
                    <div>
                        <span class="text-white dark:text-black border-2 border-white p-2 bg-green-500 letter-example-one"
                              style="font-family: 'ChangaBold">م</span>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">ك</span>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">ت</span>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">ب</span>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">ة</span>
                    </div>
                    <div class="text-white dark:text-black mt-9">
                        <span>حرف م في الكلمة وفي المكان الصحيح.</span>
                    </div>
                </div>

                <div class="h-9"></div>
                <div class="flex flex-col">
                    <div>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">ت</span>
                        <span class="text-white dark:text-black border-2 border-white p-2 bg-yellow-500 letter-example-two"
                              style="font-family: 'ChangaBold">ف</span>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">ا</span>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">ح</span>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">ة</span>
                    </div>
                    <div class="text-white dark:text-black mt-9">
                        <span>حرف ف في الكلمة وفي المكان الخطأ.</span>
                    </div>
                </div>

                <div class="h-9"></div>
                <div class="flex flex-col">
                    <div>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">س</span>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">ف</span>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">ي</span>
                        <span class="text-white dark:text-black border-2 border-white p-2 bg-gray-500 letter-example-three"
                              style="font-family: 'ChangaBold">ن</span>
                        <span class="text-white dark:text-black border-2 border-white p-2"
                              style="font-family: 'ChangaBold">ة</span>
                    </div>
                    <div class="text-white dark:text-black mt-9">
                        <span>حرف ن ليس في الكلمة وليس  في المكان الصحيح.</span>
                    </div>


                    <div class="text-blue-500 underline">
                        <hr class="w-auto h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 ml-20">
                        <div class="float-right ml-2">
                            <img src="{{asset('assets/images/wordle-apple-touch-icon.png')}}" width="30" height="30"
                                 alt="wordle-apple-touch-icon.png">
                        </div>
                        <div>
                            <a href="#" style="font-family: 'ChangaLight">تسجيل الدخول او انشاء حساب مجاني لحفظ
                                تقدمك.</a>
                        </div>
                    </div>
                </div>

                <div class="text-blue-500">
                    <hr class="w-auto h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 ml-20">
                    <div class="text-white dark:text-white no-underline">

                        <a href="#" class="no-underline" style="font-family: 'ChangaLight">يتم إصدار لغز جديد يوميًا عند
                            منتصف الليل. إذا لم تكن قد قمت بذلك بالفعل، يمكنك <span class="text-blue-500 underline">الاشتراك</span>
                            للحصول على رسالة التذكير اليومية عبر البريد الإلكتروني.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@script
<script>
    $(document).ready(function () {
        $('#game-board-container').css({'display': 'unset'});

        // const reloadUrl = $('#dataUrlReloadStatus').attr('data-url-reload-status');
        //
        // localStorage.setItem('reloadUrl', reloadUrl);
        //
        // const storedReloadUrl = localStorage.getItem('reloadUrl');
        //
        // if (storedReloadUrl) {
        //     // Clear the stored URL to avoid using it multiple times
        //     localStorage.removeItem('reloadUrl');
        //     // Redirect to the stored target URL
        //     window.location.href = storedReloadUrl;
        // }
    });

</script>
@endscript
