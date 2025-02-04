<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    //

    protected $table = 'langs';
    protected $guarded = [];

    public function translates()
    {
        return $this->hasMany(CarsTranslate::class);
    }
}
