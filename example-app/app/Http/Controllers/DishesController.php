<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DishesController extends Controller
{
    public function cats()
    {
        return $this->belongsTo(Cats::class);
    }
}
