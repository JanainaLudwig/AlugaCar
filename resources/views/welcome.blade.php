@extends('layouts.site')


@section('site-content')

    <div class="container-fluid position-relative text-right d-none d-md-block" id="main-site">
        <img src="{{asset('animation.gif')}}" class="img-fluid w-50" alt="">
        <div class="container position-absolute text-light" id="main-logo">
            <h1><span class="lnr lnr-car pr-1"></span> AlugaCar</h1>
            <p class="text-spacing">Aluguel  &nbsp;de &nbsp;carros</p>
            <p class="pt-3">
                <a href="#find-car" class="btn btn-lg btn-main">Encontre seu carro</a>
{{--                <button class="btn btn-outline-light btn-lg">Ofertas</button>--}}
            </p>
        </div>
    </div>

    <div class="container-fluid bg-primary d-block d-md-none text-center py-5 text-light bg-primary">
        <h1><span class="lnr lnr-car pr-1"></span> AlugaCar</h1>
        <p class="text-spacing">Aluguel  &nbsp;de &nbsp;carros</p>
        <p class="pt-3">
            <a href="#find-car" id="btn" class="btn btn-light btn-lg btn-main">Encontre seu carro</a>
            {{--                <button class="btn btn-outline-light btn-lg">Ofertas</button>--}}
        </p>
        <img src="{{asset('animation.gif')}}" class="img-fluid w-50" alt="">
        <div class="pb-5"></div>
    </div>

    <div class="container mb-5" id="find-car">
        <div class="bg-white rounded shadow p-3">
            <h3 class="text-center py-3">Encontre seu carro</h3>
            <form method="get" action="{{route('search')}}">
                <div class="form-row justify-content-around pt-3 pb-5 px-5">
                    <div class="col-10 col-md-4">
                        @include('components.removal')
                    </div>
                    <div class="col-10 col-md-4 text-center mt-5 mt-md-0">
                        @include('components.devolution')
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>
        </div>

    </div>

@endsection
<script>
</script>
