<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    public function index() {
        $dishes = Dish::with('cats')->get();
        return response()->json(['dishes' => $dishes], 200);
    }

    public function createDish(Request $request) {
        $dishes=Dish::create([
            'color' => $request->color,
            'cat_id' => $request->cat_id
        ]);
        return response()->json(['dishes'=> $dishes], 200);
    }

    public function deleteDish($id) {
        $dishes=Dish::where('id', $id)->delete();
        return response()->json(['dishes'=>$dishes], 200);
    }

    public function updateDish(Request $request) {
        $dishes=Dish::find($request->id);
        $dishes->update([
            'color' => $request->color,
            'cat_id' => $request->cat_id
        ]);
        return response()->json(['dishes'=>$dishes], 200);
    }
}
