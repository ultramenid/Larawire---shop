{{-- <button  x-data="ToggleDark()" x-init="created()" @click.prevent="toggle()" class="focus:outline-none focus:shadow-outline text-sm leading-5 text-gray-black hover:border-black hover:text-gray-600  ">
    <template x-if="!darkMode">
        <svg class=" h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
        </svg>
    </template>
    <template x-if="darkMode">
        <svg class="w-4 h-4" aria-hidden="true" fill="yellow" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
        </svg>
    </template>
</button> --}}

{{-- <template x-if="localStorage.theme = 'dark'">
    <button  onclick="toSystemMode()" title="Switch to system theme"  class="relative w-6 h-6 focus:outline-none focus:shadow-outline text-gray-500">
    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none" shape-rendering="geometricPrecision" style="color: currentcolor;"><path d="M2 13.381h20M8.66 19.05V22m6.84-2.95V22m-8.955 0h10.932M4 19.05h16a2 2 0 002-2V4a2 2 0 00-2-2H4a2 2 0 00-2 2v13.05a2 2 0 002 2z"></path></svg>
    System
</button>
</template>

<button  onclick="toLightMode()" title="Switch to light mode"  class="relative w-6 h-6 focus:outline-none focus:shadow-outline text-gray-500">
    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none" shape-rendering="geometricPrecision" style="color: currentcolor;"><circle cx="12" cy="12" r="5"></circle><path d="M12 1v2"></path><path d="M12 21v2"></path><path d="M4.22 4.22l1.42 1.42"></path><path d="M18.36 18.36l1.42 1.42"></path><path d="M1 12h2"></path><path d="M21 12h2"></path><path d="M4.22 19.78l1.42-1.42"></path><path d="M18.36 5.64l1.42-1.42"></path></svg>
    Light
</button>
<button  onclick="toDarkMode()" title="Switch to dark mode"  class="relative w-6 h-6 focus:outline-none focus:shadow-outline text-gray-500">
    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none" shape-rendering="geometricPrecision" style="color: currentcolor;"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path></svg>
    Dark
</button> --}}


<div class="relative" x-data="{ isProfileMenuOpen: false}">
    <button
      title="Profile"
      @click="isProfileMenuOpen = !isProfileMenuOpen"
      @click.away="isProfileMenuOpen = false"
      @keydown.escape="isProfileMenuOpen = false"
      aria-label="Account"
      aria-haspopup="true"
      class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
    >
      <img
        class="object-cover w-8 h-8 rounded-full"
        src="{{asset('profile.png')}}"
        alt=""
        aria-hidden="true"
      />
    </button>
    <template x-if="isProfileMenuOpen">
      <ul
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-0"
        x-transition:leave-end="opacity-100"
        class="z-20 absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300  dark:bg-black"
        aria-label="submenu"
      >
        <li class="flex">
          <a
            class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
            href="#"
          >
            <svg
              class="w-4 h-4 mr-3"
              aria-hidden="true"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
              ></path>
            </svg>
            <span>Profile</span>
          </a>
        </li>
        <li class="flex">
          <a
            class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
            href="{{url('/settings')}}"
          >
            <svg
              class="w-4 h-4 mr-3"
              aria-hidden="true"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
              ></path>
              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span>Settings</span>
          </a>
        </li>
        <li class="flex">
          <a
            class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
            href="{{url('/logout')}}"
          >
            <svg
              class="w-4 h-4 mr-3"
              aria-hidden="true"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
              ></path>
            </svg>
            <span>Log out</span>
          </a>
        </li>
      </ul>
    </template>
</div>
