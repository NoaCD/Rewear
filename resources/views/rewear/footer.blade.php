<footer>
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-lg-4 col-md-12 col-sm-12 m-auto">
                <img src="{{ asset('/img/rewear-bco.svg') }}" alt="" width="200">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <h4 class="gelion-bold" style="color: #fff;">{{ __('Mapa del sitio') }}</h4>
                <div class="row">
                    <div class="col-6">
                        <li>
                            <a href="{{ route('home.index') }}" class="gelion-thin"
                                style="color: #fff;">{{ __('Inicio') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="gelion-thin"
                                style="color: #fff;">{{ __('Nosotros') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('catalogue.index') }}" class="gelion-thin"
                                style="color: #fff;">{{ __('Catálogo') }}</a>
                        </li>
 
                    </div>
                    <div class="col-6">
                        <li>
                            <a href="{{ route('faq') }}" class="gelion-thin"
                                style="color: #fff;">{{ __('FAQ') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="gelion-thin"
                                style="color: #fff;">{{ __('Contacto') }}</a>
                        </li>
                    </div>
                </div>
                <h4 class="gelion-bold pt-5" style="color: #fff;">{{ __('Síguenos en redes sociales') }}</h4>
                <div class="row">
                    <div class="col-12">
                        <li>
                            <div class="row pt-2">
                                <div class="col-2 pt-2">
                                    @if (session('locale') == 'es')
                                        <a href="https://www.facebook.com/myrewear" target="_blank"
                                            style="color: #fff;">
                                            <i class="fab fa-facebook-square"
                                                style="color: #fff; font-size: 2em;"></i>
                                        </a>
                                    @else
                                        <a href="https://www.facebook.com/myrewear.us" target="_blank"
                                            style="color: #fff;">
                                            <i class="fab fa-facebook-square"
                                                style="color: #fff; font-size: 2em;"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-2 pt-2">
                                    @if (session('locale') == 'es')
                                        <a href="https://www.instagram.com/myrewear.mx/" target="_blank"
                                            style="color: #fff;">
                                            <i class="fab fa-instagram" style="color: #fff; font-size: 2em;"></i>
                                        </a>
                                    @else
                                        <a href="https://www.instagram.com/myrewear.us/" target="_blank"
                                            style="color: #fff;">
                                            <i class="fab fa-instagram" style="color: #fff; font-size: 2em;"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-2 pt-2">
                                    <a href="https://wa.me/message/DSJ44XM4QJZSO1" target="_blank"
                                        style="color: #fff;">
                                        <i class="fab fa-whatsapp" style="color: #fff; font-size: 2em;"></i>
                                    </a>
                                </div>
                                <div class="col-2 pt-2">
                                    <a href="https://www.linkedin.com/company/myrewear/" target="_blank"
                                        style="color: #fff;">
                                        <i class="fab fa-linkedin" style="color: #fff; font-size: 2em;"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <h4 class="gelion-bold" style="color: #fff;">{{ __('Contáctanos') }}</h4>
                <div class="row">
                    <div class="col-12">
                        <li>
                            <div class="row">
                                <div class="col-1 m-auto">
                                    <img src="{{ asset('/img/index/ubi.svg') }}" width="20">
                                </div>
                                <div class="col-11 ">
                                    <p class="gelion-thin m-auto" style="color: #fff;">
                                        {{ __('Dirección: C-18 No. 163 Carr: Umán - Uxmal. Umán, Yucatán MX. C.P. 97390') }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="pt-2">
                            <div class="row">
                                <div class="col-1 m-auto">
                                    <img src="{{ asset('/img/index/cel.svg') }}" width="20">
                                </div>
                                <div class="col-11 ">
                                    <p class="gelion-thin m-auto" style="color: #fff;">
                                        {{ __('Teléfono: (999) 324 7922') }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="pt-2">
                            <div class="row">
                                <div class="col-1 m-auto">
                                    <img src="{{ asset('/img/index/cel.svg') }}" width="20">
                                </div>
                                <div class="col-11 ">
                                    <p class="gelion-thin m-auto" style="color: #fff;">
                                        {{ __('Email: contacto@myrewear.com') }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style="border-color: #fff; opacity: 20%;">
    <div class="container">
        <div class="text-center pt-5 pb-4">
            <a href="{{ asset('pdfs/Aviso de Privacidad Integral REWEAR-1.pdf') }}" download target="_blank"
                class="gelion-bold" style="color: #fff; text-decoration: none;">
                {{ __('Política de privacidad') }}</a>
            <p href="" class="gelion-bold" style="color: #fff; text-decoration: none;">
                {{ __('Playeras ecológicas Rewear 2022 © todos los derechos reservados') }}
            </p>
        </div>
    </div>
</footer>
