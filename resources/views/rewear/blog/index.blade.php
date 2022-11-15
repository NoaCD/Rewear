@extends('layouts.rewear-azul')
@if (session('locale') == 'es')
    @section('title', 'Noticias - Rewear')
@else
    @section('title', 'News - Rewear')
@endif
@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('/css/blog.css') }}">
    @endpush
    <div class="content" style="padding-top: 5em;">
        <div class="container">
            <div class="d-block d-sm-block d-md-block d-lg-block">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="control-box p-3 main-content">
                            <div class="row">
                                @foreach ($posts as $post)
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="tamano">
                                            <img src="{{ Storage::url($post->image->url) }}" class="img-fluid">
                                        </div>
                                        <div class="text-center pt-2">
                                            <div class="row" style="color: gray;">
                                                <div class="col-12">
                                                    <a href="" class="gelion-bold size-2"
                                                        style="color: #000; text-decoration:none;">
                                                        @if (session('locale') == 'es')
                                                            {{ App\Models\PostCategory::find($post->post_category_id)->name }}
                                                        @else
                                                            {{ App\Models\PostCategory::find($post->post_category_id)->name_en }}
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="col-12">
                                                    <a href="" class="gelion-bold"
                                                        style="color: #000; text-decoration:none;">
                                                        @if (session('locale') == 'es')
                                                            {{ $post->title }}
                                                        @else
                                                            {{ $post->title_en }}
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="col size-2">Por: <span><a href=""
                                                            style="color: gray; text-decoration:none;">{{ $post->user->name }}</a></span>
                                                    <span
                                                        class="pl-2">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <p class="gelion-thin size-2"
                                                style="color: #000; font-size: 0.9em; line-height: 1.2em;">
                                                @if (session('locale') == 'es')
                                                    {!! $post->extract !!}
                                                @else
                                                    {!! $post->extract_en !!}
                                                @endif
                                            </p>
                                            <span>
                                                <a href="{{ route('post.show', $post) }}" class="gelion-bold size-2"
                                                    style="color: #000; text-decoration: none;">CONTINUAR LEYENDO</a>
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <!--Sidebar-->
                        <div class="control-box pl-3 pr-3 pt-2 sidebar">
                            {{-- <div class="filtro">
                                <div class="form-outline form-block">
                                    <input type="search" placeholder="Buscar" class="search">
                                </div>
                            </div> --}}
                        </div>
                        <div class="control-box pl-3 mt-3 sidebar mb-2">
                            <a href="" style="color: #000; text-decoration: none;">
                                <div class="row">
                                    @foreach ($posts as $post)
                                        <div class="col-2 thumb">
                                            <img src="{{ Storage::url($post->image->url) }}" class="fill">
                                        </div>
                                        <div class="col-9 pl-5 m-auto">
                                            <h4 class="gelion-bold size-2">
                                                @if (session('locale') == 'es')
                                                    {{ $post->title }}
                                                @else
                                                    {{ $post->title_en }}
                                                @endif
                                                <br>
                                                <span class="gelion-thin"
                                                    style="color: gray;">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</span>
                                            </h4>
                                        </div>
                                    @endforeach
                                </div>
                            </a>
                        </div>

                        {{-- <div class="control-box p-3">
                            <div class="filtro">
                                <!--Filtro-->
                                <p class="gelion-bold">CATEGORÍAS</p>
                                <div class="form-group d-flex justify-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Noticias
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Rewear
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
