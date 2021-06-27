<div x-data="{ open: false }" class="sm:hidden block">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 dark:text-gray-200" viewBox="0 0 20 20" fill="currentColor" @click="open = true">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
      </svg>

    <div class="fixed w-screen h-screen z-50 bg-white dark:bg-black  inset-0 overflow-y-auto " x-show="open" x-cloak style="display: none !important">
        <button class="absolute top-4 right-6 focus:outline-none" @click="open = false">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
        </button>

        <div class="mt-12 space-y-3">
            <div class="border-b border-gray-300 text-center ">
                <a href="{{url('/logout')}}" class="mb-4 px-4 inline-block text-base leading-5 text-black dark:text-white font-semibold  dark:hover:text-white ">Logout</a>
            </div>
        </div>
    </div>
</div>
