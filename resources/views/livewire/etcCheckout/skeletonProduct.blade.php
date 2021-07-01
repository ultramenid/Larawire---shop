@for ($i = 0; $i < 3; $i++)
    <div class="border-b-2 animate-pulse">
        <div class="space-y-4 py-8 ">
            <div class="flex space-x-4 items-center">
                <div class="rounded bg-gray-300 dark:bg-opacity-40 h-16 w-16"></div>
                <div class="">
                    <div class=" rounded bg-gray-300 dark:bg-opacity-40 h-5 sm:w-64 w-32"></div>
                    <div class=" rounded bg-gray-200 dark:bg-opacity-40 h-5 sm:w-32 w-16 mt-1"></div>
                    <div class=" rounded bg-gray-200 dark:bg-opacity-40 h-5 sm:w-16 w-8 mt-1"></div>
                </div>
            </div>
            <div class="flex sm:justify-end justify-between space-x-16 ">
                <div class="flex space-x-2 items-center">
                    <div class="rounded bg-gray-200 dark:bg-opacity-40 h-5 sm:w-32 w-16"></div>
                </div>

                <div>
                    <div class=" rounded bg-gray-300 dark:bg-opacity-40 h-5 sm:w-32 w-16"></div>
                </div>
            </div>
        </div>
    </div>
@endfor
