@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Confirme sua locação</h3>
        <div class="row pt-5">
            <div class="col-md-6">
                <img src="{{$car->image}}" class="img-fluid rounded">
            </div>
            <div class="col-md-6">

                <form action="{{route('location.store', ['car' => $car->id])}}" class="d-block" method="post">
                <div>
                    <small>Nome do carro:</small>
                    <br>
                    <span class="lnr lnr-car align-text-bottom text-primary"></span>&nbsp;&nbsp;
                    <h5 class="d-inline">{{$car->name}}</h5>
                </div>

                <div class="pt-3">
                    <small>Retirada:</small>
                    <br>
                    <span class="lnr lnr-calendar-full align-text-bottom text-primary"></span>&nbsp;&nbsp;
                    <h5 class="d-inline">{{$loan->format('d/m/Y')}}</h5>
                    <span class="lnr lnr-clock align-text-bottom text-primary pl-5"></span>&nbsp;&nbsp;
                    <h5 class="d-inline">{{$loan->format('H:i')}}</h5>
                </div>

                <div class="pt-3">
                    <small>Devolução:</small>
                    <br>
                    <span class="lnr lnr-calendar-full align-text-bottom text-primary"></span>&nbsp;&nbsp;
                    <h5 class="d-inline">{{$devolution->format('d/m/Y')}}</h5>
                    <span class="lnr lnr-clock align-text-bottom text-primary pl-5"></span>&nbsp;&nbsp;
                    <h5 class="d-inline">{{$devolution->format('H:i')}}</h5>
                </div>

                <div class="row pt-3">
                    <div class="col-md-auto">
                        <small>Valor total:</small>
                        <h5>R$ {{number_format($hours*$car->price, 2)}}</h5>
                    </div>
                    <div class="col-md-6">
                        <small>Método de pagamento:</small>
                        <custom-select name="payment_method" placeholder="Escolha..." :items="{{$paymentMethods}}" item-text="name" item-value="id"></custom-select>
                    </div>
                </div>

                <hr>

                    @csrf
                    <input type="hidden" name="loan" value="{{$loan}}">
                    <input type="hidden" name="devolution" value="{{$devolution}}">
                    <button class="btn btn-primary w-100 d-inline">Confirmar locação</button>
                </form>
            </div>
        </div>
    </div>
@endsection
