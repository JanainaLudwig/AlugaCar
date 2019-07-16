<div class="text-center">
    <h5>Retirada</h5>
    <hr>
    <div>
        <span class="lnr lnr-calendar-full align-text-bottom text-primary"></span>&nbsp;&nbsp;
        @if (isset($removalDate))
            <datepicker :value="{{$removalDate}}" name="rent_date" placeholder="Data" class="datepicker d-inline-block"></datepicker>
        @else
            <datepicker :value="initialSearchDate" name="rent_date" placeholder="Data" class="datepicker d-inline-block"></datepicker>
        @endif
    </div>
    <div class="pt-3">
        <span class="lnr lnr-clock align-text-bottom text-primary"></span>&nbsp;&nbsp;
        @if (isset($removalTime))
            <timepicker :value="{{$removalTime ?? ''}}" name="rent_time" placeholder="Horário" :minute-interval="30"></timepicker>
        @else
            <timepicker name="rent_time" placeholder="Horário" :minute-interval="30"></timepicker>
        @endif
    </div>
</div>
