<div class="container mx-auto mt-10">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                <h2 class="font-semibold text-2xl">{{$count}} Items</h2>
            </div>
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 ">Quantity</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 ">Price</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 ">Discount</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 ">Total</h3>
            </div>
            @foreach ($carts as $cart)
            <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                <div class="flex w-2/5">
                    <!-- product -->
                    <div class="w-20">
                        <img class="h-12 w-12" src="{{ url('/storage/'.$cart->photo)}}" alt="">
                    </div>
                    <div class="flex flex-col justify-between ml-4 flex-grow">
                        <span class="font-bold text-sm">{{$cart->name}}</span>
                        <span class="text-gray-500 text-xs">{{$cart->category_name}}</span>
                        <a onclick="confirm('Confirm delete?') || event.stopImmediatePropagation()" wire:click='removeItem({{$cart->cart_id}})' class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</a>
                    </div>
                </div>
                <div class="flex justify-center w-1/5">
                    <button wire:loading.attr="disabled" wire:click='minQuantity({{$cart->id}},{{ $cart->category_id}},{{ $cart->price}},{{ $cart->discount}}, {{$cart->quantity}})'>
                        <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                            <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                        </svg>
                    </button>

                    <div class="mx-2 border text-center w-8" type="text">{{$cart->quantity}}</div>

                    <button wire:loading.attr="disabled" wire:click='addQuantity({{$cart->id}},{{ $cart->category_id}},{{ $cart->price}},{{ $cart->discount}}, {{$cart->quantity}})'>
                        <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                            <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                        </svg>
                    </button>

                </div>
                <span class="text-center w-1/5 font-semibold text-sm">Rp {{number_format($cart->price,0, ',' , '.') }}</span>
                <span class="text-center w-1/5 font-semibold text-sm"> {{ $cart->discount }}%</span>
                {{-- <span wire:model='total' class="text-center w-1/5 font-semibold text-sm">{{  number_format($cart->price * $cart->quantity - (($cart->discount / 100 * $cart->price) * $cart->quantity)  ,0, ',' , '.') }}</span> --}}
                {{-- <span wire:model='total' class="text-center w-1/5 font-semibold text-sm">{{  number_format(((100 - $cart->discount) * ($cart->price / 100)) * $cart->quantity  ,0, ',' , '.') }}</span> --}}
                <span wire:model='total' class="text-center w-1/5 font-semibold text-sm">Rp {{number_format($cart->total,0, ',' , '.') }} </span>
            </div>
            @endforeach


            <a href="{{ url('/dashboard') }}" class="flex font-semibold text-indigo-600 text-sm mt-10">

                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                    <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                </svg>
                Continue Shopping
            </a>
        </div>

        <div id="summary" class="w-1/4 px-8 py-10">
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
                <button wire:click='ceckFout' class=" rounded bg-black dark:bg-white dark:text-black dark:hover:bg-indigo-600 dark:hover:text-white font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</button>
                @endunless
            </div>
        </div>

    </div>
</div>
