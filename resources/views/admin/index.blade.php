@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow rounded p-5">
        <h3 class="text-center pb-3">Dashboard</h3>

        <div class="row justify-content-center">
            <div class="col-6 col-md-3 my-2">
                <div class="card bg-light" style="width: 18rem;">
                    <div class="card-body text-center">
                        <h2 class="card-title text-primary">
                            {{$locations}}
                        </h2>
                        <p class="card-text text-muted">
                            Locações realizadas
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 my-2">
                <div class="card bg-light" style="width: 18rem;">
                    <div class="card-body text-center">
                        <h2 class="card-title text-primary">
                            {{$users}}
                        </h2>
                        <p class="card-text text-muted">
                            Usuários cadastrados
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 my-2">
                <div class="card bg-light" style="width: 18rem;">
                    <div class="card-body text-center">
                        <h2 class="card-title text-primary">
                            {{number_format($money, 2)}}
                        </h2>
                        <p class="card-text text-muted">
                            R$
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 my-2">
                <div class="card bg-light" style="width: 18rem;">
                    <div class="card-body text-center">
                        <h2 class="card-title text-primary">
                            {{$cars}}
                        </h2>
                        <p class="card-text text-muted">
                            Carros cadastrados
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
