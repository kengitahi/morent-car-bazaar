<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory, HasUuids;

    public function scopeInCarType(Builder $query, array $carTypes)
    {
        return $query->whereIn('type', $carTypes);
    }

    public function scopeInCarCapacity(Builder $query, array $carCapacities)
    {
        return $query->whereIn('capacity', $carCapacities);
    }

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
