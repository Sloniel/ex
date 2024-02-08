<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;

class CatsController extends Controller
{
    public function getCats() {
        $cats=Cat::where('id', 3)->get();
        return response()->json(['cats'=>$cats], 200);
    }

    public function create(Request $request) {
        $cats=Cat::create([
            'name' => $request->name,
            'gender' => $request->gender            
        ]);
        return response()->json(['cats'=> $cats], 200);
    }

    public function getCat($id) {
        $cats=Cat::find($id);
        return response()->json(['cats'=>$cats], 200);
    }
    
    public function deleteCat($id) {
        $cats=Cat::where('id', $id)->delete();
        return response()->json(['cats'=>$cats], 200);
    }

    public function updateCat(Request $request) {
        $cats=cat::find($request->id);
        $cats->update([
            'name' => $request->name,
            'gender' => $request->gender
        ]);
        return response()->json(['cats'=>$cats], 200);
    }
}