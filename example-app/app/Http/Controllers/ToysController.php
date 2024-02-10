<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToysController extends Controller
{
    public function cats()
    {
        return $this->belongsTo(Cats::class);
    }
}
