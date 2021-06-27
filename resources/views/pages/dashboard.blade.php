@extends('layouts.app')


@section('content')

    {{-- header component --}}
    @include('component.header')
    {{-- submenu component --}}
    @include('component.submenu')

    {{-- main component --}}
    <main class="bg-white dark:bg-black ">
        <div class="max-w-6xl px-6 mx-auto ">
            @if (session('role_id') == 2)
                {{-- livewire choose product component --}}
                <livewire:choose-component />
            @else
                {{-- livewire list all transaction component --}}
                <livewire:list-trans />
            @endif
        </div>
    </main>

@endsection
