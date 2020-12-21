<style>
    @media (max-width: 767px) {
      .navicon {
        width: 1.125em;
        height: .125em;
      }

      .navicon::before,
      .navicon::after {
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        transition: all .2s ease-out;
        content: '';
        background: #3D4852;
      }

      .navicon::before {
        top: 5px;
      }

      .navicon::after {
        top: -5px;
      }

      .menu-btn:not(:checked) ~ .menu {
        display: none;
      }

      .menu-btn:checked ~ .menu {
        display: block;
      }

      .menu-btn:checked ~ .menu-icon .navicon {
        background: transparent;
      }

      .menu-btn:checked ~ .menu-icon .navicon::before {
        transform: rotate(-45deg);
      }

      .menu-btn:checked ~ .menu-icon .navicon::after {
        transform: rotate(45deg);
      }

      .menu-btn:checked ~ .menu-icon .navicon::before,
      .menu-btn:checked ~ .menu-icon .navicon::after {
        top: 0;
      }
     .model-open{
        overflow: hidden;
        height: 100vh;
      }

    }
</style>

    <div class=" container mx-auto lg:px-32 px-5 mt-1 ">
        <div class=" flex flex-wrap items-center justify-between">
            <div class="flex flex-no-shrink items-center mr-6 py-3 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"  class=" h-8 mr-2 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>

                <span class="font-semibold text-2xl tracking-tight">Shoping App</span>
            </div>

            <input class="menu-btn hidden" type="checkbox" id="menu-btn">
            <label class="menu-icon block cursor-pointer md:hidden px-2 py-4 relative select-none font-black" for="menu-btn">
                <span class="navicon bg-grey-darkest flex items-center relative"></span>
            </label>

            <ul class="menu border-b md:border-none flex justify-end list-reset m-0 w-full md:w-auto">
                <li class="border-t md:border-none">
                    @if (session('role_id') == 2)
                    <livewire:cart-component />
                    @endif
                </li>
                <li class="border-t md:border-none">
                    <a href="{{url('/logout')}}" class="block md:inline-block px-4 py-3 no-underline text-gray-500  hover:text-black">Sign Out</a>
                </li>

            </ul>
        </div>





