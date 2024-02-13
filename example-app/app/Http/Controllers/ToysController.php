<?php

namespace App\Http\Controllers;

use App\Models\Toy;
use Illuminate\Http\Request;

class ToysController extends Controller
{
    public function index() {
        $toys = Toy::query()->with('cats')->get();
        return response()->json(['toys' => $toys], 200);
    }

    public function createPToy(Request $request) {
        $toys=Toy::create([
            'color' => $request->color,
            'cat_id' => $request->cat_id

        ]);
        return response()->json(['toys'=> $toys], 200);
    }

    public function deleteToy($id) {
        $toys=Toy::where('id', $id)->delete();
        return response()->json(['toys'=>$toys], 200);
    }

    public function updateToy(Request $request) {
        $toys=Toy::find($request->id);
        $toys->update([
            'color' => $request->color,
            'cat_id' => $request->cat_id
        ]);
        return response()->json(['toys'=>$toys], 200);
    }

    public function createToyCat($toy_id, $cat_id) {
        $cats=Toy::find($toy_id)->update([
            'cat_id' => $cat_id
        ]);
        return response()->json(['status'=> 'succes', 'cats'=>$cats], 200);
    }
}