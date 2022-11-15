<div class="container">
    <div class="d-block d-sm-block d-md-block d-lg-block">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 pt-2">
                <div class="card p-4">
                    <div class="d-none d-sm-none col-md-block d-lg-block">
                        <div class="row">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-lg-2 col-md-1 col-sm-12 text-right">
                                        <img src="{{ asset('/img/index/box.svg') }}" width="65" alt="">
                                    </div>
                                    <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                        <li class="gelion-bold">{{ __($plan->name) }}
                                            @switch($plan->id)
                                                @case(1)
                                                    72 {{ __('piezas') }}
                                                @break
                                                @case(2)
                                                    144 ó 216 {{ __('piezas') }} (Caja opcional)
                                                @break
                                                @case(3)
                                                    288 {{ __('piezas') }}
                                                @break

                                            @endswitch
                                        </li>
                                        <li class="gelion-thin">{{ __('Faltan') }} @switch(session()->get('plan'))
                                                @case(1)
                                                    {{ 72 - Cart::instance('caja1')->count() }}
                                                @break
                                                @case(2)
                                                    {{ 144 - (Cart::instance('caja1')->count() + Cart::instance('caja2')->count()) }}
                                                @break
                                                @case(3)
                                                    {{ 288 - (Cart::instance('caja1')->count() + Cart::instance('caja2')->count()+ Cart::instance('caja3')->count()+ Cart::instance('caja4')->count()) }}
                                                @break
                                                @default

                                            @endswitch
                                            {{ __('piezas para completar') }}
                                        </li>
                                        <li></li>
                                    </div>
                                </div>
                            </div>
                            <div class="col text-center">
                                <li class="gelion-bold size-2">{{ __('Paso 1 de 2') }}</li>
                                <li class="gelion-thin"><a wire:click="empty"
                                        style="color: #000; text-decoration: none; cursor: pointer;">{{ __('Vaciar cesta') }}</a>
                                </li>
                            </div>
                        </div>
                    </div>

                    @if (Cart::instance('caja1')->count() || Cart::instance('caja2')->count() || Cart::instance('caja3')->count() || Cart::instance('caja4')->count()|| Cart::instance('caja5')->count()|| Cart::instance('caja6')->count()|| Cart::instance('caja7')->count()|| Cart::instance('caja8')->count()|| Cart::instance('caja9')->count()|| Cart::instance('caja10')->count())
                        <div class="table-responsive">
                            <table class="table mt-4 table-borderless">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">{{ __('Producto') }}</th>
                                        <th scope="col">{{ __('Fit') }}</th>
                                        <th scope="col">{{ __('Cantidad') }}</th>
                                        <th scope="col">{{ __('Color') }}</th>
                                        <th scope="col">{{ __('Talla') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @switch(session()->get('plan'))
                                        @case(1)
                                            @foreach (Cart::instance('caja1')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item', ['rowId' => $item->rowId],
                                                            key($item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @break
                                        @case(2)
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                            <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                Caja 1
                                                            </li>
                                                        </div>
                                                        <span>
                                                            <a class="size-2 gelion-thin"
                                                                style="text-decoration: none; color: #000; cursor: pointer"
                                                                wire:click="destroy(1)">{{ __('Eliminar') }}</a>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @foreach (Cart::instance('caja1')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item', ['rowId' => $item->rowId],
                                                            key('update-cart-item'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (Cart::instance('caja2')->count())
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                                <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                    Caja 2
                                                                </li>
                                                            </div>
                                                            <span>
                                                                <a class="size-2 gelion-thin"
                                                                    style="text-decoration: none; color: #000; cursor: pointer"
                                                                    wire:click="destroy(2)">{{ __('Eliminar') }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @foreach (Cart::instance('caja2')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete2('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item2', ['rowId' => $item->rowId],
                                                            key('update-cart-item2'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (Cart::instance('caja3')->count())
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                                <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                    Caja 3 (Opcional)
                                                                </li>
                                                            </div>
                                                            <span>
                                                                <a class="size-2 gelion-thin"
                                                                    style="text-decoration: none; color: #000; cursor: pointer"
                                                                    wire:click="destroy(3)">{{ __('Eliminar') }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @foreach (Cart::instance('caja3')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete3('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item3', ['rowId' => $item->rowId],
                                                            key('update-cart-item3'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @break
                                        @case(3)
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                            <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                Caja 1
                                                            </li>
                                                        </div>
                                                        <span>
                                                            <a class="size-2 gelion-thin"
                                                                style="text-decoration: none; color: #000; cursor: pointer"
                                                                wire:click="destroy(1)">{{ __('Eliminar') }}</a>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @foreach (Cart::instance('caja1')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item', ['rowId' => $item->rowId],
                                                            key('update-cart-item'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (Cart::instance('caja2')->count())
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                                <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                    Caja 2
                                                                </li>
                                                            </div>
                                                            <span>
                                                                <a class="size-1 gelion-thin"
                                                                    style="text-decoration: none; color: #000; cursor: pointer"
                                                                    wire:click="destroy(2)">{{ __('Eliminar') }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @foreach (Cart::instance('caja2')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete2('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item2', ['rowId' => $item->rowId],
                                                            key('update-cart-item2'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (Cart::instance('caja3')->count())
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                                <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                    Caja 3
                                                                </li>
                                                            </div>
                                                            <span>
                                                                <a class="size-1 gelion-thin"
                                                                    style="text-decoration: none; color: #000; cursor: pointer"
                                                                    wire:click="destroy(3)">{{ __('Eliminar') }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @foreach (Cart::instance('caja3')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete3('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item3', ['rowId' => $item->rowId],
                                                            key('update-cart-item3'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (Cart::instance('caja4')->count())
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                                <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                    Caja 4
                                                                </li>
                                                            </div>
                                                            <span>
                                                                <a class="size-1 gelion-thin"
                                                                    style="text-decoration: none; color: #000; cursor: pointer"
                                                                    wire:click="destroy(4)">{{ __('Eliminar') }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @foreach (Cart::instance('caja4')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete4('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item4', ['rowId' => $item->rowId],
                                                            key('update-cart-item4'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (Cart::instance('caja5')->count())
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                                <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                    Caja 5
                                                                </li>
                                                            </div>
                                                            <span>
                                                                <a class="size-1 gelion-thin"
                                                                    style="text-decoration: none; color: #000; cursor: pointer"
                                                                    wire:click="destroy(5)">{{ __('Eliminar') }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @foreach (Cart::instance('caja5')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete5('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item5', ['rowId' => $item->rowId],
                                                            key('update-cart-item5'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (Cart::instance('caja6')->count())
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                                <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                    Caja 6
                                                                </li>
                                                            </div>
                                                            <span>
                                                                <a class="size-1 gelion-thin"
                                                                    style="text-decoration: none; color: #000; cursor: pointer"
                                                                    wire:click="destroy(6)">{{ __('Eliminar') }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @foreach (Cart::instance('caja6')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete6('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item6', ['rowId' => $item->rowId],
                                                            key('update-cart-item6'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (Cart::instance('caja7')->count())
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                                <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                    Caja 7
                                                                </li>
                                                            </div>
                                                            <span>
                                                                <a class="size-1 gelion-thin"
                                                                    style="text-decoration: none; color: #000; cursor: pointer"
                                                                    wire:click="destroy(7)">{{ __('Eliminar') }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @foreach (Cart::instance('caja7')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete7('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item7', ['rowId' => $item->rowId],
                                                            key('update-cart-item7'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (Cart::instance('caja8')->count())
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                                <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                    Caja 8
                                                                </li>
                                                            </div>
                                                            <span>
                                                                <a class="size-1 gelion-thin"
                                                                    style="text-decoration: none; color: #000; cursor: pointer"
                                                                    wire:click="destroy(8)">{{ __('Eliminar') }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @foreach (Cart::instance('caja8')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete8('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item8', ['rowId' => $item->rowId],
                                                            key('update-cart-item8'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (Cart::instance('caja9')->count())
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                                <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                    Caja 9
                                                                </li>
                                                            </div>
                                                            <span>
                                                                <a class="size-1 gelion-thin"
                                                                    style="text-decoration: none; color: #000; cursor: pointer"
                                                                    wire:click="destroy(9)">{{ __('Eliminar') }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @foreach (Cart::instance('caja9')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete9('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item9', ['rowId' => $item->rowId],
                                                            key('update-cart-item9'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (Cart::instance('caja10')->count())
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-11 col-sm-12 m-auto ">
                                                                <li class="gelion-bold">Paquete {{ $plan->name }}
                                                                    Caja 10
                                                                </li>
                                                            </div>
                                                            <span>
                                                                <a class="size-1 gelion-thin"
                                                                    style="text-decoration: none; color: #000; cursor: pointer"
                                                                    wire:click="destroy(10)">{{ __('Eliminar') }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @foreach (Cart::instance('caja10')->content() as $item)
                                                <tr class="text-center">
                                                    <!--producto-->
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-6" id="cesta">
                                                                <img src="{{ $item->options->image }}"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-6 text-left m-auto pt-2">
                                                                <p class="gelion-bold size-3 ml-3">
                                                                    @if (session('locale') == 'es')
                                                                        {{ $item->name }}
                                                                    @else
                                                                        {{ $item->options->name_en }}
                                                                    @endif
                                                                    <br>
                                                                    <span>
                                                                        @if ($item->options->manga == 'corta' || $item->options->manga == 'Corta')
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD }}
                                                                                @break
                                                                            @endswitch
                                                                        @else
                                                                            @switch(session('divisa'))
                                                                                @case('MXN')
                                                                                    ${{ $plan->MXN_L }}
                                                                                @break
                                                                                @case('USD')
                                                                                    ${{ $plan->USD_L }}
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                        {{ __('x pieza') }}
                                                                    </span>
                                                                    <br>
                                                                    <span>
                                                                        <a wire:click="delete10('{{ $item->rowId }}')"
                                                                            class="size-2 gelion-thin"
                                                                            style="text-decoration: none; color: #000; cursor: pointer">{{ __('Eliminar') }}</a>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">
                                                            {{ __($item->model->subcategory->category->name) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @livewire('update-cart-item10', ['rowId' => $item->rowId],
                                                            key('update-cart-item10'.$item->rowId))
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ __($item->options->color) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="gelion-thin pt-3">{{ $item->options->size }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @break
                                    @endswitch
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="table-responsive">
                            <div class="col-12" style="min-height: 14.6em;">
                                <div class="inner text-center p-5">
                                    <h4 class="gelion-bold">{{ __('Aún no hay prendas en tu cesta') }}</h4>
                                    <a href="{{ route('catalogue.index') }}"
                                        class="btn btn-secondary">{{ __('Seguir seleccionando') }}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 pt-2">
                <div class="card p-4">
                    <p class="gelion-bold">{{ __('Precio caja/s') }}</p>
                    <div class="row">
                        <div class="col-6">
                            <p class="gelion-thin">
                                Subtotal*
                            </p>
                        </div>
                        <div class="col-6 text-right">
                            @php
                                $mon = 'MXN';
                                $mon1 = 'MXN';
                                $mon2 = 'MXN';
                                $mon3 = 'MXN';
                                $mon4 = 'MXN';
                                $mon5 = 'MXN';
                                $mon6 = 'MXN';
                                $mon7 = 'MXN';
                                $mon8 = 'MXN';
                                $mon9 = 'MXN';
                                $mon10 = 'MXN';

                                if (Cart::instance('caja1')->count()) {
                                    foreach (Cart::instance('caja1')->content() as $item) {
                                        $manga1 = $item->model->subcategory->name;
                                    }
                                    if ($manga1 == 'Corta' || $manga1 == 'corta') {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon1 = 'MXN';
                                                break;
                                            case 'USD':
                                                $mon1 = 'USD';
                                                break;
                                            case '':
                                                $mon1 = 'MXN';
                                                break;
                                        }
                                    } else {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon1 = 'MXN_L';
                                                break;
                                            case 'USD':
                                                $mon1 = 'USD_L';
                                                break;
                                            case '':
                                                $mon1 = 'MXN_L';
                                                break;
                                        }
                                    }
                                }
                                if (Cart::instance('caja2')->count()) {
                                    foreach (Cart::instance('caja2')->content() as $item) {
                                        $manga2 = $item->model->subcategory->name;
                                    }
                                    if ($manga2 == 'Corta' || $manga2 == 'corta') {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon2 = 'MXN';
                                                break;
                                            case 'USD':
                                                $mon2 = 'USD';
                                                break;
                                            case '':
                                                $mon2 = 'MXN';
                                                break;
                                        }
                                    } else {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon2 = 'MXN_L';
                                                break;
                                            case 'USD':
                                                $mon2 = 'USD_L';
                                                break;
                                            case '':
                                                $mon2 = 'MXN_L';
                                                break;
                                        }
                                    }
                                }
                                if (Cart::instance('caja3')->count()) {
                                    foreach (Cart::instance('caja3')->content() as $item) {
                                        $manga3 = $item->model->subcategory->name;
                                    }
                                    if ($manga3 == 'Corta' || $manga3 == 'corta') {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon3 = 'MXN';
                                                break;
                                            case 'USD':
                                                $mon3 = 'USD';
                                                break;
                                            case '':
                                                $mon3 = 'MXN';
                                                break;
                                        }
                                    } else {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon3 = 'MXN_L';
                                                break;
                                            case 'USD':
                                                $mon3 = 'USD_L';
                                                break;
                                            case '':
                                                $mon3 = 'MXN_L';
                                                break;
                                        }
                                    }
                                }
                                if (Cart::instance('caja4')->count()) {
                                    foreach (Cart::instance('caja4')->content() as $item) {
                                        $manga4 = $item->model->subcategory->name;
                                    }
                                    if ($manga4 == 'Corta' || $manga4 == 'corta') {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon4 = 'MXN';
                                                break;
                                            case 'USD':
                                                $mon4 = 'USD';
                                                break;
                                            case '':
                                                $mon4 = 'MXN';
                                                break;
                                        }
                                    } else {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon4 = 'MXN_L';
                                                break;
                                            case 'USD':
                                                $mon4 = 'USD_L';
                                                break;
                                            case '':
                                                $mon4 = 'MXN_L';
                                                break;
                                        }
                                    }
                                }
                                if (Cart::instance('caja5')->count()) {
                                    foreach (Cart::instance('caja5')->content() as $item) {
                                        $manga5 = $item->model->subcategory->name;
                                    }
                                    if ($manga5 == 'Corta' || $manga5 == 'corta') {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon5 = 'MXN';
                                                break;
                                            case 'USD':
                                                $mon5 = 'USD';
                                                break;
                                            case '':
                                                $mon5 = 'MXN';
                                                break;
                                        }
                                    } else {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon5 = 'MXN_L';
                                                break;
                                            case 'USD':
                                                $mon5 = 'USD_L';
                                                break;
                                            case '':
                                                $mon5 = 'MXN_L';
                                                break;
                                        }
                                    }
                                }
                                if (Cart::instance('caja6')->count()) {
                                    foreach (Cart::instance('caja6')->content() as $item) {
                                        $manga6 = $item->model->subcategory->name;
                                    }
                                    if ($manga6 == 'Corta' || $manga6 == 'corta') {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon6 = 'MXN';
                                                break;
                                            case 'USD':
                                                $mon6 = 'USD';
                                                break;
                                            case '':
                                                $mon6 = 'MXN';
                                                break;
                                        }
                                    } else {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon6 = 'MXN_L';
                                                break;
                                            case 'USD':
                                                $mon6 = 'USD_L';
                                                break;
                                            case '':
                                                $mon6 = 'MXN_L';
                                                break;
                                        }
                                    }
                                }
                                if (Cart::instance('caja7')->count()) {
                                    foreach (Cart::instance('caja7')->content() as $item) {
                                        $manga7 = $item->model->subcategory->name;
                                    }
                                    if ($manga7 == 'Corta' || $manga7 == 'corta') {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon7 = 'MXN';
                                                break;
                                            case 'USD':
                                                $mon7 = 'USD';
                                                break;
                                            case '':
                                                $mon7 = 'MXN';
                                                break;
                                        }
                                    } else {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon7 = 'MXN_L';
                                                break;
                                            case 'USD':
                                                $mon7 = 'USD_L';
                                                break;
                                            case '':
                                                $mon7 = 'MXN_L';
                                                break;
                                        }
                                    }
                                }
                                if (Cart::instance('caja8')->count()) {
                                    foreach (Cart::instance('caja8')->content() as $item) {
                                        $manga8 = $item->model->subcategory->name;
                                    }
                                    if ($manga8 == 'Corta' || $manga8 == 'corta') {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon8 = 'MXN';
                                                break;
                                            case 'USD':
                                                $mon8 = 'USD';
                                                break;
                                            case '':
                                                $mon8 = 'MXN';
                                                break;
                                        }
                                    } else {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon8 = 'MXN_L';
                                                break;
                                            case 'USD':
                                                $mon8 = 'USD_L';
                                                break;
                                            case '':
                                                $mon8 = 'MXN_L';
                                                break;
                                        }
                                    }
                                }
                                if (Cart::instance('caja9')->count()) {
                                    foreach (Cart::instance('caja9')->content() as $item) {
                                        $manga9 = $item->model->subcategory->name;
                                    }
                                    if ($manga9 == 'Corta' || $manga9 == 'corta') {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon9 = 'MXN';
                                                break;
                                            case 'USD':
                                                $mon9 = 'USD';
                                                break;
                                            case '':
                                                $mon9 = 'MXN';
                                                break;
                                        }
                                    } else {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon9 = 'MXN_L';
                                                break;
                                            case 'USD':
                                                $mon9 = 'USD_L';
                                                break;
                                            case '':
                                                $mon9 = 'MXN_L';
                                                break;
                                        }
                                    }
                                }
                                if (Cart::instance('caja10')->count()) {
                                    foreach (Cart::instance('caja10')->content() as $item) {
                                        $manga10 = $item->model->subcategory->name;
                                    }
                                    if ($manga10 == 'Corta' || $manga10 == 'corta') {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon10 = 'MXN';
                                                break;
                                            case 'USD':
                                                $mon10 = 'USD';
                                                break;
                                            case '':
                                                $mon10 = 'MXN';
                                                break;
                                        }
                                    } else {
                                        switch (session()->get('divisa')) {
                                            case 'MXN':
                                                $mon10 = 'MXN_L';
                                                break;
                                            case 'USD':
                                                $mon10 = 'USD_L';
                                                break;
                                            case '':
                                                $mon10 = 'MXN_L';
                                                break;
                                        }
                                    }
                                }
                            @endphp
                            <p class="gelion-thin">
                                ${{ number_format(Cart::instance('caja1')->subtotal() * $plan->$mon1 +Cart::instance('caja2')->subtotal() * $plan->$mon2 +Cart::instance('caja3')->subtotal() * $plan->$mon3 +Cart::instance('caja5')->subtotal() * $plan->$mon5+Cart::instance('caja6')->subtotal() * $plan->$mon6+Cart::instance('caja7')->subtotal() * $plan->$mon7+Cart::instance('caja8')->subtotal() * $plan->$mon8+Cart::instance('caja9')->subtotal() * $plan->$mon9+Cart::instance('caja10')->subtotal() * $plan->$mon10,2) }}
                            </p>
                        </div>
                        {{-- <div class="col-6">
                            <p class="gelion-thin">
                                Impuestos
                            </p>
                        </div>
                        <div class="col-6 text-right">
                            <p class="gelion-thin">
                                ${{ number_format(Cart::instance('caja1')->tax(16) * $plan->$mon1 + Cart::instance('caja2')->tax(16) * $plan->$mon2 + Cart::instance('caja3')->tax(16) * $plan->$mon3 + Cart::instance('caja4')->tax(16) * $plan->$mon4, 2) }}
                            </p>
                        </div> --}}
                        {{-- <div class="col-6">
                            <p class="gelion-thin">
                                {{ __('Precio total') }}
                            </p>
                        </div>
                        <div class="col-6 text-right">
                            <p class="gelion-thin">
                                ${{ number_format(Cart::instance('caja1')->total() * $plan->$mon1 + Cart::instance('caja2')->total() * $plan->$mon2 + Cart::instance('caja3')->total() * $plan->$mon3 + Cart::instance('caja4')->total() * $plan->$mon4, 2) }}
                            </p>
                        </div> --}}
                    </div>
                    @switch(session()->get('plan'))
                        @case(1)
                            @if (Cart::instance('caja1')->count() == 72)
                                <div class="gelion-bold mt-2">
                                    <a class="btn btn-secondary d-block"
                                        href="{{ route('checkout') }}">{{ __('Enviar solicitud') }}</a>
                                </div>
                            @else
                                <div class="btn btn-secondary gelion-bold mt-2 disabled">{{ __('Enviar solicitud') }}
                                </div>
                            @endif
                        @break
                        @case(2)
                            @if (Cart::instance('caja1')->count() + Cart::instance('caja2')->count() + Cart::instance('caja3')->count() == 144 || Cart::instance('caja1')->count() + Cart::instance('caja2')->count() + Cart::instance('caja3')->count() == 216)
                                <div class="gelion-bold mt-2">
                                    <a class="btn btn-secondary d-block"
                                        href="{{ route('checkout') }}">{{ __('Enviar solicitud') }}</a>
                                </div>
                            @else
                                <div class="btn btn-secondary gelion-bold mt-2 disabled">{{ __('Enviar solicitud') }}
                                </div>
                            @endif
                        @break
                        @case(3)
                            @if (Cart::instance('caja1')->count() + Cart::instance('caja2')->count() + Cart::instance('caja3')->count() + Cart::instance('caja4')->count()+ Cart::instance('caja5')->count()+ Cart::instance('caja6')->count()+ Cart::instance('caja7')->count()+ Cart::instance('caja8')->count()+ Cart::instance('caja8')->count()+ Cart::instance('caja9')->count()+ Cart::instance('caja10')->count() >= 288)
                                <div class="gelion-bold mt-2">
                                    <a class="btn btn-secondary d-block"
                                        href="{{ route('checkout') }}">{{ __('Enviar solicitud') }}</a>
                                </div>
                            @else
                                <div class="btn btn-secondary gelion-bold mt-2 disabled">{{ __('Enviar solicitud') }}
                                </div>
                            @endif
                        @break
                        @default

                    @endswitch
                    <div class="col-12 gelion-bold text-center pt-3" wire:ignore>
                        <p><button id="aumentar-planes" class="gelion-bold aumentar"
                                style="color: #000; text-decoration: none;">{{ __('Quiero aumentar mi plan') }}</button>
                            <br>
                        <div class="row" id="mostrar-planes">
                            <div class="col-12">
                                <p class="gelion-bold text-center">{{ __('Selecciona un plan') }}</p>
                            </div>

                            <div class="col">
                                @if (session()->get('plan') == 1)
                                    <a class="btn btn-primary btn-block disabled ">Start</a>
                                @else
                                    <a href="{{ route('plan', 1) }}" class="btn btn-primary btn-block">Start</a>
                                @endif
                            </div>
                            <div class="col">
                                @if (session()->get('plan') == 2)
                                    <a class="btn btn-primary btn-block disabled ">Plus</a>
                                @else
                                    <a href="{{ route('plan', 2) }}" class="btn btn-primary btn-block">Plus</a>
                                @endif
                            </div>
                            <div class="col">
                                @if (session()->get('plan') == 3)
                                    <a class="btn btn-primary btn-block disabled ">Top</a>
                                @else
                                    <a href="{{ route('plan', 3) }}" class="btn btn-primary btn-block">Top</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button id="cancelar-aumento"
                                class="btn btn-outline-dark btn-sm">{{ __('Cancelar') }}</button>
                        </div>
                        {{-- Estos son para MXN --}}
                        @if (session('divisa') == 'MXN')
                            @if (session('locale') == 'es')
                                <span
                                    class="gelion-thin">{{ __('Por playera. Envíos nacionales, costo de envío por cotizar') }}</span>
                            @else
                                <span
                                    class="gelion-thin">{{ __('Per t-shirt. Mexican shipping fees to be quoted. Aditional services not included.') }}</span>
                            @endif
                        @else
                            {{-- Este es para USD --}}
                            @if (session('locale') == 'es')
                                <span
                                    class="gelion-thin">{{ __('Por playera, envíos fuera de México, ya incluyen costo de envío') }}</span>
                            @else
                                <span
                                    class="gelion-thin">{{ __('Per t-shirt. Taxes and USA shipping fees included') }}</span>
                            @endif
                        @endif
                        </p>
                    </div>
                </div>
                <div class="col-12 gelion-bold pt-4">
                    <p>{{ __('Política de privacidad') }}</p>
                    <p class="gelion-thin size-2 text-justify">
                        {{ __('Como parte de los mecanismos para manifestar negativa al tratamiento de datos personales, en todo momento podrá consultar su información, rectificarla u oponerte al tratamiento de tus datos personales, por lo que para ello podrá llamar a los teléfonos (999) 324 7922 o contacto@myrewear.com') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
