<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsTranslate extends Model
{
    //
    use HasFactory;
    protected $table = 'cars_translates';

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }
}
