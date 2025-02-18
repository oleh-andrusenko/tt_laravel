<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cars';
    protected $guarded = false;
    protected $hidden = ['photos', 'created_at', 'updated_at', 'deleted_at'];

    public function reviews()
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function translations()
    {
        return $this->hasMany(CarsTranslate::class);
    }

    public function scopeWithReviewsCount(Builder $query)
    {
        return $query->withCount('reviews');
    }

    public function scopeWithAverageRating(Builder $query)
    {
        return $query->withAvg('reviews', 'rating');
    }


}
