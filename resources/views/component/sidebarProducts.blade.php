    <li class="">
        <a href="{{url('/productslist')}}" class="  @if ($sub_tabs == 'list') font-bold px-2 border-l-2  border-black dark:border-white dark:text-white  @else  text-gray-400  dark:hover:text-white hover:text-black  @endif" >
            List
        </a>
    </li>
    <li class="">
        <a href="{{url('/productscategory')}}"class="@if ($sub_tabs == 'category')font-bold px-2 border-l-2 border-black dark:border-white dark:text-white   @else text-gray-400  @endif  dark:hover:text-white hover:text-black" >
            Category
        </a>
    </li>
