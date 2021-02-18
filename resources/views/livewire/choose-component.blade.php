<div class="mt-5 grid xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-5 z-10" wire:init='loadFirst'>
    @if ($products)
    @foreach ($products as $product)
    <div class="w-full  bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
        <div class="relative pb-48 overflow-hidden">
            <img class="absolute inset-0 h-full w-full object-cover" src="{{ url('/storage/'.$product->photo) }}" alt="">
        </div>
        <div class="p-4 ">
            <div class="flex justify-between items-center mb-6">
                @if ($product->discount > 0)
                <span class="inline-block px-2 py-1 leading-none bg-yellow-200 text-yellow-800 rounded-full font-semibold uppercase tracking-wide text-xs ">Save {{$product->discount}}%</span>
                @else
                <span></span>
                @endif

                @unless (cekCart($product->id))
                <button wire:loading.attr="disabled" wire:click='addtocart({{$product->id}},{{ $product->category_id}},{{ $product->price}},{{ $product->discount}})' class="text-right text-xs px-2 py-1 transition ease-in duration-200 rounded hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>
                @else
                <button wire:click='removefromcart({{$product->id}})' class="text-right text-xs px-2 py-1 transition ease-in duration-200 rounded hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
                @endunless

            </div>
            <h2 class="mt-2 font-bold">{{$product->name}}</h2>
            <h2 class="mb-2 text-gray-500 text-xs">{{$product->category_name}}</h2>
            <div class="mt-3 ">
                <span class="text-xl font-semibold">Rp</span>&nbsp;<span class="font-bold text-xl">{{number_format($product->price,0, ',' , '.') }}</span>&nbsp;
            </div>
        </div>
    </div>
    @endforeach
    @else
    loading . .
    @endif

</div>
