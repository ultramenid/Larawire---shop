@extends('layouts.app')


@section('content')

@include('etc.navbar')
@include('etc.tab')

<div class="sm:pt-8 pt-4  ">
    <div class="grid grid-cols-12 ">
        <ul class=" sm:space-y-3  space-y-0 sm:space-x-0 mb-6 space-x-3 sm:col-span-2 col-span-12 subpixel-antialiased sm:flex sm:flex-col flex flex-row ">
            <li class="">
                <a class="  @if ($sub_tabs == 'list') font-bold px-2 border-l-2  border-black dark:border-white dark:text-white antialiased @else  text-gray-400  antialiased @endif" href="{{url('/productslist')}}">
                    List
                </a>
            </li>
            <li class="">
                <a class="@if ($sub_tabs == 'category')font-bold px-2 border-l-2 border-black dark:border-white dark:text-white  antialiased @else text-gray-400 antialiased @endif " href="{{url('/productscategory')}}">
                    Category
                </a>
            </li>
        </ul>
        <livewire:product-category />

    </div>
</div>



</div>

@endsection
