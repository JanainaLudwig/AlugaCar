@extends('layouts.site')

@section('site-content')
    <div class="sidebar text-light px-3 pb-3">
        <h5 class="navbar-brand d-block pl-4 ml-1 pb-3"><span class="lnr lnr-car pr-2"></span>AlugaCar</h5>
        Exibindo resultados da sua pesquisa:
        <form action="{{route('search')}}">
            <div class="rounded bg-light text-dark shadow-sm mt-2 p-3 pb-4">
                <div>
                    @include('components.removal')
                </div>
                <div class="mt-5">
                    @include('components.devolution')
                </div>

                <div class="text-center">
                    <button class="btn btn-main shadow-sm mt-5" type="submit">Fazer uma nova busca</button>
                </div>
            </div>
        </form>
    </div>
    <div class="search-content pb-3">
        <div class="container">
            <div class="py-3 px-5">
                <div class="row">
                    <div class="col-md-8">
                        @foreach ($cars as $car)
                            <div class="row my-2 bg-light shadow py-3 mb-4 rounded">
                                <div class="col-md-4">
                                    <img src="{{$car->image}}" class="img-fluid rounded" alt="">
                                </div>
                                <div class="col-md-5">
                                    <small class="text-muted">Carro:</small>
                                    <h3 class="pb-3">{{$car->name}}</h3>
                                    <small class="text-muted">Total:</small>
                                    <h4><span class="text-muted">R$ </span>{{number_format($car->price * $hours, 2)}}</h4>
                                </div>
                                <div class="col-md-3 text-right">
                                    <form method="get" action="{{route('location.create', ['car' => $car->id, 'carName' => $car->name])}}">
                                        @csrf
                                        <input type="hidden" name="car_id" value="{{$car->id}}">
                                        <input type="hidden" name="rent_date" value="{{$removalDateForm}}">
                                        <input type="hidden" name="devolution_date" value="{{$devolutionDateForm}}">
                                        <button class="btn btn-outline-primary">Alugar</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--<div class="container-fluid px-0">--}}
{{--    <div class="col-12 col-md-4 col-lg-3 bg-primary">--}}
{{--        Sidebar--}}
{{--    </div>--}}
{{--</div>--}}

@stop
