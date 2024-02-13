<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cat;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'number',
        'dish_id'
    ];

    public function cats()
    {
        return $this->belongsToMany(Cat::class);
    }

}
