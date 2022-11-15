<div>
    <div class="container">
        <section id="planes">
            <div class="bg-2">
                <div class="mt-4" style="padding-bottom: 10px">
                    <!--bg-azul-->
                    <div class="container">
                        <!--Planes-->
                        <div class="d-none d-sm-none d-md-block d-lg-block" id="planes">
                            <div class="row pt-5 espacio-4">
                                @foreach ($plans as $plan)
                                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                                    <!--uno-->
                                    <div class="card espacio-1 bg-3 text-white" style="height:21rem">
                                        <h4 class="gelion-bold espacio-2">
                                            <div class="icon pt-2 pb-3 float-right">
                                                <img src="{{ asset('/img/icons/caja_blanco.png') }}" width="50"
                                                    alt="icono box" class="float-left">
                                            </div>
                                            @if (session()->get('divisa') == 'MXN')
                                            <span class="badge badge-warning">${{ $plan->MXN }} MXN |
                                                ${{ $plan->MXN_L }} MXN</span>
                                            <br>
                                            <small>{{ __('Manga corta | Manga larga') }}</small>
                                            @else
                                            <span class="badge badge-warning">${{ $plan->USD }} USD |
                                                ${{ $plan->USD_L }}</span>
                                            <br>
                                            <small>{{ __('Manga corta | Manga larga') }}</small>
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
                                        </h4>
                                        <h2 class="gelion-bold">
                                            {{ $plan->name }}
                                            @switch($plan->id)
                                            @case(1)
                                            @break
                                            @case(2)
                                            @break
                                            @case(3)
                                            @break
                                            @endswitch
                                        </h2>
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
                                                    <br />
                                                    <br />
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
                                                    <span class="badge badge-success" style="font-size: 15px">
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
                                        </li>
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
                                        <div class="carousel__elemento m-1 bg-3">
                                            <div class="p-4">
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
                                                                <small> <span class="badge badge-secondary">
                                                                        {{ __('Manga corta / Manga larga') }} </span>
                                                                </small>
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
                                                                        {!!__('2 cajas (144 camisetas)<br> o 3 cajas (216 camisetas).') !!}
                                                                        @break
                                                                        @case(3)
                                                                        {!! __('4 cajas (288 camisetas)<br> o las que necesites') !!}
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
    </div>
    <div class="content" style="padding-top: 0em;">
        <div class="container">
            <div class="d-none d-sm-none d-md-none d-lg-block">
                <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <!--filtros-->
                        <div class="control-box p-3">
                            <div class="filtro">
                                <!--Filtro-->
                                <p class="gelion-bold">{{ __('CORTE') }}</p>
                                @foreach ($categories as $category)
                                <div class="form-group d-flex justify-center">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" wire:model="category_id"
                                                wire:click="getSubcategories" type="radio" name="categories-1"
                                                value="{{ $category->id }}">
                                            {{ __($category->name) }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="filtro">
                                <!--Filtro-->
                                <p class="gelion-bold">{{ __('TIPO DE MANGA') }}</p>
                                @foreach ($subcategories as $subcategory)
                                <div class="form-group d-flex justify-center">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="subcategories-1"
                                                wire:model="subcategory_id" value="{{ $subcategory->id }}">
                                            {{ __($subcategory->name) }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="filtro">
                                <!--Filtro-->
                                <p class="gelion-bold">{{ __('COLORES') }}</p>
                                @foreach ($colors as $color)
                                <div class="form-group d-flex justify-center">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="colors-1"
                                                wire:model="color_id" value="{{ $color->id }}">
                                            <div class="text-center m-auto">
                                                <div
                                                    style="background-color: {{ $color->bgcolor }}; height: 23px; border-style: solid; border-width: thin; border-color:#000; width: 23px; border-radius: 23px;">
                                                    <span class="icon-hoja-productorewear ico-sm"
                                                        style="color: {{ $color->txtcolor }};"></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="filtro">
                                <!--Filtro-->
                                <p class="gelion-bold">{{ __('TALLAS') }}</p>
                                @foreach ($sizes as $size)
                                <div class="form-group d-flex justify-center">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="sizes-1"
                                                wire:model="size_id" value="{{ $size->id }}">
                                            {{ $size->code }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="filtro">
                                <!--Filtro-->
                                <button wire:click="filter" class="btn btn-secondary">
                                    {{ __('Filtrar') }}
                                </button>
                                <button wire:click="filterClean" class="btn btn-outline-danger btn-sm mt-2">
                                    {{ __('Limpiar') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-12 col-sm-12">
                        <div class="control-box p-2 breadcrumb">
                            <!-- TODO : insertar planes -->

                        </div>
                        <div class="control-box p-3 main-content">
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                                    <div class="card espacio-card">
                                        <div class="contenedor">
                                            @foreach ($product->images as $image)
                                            @if ($image->main == 'si')
                                            <a href="{{ route('catalogue.product', $product) }}">
                                                <img src="{{ Storage::url($image->url) }}"
                                                    class="@if ($loop->iteration != 1) top @endif fill"
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
                                        <li class="gelion-bold">
                                            {{-- @if (session('locale') == 'es')
                                                    {!! $product->description !!}
                                                @else
                                                    {!! $product->description_en !!}
                                                @endif --}}
                                        </li>
                                        <li class="gelion-thin">{{ __('Medidas del modelo:') }}
                                            @if (session('locale') == 'es')
                                            <span>{{ $product->measure }}</span>
                                            @else
                                            <span>{{ $product->measure_en }}</span>
                                            @endif
                                        </li>
                                        </li>
                                        <li class="gelion-thin">Fit: {{ __($product->subcategory->name) }}</li>
                                        <div class="pt-3 d-flex">
                                            <div class="hoja">
                                                <img src="{{ asset('/img/catalogo/rewear.svg') }}" alt="">
                                            </div>
                                        </div>
                                        {{-- <div class="pt-3 d-flex">
                                                @foreach ($product->colors as $color)
                                                    <div style="background-color: {{ $color->bgcolor }}; height: 23px;
                                        border-style: solid; border-width: thin; border-color:#000; width: 23px;
                                        border-radius: 23px;"
                                        class="mr-1">
                                        <span class="icon-hoja-productorewear ico-sm"
                                            style="color: {{ $color->txtcolor }};"></span>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="pt-3 d-flex">
                                    @foreach ($product->sizes as $size)
                                    <div class="mr-2">
                                        {{ $size->code }} @if (!$loop->last)
                                        -
                                        @endif
                                    </div>
                                    @endforeach
                                </div> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="d-none d-sm-none d-md-block d-lg-none">
        <!--Producto MD-->
        <div class="col-12 pb-4">
            <img src="{{ asset('/img/catalogo/cabecera.png') }}" class="img-fluid" alt="">
        </div>
        <div class="row">
            <div class="col-md-3 fixed">
                <div class="control-box p-3">
                    <div class="filtro">
                        <!--Filtro-->
                        <p class="gelion-bold">{{ __('FIT') }}</p>
                        @foreach ($categories as $category)
                        <div class="form-group d-flex justify-center">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" wire:model="category_id"
                                        wire:click="getSubcategories" type="radio" name="categories"
                                        value="{{ $category->id }}">
                                    {{ __($category->name) }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="filtro">
                        <!--Filtro-->
                        <p class="gelion-bold">{{ __('TIPO DE MANGA') }}</p>
                        @foreach ($subcategories as $subcategory)
                        <div class="form-group d-flex justify-center">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="subcategories"
                                        wire:model="subcategory_id" value="{{ $subcategory->id }}">
                                    {{ __($subcategory->name) }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="filtro">
                        <!--Filtro-->
                        <p class="gelion-bold">{{ __('COLORES') }}</p>
                        @foreach ($colors as $color)
                        <div class="form-group d-flex justify-center">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="colors" wire:model="color_id"
                                        value="{{ $color->id }}">
                                    <div class="text-center m-auto">
                                        <div
                                            style="background-color: {{ $color->bgcolor }}; height: 23px; border-style: solid; border-width: thin; border-color:#000; width: 23px; border-radius: 23px;">
                                            <span class="icon-hoja-productorewear ico-sm"
                                                style="color: {{ $color->txtcolor }};"></span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="filtro">
                        <!--Filtro-->
                        <p class="gelion-bold">{{ __('TALLAS') }}</p>
                        @foreach ($sizes as $size)
                        <div class="form-group d-flex justify-center">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="sizes" wire:model="size_id"
                                        value="{{ $size->id }}">
                                    {{ $size->code }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="filtro">
                        <!--Filtro-->
                        <button wire:click="filter" class="btn btn-se">
                            {{__('Filtrar')}}
                        </button>
                        <button wire:click="filterClean" class="btn btn-outline-danger btn-sm mt-2">
                            {{__('Limpiar')}}
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-6 mt-2">
                        <div class="card espacio-card">
                            <div class="contenedor-7">
                                @foreach ($product->images as $image)
                                @if ($image->main == 'si')
                                <a href="{{ route('catalogue.product', $product) }}">
                                    <img src="{{ Storage::url($image->url) }}"
                                        class="@if ($loop->iteration != 1) top @endif fill"
                                        alt="Productos del catálogo">
                                </a>
                                @endif
                                @endforeach
                            </div>

                            <a href="{{ route('catalogue.product', $product) }}"
                                style="color: #000; text-decoration: none;">
                                <h5 class="gelion-bold pt-2 size-product-1">
                                    @if (session('locale') == 'es')
                                    {{ $product->name }}
                                    @else
                                    {{ $product->name_en }}
                                    @endif
                                </h5>
                            </a>
                            <li class="gelion-bold">
                                {{-- @if (session('locale') == 'es')
                                                {!! $product->description !!}
                                            @else
                                                {!! $product->description_en !!}
                                            @endif --}}
                            </li>
                            <li class="gelion-thin">{{__('Peso de tela: ')}}
                                @if (session('locale') == 'es')
                                <span>{{ $product->measure }}</span>
                                @else
                                <span>{{ $product->measure_en }}</span>
                                @endif
                            </li>
                            <li class="gelion-thin">{{__('Fit: ')}} {{ __($product->subcategory->name) }}</li>
                            <div class="pt-3 d-flex">
                                <div class="hoja">
                                    <img src="{{ asset('/img/catalogo/rewear.svg') }}" alt="">
                                </div>
                            </div>
                            {{-- <div class="pt-3 d-flex">
                                            @foreach ($product->colors as $color)
                                                <div style="background-color: {{ $color->bgcolor }}; height: 23px;
                            border-style: solid; border-width: thin; border-color:#000; width: 23px; border-radius:
                            23px;"
                            class="mr-1">
                            <span class="icon-hoja-productorewear ico-sm" style="color: {{ $color->txtcolor }};"></span>
                        </div>
                        @endforeach
                    </div>
                    <div class="pt-3 d-flex">
                        @foreach ($product->sizes as $size)
                        <div class="mr-2">
                            {{ $size->code }} @if (!$loop->last)
                            -
                            @endif
                        </div>
                        @endforeach
                    </div> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<div class="d-block d-sm-block d-md-none d-lg-none">
    <!--Producto SM-->
    <div class="row">
        <div class="col-sm-6 pt-4">
            <div class="row mb-2">
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
                        <a href="" style="color: #000; text-decoration: none;">
                            <h5 class="gelion-bold pt-2">
                                @if (session('locale') == 'es')
                                {{ $product->name }}
                                @else
                                {{ $product->name_en }}
                                @endif
                            </h5>
                        </a>
                        <li class="gelion-thin size-product">
                            {{-- @if (session('locale') == 'es')
                                                {!! $product->description !!}
                                            @else
                                                {!! $product->description_en !!}
                                            @endif --}}
                        </li>
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
</div>
</div>