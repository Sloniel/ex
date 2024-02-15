<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Dish;
use App\Http\Requests\Cat\createCat;
use App\Http\Requests\Cat\updateCat;

class CatsController extends Controller
{
    // public function getCats() {
    //     $cats=Cat::where('id', 3)->get();
    //     return response()->json(['cats'=>$cats], 200);
    // }

    public function createCat(createCat $request) {
        $cats=Cat::create([
            // 'id' => $request->id,
            'name' => $request->name,
            'gender' => $request->gender,
            'dish_id' => $request->dish_id

        ]);
        return response()->json(['cats'=> $cats], 200);
    }

    // public function getCat($id) {
    //     $cats=Cat::find($id);
    //     return response()->json(['cats'=>$cats], 200);
    // }
    
    public function deleteCat($id) {
        $cats=Cat::where('id', $id)->delete();
        return response()->json(['cats'=>$cats], 200);
    }

    public function updateCat(updateCat $request) {
        $cats=cat::find($request->id);
        $cats->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'dish_id' => $request->dish_id
        ]);
        return response()->json(['cats'=>$cats], 200);
    }

    public function index(Request $request) { /* +0+0+0+0+0+ */
        $limit = $request->limit;
        $page = $request->page;
        $cats=Cat::query()
            ->with('dishes', 'toys','peoples')
            ->orderBy('created_at')
            ->Paginate(
                $perPage = $limit, 
                $columns = ['*'],
                $pageName = $page);
        return response()->json(['cats'=>$cats], 200);
    }

    public function createCatDish($cat_id, $dish_id) {
        $cats=Cat::find($cat_id)->update([
            'dish_id' => $dish_id
        ]);
        $dishes=Dish::find($dish_id)->update([
            'cat_id' => $cat_id
        ]);
        return response()->json(['status'=> 'succes', 'cats'=>$cats], 200);
    }

    // public function page(){
    //     $cats = Cat::paginate(2);
    //     return response()->json(['cats'=>$cats], 200);
    // }
}