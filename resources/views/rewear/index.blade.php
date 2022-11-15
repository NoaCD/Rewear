@extends('layouts.rewear')
@if (session('locale') == 'es')
@section('title', 'Playeras ecológicas Rewear')
@else
@section('title', 'Sustainable t-shirt Rewear')
@endif
@section('content')
<header>
    <div class="contenido-boton">
        @if (session()->get('locale') == 'es')
        <iframe class="portada_inicio"
            src="https://www.youtube-nocookie.com/embed/lFsYUCiTVW4?playlist=lFsYUCiTVW4&loop=1&mute=1&autoplay=1&controls=0&showinfo=0"
            frameborder="0" title="YouTube video player"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media;" allowfullscreen></iframe>
        @else
        <iframe class="portada_inicio"
            src="https://www.youtube-nocookie.com/embed/FcYbT3qvDII?playlist=FcYbT3qvDII&loop=1&mute=0&autoplay=1&controls=0&showinfo=0"
            frameborder="0" title="YouTube video player"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media;" allowfullscreen></iframe>
        @endif
        <div class="boton-h">
            <a href="{{ route('catalogue.index') }}" id="boton-h"
                class="btn btn-warning gelion-bold">{{ __('Ver productos') }}</a>
        </div>
    </div>
</header>
<section id="planes">
    <div class="bg-2">
        <div class="bg-3 pt-5">
            <!--bg-azul-->
            <h1 class="gelion-bold text-center" style="color: #fff;">
                {{ __('Elige tu plan y arma tus cajas') }}
            </h1>
            <div class="container">
                <!--Planes-->
                <div class="d-none d-sm-none d-md-block d-lg-block" id="planes">
                    <div class="row pt-5 espacio-4">
                        @foreach ($plans as $plan)
                        <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                            <!--uno-->
                            <div class="card espacio-1" style="height:38rem">
                                <div class="icon pt-2 pb-3">
                                    <h2 class="gelion-bold text-secondary" style="margin-bottom: 0px;">{{_('Plan')}}
                                    </h2>
                                    <img class="float-right" src="{{ asset('/img/index/box.svg') }}" width="70"
                                        alt="icono box">
                                    <h1 style="font-size:55px; color:#003057;" class="gelion-bold">
                                        <span class="badge badge-success">
                                            {{strtoupper($plan->name) }}
                                        </span>
                                    </h1>
                                </div>
                                <h3 class="gelion-bold espacio-2">
                                    @if (session()->get('divisa') == 'MXN')
                                    <span class="badge badge-warning">${{ $plan->MXN }} MXN / {{ $plan->MXN_L }}
                                        MXN</span>
                                    <br>
                                    <small> <span class="badge badge-secondary">{{ __('Manga corta') }} /
                                            {{ _('Manga larga') }} </span> </small>
                                    @else
                                    <span class="badge badge-warning"> ${{ $plan->USD }} USD / ${{ $plan->USD_L }}
                                    </span>
                                    <br>
                                    <small> <span class="badge badge-secondary"> {{ __('Manga corta / Manga larga') }}
                                        </span> </small>
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
                                        class="gelion-thin size-1s">{{ __('Por playera. Envíos nacionales, costo de envío por cotizar') }}</small>
                                    @else
                                    <small
                                        class="gelion-thin size-1s">{{ __('Per t-shirt. Mexican shipping fees to be quoted. Aditional services not included.') }}</small>
                                    @endif
                                    @endif
                                </h3>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="col-10">
                                            @switch($plan->id)
                                            @case(1)
                                            {{__('1 caja de 72 camisetas') }}
                                            <br>
                                            <br>
                                            @break
                                            @case(2)
                                            {!!__('2 cajas (144 camisetas)<br> o 3 cajas (216 camisetas).') !!}
                                            @break
                                            @case(3)
                                            {!!__('4 cajas (288 camisetas)<br> o las que necesites') !!}
                                            @break
                                            @endswitch
                                        </div>
                                    </div>
                                </li>
                                <li class="gelion-bold pt-3">
                                    <div class="row">
                                        <div class="col-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="col-10">
                                            <span style="font-size: 15px" class="badge badge-success">
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
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                <li class="gelion-bold pt-3" style="padding-bottom: 1.2em;">
                                    <div class="row">
                                        <div class="col-2 m-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
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
                                                <div class="card espacio-1" style="height: 42rem">
                                                    <div class="icon pt-2 pb-3">
                                                        <img src="{{ asset('/img/index/box.svg') }}" width="70"
                                                            alt="icono box">
                                                    </div>
                                                    <h3 class="gelion-bold espacio-2">
                                                        @if (session()->get('divisa') == 'MXN')
                                                        <span class="badge badge-warning">
                                                            ${{ $plan->MXN }} MXN / ${{ $plan->MXN_L }} MXN
                                                        </span>
                                                        <br>
                                                        <small>  <span class="badge badge-secondary"> {{ __('Manga corta / Manga larga') }} </span> </small>
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
                                                            class="gelion-thin size-1s">{{ __('Por playera. Envíos nacionales, costo de envío por cotizar') }}</small>
                                                        @else
                                                        <small
                                                            class="gelion-thin size-1s">{{ __('Per t-shirt. Mexican shipping fees to be quoted. Aditional services not included.') }}</small>
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
                                                                  {!!__('2 cajas (144 camisetas)<br> o 3 cajas (216 camisetas).') !!}
                                                                @break
                                                                @case(3)
                                                                {!!__('4 cajas (288 camisetas)<br> o las que necesites') !!}
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
                                                                <span style="font-size:15px;"
                                                                    class="badge badge-success">
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
                                                                </span>
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
                                                    </li><br>
                                                    <div class="boton text-center mt-4">
                                                        <a href="{{ route('plan', $plan) }}"
                                                            class="btn btn-secondary gelion-bold btn-block pt-2 pb-2"
                                                            style="font-size: 1.3rem;">¡Lo quiero!</a>
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
                <h4 class="gelion-bold text-center pt-5" style="color: #fff;">
                    {{ __('¡Contáctanos!') }}</h4>
                <div class="form-inline espacio-3">
                    <a target="_blank" href="https://wa.me/message/DSJ44XM4QJZSO1" type="submit"
                        class="btn btn-light btn-lg gelion-bold mb-2"> <img width="45px" height="45px"
                            src="{{  asset('/img/icons/whatsapp.svg')  }} " alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="bg-1">
        <div class="container text-center pt-4 espacio-1">
            <h2 class="gelion-bold">{{ __('Tenemos un compromiso con el planeta') }} </h2>
            <p class="gelion-light size mx-5">
                {{ __('Creamos las mejores prendas hechas de materiales 100% reciclados con hilo certificado por Global Recycled Standard.') }}
            </p>
            <div class="row text-center">
                <div class="col-lg-6 col-md-12 col-sm-12 contenido-imagen">
                    @if (session('locale') == 'es')
                    <img src="{{ Storage::url($hombre->image) }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ Storage::url($hombre->image_en) }}" class="img-fluid" alt="">
                    @endif
                    <div class="boton-i">
                        <a href="{{ route('catalogue.index') }}"
                            class="btn btn-primary gelion-bold">{{ __('ORDENAR AHORA') }}</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 contenido-imagen">
                    @if (session('locale') == 'es')
                    <img src="{{ Storage::url($mujer->image) }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ Storage::url($mujer->image_en) }}" class="img-fluid" alt="">
                    @endif
                    <div class="boton-i">
                        <a href="{{ route('catalogue.index') }}"
                            class="btn btn-primary gelion-bold">{{ __('ORDENAR AHORA') }}</a>
                    </div>
                </div>
            </div>
            <div>
                <!--colores-->
                <div class="carousel">
                    <div class="carousel__contenedor">
                        <div class="carousel__lista4">
                            @foreach ($colors as $color)
                            <div class="carousel__elemento m-1">
                                <a href="">
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('catalogue.index', $color->id) }}">
                                                <img src="{{ Storage::url($color->image) }}" class="img-fluid"></a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div role="tabList" class="carousel__indicadores1"></div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <h1 class="gelion-bold">{{ __('Colores que aman la vida') }}</h1>
            <p class="gelion-light size">
                {{ __('Cada color genera un impacto positivo con el medio ambiente ya que nuestro proceso ahorra miles de litros de agua y no utiliza tintes o químicos para teñir.') }}
            </p>

        </div>
    </div>
</section>

<section id="index-blog-1">
    <div class="d-none d-sm-none d-md-none d-lg-block">
        <div class="contenido-blog-index">
            <div class="container desfase">
                <div class="row desfase-1">
                    @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card espacio-5">
                            <img src="{{ Storage::url($post->image->url) }}" class="img-fluid" alt="Myrewear">
                            <h5 class="gelion-bold pt-3">
                                @if (session('locale') == 'es')
                                {{ $post->title }}
                                @else
                                {{ $post->title_en }}
                                @endif
                            </h5>
                            @if (session('locale') == 'es')
                            <p class="gelion-thin">
                                {!! $post->extract !!}
                            </p>
                            @else
                            <p class="gelion-thin">
                                {!! $post->extract_en !!}
                            </p>
                            @endif
                            <a href="{{ route('post.show', $post) }}"
                                class="btn btn-secondary gelion-bold">{{ __('Ver más') }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="desfas">
            <div class="d-block d-sm-block d-md-block d-lg-none">
                <div class="carousel">
                    <div class="carousel__contenedor">
                        <div class="carousel__lista3">
                            @foreach ($posts as $post)
                            <div class="carousel__elemento m-1">
                                <div class=" p-4">
                                    <!--Contenido de ordenes movil-->
                                    <div class="row">
                                        <div class="col">
                                            <!--uno-->
                                            <div class="card espacio-5">
                                                <img src="{{ Storage::url($post->image->url) }}" class="img-fluid"
                                                    alt="Myrewear">
                                                <h5 class="gelion-bold pt-3">
                                                    @if (session('locale') == 'es')
                                                    {{ $post->title }}
                                                    @else
                                                    {{ $post->title_en }}
                                                    @endif
                                                </h5>
                                                @if (session('locale') == 'es')
                                                <p class="gelion-thin">
                                                    {!! $post->extract !!}
                                                </p>
                                                @else
                                                <p class="gelion-thin">
                                                    {!! $post->extract_en !!}
                                                </p>
                                                @endif
                                                <a href="{{ route('post.show', $post) }}"
                                                    class="btn btn-secondary gelion-bold">{{ __('Ver más') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div role="tabList" class="carousel__indicadores1"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="proceso">
    <div class="text-center pt-5 pb-5" style="background: #003057;">
        <div class="container">
            <h1 class="gelion-bold pb-3" style="color: #fff;">
                {!! __("Nosotros lo hicimos posible. <br class='d-none d-sm-none d-md-block d-lg-block'>Algodón
                reciclado + poliéster reciclado") !!}
            </h1>
            @if (session()->get('locale') == 'es')
            <img src="{{ asset('/img/nosotros/proceso.png') }}"
                class="pt-5 pb-5 img-fluid d-none d-sm-none d-md-block d-lg-block" alt="">
            <img src="{{ asset('img/nosotros/Procesos-vertical-(Español).png') }}"
                class="d-block d-sm-block d-md-none d-lg-none img-fluid" alt="">
            @else
            <img src="{{ asset('/img/nosotros/Procesos-(Inglés).png') }}"
                class="pt-5 pb-5 img-fluid d-none d-sm-none d-md-block d-lg-block" alt="">
            <img src="{{ asset('img/nosotros/Procesos-vertical-(Inglés).png') }}"
                class="d-block d-sm-block d-md-none d-lg-none img-fluid" alt="">
            @endif
        </div>
    </div>
</section>

<section id="certificados">
    <div class="bg-amarillo3">
        <div class="container text-center pt-5">
            <h2 class="gelion-bold">{{ __('Muchas camisetas, mucho amor por el planeta.') }}<br>
                <span class="gelion-regular size-2">{{ __('Nuestros ahorros cada año.') }}</span>
            </h2>
            <div class="d-none d-sm-none d-md-block d-lg-block">
                <div class="row pt-4">
                    <div class="col">
                        <img src="{{ asset('/img/nosotros/Rectangle 214.png') }}" class="img-fluid" alt="">
                        <h3 class=" gelion-bold line-h pt-3">{{ __('5.99 Millones') }}<br>
                            <span class="gelion-regular size-3">{{ __('de litros de agua ahorrados al año') }}</span>
                        </h3>
                    </div>
                    <div class="col">
                        <img src="{{ asset('/img/nosotros/Rectangle 215.png') }}" class="img-fluid" alt="">
                        <h3 class=" gelion-bold line-h pt-3">{{ __('3.75 Millones') }}<br>
                            <span
                                class="gelion-regular size-3">{{ __('de Kg de residuos textiles transformados en algodón') }}</span>
                        </h3>
                    </div>
                    <div class="col">
                        <img src="{{ asset('/img/nosotros/Rectangle 216.png') }}" class="img-fluid" alt="">
                        <h3 class="gelion-bold line-h pt-3">{{ __('4.2 Millones') }} <br>
                            <span class="gelion-regular size-3">{{ __('de botellas de plástico PET reciclado') }}</span>
                        </h3>
                    </div>
                    <div class="col">
                        <img src="{{ asset('/img/nosotros/Rectangle 217.png') }}" class="img-fluid" alt="">
                        <h3 class="gelion-bold line-h pt-3">{{ __('157 Millones') }} <br>
                            <span
                                class="gelion-regular size-3">{{ __('de kWh energía ahorrada en nuestros procesos') }}</span>
                        </h3>
                    </div>
                    <div class="col">
                        <img src="{{ asset('/img/nosotros/Rectangle 218.png') }}" class="img-fluid" alt="">
                        <h3 class="gelion-bold line-h pt-3">{{ __('0 Químicos') }} <br>
                            <span
                                class="gelion-regular size-3">{{ __('ni tintes vertidos al subsuelo en nuestro proceso') }}</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="d-block d-sm-block d-md-none d-lg-none">
                <!--movil-->
                <div class="carousel">
                    <div class="carousel__contenedor">
                        <div class="carousel__lista">
                            <div class="carousel__elemento m-1">
                                <div class="p-4">
                                    <!--Contenido de ordenes movil-->
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('/img/nosotros/Rectangle 214.png') }}" class="img-fluid"
                                                alt="">
                                            <h3 class="gelion-bold line-h pt-3">{{ __('5.99 Millones') }} <br>
                                            </h3>
                                            <p class="gelion-regular">{{ __('de litros de agua ahorrados al año') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrusel__elemento m-1">
                                <div class="p-4">
                                    <!--Contenido de ordenes movil-->
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('/img/nosotros/Rectangle 215.png') }}" class="img-fluid"
                                                alt="">
                                            <h3 class="gelion-bold line-h pt-3">{{ __('3.75 Millones') }} <br>
                                            </h3>
                                            <p class="gelion-regular">
                                                {{ __('de Kg de residuos textiles transformados en algodón') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrusel__elemento m-1">
                                <div class="p-4">
                                    <!--Contenido de ordenes movil-->
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('/img/nosotros/Rectangle 216.png') }}" class="img-fluid"
                                                alt="">
                                            <h3 class="gelion-bold line-h pt-3">{{ __('4.2 Millones') }} <br>
                                            </h3>
                                            <p class="gelion-regular">
                                                {{ __('de botellas de plástico PET reciclado') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrusel__elemento m-1">
                                <div class="p-4">
                                    <!--Contenido de ordenes movil-->
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('/img/nosotros/Rectangle 217.png') }}" class="img-fluid"
                                                alt="">
                                            <h3 class="gelion-bold line-h pt-3">{{ __('157 Millones') }} <br>
                                            </h3>
                                            <p class="gelion-regular">
                                                {{ __('de kWh energía ahorrada en nuestros procesos') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrusel__elemento m-1">
                                <div class="p-4">
                                    <!--Contenido de ordenes movil-->
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('/img/nosotros/Rectangle 218.png') }}" class="img-fluid"
                                                alt="">
                                            <h3 class="gelion-bold line-h pt-3">{{ __('0 Químicos') }} <br>
                                            </h3>
                                            <p class="gelion-regular">
                                                {{ __('ni tintes vertidos al subsuelo en nuestro proceso') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabList" class="carousel__indicadores1"></div>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-lg-7 col-md-12 col-sm-12 left-o">
                    <h2 class="gelion-bold">{!! __("Nuestra calidad la respaldamos <br
                            class='d-none d-sm-none d-md-block d-lg-block'> con las mejores certificaciones") !!} </h2>
                    {{-- <p class="gelio-regular">El hilo con el que creamos nuestras prendas está certiicado por:</p> --}}
                </div>
                <div class="col-lg-5 col-md-12 text-center col-sm-12">
                    <img src="{{ asset('/img/nosotros/Certificados/sedex.jpeg') }}" width="250px" height="250px"
                        class="img-fluid d-none d-sm-none d-md-none d-lg-block" alt="Sedex">
                    <div class="d-block d-sm-block d-md-block d-lg-none">
                        <div class="text-center">
                            <img src="{{ asset('/img/nosotros/Certificados/sedex.jpeg') }}" width="250px" height="250px"
                                class="img-fluid d-none d-sm-none d-md-none d-lg-block" alt="Sedex">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contacto">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-6 col-md-6 col-sm-12 m-auto botella left">
                <h4 class="gelion-bold">{{ __('Trabajando juntos hacemos grandes cambios') }}</h4>
                <p class="gelion-light">
                    {{ __('Si perteneces a una asociación o grupo que apoya al medio ambiente, podemos apoyarte y generar acciones en conjunto.') }}
                </p>
                <a href="{{ route('contact') }}" class="btn btn-secondary">{{ __('Contáctanos') }}</a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 m-auto right">
                <iframe class="w-100" width="350px" height="250px" src="https://www.youtube.com/embed/BARh_kEOHGs"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
@endsection