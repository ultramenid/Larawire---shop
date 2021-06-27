{{-- @extends('layouts.app')


@section('content')

    @include('etc.navbar')
    @include('etc.tab')

<livewire:checkout />

</div>


@endsection --}}


@extends('layouts.app')

@section('content')

    {{-- header component --}}
    @include('component.header')
    {{-- submenu component --}}
    @include('component.submenu')

    {{-- main component --}}
    <main class="bg-white dark:bg-black ">
        <div class="max-w-6xl px-6 mx-auto ">
            <livewire:checkout />
        </div>
    </main>

@endsection
