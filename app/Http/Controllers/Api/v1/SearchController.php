<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($code, $keyword) {
        $code = strtoupper($code);
        $keyword = strtolower($keyword);
        $model = "App\Models\\" . $code;
        $results = $model::where('name', 'like', '%' . $keyword . '%')->get();
        return response()->json($results);
    }
}
