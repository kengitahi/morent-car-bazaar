<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function getRouteKeyName()
    {
        //slug is a string and this string is the column in your database you created.
        return "slug";
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
