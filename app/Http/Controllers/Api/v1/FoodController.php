<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index() {
        $foods = Food::all();
        return response()->json($foods);
    }

    public function show($id) {
        $food = Food::find($id);
        return response()->json($food);
    }

    public function store(Request $request) {
        $food = new Food();
        $food->food_name = $request->food_name;
        $food->food_description = $request->food_description;
        $food->food_category_id = $request->food_category_id;
        $food->save();
        return response()->json($food);
    }

    public function update(Request $request, $id) {
        $food = Food::find($id);
        $food->food_name = $request->food_name;
        $food->food_description = $request->food_description;
        $food->food_category_id = $request->food_category_id;
        $food->save();
        return response()->json($food);
    }

    public function destroy($id) {
        $food = Food::find($id);
        $food->delete();
        return response()->json($food);
    }

    public function listIngredients($id) {
        $food = Food::find($id);
        $ingredients = $food->ingredients;
        return response()->json($ingredients);
    }

    public function listByFoodCategory($category_Id) {
        $foods = Food::where('food_category_id', $category_Id)->get();
        return response()->json($foods);
    }
}
