<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index() {
        $ingredients = Ingredient::all();
        // if($ingredients->)
        return response()->json($ingredients);
    }

    public function show($id) {
        $ingredient = Ingredient::find($id);
        return response()->json($ingredient);
    }

    public function store(Request $request) {
        $ingredient = new Ingredient();
        $ingredient->ingredient_name = $request->ingredient_name;
        $ingredient->ingredient_amount = $request->ingredient_amount;
        $ingredient->ingredient_unit = $request->ingredient_unit;
        $ingredient->ingredient_food_id = $request->ingredient_food_id;
        $ingredient->save();
        return response()->json($ingredient);
    }

    public function update(Request $request, $id) {
        $ingredient = Ingredient::find($id);
        $ingredient->ingredient_name = $request->ingredient_name;
        $ingredient->ingredient_amount = $request->ingredient_amount;
        $ingredient->ingredient_unit = $request->ingredient_unit;
        $ingredient->ingredient_food_id = $request->ingredient_food_id;
        $ingredient->save();
        return response()->json($ingredient);
    }

    public function destroy($id) {
        $ingredient = Ingredient::find($id);
        $ingredient->delete();
        return response()->json($ingredient);
    }
}
