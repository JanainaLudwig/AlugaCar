<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'location')
            ->using(Location::class)
            ->withPivot(['loan_date', 'devolution_date']);
    }

    public function getImageAttribute($value)
    {
        return Storage::disk('public')->url($value);
    }
}
