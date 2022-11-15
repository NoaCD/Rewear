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
                            <h4 class="gelion-bold">Iniciar sesión</h4>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Apellido">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="E-mail">

                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Acepto los <a href=""
                                            style="color: #000; text-decoration: none;">términos y condiciones</a></label>
                                </div>
                                <button type="submit" class="gelion-bold btn btn-primary btn-block">Iniciar Sesión</button>
                                <button type="submit" class="gelion-bold btn btn-info btn-block">Iniciar Sesión</button>
                            </form>
                        </div>

                    </div>
                </div>
                <p class="gelion-thin pt-3 text-center">
                    Tus datos personales se utilizarán para procesar tu pedido, mejorar tu experiencia en esta web,
                    gestionar el acceso a tu cuenta y otros propósitos descritos en nuestra política de privacidad.
                </p>
                <p class="gelion-thin text-center">
                    ¿Ya tienes una cuenta en rewear? <br>
                    <span class="gelion-bold"><a href="/user/login.html"
                            style="color: #000; text-decoration: none;">Iniciar sesión</a></span>
                </p>
            </div>
        </div>
    </section>
    <section id="bottom" class="pb-5">
        <div class="container espacio-login-foto">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="{{ asset('/img/user/r-left.png') }}" loading="Lazy" alt="Modelos con playera ecológica"
                        class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="{{ asset('/img/user/r-right.png') }}" loading="Lazy" alt="Modelos con playera ecológica"
                        class="img-fluid">
                </div>
            </div>
        </div>
    </section>
@endsection
