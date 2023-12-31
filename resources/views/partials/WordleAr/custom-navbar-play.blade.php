<div class="bg-black dark:bg-paige">
    <div class="mx-auto border-b-2 border-paige border-opacity-10 pb-4">
        <div class="flex items-center justify-between">
            <img src="{{asset('assets/images/moon.png')}}" id="moon" class="block w-5 cursor-pointer ml-4" alt="Moon">
            <div class="text-center text-white dark:text-black"
                 style="text-align: -moz-center;text-align: -webkit-center;">
                <h1 class="text-4xl mt-4" style="font-family: 'ChangaBold'">اسم اللعبة</h1>
            </div>

            <div class="text-white dark:text-black">

                <span class="mr-4 cursor-pointer">اعدادات</span>
                @if(isset($retrievedJsonObject['date']) == 'today')
                    <a href="{{ route('status.player') }}">
                        <span class="mr-4" >التقدم</span>
                    </a>
                @endif

            </div>

        </div>
    </div>
</div>