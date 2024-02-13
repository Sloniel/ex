<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatsController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\PeoplesController;
use App\Http\Controllers\ToysController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CatsController::class)->group(function() {
    // Route::get('cats', 'getCats');
    // Route::get('cats/{id}', 'getCat');
    Route::post('cats', 'createCat');
    Route::delete('cats/{id}', 'deleteCat');
    Route::patch('cats', 'updateCat');

    Route::get('cats', 'index');

    Route::post('cats/{cat_id}/dishes/{dish_id}', 'createCatDish');
});

Route::controller(PeoplesController::class)->group(function() {
    Route::get('peoples', 'index');

    Route::post('peoples', 'createPeople');
    Route::delete('peoples/{id}', 'deletePeople');
    Route::patch('peoples', 'updatePeople'); 
    
    Route::post('peoples/{people_id}/cats/{cat_id}', 'createPeopleCat');
});

Route::controller(DishesController::class)->group(function(){
    Route::get('dishes','index');

    Route::post('dishes', 'createDish');
    Route::delete('dishes/{id}', 'deleteDish');
    Route::patch('dishes', 'updateDish');
});

Route::controller(ToysController::class)->group(function(){
    Route::get('toys','index');

    Route::post('toys', 'createPToy');
    Route::delete('toys/{id}', 'deleteToy');
    Route::patch('toys', 'updateToy'); 

    Route::post('toys/{toy_id}/cats/{cat_id}', 'createToyCat');
});