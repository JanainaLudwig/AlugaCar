@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow rounded p-5">
        <h3 class="text-center pb-3">Suas locações</h3>

        <div class="row justify-content-center">
            @forelse ($locations as $location)
                <div class="col-6 col-md-4 col-lg-3 my-2 @if ($location->loan_date < now()) old-location @endif">
                    <div class="card shadow-sm" style="width: 18rem;">
                        <img src="{{$location->car->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">
                                <span class="lnr lnr-car"></span>
                                {{$location->car->name}}</h4>
                            <p class="card-text">
                                <span class="lnr lnr-calendar-full align-text-bottom"></span>&nbsp;
                                {{$location->loan_date->format('d/m/y')}}
                            </p>
                            <a href="{{route('location.show', ['location' => $location->id])}}" class="btn btn-primary">Visualizar</a>
                            @if ($location->loan_date > now())
                            <form method="post" class="d-inline-block" action="{{route('location.destroy', ['location' => $location->id])}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger" type="submit">Cancelar</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted">
                    Você ainda não possui locações.
                    <br>
                    <a href="/#find-car" class="btn btn-lg btn-primary mt-3">Encontre seu carro</a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
