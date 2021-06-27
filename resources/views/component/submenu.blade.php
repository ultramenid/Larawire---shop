<div class="border-b border-gray-200 dark:border-gray-800 sticky top-0 z-10 bg-white dark:bg-black">
    <div class="max-w-6xl mx-auto px-6 ">
        <nav class="-mb-px flex space-x-5 text-sm leading-5 overflow-x-auto scrollbar-hide ">
            <a href="{{url('/dashboard')}}" class=" px-0.5 py-3  @if($tabs == 'dashboard' )  dark:border-white border-black text-black border-b-2 dark:text-white @else  text-gray-500  hover:text-black dark:hover:text-white cursor-pointer  @endif " >Dashboard</a>

            {{-- tab for user has roleid = 1 --}}
            @if(session('role_id') === 1)
            <a href="{{url('/productslist')}}" class="px-0.5 py-3  @if($tabs == 'products' ) dark:border-white border-black text-black dark:text-white border-b-2 @else   text-gray-500 hover:text-black dark:hover:text-white cursor-pointer @endif" >Products</a>
            @endif

        </nav>
    </div>
</div>
