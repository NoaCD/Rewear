@extends('layouts.rewear-azul')
@section('content')
    <section id="user" class="mt-3">
        <div class="container espacio-login-card">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-sm-12 bg-login"
                            style="background-image: url(/img/user/login.jpg);">
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 inicio espacio-login ">
                            <h4 class="gelion-bold">Iniciar sesión</h4>
                            <form method="POST" action="{{ route('login') }}">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="E-mail">
                                    <small id="emailHelp" class="form-text text-muted">{{__('No compartiremos tu email con
                                        nadie.')}}</small>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">{{__('Acepto los')}} <a href=""
                                            style="color: #000; text-decoration: none;">{{__('términos y condiciones')}}</a></label>
                                </div>
                                <button type="submit" class="gelion-bold btn btn-primary btn-block">{{__('Iniciar Sesión')}}</button>
                                <button type="submit" class="gelion-bold btn btn-info btn-block">Iniciar Sesión</button>
                            </form>
                        </div>

                    </div>
                </div>
                <p class="gelion-thin text-center pt-3">
                    ¿Eres nuevo en rewear? <br>
                    <span class="gelion-bold"><a href="/user/register.html"
                            style="color: #000; text-decoration: none;">Registrarme</a></span>
                </p>
            </div>
        </div>
    </section>
    <section id="bottom" class="pb-5">
        <div class="container espacio-login-foto">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="{{ asset('/img/user/r-left-1.png') }}" alt="Modelos con playera ecológica" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="{{ asset('/img/user/right.jpg') }}" alt="Modelos con playera ecológica"
                        class="img-fluid">
                </div>
            </div>
        </div>
    </section>
@endsection
