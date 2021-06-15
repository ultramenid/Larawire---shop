<div class="flex  overflow-x-auto item-center sm:space-x-5 space-x-3 leading-5  sticky top-0 z-10 px-1 bg-white dark:bg-gray-800 mt-2">
    <a href="{{url('/dashboard')}}" class="sm:text-md text-sm px-0.5 py-4 hover:text-black @if($tabs == 'dashboard')  dark:text-gray-100  border-b-2   border-black dark:border-gray-100  @endif text-gray-500 dark:hover:text-white     ">Dashboard </a>

    @if (session('role_id') === 1)
    <a href="{{url('/productslist')}}" class="sm:text-md text-sm px-0.5 py-4 hover:text-black @if($tabs == 'products')  dark:text-gray-100  dark:border-gray-100 border-b-2    border-black  @endif text-gray-500 dark:hover:text-white   ">Products </a>
    @endif
</div>
