@extends('layouts.rewear-azul')
@if (session('locale') == 'es')
@section('title', 'Contáctanos - Rewear')
@else
@section('title', 'Contact us - Rewear')
@endif
@section('content')
<section id="contact-page">
    <div class="container mt-5">
        <div class="row pt-5 pb-5">
            <div class="col-lg-6 col-md-12 col-sm-12 info-1">
                <form>
                    <div class="form-row">
                        <div class="col gelion-bold">
                            <label for="formGroupExampleInput">{{ __('Nombres*') }}</label>
                            <input id="nombres" type="text" class="form-control" required>
                        </div>
                        <div class="col gelion-bold">
                            <label for="formGroupExampleInput">{{ __('Apellidos*') }}</label>
                            <input id="apellidos" type="text" class="form-control" required>
                        </div>
                        <div class="col gelion-bold">
                            <label for="phone">{{ __('Telefono:') }}</label>
                            <input id="telefono" type="tel" id="phone" class="form-control" name="phone"
                                pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <!--botones-->
                        <div class="col-12">
                            <span class="gelion-bold">{{ __('Figura') }}</span>
                        </div>
                        <div class="col pt-3">
                            <button type="button" id="emprendedor" class="gelion-bold btn btn-warning"
                                aria-pressed=“true”>{{ __('Emprendedor') }}</button>
                        </div>
                        <div class="col pt-3">
                            <button type="button" id="asociacion" class="gelion-bold btn btn-warning"
                                aria-pressed=“true”>{{ __('Asociación') }}</button>
                        </div>
                        <div class="col pt-3">
                            <button type="button" id="distribuidor" class="gelion-bold btn btn-warning"
                                aria-pressed=“true”>{{ __('Distribuidor') }}</button>
                        </div>
                        <div class="col pt-3 gelion-bold">
                            <label for="formGroupExampleInput">{{ __('Nombre de tu empresa') }}</label>
                            <input id="nombreEmpresa" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="pt-3 gelion-bold" id="f-emprendedor">
                        <!--Emprendedor-->
                        <div class="pt-3">
                            <label for="formGroupExampleInput">{{ __('¿Cuál es el giro de tu proyecto?') }}</label>
                            <input id="emp_giroProyecto" type="text" class="form-control" required>
                        </div>
                        <div class="pt-3">
                            <label for="formGroupExampleInput">{{ __('¿En qué plan estás interesado?') }}</label>
                            <input id="emp_plan" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="pt-3 gelion-bold" id="f-asociacion">
                        <!--Asociacion-->
                        <div class="pt-3">
                            <label for="formGroupExampleInput">{{ __('¿A qué se dedica la asociación?') }}</label>
                            <input id="aso_dedicaAsociacion" type="text" class="form-control" required>
                        </div>
                        <div class="pt-3">
                            <label for="formGroupExampleInput">{{ __('¿Cuántas personas forman parte?') }}</label>
                            <input id="aso_cantidadPersonas" type="text" class="form-control" required>
                        </div>
                        <div class="pt-3">
                            <label for="formGroupExampleInput">{{ __('¿Qué apoyo requieres de nuestra parte?') }}</label>
                            <input id="aso_tipoApoyo" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="pt-3 gelion-bold" id="f-distribuidor">
                        <!--Distribuidor-->
                        <div class="pt-3">
                            <label
                                for="formGroupExampleInput">{{ __('¿En que cantidad de playeras en las que estás interesado?') }}</label>
                            <input id="dist_cantidadPlayeras" type="text" class="form-control" required>
                        </div>
                        <div class="pt-3">
                            <label for="formGroupExampleInput">{{ __('¿Cuál es la frecuencia de compra?') }}</label>
                            <input id="dist_frecuenciaCompra" type="text" class="form-control" required>
                        </div>
                        <div class="pt-3">
                            <label for="formGroupExampleInput">{{ __('¿En qué colores estás interesado?') }}</label>
                            <input id="dist_colorInteresado" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group gelion-bold pt-3">
                        <label for="inputCity">{{ __('Ciudad') }}</label>
                        <input id="ciudad" type="text" class="form-control" id="inputCity" required>
                    </div>
                    <div class="mb-3 gelion-bold">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" id="validationTextarea" placeholder="{{ __('Ingresa tu correo electronico') }}" required />
                        <!-- <textarea class="form-control" id="validationTextarea"
                            placeholder="{{ __('Déjanos tu mensaje') }}" required></textarea> -->

                    </div>
                    <div id="btnSendEmail" type="submit" class="btn btn-primary gelion-bold mt-2">{{ __('Enviar mensaje') }}</div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 info-2">
                <!--contacto-->
                <h2 class="gelion-bold">
                    {{ __('¿Eres una asociación o quieres ser distribuidor?') }}
                </h2>
                <p class="gelion-thin">
                    {{ __('Si distribuyes camisetas al mayoreo, tenemos una propuesta especial para ti. Con Rewear, ofrece a tus clientes una alternativa sustentable que genere mayor valor agregado a sus productos. ¡Únete al movimiento de cero desperdicios y fomenta que más marcas cuiden el ambiente!') }}
                </p>
                <li>
                    <div class="row gelion-bold ">
                        <div class="col-1">
                            <img src="{{ asset('/img/user/ubicacion.svg') }}" width="50">
                        </div>
                        <div class="col-11 pl-5 m-auto">
                            {{ __('Dirección: C-18 No. 163 Carr: Umán - Uxmal. Umán, Yucatán MX. C.P. 97390') }}
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row gelion-bold ">
                        <div class="col-1">
                            <img src="{{ asset('/img/user/Telefono.svg') }}" width="50">
                        </div>
                        <div class="col-11 pl-5 m-auto">
                            {{ __('Teléfono: (999) 324 7922') }}
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row gelion-bold ">
                        <div class="col-1">
                            <img src="{{ asset('/img/user/Mail.svg') }}" width="50">
                        </div>
                        <div class="col-11 pl-5 m-auto">
                            Email:{{ __(' contacto@myrewear.com') }}
                        </div>
                    </div>
                </li>
                <li>

                    <div class="row gelion-thin">
                        <div class="col-12 gelion-regular pt-3">
                            {{ __('Horario Laboral') }}
                        </div>
                        <div class="col-1">
                            <img src="{{ asset('/img/user/Reloj.svg') }}" width="50">
                        </div>
                        <div class="col-11 pl-5">
                            {{ __('Lunes a Jueves: 8:00 am a 6:00 pm') }} <br>
                            {{__('Viernes: 9:00 am a 5:00 pm')}}
                            <div class="mapa">
                                @if (session('locale') == 'es')
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.0651584025977!2d-89.74889418532065!3d20.869423786084877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f56136748fe1925%3A0x765bc4fc5a9d68c8!2sRewear!5e0!3m2!1ses-419!2smx!4v1638901242118!5m2!1ses-419!2smx"
                                    width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy">
                                </iframe>
                                @else
                                <iframe width="300" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=3750%20NW%2028th%20Street%20Unit%2
                                    0414%20Miami%20FL%2033142&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                    scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            </div>
        </div>
    </div>
</section>
@push('js')
<script src="{{ asset('/js/show.js') }}"></script>
@endpush
@endsection