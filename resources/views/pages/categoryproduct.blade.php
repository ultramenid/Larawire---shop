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
                    {{-- component sidebar --}}
                    @include('component.sidebar')
                    {{-- livewire products component --}}
                    <livewire:product-category />
                </div>
            </div>
        </div>
    </main>

@endsection
