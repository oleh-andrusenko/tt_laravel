<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'users';
    protected $guarded = false;
    protected $hidden = ['password', 'remember_token', 'birthDate', 'created_at', 'updated_at', 'deleted_at'];

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
