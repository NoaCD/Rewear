@extends('layouts.rewear-azul')
@if (session('locale') == 'es')
    @section('title', 'Productos disponibles - Rewear')
@else
    @section('title', 'Products - Rewear')
@endif
@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('/css/products.css') }}">
        <link rel="stylesheet" href="{{ asset('/lib/icomoon-v1.0/style.css') }}">
    @endpush
    {{-- @livewire('catalogue-filter') --}}
    @livewire('catalogue-filter', [ 'color' => $color ])
    @push('js')
        <script src="{{ asset('/js/producto.js') }}"></script>
    @endpush
@endsection
