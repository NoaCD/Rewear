@extends('layouts.rewear-azul')
@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('/css/user.css') }}">
    @endpush
    <section id="perfil" class="pb-5">
        <!--Movil-->
        <div class="d-block d-sm-block d-md-block d-lg-none">
            <!--Contenido de ordenes movil-->
            <div class="container">
                <div class="col pt-2 mb-3">
                    <div class="carousel">
                        <div class="carousel__contenedor">
                            <div class="carousel__lista6">
                                @forelse ($orders as $order)
                                    <div class="carousel__elemento m-1">
                                        <div class="card p-4">
                                            <!--Contenido de ordenes movil-->
                                            <div class="row">
                                                <div class="col-lg-7 col-md-12 col-sm-12 m-auto pt-1">
                                                    <h5 class="gelion-bold size-4">
                                                        ID de órden: <span
                                                            class="gelion-regular size-5">{{ $order->id }}</span>
                                                        <span class="date pl-3"> <br class="d-block d-sm-block">
                                                            Fecha de orden: <span
                                                                class="gelion-thin">{{ $order->created_at }}</span>
                                                        </span>

                                                    </h5>
                                                </div>
                                                <div class="col-lg-5 col-md-6 col-sm-12 control-but right-o right-r">
                                                    <button href="" class="print-a">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                            class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                        </svg>
                                                        <span class="size-2"><a
                                                                href="{{ route('profile.printOrder', $order) }}">Print</a></span>
                                                    </button>
                                                </div>
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">
                                                                <h3 class="gelion-bold">
                                                                    Plan: Plan: <span>{{ $order->plan_name }}
                                                                        @switch($order->plan_id)
                                                                            @case(1)
                                                                                1 caja de 72 camisetas
                                                                            @break

                                                                            @case(2)
                                                                                2 cajas (144 camisetas)<br>o 3 cajas (216
                                                                                camisetas).
                                                                            @break

                                                                            @case(3)
                                                                                4 cajas (288 camisetas) <br>
                                                                            @break
                                                                        @endswitch
                                                                    </span>
                                                                </h3>
                                                                @php
                                                                    $envio = json_decode($order->envio);
                                                                @endphp
                                                                <li class="gelion-thin">
                                                                    Dirección: <span>{{ $envio->address }} -
                                                                        {{ $envio->city }}, {{ $envio->state }}</span>
                                                                </li>
                                                                <li class="gelion-thin">
                                                                    C.P. {{ $envio->postal_code }}
                                                                </li>
                                                                <li class="gelion-thin">
                                                                    Teléfono: <span>{{ $order->phone }}</span>
                                                                </li>
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <p>No hay ordenes generadas</p>
                                    @endforelse
                                </div>
                            </div>
                            <div role="tabList" class="carousel__indicadores1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end Movil-->
            <div class="container">
                <div class="d-block d-sm-block d-md-block d-lg-block">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 user pt-2 right-o">
                            <div class="d-block d-sm-block d-md-block d-lg-block">
                                <div class="card p-4 text-center">
                                    <div class="d-none d-sm-none d-md-none d-lg-block">
                                        <div id="ordenes">
                                            <button class="gelion-bold user-font btn-block">{{ __('Mis órdenes') }}</button>
                                        </div>
                                    </div>
                                    <div class="d-block d-sm-block d-md-block d-lg-block">
                                        <div id="cuenta">
                                            <button class="gelion-bold user-font btn-block">{{ __('Mi cuenta') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <form method="POST" action="{{ route('logout') }}" class="text-center">
                                    @csrf
                                    <a class="gelion-bold user-font btn-block" style="text-decoration: none"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Finalizar sesión') }}
                                    </a>
                                </form>
                            </div>
                        </div>

                        <!--Contenido ordenador-->
                        <div class="col-lg-8 col-md-12 right-o-1 col-sm-12 pt-2">
                            <div id="tabs-1">
                                <div class="d-none d-sm-none d-md-none d-lg-block">
                                    <!--Contenido de ordenes ordenador-->
                                    @foreach ($orders as $order)
                                        <div class="card p-4 mb-4">
                                            <!--Contenido de ordenes ordenador-->
                                            <div class="row">
                                                <div class="col-lg-7 col-md-6 col-sm-12 m-auto pt-1">
                                                    <h5 class="gelion-bold size-4">
                                                        {{ __('ID de órden:') }} <span
                                                            class="gelion-regular size-5 pr-3">{{ $order->id }}</span>
                                                        <span class="date">
                                                            {{ __('Fecha de orden:') }} <span
                                                                class="gelion-thin">{{ $order->created_at }}</span>
                                                        </span>
                                                    </h5>
                                                </div>
                                                <div class="col-lg-5 col-md-6 col-sm-12 right-o right-r control-but">
                                                    <button href="" class="print-a">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                            class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                        </svg> <span class="size-2"><a
                                                            href="{{ route('profile.printOrder', $order) }}">Print</a></span>
                                                    </button>
                                                </div>
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">
                                                                <h3 class="gelion-bold">
                                                                    Plan: <span>{{ $order->plan_name }}
                                                                        @switch($order->plan_id)
                                                                            @case(1)
                                                                                1 caja de 72 camisetas
                                                                            @break

                                                                            @case(2)
                                                                                2 cajas (144 camisetas)<br>o 3 cajas (216
                                                                                camisetas).
                                                                            @break

                                                                            @case(3)
                                                                                4 cajas (288 camisetas) <br>
                                                                            @break
                                                                        @endswitch
                                                                    </span>
                                                                </h3>
                                                                <li class="gelion-thin">
                                                                    {{ __('Teléfono:') }} <span>{{ $order->phone }}</span>
                                                                </li>
                                                                @php
                                                                    $envio = json_decode($order->envio);
                                                                @endphp
                                                                <li class="gelion-thin">
                                                                    {{ __('Dirección:') }} <span>{{ $envio->address }} -
                                                                        {{ $envio->city }}, {{ $envio->state }}</span>
                                                                </li>
                                                                <li class="gelion-thin">
                                                                    {{ __('C.P.') }} {{ $envio->postal_code }}
                                                                </li>
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{ $orders->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                            <div id="tabs-2">
                                <div class="d-block d-sm-block d-md-block d-lg-block">
                                    <!--Contenido de cuenta ordenador-->
                                    <div class="card p-4">
                                        <!--Info personal-->
                                        <div class="row control-but">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                                {{-- <button class="gelion-bold size-2">{{ __('Editar') }}</button> --}}
                                                <!-- Button trigger modal -->
                                                <button type="button" class="gelion-bold size-2" data-toggle="modal"
                                                    data-target="#infouserModal">
                                                    {{ __('Editar') }}
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="infouserModal" tabindex="-1"
                                                    aria-labelledby="infouserModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="infouserModalLabel">Informacion
                                                                    de contacto
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('profile.updateInfo') }}" method="POST"
                                                                class="text-left">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">{{ __('Nombre') }}</label>
                                                                        <input type="text" class="form-control" id="name"
                                                                            name="name" value="{{ auth()->user()->name }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="phone">{{ __('Telefono') }}</label>
                                                                        <input type="text" class="form-control" name="phone"
                                                                            value="{{ auth()->user()->phone }}" id="phone"
                                                                            required>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-outline-success">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <li class="gelion-thin">
                                                                {{ __('Nombre:') }}
                                                                <span>{{ auth()->user()->name }}</span>
                                                            </li>
                                                            <li class="gelion-thin">
                                                                {{ __('Teléfono:') }}
                                                                <span>{{ auth()->user()->phone }}</span>
                                                            </li>
                                                            {{-- <li class="gelion-thin">
                                                            Fecha de nacimiento: <span>17/08/90</span>
                                                        </li> --}}
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 p-4">
                                        <!--Contraseña-->
                                        <div class="row control-but">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="gelion-bold size-2" data-toggle="modal"
                                                    data-target="#password">
                                                    {{ __('Editar') }}
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="password" tabindex="-1"
                                                    aria-labelledby="passwordLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="passwordLabel">Cambio de
                                                                    contraseña
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" action="{{ route('user.update.password') }}"
                                                                class="text-left">
                                                                @csrf
                                                                <div class="mt-5 p-4">
                                                                    <div class="form-row">
                                                                        <div class="col form-group col-12">
                                                                            <label>Current Password</label>
                                                                            <input type="password" name="current_password"
                                                                                class="form-control">
                                                                        </div> <!-- form-group end.// -->
                                                                        <div class="form-group col-md-6">
                                                                            <label>New Password</label>
                                                                            <input type="password" name="password"
                                                                                class="form-control">
                                                                        </div> <!-- form-group end.// -->
                                                                        <div class="form-group col-md-6">
                                                                            <label>Confirm Password</label>
                                                                            <input type="password" name="password_confirmation"
                                                                                class="form-control">
                                                                        </div> <!-- form-group end.// -->
                                                                    </div> <!-- form-row.// -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-outline-success">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <li class="gelion-thin">{{ __('Contraseña:') }} <span>****</span></li>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-none d-sm-none d-md-block d-lg-block">
                                        <div class="row">
                                            <!--Direcciones ordenador-->
                                            @foreach ($addresses as $address)
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <!--Direccion 1-->
                                                    <div class="card mt-3 p-4">
                                                        <h5 class="gelion-bold pb-3">
                                                            Casa
                                                        </h5>
                                                        <li class="gelion-thin">
                                                            {{ $address->address }}, CP {{ $address->postal_code }}
                                                        </li>
                                                        <li class="gelion-thin">
                                                            {{ $address->city }}, {{ $address->state }}
                                                        </li>
                                                        <li class="gelion-regular pt-3">
                                                            <div class="row control-but">
                                                                <div class="col text-left">
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="gelion-bold"
                                                                        data-toggle="modal"
                                                                        data-target="#address{{ $address->id }}">
                                                                        {{ __('Editar') }}
                                                                    </button>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade"
                                                                        id="address{{ $address->id }}" tabindex="-1"
                                                                        aria-labelledby="address{{ $address->id }}Label"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="address{{ $address->id }}Label">
                                                                                        {{ __('Editar') }} direccion
                                                                                        {{ $address->id }}
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form method="POST"
                                                                                    action="{{ route('user.update.address', $address) }}"
                                                                                    class="text-left">
                                                                                    @csrf
                                                                                    <div class="p-4">
                                                                                        <div class="form-row">
                                                                                            <div class="col form-group col-6">
                                                                                                <label>{{ __('Address') }}</label>
                                                                                                <input type="text"
                                                                                                    name="address"
                                                                                                    value="{{ $address->address }}"
                                                                                                    class="form-control">
                                                                                            </div>
                                                                                            <div class="col form-group col-6">
                                                                                                <label>{{ __('Codigo Postal') }}</label>
                                                                                                <input type="text"
                                                                                                    name="postal_code"
                                                                                                    value="{{ $address->postal_code }}"
                                                                                                    class="form-control">
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label>{{ __('Ciudad') }}</label>
                                                                                                <input type="text" name="city"
                                                                                                    value="{{ $address->city }}"
                                                                                                    class="form-control">
                                                                                            </div> <!-- form-group end.// -->
                                                                                            <div class="form-group col-md-6">
                                                                                                <label>{{ __('Estado') }}</label>
                                                                                                <input type="text" name="state"
                                                                                                    value="{{ $address->state }}"
                                                                                                    class="form-control">
                                                                                            </div> <!-- form-group end.// -->
                                                                                        </div> <!-- form-row.// -->
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn"
                                                                                            data-dismiss="modal">Close</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-outline-success">Save
                                                                                            changes</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col text-right">
                                                                    <form
                                                                        action="{{ route('user.delete.address', $address) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="gelion-regular" style="color: red;">
                                                                            Eliminar
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block d-sm-block d-md-none d-lg-none">
                                <div class="carousel mt-3">
                                    <div class="carousel__contenedor">
                                        <div class="carousel__lista5">
                                            @foreach ($addresses as $address)
                                                <div class="carousel__elemento m-1">
                                                    <div class="card p-4">
                                                        <!--Contenido de ordenes movil-->
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <!--Direccion 1-->

                                                            <h5 class="gelion-bold pb-3">
                                                                Casa
                                                            </h5>
                                                            <li class="gelion-thin">
                                                                {{ $address->address }}, CP {{ $address->postal_code }}
                                                            </li>
                                                            <li class="gelion-thin">
                                                                {{ $address->city }}, {{ $address->state }}
                                                            </li>
                                                            <li class="gelion-regular pt-3">
                                                                <div class="row control-but">
                                                                    <div class="col text-left">
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="gelion-bold"
                                                                            data-toggle="modal"
                                                                            data-target="#address{{ $address->id }}">
                                                                            {{ __('Editar') }}
                                                                        </button>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade"
                                                                            id="address{{ $address->id }}" tabindex="-1"
                                                                            aria-labelledby="address{{ $address->id }}Label"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            id="address{{ $address->id }}Label">
                                                                                            {{ __('Editar') }} direccion
                                                                                            {{ $address->id }}
                                                                                        </h5>
                                                                                        <button type="button"
                                                                                            class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <form method="POST"
                                                                                        action="{{ route('user.update.address', $address) }}"
                                                                                        class="text-left">
                                                                                        @csrf
                                                                                        <div class="p-4">
                                                                                            <div class="form-row">
                                                                                                <div
                                                                                                    class="col form-group col-6">
                                                                                                    <label>{{ __('Address') }}</label>
                                                                                                    <input type="text"
                                                                                                        name="address"
                                                                                                        value="{{ $address->address }}"
                                                                                                        class="form-control">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col form-group col-6">
                                                                                                    <label>{{ __('Codigo Postal') }}</label>
                                                                                                    <input type="text"
                                                                                                        name="postal_code"
                                                                                                        value="{{ $address->postal_code }}"
                                                                                                        class="form-control">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group col-md-6">
                                                                                                    <label>{{ __('Ciudad') }}</label>
                                                                                                    <input type="text"
                                                                                                        name="city"
                                                                                                        value="{{ $address->city }}"
                                                                                                        class="form-control">
                                                                                                </div>
                                                                                                <!-- form-group end.// -->
                                                                                                <div
                                                                                                    class="form-group col-md-6">
                                                                                                    <label>{{ __('Estado') }}</label>
                                                                                                    <input type="text"
                                                                                                        name="state"
                                                                                                        value="{{ $address->state }}"
                                                                                                        class="form-control">
                                                                                                </div>
                                                                                                <!-- form-group end.// -->
                                                                                            </div> <!-- form-row.// -->
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn"
                                                                                                data-dismiss="modal">Close</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-outline-success">Save
                                                                                                changes</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-right">
                                                                        <form
                                                                            action="{{ route('user.delete.address', $address) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="gelion-regular" style="color: red;">
                                                                                Eliminar
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </li>
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
                        <!--end Contenido ordenador-->
                    </div>
                </div>

            </div>
        </section>
        @push('js')
            <script src="/js/show.js"></script>
        @endpush
    @endsection
