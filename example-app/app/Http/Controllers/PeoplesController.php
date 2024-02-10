<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeoplesController extends Controller
{
    public function Cat_people()
    {
        return $this->hasMany(Cat_people::class);
    }
}
