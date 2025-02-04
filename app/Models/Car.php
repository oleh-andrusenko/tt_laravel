<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cars';
    protected $guarded = false;

    public function reviews()
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function translations(){
        return $this->hasMany(CarsTranslate::class);
    }
}
