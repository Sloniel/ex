<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dish\createDish;
use App\Http\Requests\Dish\updateDish;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    public function index(Request $request) {
        $limit = $request->limit;
        $page = $request->page;
        $dishes = Dish::with('cats')->orderBy('created_at')->Paginate(
            $perPage = $limit, 
            $columns = ['*'],
            $pageName = $page
        );
        return response()->json(['dishes' => $dishes], 200);
    }

    public function createDish(createDish $request) {
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

    public function updateDish(updateDish $request) {
        $dishes=Dish::find($request->id);
        $dishes->update([
            'color' => $request->color,
            'cat_id' => $request->cat_id
        ]);
        return response()->json(['dishes'=>$dishes], 200);
    }
}
