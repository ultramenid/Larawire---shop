
@for ($i = 0; $i < $paginate; $i++)
<div class="w-full  bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden animate-pulse">
    <div class="relative pb-48 overflow-hidden">
        <div class="rounded bg-gray-300 dark:bg-gray-400 absolute inset-0 h-full w-full object-cover"></div>
    </div>
    <div class="p-4 ">
        <div class="flex justify-between items-center mb-6">
            <div class="rounded bg-gray-300 dark:bg-gray-400 dark:bg-opacity-40 inset-0 h-6 w-16"></div>
            <div class="rounded bg-gray-300 dark:bg-gray-400 dark:bg-opacity-40 inset-0 h-6 w-6"></div>
        </div>
        <div class="rounded bg-gray-300 dark:bg-gray-400 dark:bg-opacity-40 inset-0 h-6 w-6/12 mt-2 mb-2"></div>
        <div class="rounded bg-gray-300 dark:bg-gray-400 dark:bg-opacity-40 inset-0 h-6 w-12 mb-2"></div>
        <div class="mt-3 ">
            <div class="rounded bg-gray-300 dark:bg-gray-400 dark:bg-opacity-40 inset-0 h-6 w-8/12 mb-2"></div>
        </div>
    </div>
</div>
@endfor
