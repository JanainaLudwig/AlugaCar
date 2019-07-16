<div class="text-center">
    <h5 class="text-center">Devolução</h5>
    <hr>
    <div>
        <span class="lnr lnr-calendar-full align-text-bottom text-primary"></span>&nbsp;&nbsp;
        @if (isset($devolutionDate))
            <datepicker :value="{{$devolutionDate}}" name="devolution_date" placeholder="Data" class="datepicker d-inline-block"></datepicker>
        @else

            <datepicker :value="finalSearchDate" name="devolution_date" placeholder="Data" class="datepicker d-inline-block"></datepicker>
        @endif
    </div>
    <div class="pt-3">
        <span class="lnr lnr-clock align-text-bottom text-primary"></span>&nbsp;&nbsp;
        @if (isset($devolutionTime))
            <timepicker :value="{{$devolutionTime}}" name="devolution_time" placeholder="Horário" :minute-interval="30"></timepicker>
        @else
            <timepicker name="devolution_time" placeholder="Horário" :minute-interval="30"></timepicker>
        @endif
    </div>
</div>
