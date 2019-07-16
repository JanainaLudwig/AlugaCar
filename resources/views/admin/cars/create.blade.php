@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow rounded p-5">
        <a class="text-muted" href="{{route('admin.cars.index')}}">Voltar a todos os carros</a>
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="text-center">
                    <h3>Cadastrar carro</h3>
                </div>
                <form class="form-row pt-5" action="{{route('admin.cars.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-center col-md-4">
                        <Image-Loader class="mx-auto" name="image"></Image-Loader>
                        @error('image')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Preço</label>
                            <input step="0.1" type="number" class="form-control" id="price" name="price">
                            @error('price')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center col-12 text-center pt-3">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
