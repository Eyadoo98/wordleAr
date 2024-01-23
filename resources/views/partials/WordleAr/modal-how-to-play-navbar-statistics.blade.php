<div x-data="{ showModal: false }" @keydown.escape="showModal = false" id="ModalStatistic" wire:click="$refresh"
     style="direction: rtl;display: unset;">
    <!-- Trigger for Modal -->
    {{--                    <button type="button" @click="showModal = true">Open Modal</button>--}}
    <i class="fa fa-line-chart mr-3 cursor-pointer modalStatisticButton" @click="showModal = true"
       style="font-size: 30px;"></i>
    <!-- Modal -->
{{--    <div id="emojiColors"> <!-- Replace this with the actual container element -->--}}
{{--        #538D4E #C9B458 #787C7E--}}
{{--    </div>--}}
{{--    <span id="emoji">😊</span>--}}
{{--    <span id="emojiGreen">🟩</span>--}}
{{--    <span id="emojiYellow">🟨</span>--}}
{{--    <span id="emojiGray">⬜</span>--}}

    <div class="fixed inset-0 z-30 flex items-center justify-end overflow-auto bg-black bg-opacity-50 custom-font-size-modal text-center"
         x-show="showModal">
        <!-- Modal inner -->
        <div class="max-w-3xl px-6 py-4 mx-auto rounded shadow-lg bg-white dark:bg-black bg-white dark:bg-black"
             style="min-height: 100%; min-width: 100%;"
             @click.away="showModal = false"
             x-transition:enter="motion-safe:ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <div class="h-16"></div>
            <div class="mx-auto p-2 section-statistics" style="width: 26%;">
                {{--                bg-red-500--}}
                <div class="float-left">
                    <button type="button" class="z-50 cursor-pointer text-black dark:text-white"
                            @click="showModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="h-6"></div>
                <div class="flex items-center justify-start">
                    <h5 class="text-black dark:text-white max-w-none text-sm" style="font-family: 'ChangaBold'">
                        الإحصائيات
                    </h5>
                </div>
                <div class="h-6"></div>
                <!-- content -->
                <div class="flex justify-start text-black dark:text-white">
                    <div class="text-4xl ml-8" style="font-family: 'ChangaLight';">
                        <p class="-mb-4 play-number" style="font-family: 'ChangaLight';">
                            @if(isset($retrievedJsonString->userPlays) && $retrievedJsonString->userPlays != null)
                                {{$retrievedJsonString->userPlays}}
                            @else
                                0
                            @endif
                        </p>
                        <span class="text-xs" style="font-family: 'ChangaLihgt';">اللعب</span>
                    </div>
                    <div class="text-4xl ml-8" style="font-family: 'ChangaLight';">
                        <p class="-mb-4">{{$retrievedJsonString->win ?? 0}}</p>
                        <span class="text-xs">Win%</span>
                    </div>
                    <div class="text-4xl ml-8" style="font-family: 'ChangaLihgt';">
                        <p class="-mb-4" style="font-family: 'ChangaLight';">
                            @if(isset($retrievedJsonString->currentStrike) && $retrievedJsonString->currentStrike != null)
                                {{$retrievedJsonString->currentStrike}}
                            @else
                                0
                            @endif
                        </p>
                        <span class="text-xs">Current Strike</span>
                    </div>
                    <div class="text-4xl" style="font-family: 'ChangaLihgt';">
                        <p class="-mb-4" style="font-family: 'ChangaLight';">

                            @if(isset($retrievedJsonString->maxStrike) && $retrievedJsonString->maxStrike != null)
                                {{$retrievedJsonString->maxStrike}}
                            @else
                                0
                            @endif
                        </p>
                        <span class="text-xs" style="font-family: 'ChangaLight';">Max Strike</span>
                    </div>
                </div>

                <div class="h-4"></div>
                <p class="text-sm text-black dark:text-white"
                   style="text-align: -moz-right;text-align: -webkit-right;font-family: 'ChangaBold';">
                    توزيع تخميناتك
                </p>
                <div class="h-4"></div>
                <div class="flex flex-row justify-start">
                    <div>
                        {{--                        #538D4E--}}
                        <span class="text-black dark:text-white p-1 text-xs" style="font-family: 'ChangaBold';">1</span>
                        @if(isset($retrievedJsonString->countRowWin1) && $retrievedJsonString->countRowWin1 != 0)
                            <span class="text-white p-1 text-xs"
                                  style="display: inline-flex;width: 100px;font-family: 'ChangaBold'; background-color:{{$this->retrievedJsonString->numberOfRow == 1 ? '#538D4E;':'gray'}}">
                                {{$retrievedJsonString->countRowWin1}}
                            </span>

                        @else
                            <span class="text-white bg-gray-500 p-1 text-xs" style="font-family: 'ChangaBold';">
                               0
                            </span>
                        @endif
                    </div>
                </div>
                <div class="h-4"></div>
                <div class="flex flex-row justify-start">
                    <div>
                        <span class="text-black dark:text-white p-1 text-xs">2</span>

                        @if(isset($retrievedJsonString->countRowWin2)  && $retrievedJsonString->countRowWin2 != 0)
                            <span class="text-white p-1 text-xs"
                                  style="display: inline-flex;width: 100px;background-color:{{$this->retrievedJsonString->numberOfRow == 2 ? '#538D4E;':'gray'}}">
                              {{$retrievedJsonString->countRowWin2}}
                            </span>

                        @else
                            <span class="text-white bg-gray-500 p-1 text-xs">
                                0
                            </span>
                        @endif
                    </div>
                </div>

                <div class="h-4"></div>
                <div class="flex flex-row justify-start">
                    <div>
                        <span class="text-black dark:text-white p-1 text-xs">3</span>
                        @if(isset($retrievedJsonString->countRowWin3) && $retrievedJsonString->countRowWin3 != 0 )
                            <span class="text-white p-1 text-xs"
                                  style="display: inline-flex;width: 100px; background-color: {{$this->retrievedJsonString->numberOfRow == 3 ? '#538D4E;':'gray'}}">
                               {{$retrievedJsonString->countRowWin3}}
                            </span>

                        @else
                            <span class="text-white bg-gray-500 p-1 text-xs">
                               0
                            </span>
                        @endif
                    </div>
                </div>

                <div class="h-4"></div>
                <div class="flex flex-row justify-start">
                    <div>
                        <span class="text-black dark:text-white p-1 text-xs">4</span>
                        @if(isset($retrievedJsonString->countRowWin4) && $retrievedJsonString->countRowWin4 != 0)
                            <span class="text-white p-1 text-xs"
                                  style="display: inline-flex;width: 100px;background-color: {{$this->retrievedJsonString->numberOfRow == 4 ? '#538D4E;':'gray'}}">
                              {{$retrievedJsonString->countRowWin4}}
                            </span>

                        @else
                            <span class="text-white bg-gray-500 p-1 text-xs">
                                0
                            </span>
                        @endif
                    </div>
                </div>

                <div class="h-4"></div>
                <div class="flex flex-row justify-start">
                    <div>
                        <span class="text-black dark:text-white p-1 text-xs">5</span>
                        @if(isset($retrievedJsonString->countRowWin5) && $retrievedJsonString->countRowWin5 != 0)
                            <span class="text-white p-1 text-xs"
                                  style="display: inline-flex;width: 100px; background-color: {{$this->retrievedJsonString->numberOfRow == 5 ? '#538D4E;':'gray'}};">
                                {{$retrievedJsonString->countRowWin5}}
                            </span>

                        @else
                            <span class="text-white bg-gray-500 p-1 text-xs">
                               0
                            </span>
                        @endif
                    </div>
                </div>

                <div class="h-4"></div>
                <div class="flex flex-row justify-start">
                    <div>
                        <span class="text-black dark:text-white p-1 text-xs">6</span>

                        @if(isset($retrievedJsonString->countRowWin6) && $retrievedJsonString->countRowWin6 != 0)
                            <span class="text-white p-1 text-xs"
                                  style="display: inline-flex;width: 100px; background-color: {{$this->retrievedJsonString->numberOfRow == 6 ? '#538D4E;':'gray'}}">
                               {{$retrievedJsonString->countRowWin6}}
                            </span>

                        @else
                            <span class="text-white bg-gray-500 p-1 text-xs">
                               0
                            </span>
                        @endif
                    </div>
                </div>
                {{--                <div class="original-div bg-red-500" id="originalDiv">Hello, World!</div>--}}
                <div class="h-4"></div>
                <div class="flex justify-center">
                    <button class="flex justify-center items-center min-w-44 space-x-2 text-white px-4 py-2 rounded-full"
                            style="background-color: #58A351;" onclick="shareResults()">
                        <i class="fa fa-share-alt ml-2"></i>
                        <span style="font-family: 'ChangaLihgt'; font-size: 20px;">Share</span>
                    </button>
                </div>
                <div class="copied-div" id="copiedDiv"></div>
                <div class="h-4"></div>
            </div>
            <!-- content -->
            <!-- ... (rest of your modal content) -->
        </div>
    </div>
</div>