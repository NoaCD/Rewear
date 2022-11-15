<!DOCTYPE html>
<html>

<head>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
       /*  border: 1px solid black; */
    }

    td {
        text-align: center;
    }

</style>

<body>
    <table>
        <thead>
            <tr>
                <th style="text-align: left;">
                    <img src="{{ asset('img/rewear-azul.svg') }}" width="220" alt="">
                </th>
                <th>
                    <h3 style="color:green; text-align: right; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size:2em;">
                        SOLICITUD DE COMPRA
                    </h3>
                </th>
            </tr>
        </thead>
    </table>
    <table>
        <thead>
            <tr>
                <th style="text-align: left;">
                    <h3 style="font-family: Open Sans, Helvetica, Arial;">
                        Numero de orden: {{ $order->id }} <br>
                        <span> Tipo de plan:  {{ $order->plan_name }}</span>
                    </h3>
                </th>
                <th style="text-align: right;">
                    <p style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif; font-weight:400;font-size: .9rem">
                        <span> {{ $order->contact }}<br>
                        <span> {{ $order->phone }}<br>
                        @if ($order->bussiness)
                         {{ $order->bussiness }}<br>
                        @endif
                        <small>{{ $envio->address }} <br> {{ $envio->city }} - {{ $envio->state }} CP. {{ $envio->postal_code }}</small>
                    </p>
                </th>
            </tr>
        </thead>
    </table>

    {{-- <div style="text-align: left; padding-top:2em; padding-bottom: .5em;">
        <img src="{{ asset('img/rewear-azul.svg') }}" alt="">
    </div> --}}
   {{--  <h3 style="text-align: left; font-family: Open Sans, Helvetica, Arial,;">
        Numero de orden: {{ $order->id }} <br>
        <span> Tipo de plan: <br style="color: gray"> {{ $order->plan_name }}</span>
    </h3> --}}
    {{-- <h3 style="text-align: left; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size:2em;">
        Tipo de plan: <br style="color: gray"> {{ $order->plan_name }}
    </h3> --}}
    {{-- <p style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
        <b>Cliente:</b> {{ $order->contact }}<br>
        <b>Telefono:</b> {{ $order->phone }}<br>
        @if ($order->bussiness)
            <b>Empresa:</b> {{ $order->bussiness }}<br>
        @endif
        <b>Direccion:</b> {{ $envio->address }} {{ $envio->city }} - {{ $envio->state }}
        CP:{{ $envio->postal_code }}
    </p> --}}

    <table style="margin-top: 2em; font-family: Open Sans, Helvetica, Arial, sans-serif;">
        <thead style="background: rgb(233, 233, 233)">
            <tr>
                <th style="padding:10px 0;">Producto</th>
                <th style="padding:10px 0;">Cantidad</th>
                <th style="padding:10px 0;">Precio unitario</th>
                <th style="padding:10px 0;">SKU</th>
            </tr>
        </thead>
        <tbody style="font-family: Open Sans, Helvetica, Arial, sans-serif;">
            @foreach ($order->boxes as $box)
                @php
                    $products = json_decode($box->content);
                @endphp
                <tr style="background-color:black; color:white; font-family: Open Sans, Helvetica, Arial, sans-serif;">
                    <td>
                        <b style="font-family: Open Sans, Helvetica, Arial, sans-serif;">Caja {{ $loop->iteration }}</b>
                    </td>
                </tr>
                @foreach ($products as $product)
                    <tr class="">
                        <td>
                            <div>
                                {{-- <img style="width:3.5rem; margin-top: 0.5rem" src="{{ asset($product->options->image) }}"> --}}
                                <article style="font-family: Open Sans, Helvetica, Arial, sans-serif;">
                                    <p>{{ $product->name }} <br>
                                        <small style="font-family: Open Sans, Helvetica, Arial, sans-serif;">
                                            @isset($product->options->color)
                                                Color: {{ __($product->options->color) }}
                                            @endisset

                                            @isset($product->options->size)
                                                Talla: {{ __($product->options->size) }}
                                            @endisset
                                            <br>
                                        </small>
                                    </p>
                                </article>
                            </div>
                        </td>
                        <td>{{ $product->qty }}</td>
                        @if ($product->options->manga == 'corta' || $product->options->manga == 'Corta')
                            <td>${{ number_format($order->currency_value, 2) }} {{ $order->currency }}</td>
                        @else
                            <td>${{ number_format($order->currency_value_L, 2) }} {{ $order->currency }}</td>
                        @endif
                        <td>{{ $product->options->sku }}</td>
                    </tr>
                @endforeach
            @endforeach
            <tr class="text-center" >
                <td></td>
                <td></td>
                <td style="padding-top: 1em;">
                    <span class="font-bold border-b-2 border-black"">
                        <b>Total: ${{ number_format($order->total, 2) }} {{ $order->currency }}</b>
                    </span>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
