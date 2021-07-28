@extends('layouts.app')

@section('content')

    {{-- header component --}}
    @include('component.header')
    {{-- submenu component --}}
    @include('component.submenu')

    {{-- main component --}}
    <main class="bg-white dark:bg-black ">
        <div class="max-w-6xl px-6 mx-auto ">
            <div class="sm:pt-8 pt-4 ">
                <div class="grid grid-cols-12 ">
                    <ul class=" sm:space-y-3  space-y-0 sm:space-x-0 mb-6 space-x-3 sm:col-span-2 col-span-12 subpixel-antialiased sm:flex sm:flex-col flex flex-row ">
                        @include('component.sidebarSettings')
                    </ul>
                    <div class="sm:col-span-10 col-span-12 space-y-1">
                        <div class="w-full border border-gray-200 dark:border-opacity-20 rounded">
                            <h1 class="text-2xl font-semibold px-6 py-6 text-black dark:text-white">Theme preferences </h1>
                            <p class="px-6 mb-6 text-sm font-light text-black dark:text-white">
                                Choose how Apps looks to you. Light theme , Dark theme , or sync with your system and automatically.
                            </p>
                            <div class="px-6 py-6 grid grid-cols-1 lg:grid-cols-3 gap-y-6 ">
                                <div class="text-center">
                                    <button onclick="toSystemMode()" class="relative border-gray-200 dark:border-opacity-20 border rounded">
                                        <img src="{{asset('system.png')}}" alt="" class=" rounded w-full md:w-53">
                                    </button>
                                    <p class="text-sm font-light dark:text-white text-black">System Theme</p>
                                </div>
                                <div class="text-center">
                                    <button onclick="toDarkMode()" class="relative border-gray-200 dark:border-opacity-20 border rounded">
                                        <img src="{{asset('dark_preview.svg')}}" alt="" class=" rounded w-full md:w-53">
                                    </button>
                                    <p class="text-sm font-light dark:text-white text-black">Dark Theme</p>
                                </div>
                                <div class="text-center">
                                    <button onclick="toLightMode()" class="relative border-gray-200 dark:border-opacity-20 border rounded">
                                        <img src="{{asset('light_preview.svg')}}" alt="" class=" rounded w-full md:w-53">
                                    </button>
                                    <p class=" text-sm font-light dark:text-white text-black">Light Theme</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
