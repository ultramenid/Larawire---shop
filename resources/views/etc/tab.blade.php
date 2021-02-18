<div class="flex  overflow-x-auto item-center sm:space-x-5 space-x-3 leading-5  sticky top-0 z-10 px-1 bg-white">
    @if (session('role_id') === 2)
    <a href="{{url('/dashboard')}}" class="sm:text-md text-sm   @if($tabs == 'dashboard') text-gray-900  border-b-2 hover:text-black px-0.5  border-black py-4 @else text-gray-500 px-0.5 py-4 @endif ">Products </a>
    @else
    <a href="{{url('/dashboard')}}" class="sm:text-md text-sm  @if($tabs == 'dashboard') text-gray-900  border-b-2 hover:text-black px-0.5  border-black py-4 @else text-gray-500 px-0.5 py-4 @endif ">Dashboard </a>
    @endif
    @if (session('role_id') === 1)
    <a href="{{url('/productslist')}}" class="sm:text-md text-sm  @if($tabs == 'products') text-gray-900  border-b-2 hover:text-black px-0.5  border-black py-4 @else text-gray-500 px-0.5 py-4 @endif ">Products </a>
    @endif
</div>

<hr>
