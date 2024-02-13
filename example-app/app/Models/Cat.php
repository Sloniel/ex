<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'dish_id',
        'id'
    ];

    public function toys()
    {
        return $this->hasMany(Toy::class);
    }

    public function dishes()
    {
        return $this->hasOne(Dish::class);
    }

    public function peoples()
    {
        return $this->belongsToMany(People::class);
    }
}