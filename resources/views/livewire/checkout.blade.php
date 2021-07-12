<div class="grid grid-cols-12 shadow-md my-10">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="sm:col-span-9 col-span-12 bg-white px-10 py-10" >
            <div class="sm:flex grid grid-col-1 justify-between  pb-8">
                <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                <h2 class="font-semibold text-2xl">{{$count}} Items</h2>
            </div>
            @foreach ($carts as $cart)
            <div class="border-b-2 ">
                <div class="space-y-4 py-8 ">
                    <div class="flex space-x-4 items-center">
                        <div x-data="{ shown: false }" x-intersect="shown = true">
                            <div x-show="shown" x-transition>
                                <img loading="lazy" src="{{ url('/storage/'.$cart->photo)}}" alt="{{$cart->name}}" class="w-16">
                            </div>
                        </div>
                        <div class="">
                            <h1 class="sm:text-xl text-base text-gray-500 normal-case break-words ">{{$cart->name}}</h1>
                            <p class="normal-case text-gray-600 text-base font-semibold ">Rp {{number_format($cart->price,0, ',' , '.') }}
                                @if ($cart->discount)
                                <span class="inline-block px-2 py-1 leading-none bg-yellow-200 text-yellow-800 rounded-full font-semibold uppercase tracking-wide text-xs ">Save {{ $cart->discount }}%</span>
                                @endif
                            </p>
                            <a onclick="confirm('Confirm delete?') || event.stopImmediatePropagation()" wire:click='removeItem({{$cart->cart_id}})' class="cursor-pointer font-semibold hover:text-red-700 text-gray-500 text-xs">Remove</a>
                        </div>
                    </div>
                    <div class="flex sm:justify-end justify-between space-x-16 ">
                        <div class="flex space-x-2 items-center">
                            <button wire:loading.attr="disabled" wire:click='minQuantity({{$cart->id}},{{ $cart->category_id}},{{ $cart->price}},{{ $cart->discount}}, {{$cart->quantity}})'>
                                <svg class="fill-current text-gray-600  w-3" viewBox="0 0 448 512">
                                    <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                </svg>
                            </button>

                            <p class="px-2 border text-center w-12 h-6 text-gray-800 " type="text">{{$cart->quantity}}</p>

                            <button wire:loading.attr="disabled" wire:click='addQuantity({{$cart->id}},{{ $cart->category_id}},{{ $cart->price}},{{ $cart->discount}}, {{$cart->quantity}})'>
                                <svg class="fill-current text-gray-600  w-3" viewBox="0 0 448 512">
                                    <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                </svg>
                            </button>
                        </div>

                        <div>
                            <h1 class="normal-case text-gray-600 text-base font-semibold ">Rp {{number_format($cart->total,0, ',' , '.') }} </h1>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <a href="{{ url('/dashboard') }}" class="flex font-semibold text-black text-sm mt-10">

                <svg class="fill-current mr-2 text-black w-4" viewBox="0 0 448 512">
                    <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                </svg>
                Continue Shopping
            </a>
        </div>

        <div id="summary" class="sm:col-span-3 col-span-12 px-4 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8 dark:text-white">Order Summary</h1>
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase dark:text-white">Items </span>
                <span class="font-semibold text-sm dark:text-white">{{$count}}</span>
            </div>

            <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase dark:text-white">
                    <span>Total cost</span>
                    <span wire:model='grandtotal'>Rp {{number_format($sumTotal,0, ',' , '.')}}</span>
                </div>
                @unless (!$count)
                <button wire:click='ceckFout' class=" rounded bg-black dark:bg-white text-white dark:text-black hover:text-black dark:hover:bg-black border border-black dark:border-white dark:hover:text-white font-semibold hover:bg-white py-3 text-sm  uppercase w-full">Checkout</button>
                @endunless
            </div>
        </div>
    </div>

