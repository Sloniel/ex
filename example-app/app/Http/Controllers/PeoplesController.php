<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class PeoplesController extends Controller
{
    public function index() {
        $peoples = People::with('cats')->get();
        return response()->json(['peoples' => $peoples], 200);
    }

    public function createPeople(Request $request) {
        $peoples=People::create([
            'name' => $request->name,
            'age' => $request->age,
            'number' => $request->number
        ]);
        return response()->json(['peoples'=> $peoples], 200);
    }

    public function deletePeople($id) {
        $peoples=People::where('id', $id)->delete();
        return response()->json(['peoples'=>$peoples], 200);
    }

    public function updatePeople(Request $request) {
        $peoples=People::find($request->id);
        $peoples->update([
            'name' => $request->name,
            'age' => $request->age,
            'number' => $request->number
        ]);
        return response()->json(['peoples'=>$peoples], 200);
    }

    public function createPeopleCat($people_id, $cat_id) {
        $cats=People::find($people_id)->cats()->attach($cat_id);
        return response()->json(['status'=> 'succes'], 200);
    }
}
