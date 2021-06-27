<div class="bg-white dark:bg-black mb-2">
    <header class="max-w-6xl px-6 mx-auto pt-4 flex items-center justify-between">
        <div class="flex items-center space-x-3">
           <a href="/#">
            <template x-if="dark">
                <svg class="h-6 dark:text-white" viewBox="0 0 116 100" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M57.5 0L115 100H0L57.5 0z"></path>
                 </svg>
            </template>
            <template x-if="!dark">
                <svg class="h-6 dark:text-white" viewBox="0 0 116 100" fill="black" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M57.5 0L115 100H0L57.5 0z"></path>
                 </svg>
            </template>
           </a>
           <span class="sm:block hidden">
              <svg viewBox="0 0 32 32" stroke="currentColor" class="h-8 w-8 text-gray-300 dark:text-gray-700">
                 <line x1="10" y1="28" x2="22" y2="4"></line>
              </svg>
           </span>
           <div class="sm:block hidden">
                <span class="font-semibold text-1xl tracking-tight text-gray-900 dark:text-white">Shoping app</span>
           </div>
        </div>

        {{-- // responsive > sm --}}
        <div class=" sm:flex items-center space-x-5 hidden">
            @include('component.toogle-theme')

            @if (session('role_id') == 2)
                <div class="">
                    <livewire:cart-component />
                </div>
            @endif

           <a href="{{url('/logout')}}" class="inline-block text-sm leading-5 text-gray-500  hover:text-black dark:hover:text-white transition ease-in-out duration-150">Logout</a>
        </div>

        {{-- //resposive mobile --}}
        <div class="sm:hidden flex space-x-5">
            @include('component.toogle-theme')

            @if (session('role_id') == 2)
                <div >
                    <livewire:cart-component />
                </div>
            @endif

            @include('component.mobile-navbar')
        </div>
     </header>

</div>
