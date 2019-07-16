<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Location extends Pivot
{
    public $incrementing = true;

    protected $table = 'location';

    protected $guarded = ['id'];

    protected $dates = [
        'loan_date',
        'devolution_date'
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getHoursAttribute()
    {
        return $this->loan_date->diffInMinutes($this->devolution_date) / 60;
    }
}
