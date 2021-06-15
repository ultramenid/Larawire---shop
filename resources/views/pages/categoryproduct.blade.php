@extends('layouts.app')


@section('content')

@include('etc.navbar')
@include('etc.tab')

<div class="sm:pt-8 pt-4  ">
    <div class="grid grid-cols-12 ">
        @include('etc.sidebar')

        <livewire:product-category />

    </div>
</div>



</div>

@endsection
