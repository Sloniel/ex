<?php

namespace App\Http\Controllers;

use App\Http\Requests\People\createPeople;
use App\Http\Requests\People\updatePeople;
use Illuminate\Http\Request;
use App\Models\People;
use Illuminate\Contracts\Pipeline\Pipeline;
use Illuminate\Validation\Rules\Can;

class PeoplesController extends Controller
{
    // public function index(Request $request) {
    //     $limit = $request->limit;
    //     $page = $request->page;
    //     $peoples = People::with('cats')->orderBy('created_at')->Paginate(
    //         $perPage = $limit, 
    //         $columns = ['*'],
    //         $pageName = $page
    //     );
    //     return response()->json(['peoples' => $peoples], 200);
    // }

    public function index(Request $request) {
        $limit = $request->limit;
        $page = $request->page;
        if(!isset($limit)) {$limit = 1;}
        if(!isset($page)) {$page = 1;}
        $peoples = People::with('cats')
            ->orderBy('created_at')
            ->Paginate(
            $perPage = $limit, 
            $columns = ['*'],
            $pageName = $page
        );
        $response = app(Pipeline::class) /*how to do this thing m*/
            ->send($peoples)
            ->through()
            ->thenReturn();
        return response()->json(['peoples' => $response], 200);
        // return response()->json(['peoples' => $peoples], 200);
    }

    public function createPeople(createPeople $request) {
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

    public function updatePeople(updatePeople $request) {
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
