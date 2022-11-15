<div class="row">
    <div class="col-lg-7 col-md-12 col-sm-12 espacio-pr">
        <div class="d-none d-sm-none d-md-none d-lg-block">
            <div class="row boton-producto" wire:ignore>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    @foreach ($images as $image)
                        @if ($image->main != 'si')
                            <div class="lateral @if ($loop->iteration != 1) btn-pad @endif">
                                <button type="button" id="i-{{ $loop->iteration }}">
                                    <img src="{{ Storage::url($image->url) }}" class="fill" alt="">
                                </button>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12">
                    @foreach ($images as $image)
                        @if ($image->main != 'si')
                            <div class="principal" id="p{{ $loop->iteration }}">
                                <img src="{{ Storage::url($image->url) }}" class="fill" alt="">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!--Movil images-->
        <div class="d-block d-sm-block d-md-block d-lg-none" wire:ignore>
            <!--movil-->
            <div class="carousel">
                <div class="carousel__contenedor">
                    <div class="carousel__lista text-center">
                        @foreach ($product->images as $image)
                            @if ($image->main != 'si')
                                <div class="carousel__elemento m-1">
                                    <img src="{{ Storage::url($image->url) }}" class="img-fluid" alt="">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div role="tabList" class="carousel__indicadores1"></div>
            </div>
        </div>
        <!--Movil images-->
    </div>
    <div class="col-lg-5 col-md-12 col-sm-12">
        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible fade show " role="alert">
                {!! session('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h1 class="gelion-bold">
            @if (session('locale') == 'es')
                {{ $product->name }}
            @else
                {{ $product->name_en }}
            @endif
        </h1>
        <li class="gelion-bold pt-3">
            <p><img src="/img/catalogo/hoja-1.svg" alt="Producto ecológico">
                <span class="pl-2 m-auto">
                    {{ __('50% algodón reciclado, 50% poliéster reciclado.') }}
                </span>
            </p>
        </li>

        <p class="gelion-thin" style="color: gray;">
            {{-- @if (session('locale') == 'es')
                {!! $product->description !!}
            @else
                {!! $product->description_en !!}
            @endif --}}
        </p>
        <li class="gelion-bold pt-2">
            <div class="row">
                <div class="col">
                    {{ __('Medidas del modelo:') }}
                </div>
                <div class="col-8 gelion-thin">
                    @if (session('locale') == 'es')
                        {{ $product->measure }}
                    @else
                        {{ $product->measure_en }}
                    @endif
                </div>
            </div>
        </li>
        <li class="gelion-bold pt-3">
            <div class="row">
                <div class="col">
                    {{ __('Talla del modelo:') }}
                </div>
                <div class="col-8 gelion-thin">
                    @if (session('locale') == 'es')
                        {{ $product->size }}
                    @else
                        {{ $product->size_en }}
                    @endif
                </div>
            </div>
        </li>
        <li class="gelion-bold pt-3">
            <div class="row">
                <div class="col m-auto">
                    {{ __('Color disponible') }}
                    {{-- {{ var_dump($color_id) }} --}}
                </div>
                <div class="col-8 gelion-thin">
                    <div class="btn-group">
                        <span>{{ __($product->colors->first()->name) }}</span> <span class="ml-3"><a
                                href="{{ route('catalogue.index') }}"
                                style="color:#000;">{{ __('Ver más colores') }}</a></span>
                        {{-- <select wire:model="color_id" class="form-control form-control-sm">
                            <option value="" disabled selected>{{ __('Selecciones un color') }}</option>
                            @foreach ($product->colors as $color)
                                <option class="text-capitalize" value="{{ $color->pivot->id }}">
                                    {{ __($color->name) }}
                                </option>
                            @endforeach
                        </select> --}}
                    </div>
                </div>
            </div>
        </li>
        <li class="gelion-bol pt-3 sizes gelion-regular">
            <div class="btn-group btn-group-toggle" data-toggle="buttons" wire:ignore>
                @foreach ($product->sizes as $size)
                    <label class="btn btn-outline-dark">
                        <input type="radio" wire:model="size_id" name="sizes" value="{{ $size->pivot->id }}">
                        {{ $size->code }}
                    </label>
                @endforeach
            </div>
        </li>
        <li class="gelion-bold pt-3 text-left productos-carrito">
            <div class="row pb-2">
                <div class="col-1">
                    <div
                        style="background-color: {{ $product->colors->first()->bgcolor }}; height: 30px; width: 30px; border-radius: 30px;">
                        <span class="icon-hoja-productorewear ico-xs"
                            style="color: {{ $product->colors->first()->txtcolor }};"></span>
                    </div>
                </div>
                <div class="col m-auto">
                    <div id="productos-carrito">
                        <input id="menos" type="button" value="-" wire:click="decrement">
                        <input id="cantidad" type="text" name="amount" disabled value="{{ $qty }}">
                        <input id="mas" type="button" value="+" wire:click="increment">
                    </div>
                    <small class="gelion-regular">{{ __('* Se agregarán en múltipos de 6') }}</small>
                </div>

                <div class="col-12 mt-3">

                    @switch(session()->get('caja'))
                        @case(1)
                            <div class="alert alert-warning">
                                <small>Faltan {{ 72 - Cart::instance('caja1')->count() }} prendas para completar tu primera
                                    caja.</small>
                            </div>
                        @break

                        @case(2)
                            @if (session()->get('plan') == 2 || session()->get('plan') == 3)
                                <div class="alert alert-warning">
                                    <small>Faltan {{ 72 - Cart::instance('caja2')->count() }} prendas para completar
                                        tu
                                        caja número 2.</small>
                                </div>
                            @else
                                <div class="alert alert-success">
                                    <small>Caja completas, puedes expandir tu plan <strong><a
                                                href="/planes">Aqui</a></strong></small>
                                </div>
                            @endif
                        @break

                        @case(3)
                            <div class="alert alert-warning">
                                <small>Faltan {{ 72 - Cart::instance('caja3')->count() }} prendas para completar tu
                                    caja número 3.</small>
                            </div>
                        @break

                        @case(4)
                            @if (session()->get('plan') == 3)
                                <div class="alert alert-warning">
                                    <small>Faltan {{ 72 - Cart::instance('caja4')->count() }} prendas para completar
                                        tu
                                        caja número 4.</small>
                                </div>
                            @else
                                <div class="alert alert-success">
                                    <small>Cajas completas, puedes expandir tu plan <strong><a
                                                href="/planes">Aqui</a></strong></small>
                                </div>
                            @endif
                        @break

                        @case(5)
                            <div class="alert alert-warning">
                                <small>Faltan {{ 72 - Cart::instance('caja5')->count() }} prendas para completar tu
                                    caja número 5.</small>
                            </div>
                        @break

                        @case(6)
                            <div class="alert alert-warning">
                                <small>Faltan {{ 72 - Cart::instance('caja6')->count() }} prendas para completar tu
                                    caja número 6.</small>
                            </div>
                        @break

                        @case(7)
                            <div class="alert alert-warning">
                                <small>Faltan {{ 72 - Cart::instance('caja7')->count() }} prendas para completar tu
                                    caja número 7.</small>
                            </div>
                        @break

                        @case(8)
                            <div class="alert alert-warning">
                                <small>Faltan {{ 72 - Cart::instance('caja8')->count() }} prendas para completar tu
                                    caja número 8.</small>
                            </div>
                        @break

                        @case(9)
                            <div class="alert alert-warning">
                                <small>Faltan {{ 72 - Cart::instance('caja9')->count() }} prendas para completar tu
                                    caja número 9.</small>
                            </div>
                        @break

                        @case(10)
                            <div class="alert alert-warning">
                                <small>Faltan {{ 72 - Cart::instance('caja10')->count() }} prendas para completar tu
                                    caja número 10.</small>
                            </div>
                        @break

                        @default
                    @endswitch
                </div>
            </div>
        </li>
        <li class="gelion-bold">
            @if (session('locale') == 'es')
                <a href="{{ asset('pdfs/Catálogo_Rewear_ESP_2021.pdf') }}" download="Catálogo_Rewear_ESP_2021.pdf"
                    style="color: #000; text-decoration: none;">{{ __('Descargar PDF') }}</a>
            @else
                <a href="{{ asset('pdfs/Catálogo_Rewear_ENG_2021.pdf') }}" download="Catálogo_Rewear_ENG_2021.pdf"
                    style="color: #000; text-decoration: none;">{{ __('Descargar PDF') }}</a>
            @endif
        </li>
        <li class="gelion-bold pt-3">
            <div class="row">
                <div class="col">
                    <button wire:click="addItems" class="btn btn-secondary"
                        @if (!($color_id && $size_id)) disabled @endif>
                        {{ __('Agregar prenda') }}
                    </button>
                </div>
                <div class="col gelion-bold m-auto">
                    {{-- <a href="" style="color: #000; text-decoration: none;"> {{ __('Tabla de medidas') }}</a> --}}
                    @if ($product->subcategory->name == 'Corta' || $product->subcategory->name == 'corta')
                        @if (session('locale') == 'es')
                            <a style="color: #000; text-decoration: none;" data-toggle="modal"
                                data-target="#exampleModal">
                                {{ __('Tabla de medidas') }}
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('tablas/tabla-esp.jpg') }}" class="w-100"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a style="color: #000; text-decoration: none;" data-toggle="modal"
                                data-target="#exampleModal">
                                {{ __('Tabla de medidas') }}
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('tablas/table-eng.jpg') }}" class="w-100"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            <small
                class="gelion-regular">{{ __('* Debes seleccionar un color y talla para poder agregar a tu cesta') }}</small>
        </li>
        <li class="gelion-bold pt-1">
            {{ __('Compartir:') }}
            <div class="row pt-2">
                <div class="col-12">
                    @if (session('locale') == 'es')
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//myrewear.com/catalogo-producto/{{ $product->slug }}"
                            target="_blank" class="btn btn-outline-dark m-auto pr-4 pl-4">
                            <i class="fab fa-facebook-f pb-1 pr-2"></i>Facebook
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ $product->name }}%C2%A0https%3A//myrewear.com/catalogo-producto/{{ $product->slug }}"
                            target="_blank" class="btn btn-outline-dark m-auto pr-4 pl-4">
                            <i class="fab fa-whatsapp pb-1 pr-2"></i>Whatsapp
                        </a>
                    @else
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//myrewear.com/catalogo-producto/{{ $product->slug_en }}"
                            target="_blank" class="btn btn-outline-dark m-auto pr-4 pl-4">
                            <i class="fab fa-facebook-f pb-1 pr-2"></i>Facebook
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ $product->name_en }}%C2%A0https%3A//myrewear.com/catalogo-producto/{{ $product->slug_en }}"
                            target="_blank" class="btn btn-outline-dark m-auto pr-4 pl-4">
                            <i class="fab fa-whatsapp pb-1 pr-2"></i>Whatsapp
                        </a>
                    @endif
                </div>
            </div>
        </li>
        <li class="pt-4">
            <img src="{{ asset('/img/catalogo/Etiqueta-de-lavado.png') }}" class="img-fluid" alt="">
        </li>
    </div>
</div>
