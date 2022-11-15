{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


@extends('layouts.rewear-azul')
@section('content')
    <section id="user">
        <div class="container espacio-login-card">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-sm-12 bg-login"
                            style="background-image: url(/img/user/register.png);">
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 inicio espacio-login ">
                            <h4 class="gelion-bold">{{ __('Registrarme') }}</h4>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ __('Nombre completo') }}" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="E-mail" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm password">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="terms" id="terms">
                                    <label class="form-check-label" for="exampleCheck1">{{ __('Acepto los') }} <a href="{{ asset('pdfs/terminos y condiciones-1.pdf') }}" download
                                            style="color: #000; text-decoration: none;">{{ __('términos y condiciones') }}</a></label>
                                </div>
                                <button type="submit" class="gelion-bold btn btn-primary btn-block">{{ __('Registrarme') }}</button>
                                {{-- <button type="submit" class="gelion-bold btn btn-info btn-block">Iniciar Sesión</button> --}}
                            </form>
                        </div>

                    </div>
                </div>
                <p class="gelion-thin pt-3 text-center">
                    {{ __('Tus datos personales se utilizarán para procesar tu pedido, mejorar tu experiencia en esta web, gestionar el acceso a tu cuenta y otros propósitos descritos en nuestra política de privacidad.') }}
                </p>
                <p class="gelion-thin text-center">
                    {{ __('¿Ya tienes una cuenta en rewear?') }} <br>
                    <span class="gelion-bold"><a href="{{ route('login') }}"
                            style="color: #000; text-decoration: none;">{{ __('Iniciar sesión') }}</a></span>
                </p>
            </div>
        </div>
    </section>
    <section id="bottom" class="pb-5">
        <div class="container espacio-login-foto">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="{{ asset('/img/user/2701-REGISTRO-CALCE-1.jpg') }}" loading="Lazy" alt="Modelos con playera ecológica"
                        class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="{{ asset('/img/user/2701-REGISTRO-CALCE-2.jpg') }}" loading="Lazy" alt="Modelos con playera ecológica"
                        class="img-fluid">
                </div>
            </div>
        </div>
    </section>
@endsection
