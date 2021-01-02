@extends('layouts.app')


@section('content')

    @include('etc.navbar')
    @include('etc.tab')

        @if (session('role_id') == 2)
            <livewire:choose-component />
        @else
            <livewire:list-trans />
        @endif
    </div>

@endsection
