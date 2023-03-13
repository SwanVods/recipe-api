<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodCategory;

class FoodCategoryController extends Controller
{
    public function index() {
        $foodCategories = FoodCategory::all();
        return response()->json($foodCategories);
    }

    public function show($id) {
        $foodCategory = FoodCategory::find($id);
        return response()->json($foodCategory);
    }

    public function store(Request $request) {
        $foodCategory = new FoodCategory();
        $foodCategory->category_name = $request->category_name;
        $foodCategory->save();
        return response()->json($foodCategory);
    }

    public function update(Request $request, $id) {
        $foodCategory = FoodCategory::find($id);
        $foodCategory->category_name = $request->category_name;
        $foodCategory->save();
        return response()->json($foodCategory);
    }

    public function destroy($id) {
        $foodCategory = FoodCategory::find($id);
        $foodCategory->delete();
        return response()->json($foodCategory);
    }

    public function listFoods($id) {
        $foodCategory = FoodCategory::find($id);
        $foods = $foodCategory->foods;
        return response()->json($foods);
    }
}
