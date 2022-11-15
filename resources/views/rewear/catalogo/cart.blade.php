@extends('layouts.rewear-azul')
@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('/css/products.css') }}">
    @endpush
    <section id="cart">
        @livewire('cart', ['plan' => $plan])
    </section>
    <section id="cruzada" class="pt-5 pb-5">
        <div class="container cruzada">
            <h5 class="gelion-bold text-center pt-3 pb-4">{{ __('TAMBIÉN TE PODRÍA INTERESAR') }}</h5>
            <div class="d-none d-sm-none d-md-none d-lg-block">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card espacio-card">
                                <div class="contenedor">
                                    @foreach ($product->images as $image)
                                        @if ($image->main == 'si')
                                            <a href="{{ route('catalogue.product', $product) }}">
                                                <img src="{{ Storage::url($image->url) }}"
                                                    class="@if ($loop->iteration != 1) top @endif fill" alt="Productos del catálogo">
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <a href="{{ route('catalogue.product', $product) }}"
                                    style="color: #000; text-decoration: none;">
                                    <h5 class="gelion-bold pt-2">
                                        @if (session('locale') == 'es')
                                            {{ $product->name }}
                                        @else
                                            {{ $product->name_en }}
                                        @endif
                                    </h5>
                                </a>
                                <li class="gelion-thin">{{ __('Medidas del modelo:') }}:
                                    <span>{{ $product->measure }}</span></li>
                                <li class="gelion-thin">Fit: {{ __($product->subcategory->name) }}</li>
                                <div class="pt-3 d-flex">
                                    <div class="hoja">
                                        <img src="{{ asset('/img/catalogo/rewear.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-none d-sm-none d-md-block d-lg-none">
                <!--Producto MD-->
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-6">
                            <div class="card espacio-card mb-2">
                                <div class="contenedor-4">
                                    @foreach ($product->images as $image)
                                        @if ($image->main == 'si')
                                            <a href="{{ route('catalogue.product', $product) }}">
                                                <img src="{{ Storage::url($image->url) }}"
                                                    class="@if ($loop->iteration != 1) top @endif fill" alt="Productos del catálogo">
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <a href="{{ route('catalogue.product', $product) }}" style="color: #000; text-decoration: none;">
                                    <h5 class="gelion-bold pt-2 size-product-1">
                                        @if (session('locale') == 'es')
                                            {{ $product->name }}
                                        @else
                                            {{ $product->name_en }}
                                        @endif
                                    </h5>
                                </a>
                                <li class="gelion-thin">{{ __('Medidas del modelo:') }}:
                                    <span>{{ $product->measure }}</span></li>
                                <li class="gelion-thin">Fit: {{ __($product->subcategory->name) }}</li>
                                <div class="pt-3 d-flex">
                                    <div class="hoja">
                                        <img src="{{ asset('/img/catalogo/rewear.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-block d-sm-block d-md-none d-lg-none">
                <!--Producto SM-->
                <div class="row">
                    <div class="col-sm-6 pt-4">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-6">
                                    <div class="card espacio-card mb-3">
                                        <div class="contenedor-2">
                                            @foreach ($product->images as $image)
                                                @if ($image->main == 'si')
                                                    <a href="{{ route('catalogue.product', $product) }}">
                                                        <img src="{{ Storage::url($image->url) }}" class="img-fluid"
                                                            alt="Productos del catálogo">
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                        <a href="{{ route('catalogue.product', $product) }}"
                                            style="color: #000; text-decoration: none;">
                                            <h5 class="gelion-bold pt-2">
                                                @if (session('locale') == 'es')
                                                    {{ $product->name }}
                                                @else
                                                    {{ $product->name_en }}
                                                @endif
                                            </h5>
                                        </a>
                                        {{-- <li class="gelion-thin">{{ __('Medidas del modelo:') }}: <span>{{ $product->measure }}</span></li>
                                        <li class="gelion-thin">Fit: {{ __($product->subcategory->name) }}</li> --}}
                                        <div class="pt-3 d-flex">
                                            <div class="hoja">
                                                <img src="{{ asset('/img/catalogo/rewear.svg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <script src="{{ asset('/js/producto.js') }}"></script>
        <script src="{{ asset('/js/show.js') }}"></script>
    @endpush
@endsection
