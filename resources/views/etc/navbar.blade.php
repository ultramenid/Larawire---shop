<div class=" container mx-auto lg:px-32 px-5 mt-1 ">
    <div class=" flex flex-wrap items-center justify-between">
        <div class="flex flex-no-shrink items-center mr-6 py-3 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class=" h-8 mr-2 w-8 dark:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>

            <span class="font-semibold text-2xl tracking-tight dark:text-white">Shoping App</span>
        </div>

        <input class="menu-btn hidden" type="checkbox" id="menu-btn">
        <label class="menu-icon block cursor-pointer md:hidden px-2 py-4 relative select-none font-black" for="menu-btn">
            <span class="navicon bg-grey-darkest flex items-center relative"></span>
        </label>

        <ul class="menu border-b md:border-none flex justify-end list-reset m-0 w-full md:w-auto">
            <!-- Theme toggler -->
            <li class=" text-right sm:text-left">
                <button class="rounded-md focus:outline-none focus:shadow-outline-purple px-4 py-3 " @click="toggleTheme" aria-label="Toggle color mode">
                    <template x-if="!dark">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </template>
                    <template x-if="dark">
                        <svg class="w-5 h-5" aria-hidden="true" fill="yellow" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                        </svg>
                    </template>
                </button>
            </li>
            <li class="border-t md:border-none text-right sm:text-left">
                @if (session('role_id') == 2)
                <livewire:cart-component />
                @endif
            </li>
            <li class="border-t md:border-none text-right sm:text-left">
                <a href="{{url('/logout')}}" class="block md:inline-block px-4 py-3 no-underline text-gray-500  hover:text-black dark:hover:text-white">Sign Out</a>
            </li>

        </ul>
    </div>
