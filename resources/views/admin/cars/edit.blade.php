@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow rounded p-5">
        <a class="text-muted" href="{{route('admin.cars.index')}}">Voltar a todos os carros</a>
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="text-center">
                    <h3>Editar carro</h3>
                </div>
                <form class="form-row pt-5" action="{{route('admin.cars.update', ['car' => $car->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group text-center col-md-6 col-lg-5">
                        <Image-Loader initial-image="{{$car->image}}" class="mx-auto" name="image"></Image-Loader>
                        @error('image')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$car->name}}">
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Preço</label>
                            <input step="0.1" type="number" class="form-control" id="price" name="price" value="{{$car->price}}">
                            @error('price')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center col-12 text-center pt-3">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
