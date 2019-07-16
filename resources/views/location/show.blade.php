@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow rounded p-5">
        <h3 class="text-center">Visualizar locação</h3>
        <div class="row pt-5">
            <div class="col-md-6 my-auto">
                <img src="{{$location->car->image}}" class="img-fluid rounded">
            </div>
            <div class="col-md-6 my-auto border-left">

                    <div>
                        <small>Nome do carro:</small>
                        <br>
                        <span class="lnr lnr-car align-text-bottom text-primary"></span>&nbsp;&nbsp;
                        <h5 class="d-inline">{{$location->car->name}}</h5>
                    </div>

                    <div class="pt-3">
                        <small>Retirada:</small>
                        <br>
                        <span class="lnr lnr-calendar-full align-text-bottom text-primary"></span>&nbsp;&nbsp;
                        <h5 class="d-inline">{{$location->loan_date->format('d/m/Y')}}</h5>
                        <span class="lnr lnr-clock align-text-bottom text-primary pl-5"></span>&nbsp;&nbsp;
                        <h5 class="d-inline">{{$location->loan_date->format('H:i')}}</h5>
                    </div>

                    <div class="pt-3">
                        <small>Devolução:</small>
                        <br>
                        <span class="lnr lnr-calendar-full align-text-bottom text-primary"></span>&nbsp;&nbsp;
                        <h5 class="d-inline">{{$location->devolution_date->format('d/m/Y')}}</h5>
                        <span class="lnr lnr-clock align-text-bottom text-primary pl-5"></span>&nbsp;&nbsp;
                        <h5 class="d-inline">{{$location->devolution_date->format('H:i')}}</h5>
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-auto">
                            <small>Valor total:</small>
                            <h5>R$ {{number_format($location->hours * $location->car->price, 2)}}</h5>
                        </div>
                        <div class="col-md-6">
                            <small>Método de pagamento:</small>
                            <h5>{{$location->paymentMethod->name}}</h5>
                        </div>
                    </div>
            </div>
        </div>
        <hr>
        <div class="row pt-3">
            <div class="col-md-6">
                <ul>
                    <li>O carro deve ser retirado e devolvido na sede da AlugaCar.</li>
                    <li>O pagamento será realizado na hora da retirada.</li>
                </ul>

                <p class="text-muted mt-3">Locação realizada em {{$location->created_at->format('d/m/y')}} às {{$location->created_at->format('H:i:s')}}.</p>
            </div>
            <div class="col-md-6 text-right hide-in-print">
                <button onclick="window.print()" class="btn btn-outline-primary w-100 d-inline">Salvar relatório</button>
                @if ($location->loan_date > now())
                    <form method="post" class="d-inline-block w-100 mt-3" action="{{route('location.destroy', ['location' => $location->id])}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger w-100 mt-3" type="submit">Cancelar locação</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
