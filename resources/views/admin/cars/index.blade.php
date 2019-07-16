@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow rounded p-5">
        <h3 class="text-center pb-3">Carros</h3>
        <div class="text-right">
            <a href="{{route('admin.cars.create')}}" class="btn btn-primary btn-lg">Cadastrar carro</a>
        </div>
        <div class="row justify-content-center py-3">
            <div class="col-6">
                <form action="{{route('admin.cars.index')}}" method="get">
                    <input type="text" class="form-control" name="search" value="{{$search}}">
                    <button class="btn btn-outline-secondary mt-2">Pesquisar</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($cars as $car)
                <div class="col-6 col-md-4 col-lg-3 my-2">
                    <div class="card shadow-sm" style="width: 18rem;">
                        <img src="{{$car->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{$car->name}}</h4>
                            <p class="card-text">R$ {{number_format($car->price, 2)}}</p>
                            <a href="{{route('admin.cars.edit', ['car' => $car->id])}}" class="btn btn-primary">Editar</a>
                            <form method="post" class="d-inline-block" action="{{route('admin.cars.destroy', ['car' => $car->id])}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted">Não há carros cadastrados.</div>
            @endforelse
        </div>
        <div class="text-center">
            {{$cars->links()}}
        </div>
    </div>
@endsection
