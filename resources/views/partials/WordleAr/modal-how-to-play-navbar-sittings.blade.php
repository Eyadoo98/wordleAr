<div x-data="{ showModal: false }" @keydown.escape="showModal = false" id="ModalSettings"
     style="direction: rtl;display: unset">
    <!-- Trigger for Modal -->
    {{--                    <button type="button" @click="showModal = true">Open Modal</button>--}}
    <i class="fa fa-gear mr-1 cursor-pointer" @click="showModal = true" style="font-size: 30px;"></i>
    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50 custom-font-size-modal"
         x-show="showModal">
        <!-- Modal inner -->
        <div class="max-w-3xl px-6 py-4 mx-auto rounded shadow-lg bg-white dark:bg-black w-full leading-loose"
             style="max-width: 520px;"
             @click.away="showModal = false"
             x-transition:enter="motion-safe:ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <div class="h-6"></div>

            <div class="float-left">
                <button type="button" class="z-50 cursor-pointer text-black dark:text-white" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex items-center justify-center text-base">
                <h5 class="text-black dark:text-white max-w-none" style="font-family: 'ChangaBold">الاعدادات</h5>
            </div>
            <div class="h-6"></div>

{{--            <div class="flex justify-between pb-2 text-black dark:text-white" style="border-bottom: 1px solid gray;">--}}
{{--                <div>--}}
{{--                    <label class="relative inline-flex items-center cursor-pointer" style="direction: ltr">--}}
{{--                        <input type="checkbox" value="" class="sr-only peer" id="toggleHardMood">--}}
{{--                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-500"></div>--}}
{{--                    </label>--}}

{{--                </div>--}}
{{--                <div class="text-lg" style="font-family: 'ChangaLihgt';">--}}
{{--                    <p>مستوى صعب</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="h-6"></div>--}}
            <div class="flex justify-between pb-2 text-black dark:text-white" style="border-bottom: 1px solid gray;">
                <div>
                    <label class="relative inline-flex items-center cursor-pointer" style="direction: ltr">
                        <input type="checkbox" value="" class="sr-only peer" id="toggleMood">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-500"></div>
                    </label>

                </div>
                <div class="text-lg" style="font-family: 'ChangaLihgt';">
                    <p>داكن</p>
                </div>
            </div>
            @if(isset($retrievedJsonObject['date']) == 'today')
                <div class="h-6"></div>
                <div class="flex justify-between pb-2 text-black dark:text-white"
                     style="border-bottom: 1px solid gray;">
                    <div>
                        <a href="{{ route('status.player') }}" class="underline text-lg">
                            <span class="mr-4 progress-word" style="font-family: 'ChangaLihgt';"">التقدم</span>
                        </a>

                    </div>
                </div>
            @endif

            <div class="h-6"></div>

            <div class="flex justify-between pb-2 text-lg text-black dark:text-white"
                 style="border-bottom: 1px solid gray;font-family: 'ChangaLihgt';">
                <div>
                    <p>تعليقات على اللعبة</p>
                </div>
                <div class="underline">
                    <button class="underline" onclick="location.href='mailto:info@sp-apps.com';">إيميل</button>
                </div>
            </div>
            <div class="h-6"></div>

            <!-- content -->
            <div class="flex justify-between pb-2 text-lg text-black dark:text-white"
                 style="border-bottom: 1px solid gray;font-family: 'ChangaLihgt';">
                <div>
                    <p>الإبلاغ عن خطأ</p>
                </div>
                <div class="underline">
                    <button class="underline" onclick="location.href='mailto:info@sp-apps.com';">إيميل</button>
                </div>
            </div>
            <div class="h-6"></div>

            <div class="flex justify-between pb-2 text-lg text-black dark:text-white"
                 style="border-bottom: 1px solid gray;font-family: 'ChangaLihgt';">
                <div>
                    <p>المجتمع</p>
                </div>
                <div class="underline">
                    <a href="#" class="underline">Wordle Review</a>
                </div>
            </div>
            <div class="h-6"></div>

            <div class="flex justify-between pb-2 text-lg text-black dark:text-white"
                 style="border-bottom: 1px solid gray;font-family: 'ChangaLihgt';">
                <div>
                    <p>اسئلة؟</p>
                </div>
                <div class="underline">
                    <a href="#" class="underline">FAQ</a>
                </div>
            </div>
            <div class="h-6"></div>

            <div class="flex justify-between pb-2 text-lg text-black dark:text-white"
                 style="font-family: 'ChangaLihgt';">
                <div>
                    <p>#928</p>
                </div>
                <div>
                    <span>© 2024 SP-APPS Company</span>
                </div>
            </div>
            <div class="h-6"></div>


            <!-- content -->
            <!-- ... (rest of your modal content) -->
        </div>
    </div>

    @script
    <script>
        $(document).ready(function(){

            const toggleMood = document.querySelector("#toggleMood");
            const body = document.querySelector("body");

            // Retrieve the stored toggle state from sessionStorage
            const storedToggleState = sessionStorage.getItem("toggleClass");
            if (storedToggleState === "true") {
                body.classList.add("dark");
            }
            toggleMood.addEventListener("click", () => {
                var toggleBody = body.classList.toggle("dark");

                // // Save the updated toggle state in sessionStorage
                sessionStorage.setItem("toggleClass", toggleBody);
            });


            // Hard Mood
            // const toggleHardMood = document.querySelector("#toggleHardMood");
            // const storedToggleHardMood = sessionStorage.getItem("toggleClassHardMod");
            //
            // if (storedToggleHardMood === "hard") {
            //     $('.hard-mode-switch').attr('data-value', 'normal');
            // } else {
            //     $('.hard-mode-switch').attr('data-value', 'hard');
            // }
            //
            // toggleHardMood.addEventListener("click", () => {
            //     const currentDataValue = $('.hard-mode-switch').attr('data-value');
            //
            //     // Toggle between 'hard' and 'normal'
            //     const newDataValue = (currentDataValue === 'hard') ? 'normal' : 'hard';
            //
            //     $('.hard-mode-switch').attr('data-value', newDataValue);
            //     sessionStorage.setItem("toggleClassHardMod", newDataValue);
            // });

        });
    </script>
    @endscript
</div>