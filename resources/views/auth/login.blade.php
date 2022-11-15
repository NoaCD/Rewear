{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>


        <div class="text-center p-2">
            <span>¿No tienes cuenta? </span><a href="{{ route('register') }}" class="hover:underline">Registrarme</a>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> --}}

@extends('layouts.rewear-azul')
@section('content')
    <section id="user" class="mt-3">
        <div class="container espacio-login-card">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-sm-12 bg-login" style="background-image: url(/img/login.jpg);">
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 inicio espacio-login ">
                            <h4 class="gelion-bold">{{ __('Iniciar sesión') }}</h4>
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" type="email" name="email"
                                        placeholder="E-mail">
                                    <small id="emailHelp"
                                        class="form-text text-muted">{{ __('No compartiremos tu email con nadie.') }}</small>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" type="password" name="password" required
                                        autocomplete="current-password">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                                    <label class="form-check-label" for="exampleCheck1">{{ __('Recordarme') }}</label>
                                </div>
                                {{-- <button type="submit" class="gelion-bold btn btn-primary btn-block">Iniciar Sesión</button> --}}
                                <button type="submit"
                                    class="gelion-bold btn btn-info btn-block">{{ __('Iniciar sesión') }}</button>
                                <div class="text-center pt-3">
                                    <a class="underline text-sm" href="{{ route('password.request') }}"
                                        style="color: gray; text-decoration: none;">
                                        {{ __('¿Olvidó su contraseña?') }}
                                    </a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <p class="gelion-thin text-center pt-3">
                    {{ __('¿Eres nuevo en rewear?') }} <br>
                    <span class="gelion-bold"><a href="{{ route('register') }}"
                            style="color: #000; text-decoration: none;">{{ __('Registrarme') }}</a></span>
                </p>
            </div>
        </div>
    </section>
    <section id="bottom" class="pb-5">
        <div class="container espacio-login-foto">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="{{ asset('/img/user/2701-LOG-IN-CALCE-1.jpg') }}" alt="Modelos con playera ecológica"
                        class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="{{ asset('/img/user/2701-LOG-IN-CALCE-2.jpg') }}" alt="Modelos con playera ecológica"
                        class="img-fluid">
                </div>
            </div>
        </div>
    </section>
@endsection
