
    <a href="{{ url('/checkout') }}" >
        <button class=" relative border-2 border-transparent text-gray-800 rounded-full dark:text-gray-200 hover:text-gray-600 focus:outline-none focus:text-gray-500 " aria-label="Cart">
            <svg class="h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span class="absolute top-0 ">
                @if ($countCart > 0)
                    <div class="inline-flex items-center px-1 py-0.25 rounded-full text-xss bg-red-500 text-white" wire:model='item'>
                        {{ $countCart }}
                    </div>
                @endif
            </span>
        </button>
    </a>
