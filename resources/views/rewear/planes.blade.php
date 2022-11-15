@extends('layouts.rewear-azul')
@section('content')
    <section id="planes">
        <div class="bg-2">
            <div class="bg-3 mt-5 pt-5">
                <div class="container">
                    <!--Planes-->
                    <div class="d-none d-sm-none d-md-block d-lg-block" id="planes">
                        <div class="row pt-5 espacio-4">
                            @foreach ($plans as $plan)
                                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                                    <!--uno-->
                                    <div class="card espacio-1">
                                        <div class="icon pt-2 pb-3">
                                            <img src="{{ asset('/img/index/box.svg') }}" width="70" alt="icono box">
                                        </div>
                                        <h3 class="gelion-bold espacio-2">
                                            @if (session()->get('divisa') == 'MXN')
                                                ${{ $plan->MXN }} MXN / ${{ $plan->MXN_L }} MXN
                                                <br>
                                                <small>{{ __('Manga corta / Manga larga') }}</small>
                                            @else
                                                ${{ $plan->USD }} USD / ${{ $plan->USD_L }}
                                                <br>
                                                <small>{{ __('Manga corta / Manga larga') }}</small>
                                            @endif <br>
                                            {{-- Estos son para MXN --}}
                                            @if (session('divisa') == 'MXN')
                                                @if (session('locale') == 'es')
                                                    <small
                                                        class="gelion-thin size-1s">{{ __('Costo de envío no incluido') }}</small>
                                                @else
                                                    <small
                                                        class="gelion-thin size-1s">{{ __('Per t-shirt. Taxes and USA shipping fees not included') }}</small>
                                                @endif
                                            @else
                                                {{-- Este es para USD --}}
                                                @if (session('locale') == 'es')
                                                    <small
                                                        class="gelion-thin size-1s">{{ __('Costo de envío no incluido') }}</small>
                                                @else
                                                    <small
                                                        class="gelion-thin size-1s">{{ __('Per t-shirt. Taxes and USA shipping fees not included') }}</small>
                                                @endif
                                            @endif
                                        </h3>
                                        <h2 class="gelion-bold">{{ $plan->name }}</h2>
                                        <p class="gelion-thin" style="text-align:justify;">
                                            @switch($plan->id)
                                                @case(1)
                                                    {{ __('Ideal para emprendedores y negocios en crecimiento. Todo listo para que inicies con el mejor proyecto de tu vida.') }}
                                                @break
                                                @case(2)
                                                    {{ __('No te quedes sin stock. Incrementa tus posibilidades y capta más clientes con una nueva línea sustentable.') }}
                                                @break
                                                @case(3)
                                                    {{ __('Perfecto para todo profesional de la industria de la moda. Personaliza o distribuye las mejores camisetas para cuidar el planeta.') }}
                                                @break
                                            @endswitch
                                        </p>
                                        <li class="gelion-bold pt-2">
                                            <div class="row">
                                                <div class="col-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <div class="col-10">
                                                    @switch($plan->id)
                                                        @case(1)
                                                            {{ __('1 caja de 72 camisetas') }}
                                                        @break
                                                        @case(2)
                                                            {!! __('2 cajas (144 camisetas)<br>o 3 cajas (216 camisetas).') !!}
                                                        @break
                                                        @case(3)
                                                            {!! __('4 cajas (288 camisetas) <br> o las que necesites') !!}
                                                        @break
                                                    @endswitch
                                                </div>
                                            </div>
                                        </li>
                                        <li class="gelion-bold pt-3">
                                            <div class="row">
                                                <div class="col-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <div class="col-10">
                                                    @switch($plan->id)
                                                        @case(1)
                                                            {{ __('Elige 2 colores') }}
                                                        @break
                                                        @case(2)
                                                            {{ __('Elige 4 colores') }}
                                                        @break
                                                        @case(3)
                                                            {{ __('Elige 6 colores') }}
                                                        @break
                                                    @endswitch
                                                </div>
                                            </div>
                                        </li>
                                        <li class="gelion-bold pt-3" style="padding-bottom: 1.2em;">
                                            <div class="row">
                                                <div class="col-2 m-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <div class="col-10">
                                                    {{ __('50% algodón reciclado pre-consumo + 50% poliéster reciclado (RPET)') }}
                                                    <br>
                                                </div>
                                            </div>
                                        </li>
                                        <div class="boton text-center mt-4">
                                            <a href="{{ route('plan', $plan) }}"
                                                class="btn btn-secondary gelion-bold btn-block pt-2 pb-2"
                                                style="font-size: 1.3rem;">{{ __('¡lo quiero!') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-block d-sm-block d-md-none d-lg-none">
                        <div class="carousel">
                            <div class="carousel__contenedor">
                                <div class="carousel__lista1">
                                    @foreach ($plans as $plan)
                                        <div class="carousel__elemento m-1">
                                            <div class=" p-4">
                                                <!--Contenido de ordenes movil-->
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <!--uno-->
                                                        <div class="card espacio-1">
                                                            <div class="icon pt-2 pb-3">
                                                                <img src="{{ asset('/img/index/box.svg') }}" width="70"
                                                                    alt="icono box">
                                                            </div>
                                                            <h3 class="gelion-bold espacio-2">
                                                                @if (session()->get('divisa') == 'MXN')
                                                                    ${{ $plan->MXN }} MXN / ${{ $plan->MXN_L }} MXN
                                                                    <br>
                                                                    <small>{{ __('Manga corta / Manga larga') }}</small>
                                                                @else
                                                                    ${{ $plan->USD }} USD / ${{ $plan->USD_L }}
                                                                    <br>
                                                                    <small>{{ __('Manga corta / Manga larga') }}</small>
                                                                @endif <br>
                                                                {{-- Estos son para MXN --}}
                                                                @if (session('divisa') == 'MXN')
                                                                    @if (session('locale') == 'es')
                                                                        <small
                                                                            class="gelion-thin size-1s">{{ __('Por playera. Envíos nacionales, costo de envío por cotizar') }}</small>
                                                                    @else
                                                                        <small
                                                                            class="gelion-thin size-1s">{{ __('Per t-shirt. Mexican shipping fees to be quoted. Aditional services not included.') }}</small>
                                                                    @endif
                                                                @else
                                                                    {{-- Este es para USD --}}
                                                                    @if (session('locale') == 'es')
                                                                        <small
                                                                            class="gelion-thin size-1s">{{ __('Por playera, envíos fuera de México, ya incluyen costo de envío') }}</small>
                                                                    @else
                                                                        <small
                                                                            class="gelion-thin size-1s">{{ __('Per t-shirt. Taxes and USA shipping fees included') }}</small>
                                                                    @endif
                                                                @endif
                                                            </h3>
                                                            <h2 class="gelion-bold">{{ $plan->name }}</h2>
                                                            <p class="gelion-thin" style="text-align:justify;">
                                                                @switch($plan->id)
                                                                    @case(1)
                                                                        {{ __('Ideal para emprendedores y negocios en crecimiento. Todo listo para que inicies con el mejor proyecto de tu vida.') }}
                                                                    @break
                                                                    @case(2)
                                                                        {{ __('No te quedes sin stock. Incrementa tus posibilidades y capta más clientes con una nueva línea sustentable.') }}
                                                                    @break
                                                                    @case(3)
                                                                        {{ __('Perfecto para todo profesional de la industria de la moda. Personaliza o distribuye las mejores camisetas para cuidar el planeta.') }}
                                                                    @break
                                                                @endswitch
                                                            </p>
                                                            <li class="gelion-bold pt-2">
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-5 w-5" viewBox="0 0 20 20"
                                                                            fill="currentColor">
                                                                            <path fill-rule="evenodd"
                                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="col-10">
                                                                        @switch($plan->id)
                                                                            @case(1)
                                                                                {{ __('1 caja de 72 camisetas') }}
                                                                            @break
                                                                            @case(2)
                                                                                {!! __('2 cajas (144 camisetas)<br>o 3 cajas (216 camisetas).') !!}
                                                                            @break
                                                                            @case(3)
                                                                                {!! __('4 cajas (288 camisetas) <br> o las que necesites') !!}
                                                                            @break
                                                                        @endswitch
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="gelion-bold pt-3">
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-5 w-5" viewBox="0 0 20 20"
                                                                            fill="currentColor">
                                                                            <path fill-rule="evenodd"
                                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="col-10">
                                                                        @switch($plan->id)
                                                                            @case(1)
                                                                                {{ __('Elige 2 colores') }}
                                                                            @break
                                                                            @case(2)
                                                                                {{ __('Elige 4 colores') }}
                                                                            @break
                                                                            @case(3)
                                                                                {{ __('Elige 6 colores') }}
                                                                            @break
                                                                        @endswitch
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="gelion-bold pt-3" style="padding-bottom: 1.2em;">
                                                                <div class="row">
                                                                    <div class="col-2 m-auto">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-5 w-5" viewBox="0 0 20 20"
                                                                            fill="currentColor">
                                                                            <path fill-rule="evenodd"
                                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="col-10">
                                                                        {{ __('50% algodón reciclado pre-consumo + 50% poliéster reciclado (RPET)') }}
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                            </li><br>
                                                            <div class="boton text-center mt-4">
                                                                <a href="{{ route('plan', $plan) }}"
                                                                    class="btn btn-secondary gelion-bold btn-block pt-2 pb-2"
                                                                    style="font-size: 1.3rem;">{{ __('¡lo quiero!') }}</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div role="tabList" class="carousel__indicadores"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
